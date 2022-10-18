/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://ec.europa.eu/idabc/eupl.html EUPL v1.1 only
 **/

(function($,zf){

// Yes, use strict mode
'use strict';

/*==========================================================================
   GLOBAL VARS
   Common usage variables & cached elements
==========================================================================*/

// ~~~ Cached elements ~~~ //

var $body = zf.cache.$body = $(document.body);
var $html = zf.cache.$html = $(document.documentElement);
var $window = zf.cache.$window = $(window);
var $document = zf.cache.$document = $(document);
var $htmlBody = zf.cache.$htmlBody = $('html, body');
var $mainBody = zf.cache.$mainBody = $(document.getElementById('zf--main-body'));
var $allMenuContainers = zf.cache.$allMenuContainers = $('.zf--menu-container');

// ~~~ Internal vars & elements ~~~ //

var bodyInitialClass = document.body.className;
var htmlInitialClass = document.documentElement.className;
var tooltipPositionX;
var tooltipPositionY;
var hasFontSizeRelativizerBeenApplied = false;
var $activeToolboxPanel = null;
var $activeToolboxButton = null;
var alertsPanelIsVisible = false;
var node_lowConstrastStash = [];
var node_invertedThemeStash = [];
var $defaultAccessibilityOptions_resetButton;
var touchStartPositionX;
var touchStartPositionY;

/*==========================================================================
   HELPERS
==========================================================================*/

// --------- Error thrower --------- //

var throwError = zf.helpers.throwError = function(errorMessage){
    try{ throw new Error(errorMessage); }
    catch(e){ console.error(e.stack); }
};

// --------- DOM manipulation helpers --------- //

var nodeHasClass = zf.helpers.nodeHasClass = function(el, className){
    if(!el){throwError('Element undefined');return;}
    return ( (' '+el.className+' ').replace(/[\n\t]/g,' ').indexOf(' '+className+' ') > -1 );
};

var nodeRemoveClass = zf.helpers.nodeRemoveClass = function(el, className){
    if(!el){throwError('Element undefined');return;}
    if(el.classList){ el.classList.remove(className); }
    else{ el.className = el.className.replace(new RegExp('[ ]?'+className,'g'),''); }
    return el;
};

var nodeAddClass = zf.helpers.nodeAddClass = function(el, className){
    if(!el){throwError('Element undefined');return;}
    if(el.classList){ el.classList.add(className); }
    else{ el.className += ' ' + className; }
    return el;
};

var nodeRemove = zf.helpers.nodeRemove = function(el){
    if(!el){throwError('Element undefined');return;}
    return el.parentNode.removeChild(el);
};

// Usage Example: var a = nodeAppendChild(this,'div','<p>hi</p>');
var nodeAppendChild = zf.helpers.nodeAppendChild = function(el, tagName, HTMLcontent){
    if(!el){throwError('Element undefined');return;}
    var newEl = document.createElement(tagName);
    if(typeof HTMLcontent !== 'undefined'){
        newEl.innerHTML = HTMLcontent;
    }
    el.appendChild(newEl);
    return newEl;
};

// --------- Force element focus --------- //
// Works also with non-focusable elements
// Note: a jQuery element ($el) must be passed as parameter
function undoForcedFocus(){
    $(this).removeAttr('tabindex').off('blur focusout', undoForcedFocus);
}
var forceElementFocus = zf.helpers.forceElementFocus = function($el){
    $el.attr('tabindex', -1).focus().on('blur focusout', undoForcedFocus);
};

// --------- ARIA live control --------- //
// Params: node + 'alive' | 'reset' | 'off'

zf.helpers.ctrlARIA = function(node, behaviour){

    if(!node || !node.nodeType) return;

    if( behaviour === 'alive' ){
        node.setAttribute('aria-live', 'assertive');
        node.setAttribute('aria-relevant', 'all');
        node.setAttribute('aria-atomic', 'true');
    }
    else if( behaviour === 'off' ){
        node.setAttribute('aria-live', 'off');
        node.removeAttribute('aria-relevant');
        node.removeAttribute('aria-atomic');
    }
    else if( behaviour === 'reset' ){
        setTimeout(function(){ // Needed for the correct update of the aria attributes
            node.removeAttribute('aria-live');
            node.removeAttribute('aria-relevant');
            node.removeAttribute('aria-atomic');
        }, 0);
        return; // Do not force reflow in this case or the 'reset' will take over the 'alive' if previously set
    }

    node.offsetWidth; // Force reflow, needed for the correct update of the aria attributes

};

/*==========================================================================
   ACTIONS
   Functions that change the state of the application, or act on its elements
==========================================================================*/

zf.actions = {

/*------------------------------------------------------------
   TOOLBOX ACTIONS
------------------------------------------------------------*/

    hideActiveToolboxPanel : function(){

        // Check if there is any active toolbox panel and if it is toggling
        if($activeToolboxPanel !== null){

            if( $activeToolboxPanel[0].contains( document.activeElement ) ){
                // Force the fousout only if the current focus is inside the panel itself
                forceElementFocus($activeToolboxButton);
            }

            // Handle the active panel
            $activeToolboxPanel.removeClass('zf--active');

            // Handle the active button
            $activeToolboxButton.removeClass('zf--active').attr('aria-expanded','false');

            // Reset the cached elements
            $activeToolboxPanel = null;
            $activeToolboxButton = null;

        }

    },

/*------------------------------------------------------------
   ALERTS PANEL
------------------------------------------------------------*/

    showAlertsPanel : function(){

        if( alertsPanelIsVisible ) return;

        if( zf.params.alertsPanelCookieAware && zf.helpers.getCookie('AlertsPanel') ) return;

        zf.helpers.nodeRemoveClass(zf.cache.node_alertsPanel, 'removed');
        zf.cache.node_alertsPanel.offsetWidth; // Force reflow, needed for the CSS3 transition
        zf.helpers.nodeAddClass(zf.cache.node_alertsPanel, 'zf--active');

        alertsPanelIsVisible = true;

    },

    hideAlertsPanel : function(){

        if( !alertsPanelIsVisible ) return;

        zf.helpers.nodeRemoveClass(zf.cache.node_alertsPanel, 'zf--active');

        setTimeout(function(){
            zf.helpers.nodeAddClass(zf.cache.node_alertsPanel, 'removed');
        }, 800);

        zf.helpers.setCookie('AlertsPanel', 'closed');

        alertsPanelIsVisible = false;

    },

/*------------------------------------------------------------
   ACCESSIBILITY OPTIONS ACTIONS
------------------------------------------------------------*/

    checkResetAccessibilityButtonVisibility : function(){

        if(
            zf.self.theme !== 'default' ||
            zf.self.rootFontFamily !== 'default' ||
            zf.self.customLayoutWidth !== 'default' ||
            zf.self.lineHeight !== 'default' ||
            zf.self.currentFontSize !== 'default'
        ){
            $defaultAccessibilityOptions_resetButton.addClass('zf--active');
        } else {
            $defaultAccessibilityOptions_resetButton.removeClass('zf--active');
        }

    },

    resetAccessibilityOptions : function(){
        zf.actions.revertRootFontSize();
        zf.actions.setTheme('default');
        zf.actions.setRootFontFamily('default');
        zf.actions.resetCustomLayoutWidth();
        zf.actions.resetLineHeight();
    },

/*------------------------------------------------------------
   FONT SIZE ACTIONS
------------------------------------------------------------*/

    increaseRootFontSize : function(){

        // Before changing the root font-size, check if the font-size relativizer has been already applied on doc-ready
        if( !hasFontSizeRelativizerBeenApplied && zf.params.enableFontSizeRelativizer ){
            zf.actions.applyFontSizeRelativizer();
        }

        if( zf.self.currentFontSize === 'default' ) zf.self.currentFontSize = zf.params.defaultFontSize;

        zf.self.currentFontSize = zf.self.currentFontSize + 10;
        if(zf.self.currentFontSize > 400){ zf.self.currentFontSize = 400; } // Not too big

        zf.actions.updateRootFontSize();

    },

    decreaseRootFontSize : function(){

        // Before changing the root font-size, check if the font-size relativizer has been already applied on doc-ready
        if( !hasFontSizeRelativizerBeenApplied && zf.params.enableFontSizeRelativizer ){
            zf.actions.applyFontSizeRelativizer();
        }

        if( zf.self.currentFontSize === 'default' ) zf.self.currentFontSize = zf.params.defaultFontSize;

        zf.self.currentFontSize = zf.self.currentFontSize - 10;
        if(zf.self.currentFontSize < 40){ zf.self.currentFontSize = 40; } // Not too small

        zf.actions.updateRootFontSize();

    },

    revertRootFontSize : function(){
        zf.self.currentFontSize = zf.params.defaultFontSize;
        zf.actions.updateRootFontSize();
    },

    updateRootFontSize : function(){
        if( zf.self.currentFontSize === zf.params.defaultFontSize ){
            zf.self.currentFontSize = 'default';
            document.documentElement.style.fontSize = '';
        } else {
            document.documentElement.style.fontSize = zf.self.currentFontSize + '%';
        }
        zf.actions.checkForcedOneColumnGridApplicatibility();
        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();
    },

/*------------------------------------------------------------
   RESIZE LAYOUT WIDTH ACTIONS
------------------------------------------------------------*/

    increaseLayoutWidth : function(){

        if( zf.self.customLayoutWidth === 'default' ) zf.self.customLayoutWidth = zf.params.defaultLayoutWidth;

        zf.self.customLayoutWidth += 100;

        if( zf.self.customLayoutWidth < 600 ) zf.self.customLayoutWidth = 600; // Keep this check anyway

        if( zf.self.customLayoutWidth > ( window.innerWidth || document.documentElement.clientWidth ))
            zf.self.customLayoutWidth = ( window.innerWidth || document.documentElement.clientWidth );

        zf.cache.customLayoutWidthStyle.innerHTML = '.zf--encloser[class]{max-width:'+zf.self.customLayoutWidth+'px}';

        zf.actions.checkForcedOneColumnGridApplicatibility();
        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

    decreaseLayoutWidth : function(){

        if( zf.self.customLayoutWidth === 'default' ) zf.self.customLayoutWidth = zf.params.defaultLayoutWidth;

        // Keep this check on top only for the "decrease" case
        if( zf.self.customLayoutWidth > ( window.innerWidth || document.documentElement.clientWidth ))
            zf.self.customLayoutWidth = ( window.innerWidth || document.documentElement.clientWidth );

        zf.self.customLayoutWidth -= 100;

        if( zf.self.customLayoutWidth < 600 ) zf.self.customLayoutWidth = 600;

        zf.cache.customLayoutWidthStyle.innerHTML = '.zf--encloser[class]{max-width:'+zf.self.customLayoutWidth+'px}';

        zf.actions.checkForcedOneColumnGridApplicatibility();
        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

    resetCustomLayoutWidth : function(){

        if( zf.self.customLayoutWidth === 'default' ) return;

        zf.self.customLayoutWidth = 'default';
        zf.cache.customLayoutWidthStyle.innerHTML = '';

        zf.actions.checkForcedOneColumnGridApplicatibility();
        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

/*------------------------------------------------------------
   LINE-HEIGHT RESIZER ACTIONS
------------------------------------------------------------*/

    increaseLineHeight : function(){

        if( zf.self.lineHeight === 'sm' ) zf.self.lineHeight = 'default';
        else if( zf.self.lineHeight === 'default' ) zf.self.lineHeight = 'lg';
        else if( zf.self.lineHeight === 'lg' ) zf.self.lineHeight = 'xl';

        if( zf.self.lineHeight === 'default' ) document.documentElement.removeAttribute('data-zf--line-height');
        else document.documentElement.setAttribute('data-zf--line-height', zf.self.lineHeight);

        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

    decreaseLineHeight : function(){

        if( zf.self.lineHeight === 'xl' ) zf.self.lineHeight = 'lg';
        else if( zf.self.lineHeight === 'lg' ) zf.self.lineHeight = 'default';
        else if( zf.self.lineHeight === 'default' ) zf.self.lineHeight = 'sm';

        if( zf.self.lineHeight === 'default' ) document.documentElement.removeAttribute('data-zf--line-height');
        else document.documentElement.setAttribute('data-zf--line-height', zf.self.lineHeight);

        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

    resetLineHeight : function(){

        zf.self.lineHeight = 'default';
        document.documentElement.removeAttribute('data-zf--line-height');

        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

/*------------------------------------------------------------
   SAVE COOKIES
   This function saves the user preferences in a cookie (e.g. layout mode, font-size, ...)
------------------------------------------------------------*/

    saveUserSettings : function(){
        zf.helpers.setCookie('Theme', zf.self.theme, 'session-cookie');
        zf.helpers.setCookie('CustomLayoutWidth', zf.self.customLayoutWidth);
        zf.helpers.setCookie('FontSize', zf.self.currentFontSize);
        zf.helpers.setCookie('FontFamily', zf.self.rootFontFamily);
        zf.helpers.setCookie('LineHeight', zf.self.lineHeight);
    },

/*------------------------------------------------------------
   THEMES ACTIONS
------------------------------------------------------------*/

    setTheme: function(mode){

        if( mode === zf.self.theme ) return;

        if( mode === 'default' ){

            if( zf.self.theme === 'low-brightness') zf.actions.resetLowBrightnessTheme();
            if( zf.self.theme === 'inverted') zf.actions.resetInvertedTheme();

        } else if( mode === 'low-brightness' ){

            if( zf.self.theme === 'inverted') zf.actions.resetInvertedTheme();
            zf.actions.applyLowBrightnessTheme();

        } else if( mode === 'inverted' ){

            if( zf.self.theme === 'low-brightness') zf.actions.resetLowBrightnessTheme();
            zf.actions.applyInvertedTheme();

        } else return; // invalid option

        $body
            .removeClass('zf--theme-' + zf.self.theme)
            .addClass('zf--theme-' + mode);

        zf.self.theme = mode;

        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

    applyLowBrightnessTheme: function(){

        if( htmlInitialClass.indexOf('lt-ie9') > -1 ) return; // no compatibility for IE8<

        // Cached vars
        var node_ZFskins = document.querySelectorAll('[id*="zf--"], [class*="zf--"], #zf--main-article div');
        var bgTmp;

        document.body.offsetWidth; // force reflow to get the updated BGs

        // Make sure the transition is smooth
        if( zf.self.theme !== 'inverted' ){ // But do not animate css-filters!
            document.body.className += ' zf--transition-medium-all-deep';
        }

        // For every "--skin" found, check if the background is too "light"
        for(var i = node_ZFskins.length - 1; i >= 0; i--){
            bgTmp = window.getComputedStyle(node_ZFskins[i], null).backgroundColor;
            if(!bgTmp.indexOf('rgb(')){ // === 0
                node_lowConstrastStash.push(node_ZFskins[i]);
                bgTmp = bgTmp.replace('rgb(', '').replace(')', '').split(',');
                if(
                    parseInt(bgTmp[0]) > 220 &&
                    parseInt(bgTmp[1]) > 220 &&
                    parseInt(bgTmp[2]) > 220
                ){
                    node_ZFskins[i].style.backgroundColor = 'rgb('+ (bgTmp[0] - 40) + ',' + (bgTmp[1] - 40) + ',' + (bgTmp[2] - 40) + ')';
                }
            }
        }

        // Do the same thing for the body (important: same as above!)
        bgTmp = window.getComputedStyle(document.body, null).backgroundColor;
        if(!bgTmp.indexOf('rgb(')){ // === 0
            node_lowConstrastStash.push(document.body);
            bgTmp = bgTmp.replace('rgb(', '').replace(')', '').split(',');
            if(
                parseInt(bgTmp[0]) > 220 &&
                parseInt(bgTmp[1]) > 220 &&
                parseInt(bgTmp[2]) > 220
            ){
                document.body.style.backgroundColor = '#A0A0A0';
            }
        }

        // Wait for the CSS3 transition to end, then remove the transition class
        if( zf.self.theme !== 'inverted' ){
            setTimeout(function(){
                document.body.className = document.body.className.replace(' zf--transition-medium-all-deep', '');
            }, 800);
        }

    },

    resetLowBrightnessTheme: function(){

        // Note: "node_lowConstrastStash" is used to store all elements which bg was lowered
        for (var i = node_lowConstrastStash.length - 1; i >= 0; i--) {
            node_lowConstrastStash[i].style.backgroundColor = '';
        }
        node_lowConstrastStash = [];

    },

    applyInvertedTheme: function(){

        if( htmlInitialClass.indexOf('zf--supports-css3-filter') !== -1 ){

            // This function forces white bgs for divs that already have a light background
            // this should force backgrounds in inverted-theme to be pure black
            // Note: valid only if css3 filters are supported

            var node_ZFdivs = document.querySelectorAll('div[id*="zf--"]');
            var bgTmp;

            document.body.offsetWidth; // force reflow to get the updated BGs

            // For every duv found, check if the background is light
            for(var i = node_ZFdivs.length - 1; i >= 0; i--){
                bgTmp = window.getComputedStyle(node_ZFdivs[i], null).backgroundColor;
                if(!bgTmp.indexOf('rgb(')){ // === 0
                    node_invertedThemeStash.push(node_ZFdivs[i]);
                    bgTmp = bgTmp.replace('rgb(', '').replace(')', '').split(',');
                    if(
                        parseInt(bgTmp[0]) > 180 &&
                        parseInt(bgTmp[1]) > 180 &&
                        parseInt(bgTmp[2]) > 180
                    ){
                        node_ZFdivs[i].style.backgroundColor = '#FFF';
                    }
                }
            }

        }

    },

    resetInvertedTheme: function(){

        if(node_invertedThemeStash.length > 0){
            for (var i = node_invertedThemeStash.length - 1; i >= 0; i--) {
                node_invertedThemeStash[i].style.backgroundColor = '';
            }
            node_invertedThemeStash = [];
        }

    },

/*------------------------------------------------------------
   LEGIBILITY ACTIONS
------------------------------------------------------------*/

    setRootFontFamily: function(mode){

        if( mode === zf.self.rootFontFamily ) return;

        if(
            mode !== 'default' &&
            mode !== 'serif' &&
            mode !== 'sans-serif' &&
            mode !== 'bold'
        ) return; // invalid option

        $body
            .removeClass('zf--legibility-' + zf.self.rootFontFamily)
            .addClass('zf--legibility-' + mode);

        zf.self.rootFontFamily = mode;

        zf.actions.checkResetAccessibilityButtonVisibility();
        zf.actions.saveUserSettings();

    },

/*------------------------------------------------------------
   FONT-SIZE RELATIVIZER
   Detect elements that have an absolute value for font-size (both online and via CSS) and converts it into em
------------------------------------------------------------*/

    applyFontSizeRelativizer : function(){

        // Check compatibility first:
        if(htmlInitialClass.indexOf('lt-ie9') > -1){ return; } // Sorry, no compatibility with IE8<=

        // Caching vars (globals)
        var i,j;
        var selectorsFound = [], fontSizeFound = [];

        // --------- Search absolute font-size inside stylesheets --------- //

        // Caching vars
        var styleSheets = document.styleSheets;
        var cssRules = [];
        var fontSizeVal;

        // For every stylesheets found:
        for(i = styleSheets.length - 1; i >= 0 ; i--){

            // Check if the stylesheet comes from zhong; in this case ignore it (all CSS font-size are expressed in "em")
            if(
                styleSheets[i].href && // Check if the stylesheet is external (not an inline <style>)
                styleSheets[i].href.indexOf('zf/assets/css') > -1 // And if the stylesheet comes from zhong
            ){ continue; }

            // Get all the rules defined inside the stylesheet
            // Note that there is a different implementation between browsers (either "rules" or "cssRules")
            try { // Note: if the stylesheet is external, Firefox will throw a security error, in this case do nothing
                cssRules = styleSheets[i].rules || styleSheets[i].cssRules;
            } catch(e) {
                continue;
            }

            // Is the CSS empty? (therefore no rules found?) in this case, do nothing
            if(!cssRules){ continue; }

            // For every rule check wether the font-size is absolute:
            for(j = cssRules.length - 1; j >= 0 ; j--){
                if(!cssRules[j].style){ continue; } // If not defined, step to the next
                fontSizeVal = cssRules[j].style.fontSize; // Cache the result
                if(
                    fontSizeVal &&
                    (
                        fontSizeVal.indexOf('px') > -1 ||
                        fontSizeVal.indexOf('pt') > -1
                    )
                ){
                    // If the value is absolute, then this element needs to be changed
                    selectorsFound.push(cssRules[j].selectorText);
                    fontSizeFound.push(parseInt(fontSizeVal));
                }
            }

        }

        // --------- Search absolute font-sizes inside inline attributes --------- //

        // Caching vars
        var DOMguestNodes, guestNodeFontSize;
        // Get all guest-views and search only inside those containers (more performant)
        var DOMguestViews = document.getElementsByClassName('zf--guest-view');
        // For every guest-view, check if they have defined a font-size style attribute
        for(i = DOMguestViews.length - 1; i >= 0 ; i--){
            DOMguestNodes = DOMguestViews[i].getElementsByTagName('*');
            for(j = DOMguestNodes.length - 1; j >= 0 ; j--){
                guestNodeFontSize = DOMguestNodes[j].style.fontSize;
                if(
                    guestNodeFontSize &&
                    (
                        guestNodeFontSize.indexOf('px') > -1 ||
                        guestNodeFontSize.indexOf('pt') > -1
                    )
                ){
                    // If the value is absolute, then this element needs to be changed
                    selectorsFound.push(DOMguestNodes[j]);
                    fontSizeFound.push(parseInt(guestNodeFontSize));
                }
            }
        }

        // --------- For every selectors found, apply a relative font-size --------- //

        // Caching vars:
        var parentFontSize, updatedFontSize;

        // Get the computed font-size of the root element (html)
        var rootFontSize = parseInt(window.getComputedStyle(document.documentElement,null).fontSize);
        var rootFontSizeDiff = (zf.self.currentFontSize === 'default' ? 0 : (zf.self.currentFontSize - zf.params.defaultFontSize));

        // For every selector found, force a relative font-size (in "rem")
        for(i = selectorsFound.length - 1; i >= 0 ; i--){
            $(selectorsFound[i]).each(function(){
                if( this === document.documentElement || this === document.body ) return; // Ignore root elements
                // Calculate and apply the "rem" value
                updatedFontSize = fontSizeFound[i]/rootFontSize;
                updatedFontSize = updatedFontSize + updatedFontSize*rootFontSizeDiff/100;
                this.style.fontSize = updatedFontSize + 'rem';
            });
        }

        // Update the flag var
        hasFontSizeRelativizerBeenApplied = true;

    },

/*------------------------------------------------------------
   FORCED ONE COLUMN GRID
------------------------------------------------------------*/

    checkForcedOneColumnGridApplicatibility : function(){

        if( zf.cache.currentMQ === 'sm' ) { // Ignore mobile layout: it's already one-column
            if( zf.self.forcedOneColumnGrid ){
                document.body.classList.remove('zf--forced-one-column-grid');
                zf.self.forcedOneColumnGrid = false;
            }
            return;
        }

        if(
            (
                zf.self.customLayoutWidth <= 600
            ) ||
            (
                zf.cache.currentMQ === 'md' && zf.self.currentFontSize !== 'default' && zf.self.currentFontSize >= 180
            ) ||
            (
                zf.cache.currentMQ === 'lg' && zf.self.currentFontSize !== 'default' && zf.self.currentFontSize >= 200
            )
        ){
            if( !zf.self.forcedOneColumnGrid ){
                document.body.classList.add('zf--forced-one-column-grid');
                zf.self.forcedOneColumnGrid = true;
            }
        } else {
            if( zf.self.forcedOneColumnGrid ){
                document.body.classList.remove('zf--forced-one-column-grid');
                zf.self.forcedOneColumnGrid = false;
            }
        }

    }

}; // End zf.actions

/*==========================================================================
   MIXINS
   Reusable functions that can be applied to elements in order to modify or enhance their behaviour
==========================================================================*/

zf.mixins = {

/*------------------------------------------------------------
   MAKE MENU EXPANDABLE
------------------------------------------------------------*/

    makeMenuExpandable : function( menuContainer, options ){

        if( !menuContainer || !menuContainer.nodeType ) return;

        // --------- Helpers & cached vars --------- //

        var $menuContainer = $(menuContainer);
        var $menuParentElements = $(menuContainer).find(options.parentClassName);

        var subMenu, activeLink; // Cached vars

        // Used to keep track of the active top-level sub menu
        // (no multiple sub-menus should be active at the same time)
        var firstLevelActiveSubMenu = null, firstLevelActiveLink, sameLevelActiveMenu;

        var _resetSubMenuVisibilityHelper = function( $subMenu ){
            $subMenu.removeClass('zf--menu-is-expanded')
                .find('.zf--menu-is-expanded').removeClass('zf--menu-is-expanded');
            $subMenu.find('.zf--expanded').removeClass('zf--expanded').attr('aria-expanded', 'false');
        };

        var _resetActiveLinkHelper = function( link ){
            if( !link || !link.nodeType ) return;
            link.setAttribute('aria-expanded', 'false');
            link.className = link.className.replace(' zf--expanded','');
        };

        // --------- Touch/Keyboard navigations --------- //

        $menuParentElements.children('a') // menu-links
            .attr({'aria-haspopup':'true','aria-expanded':'false','role':'button'})
            .on('click', function(e){

                e.preventDefault();

                subMenu = this.parentElement.querySelector('ul');

                if( !subMenu ) return;

                if( firstLevelActiveSubMenu === null ){ // Note: firstLevelActiveSubMenu is needed by the _clickAwayHandler
                    firstLevelActiveSubMenu = subMenu;
                    firstLevelActiveLink = this;
                }

                if( subMenu.className.indexOf('zf--menu-is-expanded') === -1 ){ // Make menu visible

                    if( // Check for other same-level opened menus. Note: placed before activating the clicked menu
                        options.style === 'floating' &&
                        zf.cache.currentMQ !== 'sm'
                    ){

                        sameLevelActiveMenu = subMenu.parentElement.parentElement.querySelector('.zf--menu-is-expanded');
                        if( sameLevelActiveMenu ){
                            _resetSubMenuVisibilityHelper( $(sameLevelActiveMenu) );
                            _resetActiveLinkHelper( sameLevelActiveMenu.parentElement.querySelector('.zf--expanded') );
                            if( sameLevelActiveMenu === firstLevelActiveSubMenu ){ // If clicked a first-level menu, gotta update the flag-var
                                firstLevelActiveSubMenu = subMenu;
                                firstLevelActiveLink = this;
                            }
                        }

                    }

                    this.setAttribute('aria-expanded', 'true');
                    zf.helpers.ctrlARIA(subMenu, 'alive');
                    subMenu.className += ' zf--menu-is-expanded';

                    this.className += ' zf--expanded'; // this = <a>
                    zf.helpers.ctrlARIA(subMenu, 'reset');

                } else { // Hide menu

                    _resetSubMenuVisibilityHelper( $(subMenu) );
                    _resetActiveLinkHelper( this );

                    if( firstLevelActiveSubMenu === subMenu) firstLevelActiveSubMenu = null;

                }

            });

        // --------- Click away detector --------- //

        var _clickAwayHandler = function(e){

            if(
                zf.cache.currentMQ === 'sm'
            ) return; // if expandable, avoid closing other tabs: it could cause unwanted jumps in page height

            if( firstLevelActiveSubMenu === null ) return; // currently no active menus

            if( // Ignore touch-scrolling
                e.type === 'touchend' &&
                (
                    (Math.abs(touchStartPositionX - e.changedTouches[0].clientX) > 5) ||
                    (Math.abs(touchStartPositionY - e.changedTouches[0].clientY) > 5)
                )
            ) return;

            if( firstLevelActiveSubMenu.parentElement.contains( e.target ) ) return; // click/touch was inside the submenu

            _resetSubMenuVisibilityHelper( $(firstLevelActiveSubMenu) );
            _resetActiveLinkHelper( firstLevelActiveLink );
            firstLevelActiveSubMenu = null;

        };

        if( document.addEventListener && options.style === 'floating' ){
            document.body.addEventListener('click', _clickAwayHandler);
            document.body.addEventListener('touchend', _clickAwayHandler);
        }

    },

};

/*==========================================================================
   HANDLERS
   Functions that initialize the behaviour of certain application's elements
==========================================================================*/

zf.handlers = {

/*------------------------------------------------------------
   INITIAL SCROLL
------------------------------------------------------------*/

    initialScrollHandler : function(){

        // Hide the mobile toolbar by scrolling 1px down
        setTimeout(function(){
            // Some browsers "remember" the previous scroll position. If so, do not scroll to "1px"
            // Do the scrolling only if mobile
            if($window.scrollTop() === 0 && zf.cache.currentMQ === 'sm'){
                window.scrollTo(0,1);
            }
        },1);

    },

/*------------------------------------------------------------
   MENUS HANDLER
------------------------------------------------------------*/

    menusHandler : function(){

        $mainBody.find('.zf--menu-container').each(function(){
            zf.mixins.makeMenuExpandable(this, {
                parentClassName: '.parent',
                style: 'expandable'
            });
        });

        zf.mixins.makeMenuExpandable( document.getElementById('zf--main-menu'), {
            parentClassName: '.parent',
            style: 'floating'
        });

    },

/*------------------------------------------------------------
   PARENT PLATFORM HANDLER
------------------------------------------------------------*/

    parentPlatformHandler : function(){

        // --------- UI mods (Joomla) --------- //

        if(
            zf.params.parentPlatformReleaseClass === 'Joomla3' ||
            zf.params.parentPlatformReleaseClass === 'Joomla25'
        ){
            $('#zf--search').find('button').removeClass('btn-primary btn button');
            $('#zf--login').find('button').removeClass('btn-primary btn button');
        }

        // --------- Accessibility mods (Joomla) --------- //
        // Dynamically adds "aria-label"s

        if(
            zf.params.enableSemanticOutline &&
            (
                zf.params.parentPlatformReleaseClass === 'Joomla3' ||
                zf.params.parentPlatformReleaseClass === 'Joomla25'
            )
        ){

            var languageOptions = document.getElementById('zf--language-switcher--semantic-tag');
            var breadcrumbs = document.getElementById('zf--breadcrumbs--semantic-tag');
            var footerMenu = document.getElementById('zf--footer-menu--semantic-tag');

            if( languageOptions && languageOptions.querySelector('.mod-languages') ){
                languageOptions.setAttribute('aria-label', zf.lang.languageOptions);
            }

            if(
                (
                    zf.params.parentPlatformReleaseClass === 'Joomla3' &&
                    breadcrumbs && breadcrumbs.querySelector('.breadcrumb')
                ) ||
                (
                    zf.params.parentPlatformReleaseClass === 'Joomla25' &&
                    breadcrumbs && breadcrumbs.querySelector('.breadcrumbs')
                )
            ){
                breadcrumbs.setAttribute('aria-label', zf.lang.breadcrumbs);
                breadcrumbs.setAttribute('role', 'navigation');
            }

            if( footerMenu && footerMenu.querySelector('ul.menu') ){
                footerMenu.setAttribute('aria-label', zf.lang.footerMenu);
                footerMenu.setAttribute('role', 'navigation');
            }

        }

    },

/*------------------------------------------------------------
   MEDIA QUERY HANDLER
------------------------------------------------------------*/

    mediaQueryHandler : function(){

        zf.helpers.detectMQ();

        var wait;
        zf.cache.$window.on('resize', function (){
            clearTimeout(wait);
            wait = setTimeout(zf.helpers.detectMQ, 500);
        });

    },

/*------------------------------------------------------------
   TOOLBOX BUTTONS & PANELS HANDLERS
------------------------------------------------------------*/

    // Handler for both the toolbox buttons and panels
    toolboxHandler : function(){

        // Cached vars
        var $toolboxButtons = $('.zf--toolbox-button');
        var $toolboxPanels = $('.zf--toolbox-panel');

        // --------- For each toolbox button, handle the related panel on click --------- //

        $toolboxButtons.click(function(e) {

            // Cached vars
            var $this = $(this);

            // Check whether the button has a related panel
            if(typeof $this.attr('aria-controls') === 'undefined'){ return; }

            // ~~~ Init ~~~ //

            // Prevent the anchor behaviour
            e.preventDefault();

            // Cached vars
            var isButtonAlreadyActive = $this.hasClass('zf--active');

            // Hide the previous active panel
            zf.actions.hideActiveToolboxPanel();

            // ~~~ If the clicked button wasn't already active, then show the related panel ~~~ //

            if(isButtonAlreadyActive === false){

                // Show the next active panel
                $activeToolboxPanel = $( '#' + $this.attr('aria-controls') );
                $activeToolboxPanel.addClass('zf--active');
                $activeToolboxButton = $this.addClass('zf--active').attr('aria-expanded','true');

            }

        });

        // --------- Click away handler --------- //

        var _clickAwayHandler = function(e){

            if(!$activeToolboxPanel) return; // no opened panels

            if( $activeToolboxButton[0].parentElement.contains( e.target ) ) return; // click was inside the panel

            if( // Ignore touch-scrolling
                e.type === 'touchend' &&
                (
                    (Math.abs(touchStartPositionX - e.changedTouches[0].clientX) > 5) ||
                    (Math.abs(touchStartPositionY - e.changedTouches[0].clientY) > 5)
                )
            ) return;

            zf.actions.hideActiveToolboxPanel();

        };

        if( document.addEventListener ){
            document.body.addEventListener('click', _clickAwayHandler);
            document.body.addEventListener('touchend', _clickAwayHandler);
        }

        // --------- ESC closes the active panel --------- //

        $document.keydown(function(e){
            if (e.keyCode === 27 && $activeToolboxPanel !== null){
                zf.actions.hideActiveToolboxPanel();
            }
        });

    },

/*------------------------------------------------------------
   ALERTS PANEL HANDLER
------------------------------------------------------------*/

    alertsPanelHandler : function(){

        zf.cache.node_alertsPanel = document.getElementById('zf--alerts-panel');

        if(!zf.cache.node_alertsPanel) return;

        zf.cache.node_alertsPanelOkButton = document.getElementById('zf--alerts-panel--ok-button-container');
        zf.cache.node_alertsPanelCloseButton = document.getElementById('zf--alerts-panel--close-button-container');

        if( zf.cache.node_alertsPanelOkButton )
            zf.cache.node_alertsPanelOkButton.onclick = zf.actions.hideAlertsPanel;
        if( zf.cache.node_alertsPanelCloseButton )
            zf.cache.node_alertsPanelCloseButton.onclick = zf.actions.hideAlertsPanel;

        setTimeout(zf.actions.showAlertsPanel, 1000);

    },

/*------------------------------------------------------------
   RESET ACCESSIBILITY BUTTON
------------------------------------------------------------*/

    resetAccessibilityButtonHandler : function(){

        $defaultAccessibilityOptions_resetButton =
            $( document.getElementById('zf--accessibility-options-reset-button') );

        $defaultAccessibilityOptions_resetButton.click(function(){
            zf.actions.resetAccessibilityOptions();
            nodeRemoveClass(this, 'zf--active');
        });

        zf.actions.checkResetAccessibilityButtonVisibility();

    },

/*------------------------------------------------------------
   FONT RESIZER HANDLER
------------------------------------------------------------*/

    fontResizerHandler : function(){

        if( // Apply at startup ONLY if the font-size had been changed (otherwise wait for the user to change it)
            zf.params.enableFontSizeRelativizer &&
            zf.self.currentFontSize !== 'default'
        ) zf.actions.applyFontSizeRelativizer();

        if( !document.getElementById('zf--font-resizer') ) return;
        document.getElementById('zf--larger-font-button').onclick = zf.actions.increaseRootFontSize;
        document.getElementById('zf--smaller-font-button').onclick = zf.actions.decreaseRootFontSize;

    },

/*------------------------------------------------------------
   THEME SWITCHER HANDLER
------------------------------------------------------------*/

    themeSwitcherHandler : function(){

        if( !document.getElementById('zf--theme-switcher') ) return;

        if( zf.self.theme === 'inverted' ) zf.actions.applyInvertedTheme();

        if( zf.self.theme === 'low-brightness' ){
            setTimeout(function(){ // Do not apply it right away or flickering could happen
                zf.actions.applyLowBrightnessTheme();
            }, 500);
        }

        document.getElementById('zf--low-brightness-theme-button').onclick = function(){
            zf.actions.setTheme('low-brightness');
        };

        document.getElementById('zf--inverted-theme-button').onclick = function(){
            if( zf.self.theme === 'inverted' ) zf.actions.setTheme('default'); // toggle theme
            else zf.actions.setTheme('inverted');
        };

    },

/*------------------------------------------------------------
   LEGIBILITY SWITCHER HANDLER
------------------------------------------------------------*/

    legibilitySwitcherHandler : function(){

        if( !document.getElementById('zf--legibility-switcher') ) return;

        document.getElementById('zf--legibility-sans-serif-button').onclick = function(){
            zf.actions.setRootFontFamily('sans-serif');
        };
        document.getElementById('zf--legibility-serif-button').onclick = function(){
            zf.actions.setRootFontFamily('serif');
        };
        document.getElementById('zf--legibility-bold-button').onclick = function(){
            zf.actions.setRootFontFamily('bold');
        };

    },

/*------------------------------------------------------------
   SCROLL TO TOP ANIMATION
------------------------------------------------------------*/

    scrollToTopAnimationHandler : function(){
        $(document.getElementById('zf--top-anchor')).click(function(e){
            // Make an animation to the top and then force the focus to the top of the page
            e.preventDefault();
            $htmlBody.animate(
                {scrollTop:1},
                zf.cache.currentMQ === 'sm' ? 1 : 300, // Scroll animation for certain mobile devices could be expensive
                function(){
                    forceElementFocus($(document.getElementById('zf--page-top')));
                }
            );
        });
    },

/*------------------------------------------------------------
   ACCORDION BLOCK SNIPPET HANDLER
------------------------------------------------------------*/

    accordionBlockSnippetHandler : function(){

        $mainBody.find('.accordion-block')
            .wrapInner('<div class="accordion-block-inner"></div>')
            .addClass('collapsed')
            .append('<button class="accordion-block-readMore" aria-hidden="true"></button>')
            // Set the new reduced-height
            .css('height',function(){
                return $(this).find('.accordion-block-inner').height()/100*20+$(this).find('.accordion-block-readMore').innerHeight()+6;
            })
            // Handle the click of the button
            .find('.accordion-block-readMore').click(function(){
                var $accordionBlockOuter = $(this).parent();
                if($accordionBlockOuter.hasClass('collapsed')){
                    $accordionBlockOuter
                        .removeClass('collapsed')
                        .css('height',function(){ // Set the new full-height
                            return $accordionBlockOuter.find('.accordion-block-inner').height()+$accordionBlockOuter.find('.accordion-block-readMore').innerHeight()+6;
                        });
                }
                else{
                    $accordionBlockOuter
                        .addClass('collapsed')
                        .css('height',function(){ // Set the new reduced-height
                            return $accordionBlockOuter.find('.accordion-block-inner').height()/100*20+$accordionBlockOuter.find('.accordion-block-readMore').innerHeight()+6;
                        });
                }
            });

    },

/*------------------------------------------------------------
   SECTION-EXPAND-BUTTON HANDLER
------------------------------------------------------------*/

    sectionExpandButtonHandler : function(){

        $('.zf--section-expand-button').click(function(e){

            if(this.className.indexOf('zf--active') === -1)
                this.setAttribute('aria-expanded', 'true');
            else
                this.setAttribute('aria-expanded', 'false');

            $(this).toggleClass('zf--inactive').toggleClass('zf--active');

            e.preventDefault();

        });

    },

    mainMenuSectionExpandButtonHandler : function(){

        var mainMenu = document.getElementById('zf--main-menu');
        var mainMenuExpandButton = document.getElementById('zf--main-menu-expand-button');
        var $mainMenuExpandButton = $(mainMenuExpandButton);

        var _clickAwayHandler = function(e){ // click away detector

            if(
                zf.cache.currentMQ !== 'sm' ||
                mainMenuExpandButton.className.indexOf('zf--active') === -1
            ) return;

            if( mainMenu.contains( e.target ) ) return; // click/touch was inside the menu

            if( // Ignore touch-scrolling
                e.type === 'touchend' &&
                (
                    (Math.abs(touchStartPositionX - e.changedTouches[0].clientX) > 5) ||
                    (Math.abs(touchStartPositionY - e.changedTouches[0].clientY) > 5)
                )
            ) return;

            $mainMenuExpandButton.toggleClass('zf--inactive').toggleClass('zf--active'); // hide

        };

        if( document.addEventListener ){
            document.body.addEventListener('click', _clickAwayHandler);
            document.body.addEventListener('touchend', _clickAwayHandler);
        }

    },

/*------------------------------------------------------------
   MOBILE SWITCHER HANDLER
------------------------------------------------------------*/

    mobileSwitcherHandler : function(){

        if(!zf.params.enableMobileSwitcher) return;

        document.getElementById('zf--desktop-site-switcher-link').onclick = function(e){
            zf.cache.metaViewport.setAttribute('content', 'width=1024px');
            document.documentElement.className += ' zf--fixed-meta-viewport';
            zf.helpers.setCookie('MetaViewport', 'fixed', 'session-cookie');
            zf.helpers.detectMQ();
            e.preventDefault();
        };
        document.getElementById('zf--mobile-site-switcher-link').onclick = function(e){
            zf.cache.metaViewport.setAttribute('content', 'width=device-width, initial-scale=1.0');
            document.documentElement.className = document.documentElement.className.replace(' zf--fixed-meta-viewport', '');
            zf.helpers.setCookie('MetaViewport', 'default', 'session-cookie');
            zf.helpers.detectMQ();
            e.preventDefault();
        };

    },

/*------------------------------------------------------------
   LAYOUT WIDTH RESIZER HANDLER
------------------------------------------------------------*/

    customLayoutWidthResizerHandler : function(){

        if( !document.getElementById('zf--layout-width-resizer') ) return;

        document.getElementById('zf--increase-layout-width').onclick = zf.actions.increaseLayoutWidth;
        document.getElementById('zf--decrease-layout-width').onclick = zf.actions.decreaseLayoutWidth;

    },

/*------------------------------------------------------------
   LINE HEIGHT RESIZER HANDLER
------------------------------------------------------------*/

    lineHeightResizerHandler : function(){

        if( !document.getElementById('zf--line-height-resizer') ) return;

        document.getElementById('zf--increase-line-height').onclick = zf.actions.increaseLineHeight;
        document.getElementById('zf--decrease-line-height').onclick = zf.actions.decreaseLineHeight;

    },

/*------------------------------------------------------------
   FORCED ONE COLUMN GRID
------------------------------------------------------------*/

    forcedOneColumnGridHandler : function(){

        if( !document.documentElement.classList ) return;

        zf.self.forcedOneColumnGrid = false; // Initial value
        zf.actions.checkForcedOneColumnGridApplicatibility(); // Initial check

        var _wait;
        var _onWindowResize = function(){
            clearTimeout(_wait);
            _wait = setTimeout(zf.actions.checkForcedOneColumnGridApplicatibility, 500);
        };
        zf.cache.$window.on('resize', _onWindowResize);

    },

/*------------------------------------------------------------
   QUICK ACCESS MENU
------------------------------------------------------------*/

    quickAccessMenuHandler : function(){

        var node_quickAccessMenu = document.getElementById('zf--quick-access-menu');
        if(!node_quickAccessMenu){ return; }

        var $quickAccessMenu = $(node_quickAccessMenu);
        var $quickAccessMenu_anchors = $quickAccessMenu.find('a');

        // --------- Menu visibility --------- //
        // Make sure the menu is visible when focusing on any anchor

        var isVisible = false; // Flag var
        $quickAccessMenu_anchors.on('focus', function(){
            if(!isVisible){
                $quickAccessMenu.addClass('zf--active');
            }
        });
        $quickAccessMenu_anchors.on('blur', function(){
            // The timeout is important otherwise the currently focused element is always "document"
            setTimeout(function(){
                if(node_quickAccessMenu.contains(document.activeElement) === false){
                    $quickAccessMenu.removeClass('zf--active');
                    isVisible = false;
                }
            }, 0);
        });

        // --------- Click handler --------- //

        $quickAccessMenu_anchors.on('click', function(e){
            e.preventDefault();
            // Get the anchored element
            var $target = $(document.getElementById(this.hash.replace('#','')));
            // Scroll and focus it
            $htmlBody.animate({scrollTop: ($target.offset().top-25) },300,function(){
                forceElementFocus($target);
            });
        });

    },

/*------------------------------------------------------------
   JAVASCRIPT TOOLTIPS HANDLER
------------------------------------------------------------*/

    javascriptTooltipsHandler : function(){

        // --------- Initial checks --------- //

        if( zf.params.tooltipsEnabled !== 'on-snippet' ) return;

        // --------- Cached vars --------- //

        var $tooltips = $('.show-tooltip');
        var tooltipElement, tooltipFather, tooltipFatherTitle, tooltipImgElement, tooltipImgFather;
        var tooltipElementOuterWidth, tooltipElementOuterHeight, tooltipFatherOuterWidth, tooltipFatherOuterHeight;
        var tooltipImgElementOuterWidth, tooltipImgElementOuterHeight, tooltipImgFatherOuterWidth, tooltipImgFatherOuterHeight;
        var tooltipCreatedFlag = false; // Flag to check if a tooltip element has already been created

        // --------- "Floating tooltips" handler (on hover) --------- //

        var onMouseMoving = function(e){
            tooltipPositionX = e.pageX+14 - $window.scrollLeft(); // 14px away from the cursor, horizontally
            tooltipPositionY = e.pageY+16 - $window.scrollTop(); // 16px away from the cursor, vertically
            // Fix the position of the tooltip if it goes outside of the window boundaries
            if( tooltipPositionX+tooltipElementOuterWidth > $window.width()-14 )
                { tooltipPositionX = $window.width()-tooltipElementOuterWidth-14; }
            if( tooltipPositionY+tooltipElementOuterHeight > $document.height()-16 )
                { tooltipPositionY = $document.height()-tooltipElementOuterHeight-16; }
            // when the mouse moves, move also the <span> element
            tooltipElement
                .css('left',tooltipPositionX)
                .css('top',tooltipPositionY);
        };

        var applyFloatingTooltip = function(){

            if(zf.helpers.hasTriggeredTouchstart) return;

            var $this = $(this);
            // If the title is empty or a tooltip element has been created, exit
            if($this.attr('title') === '' || tooltipCreatedFlag){ return; }
            // Set the flag, get the father element, create the tooltip and append it to the body element
            tooltipCreatedFlag = true;
            tooltipFather = $this;
            tooltipFatherTitle = tooltipFather.attr('title');
            tooltipElement = $('<span class="zf--tooltip-title" aria-live="off">'+tooltipFatherTitle+'</span>');
            $body.append(tooltipElement);
            // Remove the title attribute from the link and store it in a data-attribute
            tooltipFather.attr('data-zf--tooltipped-title', tooltipFatherTitle).attr('title','');
            tooltipElement.fadeIn(460); // fadeIn the <span> element
            tooltipElementOuterWidth = tooltipElement.outerWidth();
            tooltipElementOuterHeight = tooltipElement.outerHeight();
            tooltipElement.css('min-width',tooltipElementOuterWidth+'px'); // Force tooltip width (prevents tooltips too small)
            if(htmlInitialClass.indexOf('ie8') > -1){// Fix for the min-width/box-sizing bug in IE8
                tooltipElement.css('min-width','0px');
            }

            // Make the tooltip follow the mouse
            tooltipFather.mousemove( onMouseMoving );

        };

        var removeFloatingTooltip = function(){

            if(zf.helpers.hasTriggeredTouchstart) return;

            var $this = $(this);
            // Check if the tooltip exists (in some cases,at the page startup, it could get to be undefined)
            if(!tooltipElement){ return; }
            if(!($this.attr('title'))){ // If the title is unchanged
                $this.attr('title',tooltipElement.text()) // Set the title back
                    .attr('data-zf--tooltipped-title', ''); // And remove the stored one
            }
            tooltipElement.remove(); // Remove the tooltip
            tooltipCreatedFlag = false;
        };

        // --------- "Attached tooltips" handler (on focus) --------- //

        var applyAttachedTooltip = function(){

            if(zf.helpers.hasTriggeredTouchstart) return;

            var $this = $(this);
            if($this.attr('title') === '' || tooltipCreatedFlag){ return; }
            tooltipCreatedFlag = true;
            tooltipFather = $this;
            tooltipElement = $('<span class="zf--tooltip-title zf--with-top-arrow" aria-live="off">'+tooltipFather.attr('title')+'</span>');
            $body.append(tooltipElement);
            tooltipElement.fadeIn(460);
            tooltipElementOuterWidth = tooltipElement.outerWidth();
            tooltipElementOuterHeight = tooltipElement.outerHeight();
            tooltipFatherOuterWidth = tooltipFather.outerWidth();
            tooltipFatherOuterHeight = tooltipFather.outerHeight();
            tooltipElement.css('min-width',tooltipElementOuterWidth+'px');
            if(htmlInitialClass.indexOf('ie8') > -1){// Fix for the min-width/box-sizing bug in IE8
                tooltipElement.css('min-width','0px');
            }
            // The position this time is fixed. The tooltip is placed right below the element, centered.
            tooltipPositionX = tooltipFather.offset().left+tooltipFatherOuterWidth/2-tooltipElementOuterWidth/2 - $window.scrollLeft();
            tooltipPositionY = tooltipFather.offset().top+tooltipFatherOuterHeight+9 - $window.scrollTop(); // +9 = pixels for the top arrow indicator
            // If the tooltip goes out of the boundaries, then also remove the arrow indicator ('width-arrow' class)
            if( tooltipPositionX+tooltipElementOuterWidth > $window.width()-14 )
                { tooltipPositionX = $window.width()-tooltipElementOuterWidth-14; tooltipElement.removeClass('zf--with-top-arrow'); }
            if( tooltipPositionY+tooltipElementOuterHeight > $document.height()-16 )
                { tooltipPositionY = $document.height()-tooltipElementOuterHeight-16; tooltipElement.removeClass('zf--with-top-arrow'); }
            if( tooltipPositionX < 0 )
                        { tooltipPositionX = 0; tooltipElement.removeClass('zf--with-top-arrow'); }
            tooltipElement
                .css('left',tooltipPositionX)
                .css('top',tooltipPositionY);
        };

        var removeAttachedTooltip = function(){

            if(zf.helpers.hasTriggeredTouchstart) return;

            if(!tooltipElement){ return; }
            tooltipElement.remove();
            tooltipCreatedFlag = false;
        };

        // --------- Init tooltip handlers --------- //

        $tooltips.hover( applyFloatingTooltip, removeFloatingTooltip);
        $tooltips.focusin( applyAttachedTooltip ).focusout( removeAttachedTooltip );

    },

/*------------------------------------------------------------
   DETECT INVERT FILTER SUPPORT
------------------------------------------------------------*/

    detectInvertFilterSupportHandler : function(){

        if( zf.helpers.getCookie('InvertFilterSupport') ) return; // already detected

        // --------- CSS3 filter support --------- //

        var el = document.createElement('a');
        var el2 = document.createElement('a');
        el.style.filter = 'blur(2px)';
        el2.style.webkitFilter = 'blur(2px)';
        if(
            $html.hasClass('ie') === false &&
            (
                (
                    typeof document.documentElement.style.webkitFilter !== 'undefined' &&
                    el2.style.webkitFilter === 'blur(2px)'
                ) ||
                (
                    typeof document.documentElement.style.filter !== 'undefined' &&
                    el.style.filter === 'blur(2px)'
                )
            )
        ){
            $html.addClass('zf--supports-css3-filter');
            zf.helpers.setCookie('InvertFilterSupport', 'supports');
        } else {
            $html.addClass('zf--no-support-css3-filter');
            zf.helpers.setCookie('InvertFilterSupport', 'no-support');
        }

    },

/*------------------------------------------------------------
   KEYBOARD OUTLINE
------------------------------------------------------------*/

    keyboardOutlineHandler : function(){

        if(
            !document.addEventListener ||
            !document.documentElement.classList
        ){ // No support for old browsers
            document.documentElement.className = document.documentElement.className.replace('zf--keyboard-outline', '');
            return;
        }

        var keyboardUsage = true;

        var whenClicking = function(){
            if(!keyboardUsage) return;
            keyboardUsage = false;
            document.documentElement.classList.remove('zf--keyboard-outline');
        };

        var whenTyping = function(){
            if(keyboardUsage) return;
            keyboardUsage = true;
            document.documentElement.classList.add('zf--keyboard-outline');
        };

        document.body.addEventListener('mousedown', whenClicking);
        document.body.addEventListener('touchstart', whenClicking);
        document.body.addEventListener('keydown', whenTyping);

    },

/*------------------------------------------------------------
   DETECT CLIENT INPUTS
------------------------------------------------------------*/

    detectMousemove : function(){

        zf.helpers.hasTriggeredMousemove = false;

        var _detectMousemove = function(){
            zf.helpers.hasTriggeredMousemove = true;
            document.documentElement.className += ' zf--has-triggered-mousemove';
            zf.cache.$body.off('mousemove', _detectMousemove);
        };
        zf.cache.$body.on('mousemove', _detectMousemove);

    },

    detectTouchstart : function(){

        zf.helpers.hasTriggeredTouchstart = false;

        var _detectTouchstart = function(){
            zf.helpers.hasTriggeredTouchstart = true;
            document.documentElement.className += ' zf--has-triggered-touchstart';
            zf.cache.$body.off('touchstart', _detectTouchstart);
        };
        zf.cache.$body.on('touchstart', _detectTouchstart);

    },

/*------------------------------------------------------------
   MISC
------------------------------------------------------------*/

    detectTouchScrolling : function(){ // Helper mostly useful for click-away checks

        if(!document.addEventListener) return;

        document.body.addEventListener('touchstart', function(e){
            touchStartPositionX = e.touches[0].clientX;
            touchStartPositionY = e.touches[0].clientY;
        });

    },

/*==========================================================================
   ON DOCUMENT READY
   Fire all handlers
==========================================================================*/

    onDocumentReadyHandler : function(){

        zf.handlers.mediaQueryHandler();
        zf.handlers.detectInvertFilterSupportHandler();
        zf.handlers.detectMousemove();
        zf.handlers.detectTouchstart();
        zf.handlers.detectTouchScrolling();

        zf.handlers.parentPlatformHandler();
        zf.handlers.menusHandler();
        zf.handlers.alertsPanelHandler();
        zf.handlers.scrollToTopAnimationHandler();
        zf.handlers.toolboxHandler();
        zf.handlers.themeSwitcherHandler();
        zf.handlers.legibilitySwitcherHandler();
        zf.handlers.mobileSwitcherHandler();
        zf.handlers.quickAccessMenuHandler();
        zf.handlers.fontResizerHandler();
        zf.handlers.customLayoutWidthResizerHandler();
        zf.handlers.lineHeightResizerHandler();
        zf.handlers.resetAccessibilityButtonHandler();
        zf.handlers.javascriptTooltipsHandler();
        zf.handlers.sectionExpandButtonHandler();
        zf.handlers.mainMenuSectionExpandButtonHandler();
        zf.handlers.keyboardOutlineHandler();
        zf.handlers.forcedOneColumnGridHandler();

    },

/*==========================================================================
   ON WINDOW LOAD
==========================================================================*/

    onWindowLoadHandler : function(){

        zf.handlers.accordionBlockSnippetHandler();
        zf.handlers.initialScrollHandler();

    }

}; // End zf.handlers

/*==========================================================================
   SCRIPTS EXEC
==========================================================================*/

$document.ready(zf.handlers.onDocumentReadyHandler); // Note: keep ".ready", the user might override methods in overrides.js

$window.load(zf.handlers.onWindowLoadHandler);

})(jQuery, window.zhongFramework);