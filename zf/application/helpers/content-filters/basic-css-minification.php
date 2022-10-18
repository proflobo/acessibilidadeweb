<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// Remove comments (NOT the in line ones = '//')
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
// Remove tabs, spaces, newlines, etc.
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);

return $buffer;
