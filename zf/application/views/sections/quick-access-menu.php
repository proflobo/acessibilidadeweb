<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if( $this->params['theme']['enable-quick-access-menu'] === 'false' ) return;

// Section opening
$this->helpers__viewsBuilders__sectionOpening( array(

    'section-id' => 'quick-access-menu',

    'main-div-class-attribute' => '',
    'main-div-additional-attributes' => '',
    'skin-div-class-attribute' => '',
    'skin-div-additional-attributes' => '',

    'semantic-tag' => 'nav',
    'semantic-tag-attributes' => 'role="navigation" aria-label="' . $this->global_vars['language']['quick-access-links'] . '"',

));

echo '<div id="zf--quick-access-menu--descr">' . $this->global_vars['language']['jump-to'] . '</div>';

// Print the module
$this->views__modules__quickAccessMenu();

// Section closing
$this->helpers__viewsBuilders__sectionClosing( array(
    'closing-semantic-tag' => 'nav',
));
