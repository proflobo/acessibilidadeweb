<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo '<ul id="zf--theme-switcher">'.

// --------- "Low brightness" --------- //

    '<li><button id="zf--low-brightness-theme-button" class="zf--theme-switcher-button show-tooltip" title="'.$this->global_vars['language']['access-bar-graphicmode-low-brightness'].'"><span id="zf--low-brightness-theme-button-icon" class="zf--theme-switcher-button-icon" aria-hidden="true"></span><span class="visually-hidden">'.$this->global_vars['language']['access-bar-graphicmode-low-brightness'].'</span></button></li>'.

// --------- "Inverted" --------- //

    '<li id="zf--inverted-theme-button-shell"><button id="zf--inverted-theme-button" class="zf--theme-switcher-button show-tooltip" title="'.$this->global_vars['language']['inverted'].'"><span id="zf--inverted-theme-button-icon" class="zf--theme-switcher-button-icon" aria-hidden="true"></span><span class="visually-hidden">'.$this->global_vars['language']['inverted'].'</span></button></li>'.

'</ul>';
