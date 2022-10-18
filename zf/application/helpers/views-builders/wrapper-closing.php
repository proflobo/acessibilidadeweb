<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// Close the skin div
echo '</div>';

// If container, another div needs to be closed
if(
    isset($function_parameters['is-encloser']) &&
    $function_parameters['is-encloser'] === true
){
    echo '</div>';
}

// If set, close the semantic tag
if(
    isset($function_parameters['closing-semantic-tag']) &&
    $function_parameters['closing-semantic-tag'] !== '' &&
    $this->params['theme']['enable-semantic-outline'] === 'true'
){
    echo '</'.$function_parameters['closing-semantic-tag'].'>';
}

// If set, add the divider for clients with CSS disabled
if(
    isset($function_parameters['enable-no-css-divider']) && // Default value = false
    $function_parameters['enable-no-css-divider'] === true
){
    echo '<hr class="zf--no-css-divider"/>';
}

// Close the main div
echo '</div>';
