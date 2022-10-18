<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- Existence check --------- //

if(
    $this->params['theme']['enable-accessibility-panel'] === 'false' &&
    (
        !$this->params['guest-views']['search-exists'] &&
        $this->params['self']['search-position'] === 'header-tool'
    ) &&
    !$this->params['guest-views']['login-exists']
) return;

// --------- Section opening --------- //

$this->helpers__viewsBuilders__sectionOpening( array(

    'section-id' => 'toolbox',

    'main-div-class-attribute' => '',
    'main-div-additional-attributes' => '',
    'skin-div-class-attribute' => '',
    'skin-div-additional-attributes' => '',

    'semantic-tag' => 'section',
    'semantic-tag-attributes' => 'role="region"',

    'section-heading-parameters' => (
        ( // Note: condition duplicated in quick-access-menu.php
            (
                $this->params['guest-views']['search-exists'] &&
                $this->params['self']['search-position'] === 'header-tool'
            ) ||
            $this->params['guest-views']['login-exists']
        ) ? 
        array(
            'heading-content' => $this->global_vars['language']['tool-pane'],
            'heading-level' => $this->params['self']['custom-heading-level--toolbox'],
            'heading-additional-classes' => '',
            'related-section-id' => 'toolbox'
        ) : NULL
    )

));

// --------- Toolbox buttons --------- //

echo '<ul id="zf--toolbox-buttons">';

    /*------------------------------------------------------------
       LOGIN BUTTON
    ------------------------------------------------------------*/

    if( $this->params['guest-views']['login-exists'] ){
        echo '<li id="zf--'.'login'.'-toolbox-button-shell" class="zf--toolbox-button-shell">';
        $this->helpers__viewsBuilders__toolboxButton( array(
            'tool-id' => 'login',
            'button-text' => $this->global_vars['language']['login'],
            'button-title' => (
                $this->params['theme']['header-buttons-style'] === 'icon-only' ?
                    $this->global_vars['language']['login'] :
                    ''
            ),
            'button-icon-class' => 'zf--zhong-icon zf--zhong-icon-login'
        ));

        $this->helpers__viewsBuilders__toolboxPanelOpening( array( 'tool-id' => 'login' ) );
        $this->views__sections__login();
        $this->helpers__viewsBuilders__toolboxPanelClosing();

        echo '</li>';
    }

    /*------------------------------------------------------------
       SEARCH BUTTON
    ------------------------------------------------------------*/

    if(
        $this->params['guest-views']['search-exists'] &&
        $this->params['self']['search-position'] === 'header-tool'
    ){
        echo '<li id="zf--'.'search'.'-toolbox-button-shell" class="zf--toolbox-button-shell">';
        $this->helpers__viewsBuilders__toolboxButton( array(
            'tool-id' => 'search',
            'button-text' => $this->global_vars['language']['search'],
            'button-title' => (
                $this->params['theme']['header-buttons-style'] === 'icon-only' ?
                    $this->global_vars['language']['search'] :
                    ''
            ),
            'button-icon-class' => 'zf--zhong-icon zf--zhong-icon-search'
        ));

        $this->helpers__viewsBuilders__toolboxPanelOpening( array( 'tool-id' => 'search' ) );
        $this->views__sections__search();
        $this->helpers__viewsBuilders__toolboxPanelClosing();

        echo '</li>';
    }

    /*------------------------------------------------------------
       ACCESSIBILITY-PANEL BUTTON
    ------------------------------------------------------------*/

    if( $this->params['theme']['enable-accessibility-panel'] === 'true' ){
        echo '<li id="zf--'.'accessibility-options'.'-toolbox-button-shell" class="zf--toolbox-button-shell removed-no-js">';
        $this->helpers__viewsBuilders__toolboxButton( array(
            'tool-id' => 'accessibility-options',
            'button-text' => (
                $this->params['self']['accessibility-panel-icon'] === 'accessibility' ?
                    $this->global_vars['language']['accessibility'] :
                    $this->global_vars['language']['style']
            ),
            'button-title' => (
                $this->params['theme']['header-buttons-style'] === 'icon-only' ? (
                    $this->params['self']['accessibility-panel-icon'] === 'accessibility' ?
                        $this->global_vars['language']['accessibility'] :
                        $this->global_vars['language']['style']
                ) : ''
            ),
            'button-icon-class' => 'zf--zhong-icon zf--zhong-icon-'.$this->params['self']['accessibility-panel-icon']
        ));

        $this->helpers__viewsBuilders__toolboxPanelOpening( array( 'tool-id' => 'accessibility-options' ));
        $this->views__sections__accessibilityOptions();
        $this->helpers__viewsBuilders__toolboxPanelClosing();

        echo '</li>';
    }

echo '</ul>';

$this->helpers__viewsBuilders__sectionClosing( array(
    'closing-semantic-tag' => 'section',
    'enable-no-css-divider' => true
));
