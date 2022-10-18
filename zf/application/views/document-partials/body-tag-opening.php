<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http:// www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- <body> opening + body classes --------- //

echo '<body id="zf--body" class="'.$this->global_vars['views']['body-tag-classes'].'">';

// ---------  Media Query Detector (node) --------- //

echo '<div id="zf--mq-detector-sm" class="visually-hidden"></div><div id="zf--mq-detector-md" class="visually-hidden"></div>';

echo '<script type="text/javascript">(function(){'.

'var zf=window.zhongFramework;'.

// --------- Dynamic classes (coming from cookies) --------- //

'document.body.className+='.
    '" zf--theme-"+zf.self.theme+'. // Theme
    '" zf--legibility-"+zf.self.rootFontFamily'. // Font Family (legibility)
';'.

// --------- Media Query Detector (init) --------- //

'zf.helpers.detectMQ();'.

// --------- Narrowed widnow detection (used by mobile-switcher) --------- //

'if(!window.matchMedia)document.documentElement.className+=" zf--no-support-fixed-meta-viewport";'.
'else{'.

    'var v=zf.helpers.getCookie("FixedMetaViewportSupport");'.

    'if(!v||(v!=="supports"&&v!=="no-support")){'.

        'v=zf.cache.metaViewport.getAttribute("content");'. // original value; note the reuse of "v"

        'zf.cache.metaViewport.setAttribute("content",("width="+(window.screen.width+1)+"px, initial-scale=1.0"));'.
        'var s=(window.matchMedia("(min-width:"+(window.screen.width+1)+"px)").matches)?"supports":"no-support";'.

        'zf.helpers.setCookie("FixedMetaViewportSupport",s);'.
        'document.documentElement.className+=" zf--"+s+"-fixed-meta-viewport";'.

        'zf.cache.metaViewport.setAttribute("content",v);'. // restore previous value

    '}else document.documentElement.className+=" zf--"+v+"-fixed-meta-viewport";'. // support already stored in cookie

'}'.

'}())</script>';
