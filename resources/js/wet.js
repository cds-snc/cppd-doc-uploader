// Do CDTS stuff
// TODO: language switching, move into a component or helper?
var defTop = document.getElementById("def-top");
var language = document.documentElement.lang;
var switchLanguage = language == 'en' ? 'fr' : 'en';

defTop.outerHTML = wet.builder.appTop({
    appName: [
      {
        href: "/",
        text: ('Canada Pension Plan Disability Benefit - Document Upload')
      }
    ],
    search: false,
    lngLinks: [
      {
        lang: switchLanguage,
        href: "?lang=" + switchLanguage,
        text: 'Français'
      }
    ],
    showPreContent: false,
    topSecMenu: false
});

var defPreFooter = document.getElementById("def-preFooter");
defPreFooter.outerHTML = wet.builder.preFooter({
    dateModified: "2019-07-08",
    versionIdentifier: "0.0.1",
    showPostContent: false
});
  
var defFooter = document.getElementById("def-footer");
defFooter.outerHTML = wet.builder.appFooter({

});