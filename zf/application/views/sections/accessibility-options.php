<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- Section opening --------- //

$this->helpers__viewsBuilders__wrapperOpening( array(
    'wrapper-id' => 'accessibility-options',
));

/*------------------------------------------------------------
   RESET BUTTON
------------------------------------------------------------*/

echo '<button id="zf--accessibility-options-reset-button" class="blue-button-style">'.
     $this->global_vars['language' ]['reset'].
     '</button>';

/*------------------------------------------------------------
   FONT RESIZER
------------------------------------------------------------*/

// Container opening
echo '<div id="zf--font-resizer-container" class="zf--accessibility-panel-module">';

// Description
echo '<p class="zf--accessibility-panel-module-description">'.
     $this->global_vars['language']['access-bar-font-header'].$this->global_vars['language']['colon-symbol'].
     '</p>';

// The module
$this->views__modules__fontResizer();

// Container closing
echo '</div>';

/*------------------------------------------------------------
   LINE HEIGHT RESIZER
------------------------------------------------------------*/

if( $this->params['self']['enable-line-height-resizer'] === 'true' ){
    // Container opening
    echo '<div id="zf--line-height-resizer-container" class="zf--accessibility-panel-module">';

    // Description
    echo '<p class="zf--accessibility-panel-module-description">'.
         $this->global_vars['language']['line-height'].$this->global_vars['language']['colon-symbol'].
         '</p>';

    // The module
    $this->views__modules__lineHeightResizer();

    // Container closing
    echo '</div>';
}

/*------------------------------------------------------------
   LEGIBILITY SWITCHER
------------------------------------------------------------*/

if( $this->params['theme']['enable-legibility-switcher'] === 'true' ){
    // Container opening
    echo '<div id="zf--legibility-switcher-container" class="zf--accessibility-panel-module">';

    // Description
    echo '<p class="zf--accessibility-panel-module-description">'.
         $this->global_vars['language']['font'].$this->global_vars['language']['colon-symbol'].
         '</p>';

    // The module
    $this->views__modules__legibilitySwitcher();

    // Container closing
    echo '</div>';
}

/*------------------------------------------------------------
   THEME SWITCHER
------------------------------------------------------------*/

if( $this->params['theme']['enable-theme-switcher'] === 'true' ){
    // Container opening
    echo '<div id="zf--theme-switcher-container" class="zf--accessibility-panel-module">';

    // Description
    echo '<p class="zf--accessibility-panel-module-description">'.
         $this->global_vars['language']['theme'].$this->global_vars['language']['colon-symbol'].
         '</p>';

    // The module
    $this->views__modules__themeSwitcher();

    // Container closing
    echo '</div>';
}

/*------------------------------------------------------------
   LAYOUT WIDTH SWITCHER
------------------------------------------------------------*/

if( $this->params['self']['enable-layout-width-resizer'] === 'true' ){
    // Container opening
    echo '<div id="zf--layout-width-resizer-container" class="zf--accessibility-panel-module">';

    // Description
    echo '<p class="zf--accessibility-panel-module-description">'.
         $this->global_vars['language']['resize-handle-title'].$this->global_vars['language']['colon-symbol'].
         '</p>';

    // The module
    $this->views__modules__layoutWidthResizer();

    // Container closing
    echo '</div>';
}

// --------- Section closing --------- //

$this->helpers__viewsBuilders__wrapperClosing( array(
    'enable-no-css-divider' => true
));
