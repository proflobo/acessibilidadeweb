<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->helpers__viewsBuilders__wrapperOpening( array(
    'wrapper-id' => 'top-layout-partial',
    'encloser-type' => 'contained',
    'is-encloser' => false
));

$this->views__sections__breadcrumbs();

$this->helpers__viewsBuilders__wrapperClosing( array(
    'is-encloser' => false
));