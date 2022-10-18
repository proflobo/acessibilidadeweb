<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$header_top_exists = (
    $this->params['guest-views']['support-menu-exists'] ||
    $this->params['guest-views']['language-switcher-exists'] ||
    $this->params['guest-views']['header-aside-exists'] ||
    (
        $this->params['guest-views']['search-exists'] &&
        $this->params['self']['search-position'] === 'header-top'
    )
);

// ~~~ Header, opening ~~~ //
$this->helpers__viewsBuilders__wrapperOpening( array(
    'wrapper-id' => 'header',
    'is-encloser' => (
        $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
        $this->params['theme']['aside-top-bottom-layout-width-type'] !== 'contained'
    ),
    'enclosed-style-type' => $this->params['theme']['header-footer-layout-width-type'],
    'main-div-class-attribute' => (
        'zf--site-banner-alignment-'.$this->params['theme']['presentation-alignment'].' '.
        'zf--main-menu-alignment-'.$this->params['theme']['main-menu-alignment'].' '.
        'zf--full-width-logo-'. (
            (
                $this->params['theme']['presentation-alignment'] === 'center' &&
                $this->params['theme']['full-width-logo'] === 'true'
            ) ? 'true' : 'false'
        ).' '.
        'zf--show-site-logo-'.$this->params['theme']['show-logo'].' '.
        'zf--header-buttons-style-'.$this->params['theme']['header-buttons-style'].' '.
        'zf--header-top-'. ( $header_top_exists ? 'exists' : 'absent' )
    ),
    'additional-semantic-tag' => 'header',
    'additional-semantic-tag-attributes' => 'role="banner"'
));

/*==========================================================================
   HEADER-TOP
==========================================================================*/

if( $header_top_exists ){

    // ~~~ Header top, opening ~~~ //
    $this->helpers__viewsBuilders__wrapperOpening( array(
        'wrapper-id' => 'header-top',
        'is-encloser' => ($this->params['theme']['header-footer-layout-width-type'] === 'stretched'),
        'enclosed-style-type' => 'stretched'
    ));

        $this->helpers__viewsBuilders__wrapperOpening( array(
            'wrapper-id' => 'header-aside'
        ));

            $this->views__sections__supportMenu();

            $this->views__sections__languageSwitcher();


            if($this->params['guest-views']['header-aside-exists']){
                $this->helpers__views__printGuestView('header-aside');
            }

            if( $this->params['self']['search-position'] === 'header-top' ){
                $this->views__sections__search();
            }

        $this->helpers__viewsBuilders__wrapperClosing();

    // ~~~ Header top, closing ~~~ //
    $this->helpers__viewsBuilders__wrapperClosing( array(
        'is-encloser' => ($this->params['theme']['header-footer-layout-width-type'] === 'stretched')
    ));
}

/*==========================================================================
   HEADER MIDDLE
==========================================================================*/

// ~~~ Header middle, opening ~~~ //
$this->helpers__viewsBuilders__wrapperOpening( array(
    'wrapper-id' => 'header-middle',
    'is-encloser' => $this->params['theme']['header-footer-layout-width-type'] === 'stretched',
    'enclosed-style-type' => 'stretched'
));

/*------------------------------------------------------------
   SITE BANNER
------------------------------------------------------------*/
$this->views__sections__siteBanner();

// ~~~ Header middle, closing ~~~ //
$this->helpers__viewsBuilders__wrapperClosing( array(
    'is-encloser' => $this->params['theme']['header-footer-layout-width-type'] === 'stretched'
));

/*==========================================================================
   HEADER BOTTOM
==========================================================================*/

    if(
        $this->params['guest-views']['main-menu-exists'] ||
        $this->params['theme']['enable-accessibility-panel'] === 'true' ||
        (
            $this->params['guest-views']['search-exists'] &&
            $this->params['self']['search-position'] === 'header-tool'
        ) ||
        $this->params['guest-views']['login-exists']
    ){

        // ~~~ Header bottom, opening ~~~ //
        $this->helpers__viewsBuilders__wrapperOpening( array(
            'wrapper-id' => 'header-bottom',
            'is-encloser' => $this->params['theme']['header-footer-layout-width-type'] === 'stretched',
            'enclosed-style-type' => $this->params['theme']['header-footer-layout-width-type']
        ));

            $this->views__sections__mainMenu();

            $this->views__sections__toolbox();

        // ~~~ Header bottom, closing ~~~ //
        $this->helpers__viewsBuilders__wrapperClosing( array(
            'is-encloser' => $this->params['theme']['header-footer-layout-width-type'] === 'stretched'
        ));

    }

// ~~~ Header, closing ~~~ //
$this->helpers__viewsBuilders__wrapperClosing( array(
    'is-encloser' => (
        $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
        $this->params['theme']['aside-top-bottom-layout-width-type'] !== 'contained'
    ),
    'closing-semantic-tag' => 'header'
));
