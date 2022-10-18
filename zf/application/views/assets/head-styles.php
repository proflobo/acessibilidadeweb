<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

/*----------------------------------------------------------------
   MAIN STYLESHEETS
----------------------------------------------------------------*/

foreach($this->global_vars['assets']['head-stylesheets'] as $stylesheet){
    echo '<link rel="stylesheet" type="text/css" href="'.$stylesheet.'" '.
    // Note: main.css is assigned to media-screen so that it doesn't influence print
    ( strpos($stylesheet, 'main.css?zf-v') !== false ? 'media="screen"' : 'media="all"' ).
    '/>';
}

/*----------------------------------------------------------------
   PRINT
----------------------------------------------------------------*/

echo '<style type="text/css" media="print">';

// --------- Include the CSS file --------- //

require ZHONG_FRAMEWORK_ROOT_DIR.
    '/assets/css/'.$this->params['self']['assets-mode'].'/other/print.css';

// --------- Custom print style --------- //


// Font family
if($this->params['theme']['print-font-type'] === 'sansserif'){
    echo 'body{font-family:Arial,sans-serif}';
}

elseif($this->params['theme']['print-font-type'] === 'serif'){
    echo 'body{font-family:Georgia,serif}';
}

// Font size
if($this->params['theme']['print-font-size'] === 'big'){ 
    echo 'body{font-size:120%}';
}

elseif($this->params['theme']['print-font-size'] === 'normal'){
    echo 'body{font-size:80%}';
}

elseif($this->params['theme']['print-font-size'] === 'small'){
    echo 'body{font-size:65%}';
}

// Show/hide layout elements
if($this->params['theme']['print-show-header'] === 'false'){ 
    echo '#zf--header{display:none !important}';
}

if($this->params['theme']['print-show-footer'] === 'false'){ 
    echo '#zf--footer{display:none !important}';
}

if($this->params['theme']['print-images'] === 'true'){ 
    echo 'img{display:none !important}';
}

echo '</style>';

/*----------------------------------------------------------------
   SPEECH
---------------------------------------------------------------- */

echo '<style type="text/css" media="speech">*{voice-family:male}.zf--section-heading,#zf--quick-access-menu *{voice-family:female}[aria-hidden="true"]{speak:none !important}</style>';

/*----------------------------------------------------------------
   INLINE STYLES
---------------------------------------------------------------- */

echo '<style type="text/css" media="screen">';

$this->views__assets__customUserStyle();

echo $this->params['theme']['custom-user-inline-css'];

echo '</style>';

/*------------------------------------------------------------
   OVERRIDES.CSS (only if enabled)
------------------------------------------------------------*/

if($this->params['theme']['enable-user-overrides-css'] === 'true'){
    echo '<link rel="stylesheet" type="text/css" media="screen" href="'.
         $this->params['site']['zhong-framework-root-uri'].'/custom/overrides/assets/css/overrides.css?zf-v='.ZHONG_FRAMEWORK_VERSION.'" />';
}
