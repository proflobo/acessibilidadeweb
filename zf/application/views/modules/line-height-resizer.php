<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo '<ul id="zf--line-height-resizer">'.

     '<li><button class="show-tooltip" title="'.$this->global_vars['language']['increase'].'" id="zf--increase-line-height">'.
     '<span class="zf--zhong-icon zf--zhong-icon-plus" aria-hidden="true"></span>'.
     '<span class="visually-hidden">'.$this->global_vars['language']['increase'].'</span>'.
     '</button></li>'.

     '<li><button class="show-tooltip" title="'.$this->global_vars['language']['decrease'].'" id="zf--decrease-line-height">'.
     '<span class="zf--zhong-icon zf--zhong-icon-minus" aria-hidden="true"></span>'.
     '<span class="visually-hidden">'.$this->global_vars['language']['decrease'].'</span>'.
     '</button></li>'.

 '</ul>';
