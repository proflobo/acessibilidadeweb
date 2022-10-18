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

if( !isset($function_parameters['heading-level']) ){
    $function_parameters['heading-level'] = 2;
}

if(
    $this->params['theme']['enable-semantic-outline'] === 'false' ||
    $function_parameters['heading-level'] === 'disabled'
){ return; }

/*------------------------------------------------------------
   INITIALIZATION
------------------------------------------------------------*/

if(
    !isset($function_parameters['force-visibility']) ||
    $function_parameters['force-visibility'] !== true
){

    if($function_parameters['heading-additional-classes'] === ''){
        $function_parameters['heading-additional-classes'] = 'visually-hidden';
    } else {
        $function_parameters['heading-additional-classes'] .= ' visually-hidden';
    }

}

/*------------------------------------------------------------
   PRINT THE HEADING
------------------------------------------------------------*/

// Heading opening
if(
    isset($function_parameters['use-role-heading']) &&
    $function_parameters['use-role-heading'] === true
){
    echo '<div role="heading" aria-level="'.$function_parameters['heading-level'].'" ';
} else {
    echo '<h'.$function_parameters['heading-level'].' ';
}

// Is ID defined?
if(
    isset($function_parameters['related-section-id']) &&
    $function_parameters['related-section-id'] !== ''
){
    echo 'id="zf--'.$function_parameters['related-section-id'].'--section-heading" ';
}

// Print the class(es)
echo 'class="zf--section-heading';
if(
    isset($function_parameters['heading-additional-classes']) &&
    $function_parameters['heading-additional-classes'] !== ''
){
    echo ' '.$function_parameters['heading-additional-classes'];
}

// Close the opening tag
echo '">';

// Print heading content
echo $function_parameters['heading-content'];

// Heading closing
if(
    isset($function_parameters['use-role-heading']) &&
    $function_parameters['use-role-heading'] === true
){
    echo '</div>';
} else {
    echo '</h'.$function_parameters['heading-level'].'>';
}
