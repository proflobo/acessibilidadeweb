<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->params['guest-views'] = array(

/*------------------------------------------------------------
   GUEST VIEWS EXISTENCE
------------------------------------------------------------*/

    // main menu exists?
    'side-menu-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('side-menu')),
    // left module exists?
    'aside-left-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-left')),
    // login module exists?
    'login-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('login')),
    // Left column exists?
    'left-column-exists' => (
        intval($this->params['parent-platform']['joomla-instance']->countModules('side-menu')) ||
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-left'))
    ),

    // Right module exists?
    'aside-right-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-right')),
    // Right column exists?
    'right-column-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-right')),

    // Footer credits mod exists?
    'footer-credits-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-credits')),
    // Footer menu mod exists?
    'footer-menu-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-menu')),

    // Language switcher module exists?
    'language-switcher-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('language-switcher')),

    // Main menu module exists?
    'main-menu-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-menu')),

    // Search module exists?
    'search-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('search')),

    // Breadcrumb module exists?
    'breadcrumb-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('breadcrumbs')),

    // Support menu module exists? 
    'support-menu-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('support-menu')),

    // Header aside module exists? 
    'header-aside-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('header-aside')),

    // Site-banner module exists? 
    'site-banner-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('site-banner')),

    // Alerts-panel module exists? 
    'alerts-panel-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('alerts-panel')),

    // Footer exists? 
    'footer-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-A or footer-top-B1 or footer-top-B2 or footer-top-C1 or footer-top-C2 or footer-top-C3 or footer-top-D1 or footer-top-D2 or footer-top-D3 or footer-top-D4 or footer-menu or footer-credits')),

    'footer-content-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-A or footer-top-B1 or footer-top-B2 or footer-top-C1 or footer-top-C2 or footer-top-C3 or footer-top-D1 or footer-top-D2 or footer-top-D3 or footer-top-D4 or footer-credits')),

    // Hosts groups exist?
    'aside-top-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-A or aside-top-B1 or aside-top-B2 or aside-top-C1 or aside-top-C2 or aside-top-C3 or aside-top-D1 or aside-top-D2 or aside-top-D3 or aside-top-D4')),

    'aside-bottom-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-A or aside-bottom-B1 or aside-bottom-B2 or aside-bottom-C1 or aside-bottom-C2 or aside-bottom-C3 or aside-bottom-D1 or aside-bottom-D2 or aside-bottom-D3 or aside-bottom-D4')),

    'main-top-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-A or main-top-B1 or main-top-B2 or main-top-C1 or main-top-C2 or main-top-C3 or main-top-D1 or main-top-D2 or main-top-D3 or main-top-D4')),

    'footer-top-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-A or footer-top-B1 or footer-top-B2 or footer-top-C1 or footer-top-C2 or footer-top-C3 or footer-top-D1 or footer-top-D2 or footer-top-D3 or footer-top-D4')),

    'aside-top-A-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-A')),
    'aside-top-B1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-B1')),
    'aside-top-B2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-B2')),
    'aside-top-C1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-C1')),
    'aside-top-C2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-C2')),
    'aside-top-C3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-C3')),
    'aside-top-D1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-D1')),
    'aside-top-D2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-D2')),
    'aside-top-D3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-D3')),
    'aside-top-D4-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-top-D4')),

    'aside-bottom-A-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-A')),
    'aside-bottom-B1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-B1')),
    'aside-bottom-B2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-B2')),
    'aside-bottom-C1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-C1')),
    'aside-bottom-C2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-C2')),
    'aside-bottom-C3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-C3')),
    'aside-bottom-D1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-D1')),
    'aside-bottom-D2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-D2')),
    'aside-bottom-D3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-D3')),
    'aside-bottom-D4-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('aside-bottom-D4')),

    'main-top-A-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-A')),
    'main-top-B1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-B1')),
    'main-top-B2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-B2')),
    'main-top-C1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-C1')),
    'main-top-C2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-C2')),
    'main-top-C3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-C3')),
    'main-top-D1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-D1')),
    'main-top-D2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-D2')),
    'main-top-D3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-D3')),
    'main-top-D4-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('main-top-D4')),

    'footer-top-A-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-A')),
    'footer-top-B1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-B1')),
    'footer-top-B2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-B2')),
    'footer-top-C1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-C1')),
    'footer-top-C2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-C2')),
    'footer-top-C3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-C3')),
    'footer-top-D1-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-D1')),
    'footer-top-D2-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-D2')),
    'footer-top-D3-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-D3')),
    'footer-top-D4-exists' =>
        intval($this->params['parent-platform']['joomla-instance']->countModules('footer-top-D4'))

);
