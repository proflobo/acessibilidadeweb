<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->views__documentPartials__documentOpening(); // <html>

$this->views__documentPartials__head(); // <head>...</head>

$this->views__documentPartials__bodyTagOpening(); // <body>

    echo '<div id="zf--page-top" class="clear-both"></div>';

    $this->views__modules__obsoleteBrowserAlert();

    $this->views__sections__quickAccessMenu();

    $this->views__sections__alertsPanel();

    if( // The top bar is kept only for legacy compatibility; it is going to be removed in future versions
        $this->params['self']['restore-top-bar'] === 'true'
    ){
        $this->views__sections__topBar();
    }

    $this->helpers__viewsBuilders__wrapperOpening( array( // <#main-layout>
        'wrapper-id' => (
            (
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained' &&
                $this->params['theme']['header-footer-layout-width-type'] === 'contained'
            ) ? 'main-layout-partial' : 'main-layout-wrapper'
        ),
        'is-encloser' => (
            $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained' &&
            $this->params['theme']['header-footer-layout-width-type'] === 'contained'
        ),
        'enclosed-style-type' => 'contained'
    ));

    $this->views__regions__header();

    $this->helpers__viewsBuilders__wrapperOpening( array( // <#main-body>
        'wrapper-id' => 'main-body'
    ));

        $this->views__sections__asideTop();

        $this->helpers__viewsBuilders__wrapperOpening( array( // <#main-body-middle>
            'wrapper-id' => 'main-body-middle',
            'is-encloser' => (
                $this->params['self']['main-body-middle-layout-width-type'] !== 'full-width' &&
                !(
                    $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                    $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
                )
            )
        ));

            $this->views__regions__leftColumn();

            $this->views__regions__mainContent();

            $this->views__regions__rightColumn();

        $this->helpers__viewsBuilders__wrapperClosing( array( // </#main-body-middle>
            'is-encloser' => (
                $this->params['self']['main-body-middle-layout-width-type'] !== 'full-width' &&
                !(
                    $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                    $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
                )
            )
        ));

        $this->views__sections__asideBottom();

        $this->views__modules__topAnchor();

    $this->helpers__viewsBuilders__wrapperClosing(); // </#main-body>

    $this->views__regions__footer();

    $this->helpers__viewsBuilders__wrapperClosing( array( // </#main-layout>
        'is-encloser' => (
            $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained' &&
            $this->params['theme']['header-footer-layout-width-type'] === 'contained'
        ),
    ));

    $this->views__modules__desktopLayoutSwitcher();

$this->views__documentPartials__documentClosing(); // </body> + footer assets
