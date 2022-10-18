<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- Get the Platform version --------- //

$this->params['parent-platform']['version-extended'] = JPlatform::getShortVersion();

if(substr($this->params['parent-platform']['version-extended'], 0, 2) === '11'){
    $this->params['parent-platform']['release-class'] = 'Joomla25';
}
elseif(
    substr($this->params['parent-platform']['version-extended'], 0, 2) === '12' || 
    substr($this->params['parent-platform']['version-extended'], 0, 2) === '13'
){
    $this->params['parent-platform']['release-class'] = 'Joomla3';
} else {
    // If nothing was matched then probably a new version of Joomla has been released, so keep the last version active
    $this->params['parent-platform']['release-class'] = 'Joomla3';
}

// --------- Additional body classes --------- //

// Current page class suffix (by active menu item)
$activeMenu = JFactory::getApplication()->getMenu()->getActive();
$this->params['parent-platform']['additional-body-classes'] = ''; // Empty initial value
if( is_object($activeMenu) ){
    $this->params['parent-platform']['additional-body-classes'] .=
        htmlspecialchars($activeMenu->params->get('pageclass_sfx'), ENT_QUOTES, 'UTF-8');
}

// --------- Is homepage --------- //

$this->params['parent-platform']['is-homepage'] = false;
if ($activeMenu == JFactory::getApplication()->getMenu()->getDefault(JFactory::getLanguage()->getTag())) {
    $this->params['parent-platform']['is-homepage'] = true;
}
