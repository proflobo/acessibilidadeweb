<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// Wrap guest view?
if(
    isset($function_parameters['wrap-guest-view']) &&
    $function_parameters['wrap-guest-view']
){
    echo '<div id="zf--guest-view--'.$guest_view_id.'" class="zf--guest-view">';
}

// Print the guest view
echo $this->guest_views[$guest_view_id];

// Wrap guest view?
if(
    isset($function_parameters['wrap-guest-view']) &&
    $function_parameters['wrap-guest-view']
){
    echo '</div>';
}
