<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

/*------------------------------------------------------------
   CHECK VALIDITY
------------------------------------------------------------*/

if( !isset($function_parameters['is-encloser']) ){ // duplicated logic in "section-opening.php"
    if( isset($function_parameters['enclosed-style-type']) ){
        $function_parameters['is-encloser'] = true;
    } else {
        $function_parameters['is-encloser'] = false;
    }
} else {
    if( !isset($function_parameters['enclosed-style-type']) ){
        $function_parameters['enclosed-style-type'] = 'contained';
    }
}

/*------------------------------------------------------------
   OPEN MAIN <div>
------------------------------------------------------------*/

echo '<div id="zf--'.$function_parameters['wrapper-id'].'"';

// Print class
if(
    isset($function_parameters['main-div-class-attribute']) &&
    $function_parameters['main-div-class-attribute'] !== ''
){
    echo ' class="'.$function_parameters['main-div-class-attribute'].'"';
}

// Print attributes
if(
    isset($function_parameters['main-div-additional-attributes']) &&
    $function_parameters['main-div-additional-attributes'] !== ''
){
    echo ' '.$function_parameters['main-div-additional-attributes'];
}

echo '>';

/*------------------------------------------------------------
   SEMANTIC TAG
------------------------------------------------------------*/

if(
    isset($function_parameters['additional-semantic-tag']) &&
    $function_parameters['additional-semantic-tag'] !== '' &&
    $this->params['theme']['enable-semantic-outline'] === 'true'
){
    echo '<'.$function_parameters['additional-semantic-tag'];
    if(
        isset($function_parameters['additional-semantic-tag-attributes']) &&
        $function_parameters['additional-semantic-tag-attributes'] !== ''
    ){
        echo ' '.$function_parameters['additional-semantic-tag-attributes'];
    }
    echo '>';
}

/*------------------------------------------------------------
   IS IT CONTAINED?
------------------------------------------------------------*/

if(
    $function_parameters['is-encloser'] &&
    $function_parameters['enclosed-style-type'] === 'contained'
){
    echo '<div id="zf--'.$function_parameters['wrapper-id'].'--encloser" class="zf--encloser">';
}

/*------------------------------------------------------------
   OPEN SKIN <div>
------------------------------------------------------------*/

echo '<div id="zf--'.$function_parameters['wrapper-id'].'--skin" class="clearfix';

// Print class
if(
    isset($function_parameters['skin-div-class-attribute']) &&
    $function_parameters['skin-div-class-attribute'] !== ''
){
    echo ' '.$function_parameters['skin-div-class-attribute'];
}

echo '"'; // Close class

// Print attributes
if(
    isset($function_parameters['skin-div-additional-attributes']) &&
    $function_parameters['skin-div-additional-attributes'] !== ''
){
    echo ' '.$function_parameters['skin-div-additional-attributes'];
}

echo '>';

/*------------------------------------------------------------
   IS IT STRETCHED?
------------------------------------------------------------*/

if(
    $function_parameters['is-encloser'] &&
    $function_parameters['enclosed-style-type'] === 'stretched'
){
    echo '<div id="zf--'.$function_parameters['wrapper-id'].'--encloser" class="zf--encloser">';
}
