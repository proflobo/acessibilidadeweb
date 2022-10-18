<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['footer-exists']){

    // ~~~ Footer, opening ~~~ //
    $this->helpers__viewsBuilders__sectionOpening( array(

        'section-id' => 'footer',

        'main-div-class-attribute' => '',
        'main-div-additional-attributes' => '',
        'skin-div-class-attribute' => '',
        'skin-div-additional-attributes' => '',

        'is-encloser' => (
            $this->params['theme']['header-footer-layout-width-type'] !== 'full-width' &&
            !(
                $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
            )
        ),
        'enclosed-style-type' => $this->params['theme']['header-footer-layout-width-type'],

        'semantic-tag' => 'footer',
        'semantic-tag-attributes' => 'role="contentinfo"',

        'section-heading-parameters' => array(
            'heading-content' => $this->global_vars['language']['footer'],        
            'heading-level' => $this->params['self']['custom-heading-level--footer'],
            'heading-additional-classes' => '',
            'related-section-id' => 'footer'
        )

    ));

    /*==========================================================================
       FOOTER CONTENT
    ==========================================================================*/

    if($this->params['guest-views']['footer-content-exists']){

        // ~~~ Footer content, opening ~~~ //
        $this->helpers__viewsBuilders__wrapperOpening( array(
            'wrapper-id' => 'footer-content',
        ));

        /*------------------------------------------------------------
           FOOTER TOP
        ------------------------------------------------------------*/
        $this->views__sections__footerTop();

        /*------------------------------------------------------------
           FOOTER CREDITS
        ------------------------------------------------------------*/
        $this->views__sections__footerCredits();

        // ~~~ Footer content, closing ~~~ //
        $this->helpers__viewsBuilders__wrapperClosing();

    }

    /*------------------------------------------------------------
       FOOTER MENU
    ------------------------------------------------------------*/
    $this->views__sections__footerMenu();

    // ~~~ Footer, opening ~~~ //
    $this->helpers__viewsBuilders__sectionClosing( array(
        'is-encloser' => (
            $this->params['theme']['header-footer-layout-width-type'] !== 'full-width' &&
            !(
                $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
            )
        ),
        'closing-semantic-tag' => 'footer'
    ));

}
