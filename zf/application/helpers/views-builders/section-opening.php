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

if( !isset($function_parameters['is-encloser']) ){ // duplicated logic in "wrapper-opening.php"
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

if( // Check whether the section heading is enabled:
    isset($function_parameters['section-heading-parameters']) &&
    $this->params['theme']['enable-semantic-outline'] === 'true'
){
    $sectionHeadingEnabled = true;
} else {
    $sectionHeadingEnabled = false;
}

if(
    !isset($function_parameters['semantic-tag']) ||
    $function_parameters['semantic-tag'] === '' ||
    $this->params['theme']['enable-semantic-outline'] === 'false'
){
    $function_parameters['semantic-tag'] = 'div';
    $function_parameters['semantic-tag-attributes'] = '';
}

// --------- Open main <div> --------- //

echo '<div id="zf--'.$function_parameters['section-id'].'"';

if(
    isset($function_parameters['main-div-class-attribute']) &&
    $function_parameters['main-div-class-attribute'] !== ''
){
    echo ' class="'.$function_parameters['main-div-class-attribute'].'"';
}

if(
    isset($function_parameters['main-div-additional-attributes']) &&
    $function_parameters['main-div-additional-attributes'] !== ''
){
    echo ' '.$function_parameters['main-div-additional-attributes'];
}

echo '>';

// --------- Open semantic tag --------- //

echo '<'.$function_parameters['semantic-tag'].' id="zf--'.$function_parameters['section-id'].'--semantic-tag"';

if(
    isset($function_parameters['semantic-tag-attributes']) &&
    $function_parameters['semantic-tag-attributes'] !== ''
){
    echo ' '.$function_parameters['semantic-tag-attributes'];
}

// Note: if the section heading is enabled, print the aria attribute in the main <div>
if(
    $sectionHeadingEnabled &&
    isset($function_parameters['section-heading-parameters']['heading-level']) &&
    $function_parameters['section-heading-parameters']['heading-level'] !== 'disabled'
){
    echo ' aria-labelledby="zf--'.$function_parameters['section-id'].'--section-heading"';
}

echo '>';

// --------- Section heading --------- //

if( $sectionHeadingEnabled ){
    $this->helpers__viewsBuilders__sectionHeading(
        $function_parameters['section-heading-parameters']
    );
}

// --------- Is it contained? --------- //

if(
    $function_parameters['is-encloser'] &&
    $function_parameters['enclosed-style-type'] === 'contained'
){
    echo '<div id="zf--'.$function_parameters['section-id'].'--encloser" class="zf--encloser">';
}

// --------- Expand button --------- //

if(
    isset($function_parameters['section-expand-button']) &&
    $function_parameters['section-expand-button'] === true
){

    echo '<a role="button" id="zf--'.$function_parameters['section-id'].'-expand-button" class="zf--section-expand-button zf--inactive removed-no-js'.( isset($function_parameters['section-expand-button-class']) ? (' '.$function_parameters['section-expand-button-class']) : '' ).'" aria-expanded="false" aria-controls="zf--'.$function_parameters['section-id'].'--skin" href="'.$this->params['site']['site-current-uri-with-parameters'].'#zf--'.$function_parameters['section-id'].'--skin">';

    if( isset($function_parameters['section-expand-button-icon-class']) ){
        echo '<span id="zf--'.$function_parameters['section-id'].'-expand-button-icon" class="zf--section-expand-button-icon '.$function_parameters['section-expand-button-icon-class'].'" aria-hidden="true"></span>';
    }

    echo '<span id="zf--'.$function_parameters['section-id'].'-expand-button-text" class="zf--section-expand-button-text">'.$function_parameters['section-expand-button-text'].'</span>';

    echo '</a>';

}

// --------- Open skin <div> --------- //

echo '<div id="zf--'.$function_parameters['section-id'].'--skin" class="clearfix';

// Skin <div>, class attribute
if(
    isset($function_parameters['skin-div-class-attribute']) &&
    $function_parameters['skin-div-class-attribute'] !== ''
){
    echo ' '.$function_parameters['skin-div-class-attribute'];
}
echo '"'; // Close class=""

// Skin <div>, additional attributes
if(
    isset($function_parameters['skin-div-additional-attributes']) &&
    $function_parameters['skin-div-additional-attributes'] !== '')
{
    echo ' '.$function_parameters['skin-div-additional-attributes'];
}

echo '>';

// --------- Is it stretched? --------- //

if(
    $function_parameters['is-encloser'] &&
    $function_parameters['enclosed-style-type'] === 'stretched'
){
    echo '<div id="zf--'.$function_parameters['section-id'].'--encloser" class="zf--encloser">';
}
