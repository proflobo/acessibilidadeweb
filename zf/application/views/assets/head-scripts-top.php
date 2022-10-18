<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

/*==========================================================================
   IE stuff
==========================================================================*/

// --------- IE<=9 detection --------- //

echo '<!--[if lt IE 6]><script>document.documentElement.className+=" lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7 lt-ie6 ie";</script><![endif]-->'.
    '<!--[if IE 6]><script>document.documentElement.className+=" lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7 ie6 ie";</script><![endif]-->'.
    '<!--[if IE 7]><script>document.documentElement.className+=" lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7 ie";</script><![endif]-->'.
    '<!--[if IE 8]><script>document.documentElement.className+=" lt-ie11 lt-ie10 lt-ie9 ie8 ie";</script><![endif]-->'.
    '<!--[if IE 9]><script>document.documentElement.className+=" lt-ie11 lt-ie10 ie9 ie";</script><![endif]-->';

// --------- IE10/11 detection --------- //

echo '<script type="text/javascript">'.
    'if("behavior" in document.documentElement.style && "-ms-user-select" in document.documentElement.style){document.documentElement.className+=" lt-ie11 ie10 ie"}' . // IE10
    'if("-ms-scroll-limit" in document.documentElement.style && "-ms-ime-align" in document.documentElement.style && navigator.userAgent.indexOf("Edge") === -1){document.documentElement.className+=" ie11 ie"}' . // IE11
'</script>';

// --------- IE8< HTML5 tags polyfill --------- //

echo '<!--[if lt IE 9]><script type="text/javascript">(function(){var a=["abbr","article","aside","audio","bdi","canvas","data","datalist","details","dialog","figcaption","figure","footer","header","hgroup","main","mark","meter","nav","output","picture","progress","section","summary","template","time","video","svg"];for(var i=a.length-1;i>=0;i=i-1)document.createElement(a[i])}())</script><![endif]-->';

// --------- Prevent JS errors on IE8< --------- //

if( $this->params['self']['prevent-javascript-errors-ie8'] ){
    echo '<!--[if lt IE 9]><script type="text/javascript">window.onerror=function(){return true}</script><![endif]-->';
}

// --------- IE8/9, avoid 'console' errors --------- //

echo '<!--[if lt IE 10]><script type="text/javascript">if(typeof window.console=="undefined")window.console={log:function(){return true;},info:function(){return true;},warn:function(){return true;},error:function(){return true;}}</script><![endif]-->';

/*==========================================================================
   Misc
==========================================================================*/

// --------- Remove "no-js" from <html> --------- //

echo '<script type="text/javascript">'.

'document.documentElement.className=document.documentElement.className.replace("no-js","js");'.

'</script>';

/*==========================================================================
   Zhong JS inits
==========================================================================*/

echo '<script type="text/javascript">(function(){'. // Note: closure opening

'var c;'.

// --------- Zhong global JS object --------- //

'window.zhongFramework={self:{},params:{},lang:{},helpers:{},cache:{},handlers:{},actions:{},mixins:{}};'.
'var zf=window.zhongFramework;'.

// --------- Cached els --------- //

'zf.cache.head=document.head||document.getElementsByTagName("head")[0];'.
'zf.cache.metaViewport=document.getElementById("zf--meta-viewport");'.

// --------- Cookies helpers --------- //

// Params = cookie-id, value, "session-cookie"(not required)

'zf.helpers.setCookie=function(c,v,s){'.

    // Note: 2592000000 = 30*24*60*60*1000, which is one month time
    'var d=new Date();d.setTime(d.getTime()+2592000000);'.

    'document.cookie="zhongFramework400"+c+"="+v+";"+(s==="session-cookie"?"":("expires="+d.toUTCString()))+";path='.$this->params['site']['cookies-base-path'].'";'.

'};'.

'zf.helpers.getCookie=function(c){'.

    'var m=document.cookie.match("zhongFramework400"+c+"\\\\s*=\\\\s*([^;]+)");'.

    'return m?m[1]:m;'.

'};'.

// --------- Media Query Detector helper --------- //

