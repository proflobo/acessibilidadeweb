<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('_JEXEC') or die( 'Restricted access' );

require(dirname(__FILE__).'/zf/application/ZhongFramework.php');

global $zhong_framework;
$zhong_framework = new ZhongFramework( array(
    'parent-platform' => 'Joomla',
    'joomla-instance' => $this
));

$zhong_framework->views__document();
