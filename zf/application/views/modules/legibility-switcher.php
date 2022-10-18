<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// For certain languages switching to serif/sans-serif is useless:
$legibilitySwitcher_siteLanguage = substr($this->params['site']['site-language'],0,2);

$legibilitySwitcher_serifSwitcherHidden = '';
$legibilitySwitcher_boldTextVisible = 'visually-hidden';
if(
    $legibilitySwitcher_siteLanguage === 'zh' || // Chinese & Chinese traditional
    $legibilitySwitcher_siteLanguage === 'ar' || // Arabic
    $legibilitySwitcher_siteLanguage === 'fa' || // Persian
    $legibilitySwitcher_siteLanguage === 'hi' || // Hindi
    $legibilitySwitcher_siteLanguage === 'th'    // Thai
){
    $legibilitySwitcher_serifSwitcherHidden = 'removed';
    $legibilitySwitcher_boldTextVisible = '';
}

echo '<ul id="zf--legibility-switcher">'.

// --------- "Sans-serif" --------- //

    '<li id="zf--legibility-sans-serif-button-shell" class="'.$legibilitySwitcher_serifSwitcherHidden.'"><button id="zf--legibility-sans-serif-button" class="zf--legibility-switcher-button show-tooltip" title="'.$this->global_vars['language']['sans-serif'].'"><span id="zf--legibility-sans-serif-button-icon" class="zf--legibility-switcher-button-icon" aria-hidden="true"></span>&nbsp;<span class="visually-hidden">'.$this->global_vars['language']['sans-serif'].'</span></button></li>'.

// --------- "Serif" --------- //

    '<li id="zf--legibility-serif-button-shell" class="'.$legibilitySwitcher_serifSwitcherHidden.'"><button id="zf--legibility-serif-button" class="zf--legibility-switcher-button show-tooltip" title="'.$this->global_vars['language']['serif'].'"><span id="zf--legibility-serif-button-icon" class="zf--legibility-switcher-button-icon" aria-hidden="true"></span>&nbsp;<span class="visually-hidden">'.$this->global_vars['language']['serif'].'</span></button></li>'.

// --------- "Bold" --------- //

    '<li id="zf--legibility-bold-button-shell"><button id="zf--legibility-bold-button" class="zf--legibility-switcher-button show-tooltip" title="'.$this->global_vars['language']['bold'].'"><span id="zf--legibility-bold-button-icon" class="zf--legibility-switcher-button-icon '.$legibilitySwitcher_serifSwitcherHidden.'" aria-hidden="true"></span><span class="'.$legibilitySwitcher_serifSwitcherHidden.'">&nbsp;</span><span class="'.$legibilitySwitcher_boldTextVisible.'">'.$this->global_vars['language']['bold'].'</span></button></li>'.

'</ul>';
