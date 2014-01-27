/**
 * Created by george.vlada on 1/25/14.
 */

chrome.tabs.onUpdated.addListener(function () {
    verifySite();
});

chrome.tabs.onCreated.addListener(function () {
    verifySite();
});

chrome.tabs.onActivated.addListener(function () {
    verifySite();
});