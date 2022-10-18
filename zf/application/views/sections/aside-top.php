<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['aside-top-exists']){

    // Open the section
    $this->helpers__viewsBuilders__sectionOpening( array(

        'section-id' => 'aside-top',

        'main-div-class-attribute' => '',
        'main-div-additional-attributes' => '',
        'skin-div-class-attribute' => '',
        'skin-div-additional-attributes' => '',

        'is-encloser' => (
            $this->params['theme']['aside-top-bottom-layout-width-type'] !== 'full-width' &&
            !(
                $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
            )
        ),
        'enclosed-style-type' => $this->params['theme']['aside-top-bottom-layout-width-type'],

        'semantic-tag' => 'aside',
        'semantic-tag-attributes' => 'role="complementary"',

    ));

    // Print the guest view
    $this->helpers__viewsBuilders__groupedHosts( array(
        'grouped-hosts-id' => 'aside-top',
    ));

    // Close the section
    $this->helpers__viewsBuilders__sectionClosing( array(
        'is-encloser' => (
            $this->params['theme']['aside-top-bottom-layout-width-type'] !== 'full-width' &&
            !(
                $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
            )
        ),
        'closing-semantic-tag' => 'aside'
    ));

}