'zf.helpers.detectMQ=function(){'.
    'if(!zf.cache.mqDetectorSm){'.
        'zf.cache.mqDetectorSm=document.getElementById("zf--mq-detector-sm");'.
        'zf.cache.mqDetectorMd=document.getElementById("zf--mq-detector-md");'.
    '}'.
    'zf.cache.currentMQ=zf.cache.mqDetectorSm.offsetWidth?"sm":'.
        'zf.cache.mqDetectorMd.offsetWidth?"md":"lg";'.
    'document.documentElement.setAttribute("data-zf--mq",zf.cache.currentMQ);'.
    // Legacy classes
    'document.body.className=document.body.className.replace(" default-layout","").replace(" mobile-layout","");'.
    'document.body.className+=(zf.cache.currentMQ==="sm"?" mobile":" default")+"-layout";'.
    // Legacy classes end
    'return zf.cache.currentMQ;'.
'};'.

// --------- Invert filter support --------- //

'c=zf.helpers.getCookie("InvertFilterSupport");'.
'if(c&&(c==="supports"||c==="no-support"))document.documentElement.className+=" zf--"+c+"-css3-filter";'.

// --------- Meta-Viewport --------- //

'if(zf.helpers.getCookie("MetaViewport")==="fixed"){'.
    // copied from main.js
    'zf.cache.metaViewport.setAttribute("content","width=1024px");'.
    'document.documentElement.className+=" zf--fixed-meta-viewport";'.
'}'

;

// --------- <html> font-size --------- //

if(
    $this->params['theme']['enable-accessibility-panel'] === 'true'
) echo

    'c=parseInt(zf.helpers.getCookie("FontSize"));'.
    'if(isNaN(c)){'.
        'c="default";'.
        'zf.helpers.setCookie("FontSize",c);'.
    '}'.
    'zf.self.currentFontSize=c;'.
    'if(c!=="default")document.documentElement.style.fontSize=c+"%";'

; else echo 'zf.self.currentFontSize="default";';

// --------- Theme --------- //

if(
    $this->params['theme']['enable-accessibility-panel'] === 'true' &&
    $this->params['theme']['enable-theme-switcher'] === 'true'
) echo

    'c=zf.helpers.getCookie("Theme");'.
    'if(c!=="default"&&c!=="inverted"&&c!=="low-brightness"){'.
        'c="default";'.
        'zf.helpers.setCookie("Theme",c,"session-cookie");'.
    '}'.
    'zf.self.theme=c;'

; else echo 'zf.self.theme="default";';

// --------- Font Family (legibility) --------- //

if(
    $this->params['theme']['enable-accessibility-panel'] === 'true' &&
    $this->params['theme']['enable-legibility-switcher'] === 'true'
) echo

    'c=zf.helpers.getCookie("FontFamily");'.
    'if(c!=="default"&&c!=="serif"&&c!=="sans-serif"&&c!=="bold"){'.
        'c="default";'.
        'zf.helpers.setCookie("FontFamily",c);'.
    '}'.
    'zf.self.rootFontFamily=c;'

; else echo 'zf.self.rootFontFamily="default";';

// --------- Line Height --------- //

if(
    $this->params['theme']['enable-accessibility-panel'] === 'true' &&
    $this->params['self']['enable-line-height-resizer'] === 'true'
) echo

    'c=zf.helpers.getCookie("LineHeight");'.
    'if(c!=="default"&&c!=="sm"&&c!=="lg"&&c!=="xl"){'.
        'c="default";'.
        'zf.helpers.setCookie("LineHeight",c);'.
    '}'.
    'zf.self.lineHeight=c;'.
    'if(c!=="default")document.documentElement.setAttribute("data-zf--line-height",c);'

; else echo 'zf.self.lineHeight="default";';

// --------- Custom layout width --------- //

if(
    $this->params['theme']['enable-accessibility-panel'] === 'true' &&
    $this->params['self']['enable-layout-width-resizer'] === 'true'
) echo

    'zf.cache.customLayoutWidthStyle=document.createElement("style");'.
    'zf.cache.customLayoutWidthStyle.id="zf--custom-layout-width-style";'.
    'zf.cache.head.appendChild(zf.cache.customLayoutWidthStyle);'.

    'c=zf.helpers.getCookie("CustomLayoutWidth");'.
    'if(c!=="default"){'.
        'c=parseInt(c);'.
        'if(isNaN(c)){'.
            'c="default";'.
            'zf.helpers.setCookie("CustomLayoutWidth",c);'.
        '}else{'.
            'zf.cache.customLayoutWidthStyle.innerHTML="'.
                '.zf--encloser[class]{max-width:"+c+"px}'.
            '";'.
        '}'.
    '}'.
    'zf.self.customLayoutWidth=c;'

; else echo 'zf.self.customLayoutWidth="default";';

echo '}())</script>'; // Closure closing
