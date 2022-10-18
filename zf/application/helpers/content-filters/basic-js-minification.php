<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// See: http://code.google.com/p/samstyle-php-framework/source/browse/trunk/sp.php
$regex = array(
    "`^([\t\s]+)`ism"=>'',
    "`^\/\*(.+?)\*\/`ism"=>"",
    "`([\n\A;]+)\/\*(.+?)\*\/`ism"=>"$1",
    "`([\n\A;\s]+)//(.+?)[\n\r]`ism"=>"$1\n",
    "`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism"=>"\n"
);

$buffer = preg_replace(array_keys($regex), $regex, $buffer);

return $buffer;
