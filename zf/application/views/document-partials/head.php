<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo '<head>';

// --------- Misc --------- //

// Favicon
if($this->params['theme']['site-favicon'] !== ''){
    echo '<link rel="icon" type="image/ico" href="'.$this->params['theme']['site-favicon'].'" />';
}

// Meta-viewport
if( $this->params['self']['enable-meta-viewport'] ){
    echo '<meta id="zf--meta-viewport" name="viewport" content="width=device-width, initial-scale=1.0" />';
}

// --------- Head scripts - top --------- //
// Performance note: to allow parallel downloading, inline scripts are moved before 
// external CSS files or other resources. (e.g. inline scripts between an external CSS file
// and another resource is bad)

$this->views__assets__headScriptsTop();

// --------- User custom code - top (overridable by user) --------- //

if( isset($this->global_vars['views']['user-custom-code-head-top']) )
    echo $this->global_vars['views']['user-custom-code-head-top'];


// --------- Head styles --------- //

$this->views__assets__headStyles();

// --------- jQuery import --------- //

if(
    $this->params['self']['include-jquery'] ||
    $this->params['parent-platform']['release-class'] === 'Joomla25' // Joomla 2.5 doesn't include jQuery by default
){

    echo '<script type="text/javascript">'.
        'window.jQuery||document.write(\'<script src="'.$this->params['site']['zhong-framework-assets-uri'].'/lib/jquery/jquery.min.js?zf-v='.ZHONG_FRAMEWORK_VERSION.'"><\/script>\');'.
    '</script>';

}

// --------- Parent platform's head --------- //

$this->helpers__views__printGuestView('head', array('wrap-guest-view' => false));

// --------- User custom code - bottom --------- //

echo $this->params['theme']['user-custom-code-head-bottom'];

// --------- <head> closing --------- //

echo '</head>';
