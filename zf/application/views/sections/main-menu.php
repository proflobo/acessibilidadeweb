<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['main-menu-exists']){

    $this->helpers__viewsBuilders__sectionOpening( array(

        'section-id' => 'main-menu',

        'main-div-class-attribute' => 'zf--menu-container',
        'main-div-additional-attributes' => '',
        'skin-div-class-attribute' => '',
        'skin-div-additional-attributes' => '',

        'semantic-tag' => 'nav',
        'semantic-tag-attributes' => 'role="navigation"',

        'section-expand-button' => true,
        'section-expand-button-class' => '', // no btn style here
        'section-expand-button-icon-class' => 'zf--zhong-icon zf--zhong-icon-menu',
        'section-expand-button-text' => $this->global_vars['language']['menu'],

        'section-heading-parameters' => array(
            'heading-content' => $this->global_vars['language']['main-menu'],        
            'heading-level' => $this->params['self']['custom-heading-level--main-menu'],
            'heading-additional-classes' => '',
            'related-section-id' => 'main-menu'
        )

    ));

        $this->helpers__views__printGuestView('main-menu');

    $this->helpers__viewsBuilders__sectionClosing( array(
        'closing-semantic-tag' => 'nav',
    ));

}
