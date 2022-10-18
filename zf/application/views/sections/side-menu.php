<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['side-menu-exists']){

    $this->helpers__viewsBuilders__sectionOpening( array(

        'section-id' => 'side-menu',

        'main-div-class-attribute' => 'zf--menu-container',
        'main-div-additional-attributes' => '',
        'skin-div-class-attribute' => 'zf--block-coat--'.$this->params['theme']['block-coat--side-menu'],
        'skin-div-additional-attributes' => '',

        'semantic-tag' => 'nav',
        'semantic-tag-attributes' => 'role="navigation" aria-label="' . $this->global_vars['language']['side-menu'] . '"',

        'section-expand-button' => $this->params['self']['enable-section-expand-button--side-menu'],
        'section-expand-button-class' => 'grey-button-style',
        'section-expand-button-icon-class' => 'zf--zhong-icon zf--zhong-icon-menu',
        'section-expand-button-text' => $this->global_vars['language']['side-menu'],

    ));

        $this->helpers__views__printGuestView('side-menu');

    $this->helpers__viewsBuilders__sectionClosing( array(
        'closing-semantic-tag' => 'nav',
    ));

}
