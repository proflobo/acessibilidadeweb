<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- System debug --------- //

$this->helpers__views__printGuestView('system-debug');

// --------- #zf--end-of-page --------- //

// Clearfix is needed otherwise ipad cuts the margin-bottom
echo '<div id="zf--end-of-page" class="clearfix clear-both"></div>';

// --------- User custom code - top (overridable by user) --------- //

if( isset($this->global_vars['views']['user-custom-code-document-closing-top']) )
    echo $this->global_vars['views']['user-custom-code-document-closing-top'];

// --------- Footer inline scripts - top --------- //

echo '<script type="text/javascript">/*<![CDATA[*/';
$this->views__assets__phpJsBridge();
echo '/*]]>*/</script>';

// --------- ZF's scripts --------- //

echo '<script type="text/javascript" src="'.
    $this->params['site']['zhong-framework-assets-uri'].'/js/'.
    ( $this->params['self']['assets-mode'] === 'dev' ? 'dev' : 'min' ).
    '/main.js?zf-v='.ZHONG_FRAMEWORK_VERSION.'"></script>';

if($this->params['theme']['enable-user-overrides-js'] === 'true'){ // overrides.js

    echo '<script type="text/javascript" src="'.$this->params['site']['zhong-framework-root-uri'].'/custom/overrides/assets/js/overrides.js?zf-v='.ZHONG_FRAMEWORK_VERSION.'"></script>';

}

// --------- Google analytics --------- //

$this->views__modules__googleAnalytics();

// --------- User custom code - bottom --------- //

echo $this->params['theme']['user-custom-code-document-closing-bottom'];

// --------- The End --------- //

echo '</body></html>';
