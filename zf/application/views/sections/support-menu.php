<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['support-menu-exists']){

    // Open the section
    $this->helpers__viewsBuilders__sectionOpening( array(

        'section-id' => 'support-menu',

        'main-div-class-attribute' => 'zf--menu-container',
        'main-div-additional-attributes' => '',
        'skin-div-class-attribute' => '',
        'skin-div-additional-attributes' => '',

    ));

    // Print the guest view
    $this->helpers__views__printGuestView('support-menu');

    // Close the section
    $this->helpers__viewsBuilders__sectionClosing();

}
