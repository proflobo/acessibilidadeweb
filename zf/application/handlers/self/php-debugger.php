<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// If enabled from the backend, set up the PHP debugger
if($this->params['theme']['enable-php-debugger'] === 'true'){

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
}
