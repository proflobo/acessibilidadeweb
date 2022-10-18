<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo 'window.zhongFramework.params={';

$last_array_index = count($this->global_vars['assets']['php-js-bridge-params']);
foreach ($this->global_vars['assets']['php-js-bridge-params'] as $key => $value){
    echo $key.':'.$value;
    if(--$last_array_index !== 0){ echo ','; }
}

echo '};';

echo 'window.zhongFramework.lang={';

$last_array_index = count($this->global_vars['assets']['php-js-bridge-lang']);
foreach ($this->global_vars['assets']['php-js-bridge-lang'] as $key => $value){
    echo $key.':'.$value;
    if(--$last_array_index !== 0){ echo ','; }
}

echo '};';
