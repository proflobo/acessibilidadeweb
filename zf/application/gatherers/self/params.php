<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->params['self'] = array(

    'assets-mode' => 'min',

    'include-jquery' => false,

    'prevent-javascript-errors-ie8' => false,

    'enable-font-size-relativizer' => 'true',

    'enable-meta-viewport' => true,

    'theme-skin-id' => 'cen',

    'restore-top-bar' => 'false',

    'search-position' => 'header-tool', // or 'header-top'

    'enable-javascript-tooltips' => 'on-snippet', // or 'never'

    'main-body-middle-layout-width-type' => 'contained', // or 'full-width'

    'accessibility-panel-icon' => 'double-a', // or 'accessibility'
    'enable-line-height-resizer' => 'false',
    'enable-layout-width-resizer' => 'false',

    'custom-heading-level--site-banner' => 1,
    'custom-heading-level--toolbox' => 2,
    'custom-heading-level--alerts-panel' => 2,
    'custom-heading-level--main-menu' => 2,
    'custom-heading-level--footer' => 2,

    'enable-section-expand-button--side-menu' => true,
    'enable-section-expand-button--aside-left' => true,
    'enable-section-expand-button--aside-right' => true,

);
