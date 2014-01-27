/**
 * Created by george.vlada on 1/25/14.
 */

/**
 *
 * API URL
 */

var apiUrlPageLoad = 'http://localhost/emag/shopping-assistant/web/app.php/page-loaded';
var apiUrlGetContent = 'http://localhost/emag/shopping-assistant/web/app.php/get-compare-page';
var apiUrlOffersContent = 'http://localhost/emag/shopping-assistant/web/app.php/get-offers-page';

var count = 0;
var urlNotifications = new Array();;

function changeExtensionIcon(type){
    if (type == "on"){
        chrome.browserAction.setIcon({path:"images/icon-color.png"});
    } else{
        chrome.browserAction.setIcon({path:"images/icon-gray.png"});
    }
}

function verifySite(){

    changeExtensionIcon('off');

    chrome.tabs.query({'active': true, 'windowId': chrome.windows.WINDOW_ID_CURRENT},

        function(tabs){
            var pageUrl = tabs[0].url;

            var sendData = {}
            sendData.url = pageUrl;

            //log
            console.log(sendData);

            $.post(apiUrlPageLoad, sendData,
                function (dataLoaded){

                    //log
                    console.log(dataLoaded);

                    if (dataLoaded.error == true){
                        return;
                    }

                    if (dataLoaded.error == false && typeof (dataLoaded.results.price_rule) != "undefined"){

                        var priceRule =  dataLoaded.results.price_rule;
                        var titleRule =  dataLoaded.results.title_rule;

                        chrome.tabs.executeScript( null, {code: priceRule},

                            function(price){

                                chrome.tabs.executeScript( null, {code: titleRule},

                                    function(title){

                                        var sendDataInfo = {}
                                        sendDataInfo.title = title[0];
                                        sendDataInfo.price = price[0];
                                        sendDataInfo.url = pageUrl;

                                        //log
                                        console.log(sendDataInfo);

                                        $.post(apiUrlGetContent, sendDataInfo,
                                            function (data){
                                                console.log(data);
                                                if (data.error == false){
                                                    changeExtensionIcon('on');
                                                    console.log(urlNotifications);
                                                    if(jQuery.inArray(pageUrl, urlNotifications) == -1){

                                                        var notification = webkitNotifications.createNotification(
                                                            'images/icon-color-128.png',
                                                            data.results.title,
                                                            data.results.notification
                                                        );

                                                        notification.addEventListener('click', function() {
                                                            notification.cancel();
                                                            window.open(data.results.url)
                                                        });
                                                        notification.show();

                                                        urlNotifications[count] = pageUrl;
                                                        count ++;
                                                    }

                                                    return;
                                                }
                                                console.log('Product not found');
                                            },
                                            'json'
                                        );
                                    }
                                );
                            }
                        );
                    }

                },
                'json'
            );
        }
    );
    //window.close();
}


function emagAssistant(){

    chrome.tabs.query({'active': true, 'windowId': chrome.windows.WINDOW_ID_CURRENT},

        function(tabs){
            var pageUrl = tabs[0].url;

            var sendData = {}
            sendData.url = pageUrl;

            //log
            console.log(sendData);

            $.post(apiUrlPageLoad, sendData,
                function (dataLoaded){

                    //log
                    console.log(dataLoaded);

                    /*
                    If is not in DB
                     */
                    if (dataLoaded.error == true){
                            changeExtensionIcon('off');
                            $.post(apiUrlOffersContent, {},
                                function (data){
                                    console.log(data);
                                    if (typeof (data.results.html) != "undefined"){
                                        $('body').html(data.results.html);
                                    }
                                },
                                'json'
                            );
                        return;
                    }

                    /*
                    Check the rule
                     */
                    if (typeof (dataLoaded.results.price_rule) != "undefined"){

                        var priceRule =  dataLoaded.results.price_rule;
                        var titleRule =  dataLoaded.results.title_rule;

                        chrome.tabs.executeScript( null, {code: priceRule},

                            function(price){

                                chrome.tabs.executeScript( null, {code: titleRule},

                                    function(title){

                                        var sendDataInfo = {}
                                        sendDataInfo.title = title[0];
                                        sendDataInfo.price = price[0];
                                        sendDataInfo.url = pageUrl;

                                        //log
                                        console.log(sendDataInfo);

                                        $.post(apiUrlGetContent, sendDataInfo,
                                            function (data){
                                                console.log(data);
                                                if (data.error == true){
                                                    changeExtensionIcon('off');
                                                    $.post(apiUrlOffersContent, {},
                                                        function (data){
                                                            console.log(data);
                                                            if (typeof (data.results.html) != "undefined"){
                                                                $('body').html(data.results.html);
                                                            }
                                                        },
                                                        'json'
                                                    );
                                                    return;
                                                }

                                                changeExtensionIcon('on');

                                                $('body').html(data.results.html);

                                            },
                                            'json'
                                        )
                                            .error(function() {
                                                changeExtensionIcon('off');
                                            });
                                    }
                                );
                            }
                        );
                    } else {
                        changeExtensionIcon('off');
                        $.post(apiUrlOffersContent, {},
                            function (data){
                                console.log(data);
                                if (typeof (data.results.html) != "undefined"){
                                    $('body').html(data.results.html);
                                }
                            },
                            'json'
                        );
                        return;
                    }

                },
                'json'
            )
                .error(function() {
                    changeExtensionIcon('off');
                });
        }
    );

}