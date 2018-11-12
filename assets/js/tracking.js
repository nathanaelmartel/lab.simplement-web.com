
var idSite = 1;
var piwikTrackingApiUrl = 'https://stats.simplement-web.com/piwik.php';

var _paq = _paq || [];
_paq.push(['setTrackerUrl', piwikTrackingApiUrl]);
_paq.push(['setSiteId', idSite]);
_paq.push(["setDoNotTrack", true]);
_paq.push(["disableCookies"]);
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
