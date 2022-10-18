<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->params['site'] = array(

    // Website name
    'site-name' => 
        htmlspecialchars(JFactory::getApplication()->getCfg('sitename'), ENT_QUOTES, 'UTF-8'),

    // Website language
    'site-language' => 
        htmlspecialchars(strtolower(JFactory::getLanguage()->getTag()), ENT_QUOTES, 'UTF-8'),

    // Website text direction
    'site-text-direction' => 
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->direction, ENT_QUOTES, 'UTF-8'),

    // Current URI
    'site-current-uri' => 
        htmlspecialchars(JURI::current(), ENT_QUOTES, 'UTF-8'),

    // Current URI with parameters (e.g. ?param=value)
    'site-current-uri-with-parameters' => 
        htmlspecialchars(JFactory::getURI(), ENT_QUOTES, 'UTF-8'),

    // Base URI
    'site-base-uri' => 
        htmlspecialchars(JURI::base(), ENT_QUOTES, 'UTF-8'),

    // Base path
    // IMPORTANT: it does not include the ending "/", e.g. '' (empty string) if the site is installed in the root directory, '/gallery/demo' if it is installed in a sub directory
    'site-base-path' => 
        htmlspecialchars(JURI::base(true), ENT_QUOTES, 'UTF-8'),

    // Cookies path
    // e.g. '/' if the site is installed in the root directory, '/gallery/demo/' if it is installed in a sub directory
    'cookies-base-path' => 
        htmlspecialchars(JURI::base(true).'/', ENT_QUOTES, 'UTF-8'),

    // Template name
    'site-theme-name' => 
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->template, ENT_QUOTES, 'UTF-8'),

    // Template URI
    'site-theme-uri' => 
        htmlspecialchars(JURI::base().'templates/'.$this->params['parent-platform']['joomla-instance']->template, ENT_QUOTES, 'UTF-8'),

    // Zhong Framework root URI
    'zhong-framework-root-uri' => 
        htmlspecialchars(JURI::base().'templates/'.$this->params['parent-platform']['joomla-instance']->template.'/zf', ENT_QUOTES, 'UTF-8'),

    // Zhong Framework assets URI
    'zhong-framework-assets-uri' => 
        htmlspecialchars(JURI::base().'templates/'.$this->params['parent-platform']['joomla-instance']->template.'/zf/assets', ENT_QUOTES, 'UTF-8')

);
