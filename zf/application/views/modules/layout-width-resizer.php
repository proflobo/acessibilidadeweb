<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo '<ul id="zf--layout-width-resizer">'.

     '<li><button id="zf--increase-layout-width" class="show-tooltip" title="'.$this->global_vars['language']['expand'].'">'.
     '<span class="zf--zhong-icon zf--zhong-icon-plus" aria-hidden="true"></span>'.
     '<span class="visually-hidden">'.$this->global_vars['language']['expand'].'</span>'.
     '</button></li>'.

     '<li><button id="zf--decrease-layout-width" class="show-tooltip" title="'.$this->global_vars['language']['shrink'].'">'.
     '<span class="zf--zhong-icon zf--zhong-icon-minus" aria-hidden="true"></span>'.
     '<span class="visually-hidden">'.$this->global_vars['language']['shrink'].'</span>'.
     '</button></li>'.

 '</ul>';
