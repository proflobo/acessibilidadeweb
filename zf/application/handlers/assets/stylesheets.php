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
   INITIALIZATION
------------------------------------------------------------*/

$this->global_vars['assets']['head-stylesheets'] = array();

/*------------------------------------------------------------
   ADD THE CURRENT LAYOUT'S STYLE
------------------------------------------------------------*/

array_push($this->global_vars['assets']['head-stylesheets'],
    $this->params['site']['zhong-framework-assets-uri'].'/css/'.$this->params['self']['assets-mode'].'/main.css?zf-v='.ZHONG_FRAMEWORK_VERSION
);

/*------------------------------------------------------------
   ADD THE PARENT PLATFORM'S STYLE
------------------------------------------------------------*/

// --------- Joomla --------- //

if($this->params['parent-platform']['name'] === 'Joomla'){
    
    // Joomla 1.6 or 1.7 or 2.5 = Platform version 11
    if(
        $this->params['parent-platform']['release-class'] === 'Joomla16' ||
        $this->params['parent-platform']['release-class'] === 'Joomla25'
    ){
        array_push($this->global_vars['assets']['head-stylesheets'],
            $this->params['site']['zhong-framework-assets-uri'].'/css/'.$this->params['self']['assets-mode'].'/platforms/Joomla/joomla25.css?zf-v='.ZHONG_FRAMEWORK_VERSION
        );
    }

    // Joomla 3.x = Platform version 12 (or higher)
    if($this->params['parent-platform']['release-class'] === 'Joomla3'){
        array_push($this->global_vars['assets']['head-stylesheets'],
            $this->params['site']['zhong-framework-assets-uri'].'/css/'.$this->params['self']['assets-mode'].'/platforms/Joomla/joomla3.css?zf-v='.ZHONG_FRAMEWORK_VERSION
        );
    }

}
