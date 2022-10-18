<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if(!$this->params['guest-views']['alerts-panel-exists']) return;

/*==========================================================================
   ALERTS PANEL HTML CODE
==========================================================================*/

// --------- Section opening --------- //

$this->helpers__viewsBuilders__sectionOpening( array(

    'section-id' => 'alerts-panel',

    'main-div-class-attribute' =>
        // Note: the panel is hidden by default (removed), JavaScript will handle this
        'removed removed-no-js zf--alerts-panel-position-' . $this->params['theme']['alerts-panel--position'],

    'semantic-tag' => 'div',
    'semantic-tag-attributes' => '',

    'section-heading-parameters' => array(
        'heading-content' => $this->global_vars['language']['alert-message'],        
        'heading-level' => $this->params['self']['custom-heading-level--alerts-panel'],
        'heading-additional-classes' => '',
        'related-section-id' => 'alerts-panel'
    )

));

// --------- Close button --------- //

if( $this->params['theme']['alerts-panel--provided-control'] === 'close-button' ){
    echo '<div id="zf--alerts-panel--close-button-container">'.
        '<button id="zf--alerts-panel--close-button" title="'.$this->global_vars['language']['hide-this-message'].'">'.
            '<span class="visually-hidden">'.
            $this->global_vars['language']['hide-this-message'].
            '</span><span id="zf--alerts-panel--close-button--icon" aria-hidden="true"></span>'.
        '</button>'.
     '</div>';
}

// --------- Print the "content" of the panel --------- //

// Wrap it into an outer container.
// Note: the "content-container" div is needed in order to align vertically and horizontally the "content" div and the "ok-button" when in "modal" mode
echo '<div id="zf--alerts-panel--content-container">'.
     '<div id="zf--alerts-panel--content">';

// Check if any content has been initially set.
// NOTE: the outer HTML code of this section is always print, however the inner content might be empty initially (infact the user can populate the content by triggering a JS action)
if($this->params['guest-views']['alerts-panel-exists']){

    // Print the guest view
    $this->helpers__views__printGuestView('alerts-panel');

}

// Close "content" div
echo '</div>';

// --------- "OK" button --------- //

if( $this->params['theme']['alerts-panel--provided-control'] === 'ok-button' ){
    echo '<div id="zf--alerts-panel--ok-button-container"><button id="zf--alerts-panel--ok-button" class="grey-button-style">'.$this->global_vars['language']['ok'].'</button></div>';
}

// Close "content-container" div
echo '</div>';

// --------- Section closing --------- //

$this->helpers__viewsBuilders__sectionClosing( array(
    'closing-semantic-tag' => 'div'
));
