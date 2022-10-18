<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['aside-left-exists']){

    $this->helpers__viewsBuilders__sectionOpening( array(

        'section-id' => 'aside-left',

        'main-div-class-attribute' => '',
        'main-div-additional-attributes' => '',
        'skin-div-class-attribute' => 'zf--block-coat--'.$this->params['theme']['block-coat--aside-left'],
        'skin-div-additional-attributes' => '',

        'semantic-tag' => 'aside',
        'semantic-tag-attributes' => 'role="complementary"',

        'section-expand-button' => $this->params['self']['enable-section-expand-button--aside-left'],
        'section-expand-button-class' => 'grey-button-style',
        'section-expand-button-icon-class' => 'zf--zhong-icon zf--zhong-icon-plus-circle',
        'section-expand-button-text' => $this->global_vars['language']['additional-resources'],

    ));

        $this->helpers__views__printGuestView('aside-left');

    $this->helpers__viewsBuilders__sectionClosing( array(
        'closing-semantic-tag' => 'aside',
    ));

}
