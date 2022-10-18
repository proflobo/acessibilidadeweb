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
   BUTTON OPENING
------------------------------------------------------------*/

echo '<a id="zf--'.$function_parameters['tool-id'].'-toolbox-button" role="button" href="'.$this->params['site']['site-current-uri-with-parameters'].'#zf--'.$function_parameters['tool-id'].'-toolbox-panel" class="zf--toolbox-button';

// If the title is defined, apply it to the button
if(
    isset($function_parameters['button-title']) &&
    $function_parameters['button-title'] !== ''
){
    echo ' show-tooltip" title="'.$function_parameters['button-title'];
}
echo '" aria-controls="zf--'.$function_parameters['tool-id'].'-toolbox-panel" aria-expanded="false">';

/*------------------------------------------------------------
   BUTTON ICON
------------------------------------------------------------*/

if(
    isset($function_parameters['button-icon-class']) &&
    $function_parameters['button-icon-class'] !== ''
){
    echo '<span class="zf--toolbox-button--icon '.$function_parameters['button-icon-class'].'" aria-hidden="true"></span>';
}

/*------------------------------------------------------------
   BUTTON TEXT
------------------------------------------------------------*/

echo '<span class="zf--toolbox-button--text">'.$function_parameters['button-text'].'</span>';

/*------------------------------------------------------------
   BUTTON CLOSING
------------------------------------------------------------*/

echo '</a>';
