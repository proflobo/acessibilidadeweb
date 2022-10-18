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
   OPEN MAIN <div>
------------------------------------------------------------*/

echo '<div id="zf--'.$function_parameters['tool-id'].'-toolbox-panel" class="zf--toolbox-panel" aria-atomic="true" aria-live="polite">';

/*------------------------------------------------------------
   OPEN SKIN <div>
------------------------------------------------------------*/

echo '<div id="zf--'.$function_parameters['tool-id'].'-toolbox-panel--skin" class="zf--toolbox-panel--skin clearfix">';

echo '<span class="zf--toolbox-panel-top-arrow" aria-hidden="true"></span>';
