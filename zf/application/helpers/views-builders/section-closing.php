<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- Init --------- //

if(
    !isset($function_parameters['closing-semantic-tag']) ||
    $function_parameters['closing-semantic-tag'] === '' ||
    $this->params['theme']['enable-semantic-outline'] === 'false'
){
    $function_parameters['closing-semantic-tag'] = 'div';
}

// --------- Close inner <div> --------- //

echo '</div>';

// --------- Encloser <div> (if present) --------- //

if(
    isset($function_parameters['is-encloser']) &&
    $function_parameters['is-encloser'] === true
){
    echo '</div>';
}

// --------- Close semantic tag --------- //

echo '</'.$function_parameters['closing-semantic-tag'].'>';

// --------- Print section footer anchors --------- //

if(
    !isset($function_parameters['enable-no-css-divider']) || // Default value = true
    $function_parameters['enable-no-css-divider'] === true
){
    echo '<hr class="zf--no-css-divider"/>';
}

// --------- Close external <div> --------- //

echo '</div>';
