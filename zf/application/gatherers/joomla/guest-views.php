<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- Head --------- //

// Initialize the buffer
$this->guest_views['head'] = '';

//If Joomla3, import twitter bootstrap + other head includes
if($this->params['parent-platform']['release-class'] === 'Joomla3'){
    $this->guest_views['head'] .= JHtml::_('bootstrap.framework');
    //Load optional RTL Bootstrap CSS? (try to de-comment one of the lines below if you're having problem with RTL languages)
    //JHtml::_('bootstrap.loadCss', false, ZHONGFRAMEWORK_WEBSITE_TEXT_DIRECTION);
    //JHtml::_('bootstrap.loadCss'); //For Joomla >3.2
}

//Include Joomla head (note: this is not flushed by default, it could be needed by other components)
$this->guest_views['head'] .= '<jdoc:include type="head" />';

// --------- Debug --------- //

$this->guest_views['system-debug'] = '<jdoc:include type="modules" name="debug" style="xhtml" />';

// --------- Main content --------- //

$this->guest_views['main-article'] =
    '<jdoc:include type="component" style="xhtml" />';

// --------- All other modules --------- //

$this->guest_views['breadcrumbs'] =
    '<jdoc:include type="modules" name="breadcrumbs" />';

$this->guest_views['site-banner'] =
    '<jdoc:include type="modules" name="site-banner" />';

$this->guest_views['support-menu'] =
    '<jdoc:include type="modules" name="support-menu" />';

$this->guest_views['footer-credits'] =
    '<jdoc:include type="modules" name="footer-credits" />';

$this->guest_views['main-menu'] =
    '<jdoc:include type="modules" name="main-menu" />';

$this->guest_views['aside-left'] =
    '<jdoc:include type="modules" name="aside-left" style="xhtml" />';

$this->guest_views['login'] =
    '<jdoc:include type="modules" name="login" style="xhtml" />';

$this->guest_views['system-messages'] =
    '<jdoc:include type="message" style="xhtml" />';

$this->guest_views['language-switcher'] =
    '<jdoc:include type="modules" name="language-switcher" />';

$this->guest_views['header-aside'] =
    '<jdoc:include type="modules" name="header-aside" />';

$this->guest_views['aside-right'] =
    '<jdoc:include type="modules" name="aside-right" style="xhtml" />';

$this->guest_views['search'] =
    '<jdoc:include type="modules" name="search" />';

$this->guest_views['footer-menu'] =
    '<jdoc:include type="modules" name="footer-menu" />';

$this->guest_views['side-menu'] =
    '<jdoc:include type="modules" name="side-menu" style="xhtml" />';

$this->guest_views['alerts-panel'] =
    '<jdoc:include type="modules" name="alerts-panel" />';

$this->guest_views['aside-top-A'] =
    '<jdoc:include type="modules" name="aside-top-A" style="xhtml"/>';

$this->guest_views['aside-top-B1'] =
    '<jdoc:include type="modules" name="aside-top-B1" style="xhtml"/>';

$this->guest_views['aside-top-B2'] =
    '<jdoc:include type="modules" name="aside-top-B2" style="xhtml"/>';

$this->guest_views['aside-top-C1'] =
    '<jdoc:include type="modules" name="aside-top-C1" style="xhtml"/>';

$this->guest_views['aside-top-C2'] =
    '<jdoc:include type="modules" name="aside-top-C2" style="xhtml"/>';

$this->guest_views['aside-top-C3'] =
    '<jdoc:include type="modules" name="aside-top-C3" style="xhtml"/>';

$this->guest_views['aside-top-D1'] =
    '<jdoc:include type="modules" name="aside-top-D1" style="xhtml"/>';

$this->guest_views['aside-top-D2'] =
    '<jdoc:include type="modules" name="aside-top-D2" style="xhtml"/>';

$this->guest_views['aside-top-D3'] =
    '<jdoc:include type="modules" name="aside-top-D3" style="xhtml"/>';

$this->guest_views['aside-top-D4'] =
    '<jdoc:include type="modules" name="aside-top-D4" style="xhtml"/>';

$this->guest_views['aside-bottom-A'] =
    '<jdoc:include type="modules" name="aside-bottom-A" style="xhtml"/>';

$this->guest_views['aside-bottom-B1'] =
    '<jdoc:include type="modules" name="aside-bottom-B1" style="xhtml"/>';

$this->guest_views['aside-bottom-B2'] =
    '<jdoc:include type="modules" name="aside-bottom-B2" style="xhtml"/>';

$this->guest_views['aside-bottom-C1'] =
    '<jdoc:include type="modules" name="aside-bottom-C1" style="xhtml"/>';

$this->guest_views['aside-bottom-C2'] =
    '<jdoc:include type="modules" name="aside-bottom-C2" style="xhtml"/>';

$this->guest_views['aside-bottom-C3'] =
    '<jdoc:include type="modules" name="aside-bottom-C3" style="xhtml"/>';

$this->guest_views['aside-bottom-D1'] =
    '<jdoc:include type="modules" name="aside-bottom-D1" style="xhtml"/>';

$this->guest_views['aside-bottom-D2'] =
    '<jdoc:include type="modules" name="aside-bottom-D2" style="xhtml"/>';

$this->guest_views['aside-bottom-D3'] =
    '<jdoc:include type="modules" name="aside-bottom-D3" style="xhtml"/>';

$this->guest_views['aside-bottom-D4'] =
    '<jdoc:include type="modules" name="aside-bottom-D4" style="xhtml"/>';

$this->guest_views['main-top-A'] =
    '<jdoc:include type="modules" name="main-top-A" style="xhtml"/>';

$this->guest_views['main-top-B1'] =
    '<jdoc:include type="modules" name="main-top-B1" style="xhtml"/>';

$this->guest_views['main-top-B2'] =
    '<jdoc:include type="modules" name="main-top-B2" style="xhtml"/>';

$this->guest_views['main-top-C1'] =
    '<jdoc:include type="modules" name="main-top-C1" style="xhtml"/>';

$this->guest_views['main-top-C2'] =
    '<jdoc:include type="modules" name="main-top-C2" style="xhtml"/>';

$this->guest_views['main-top-C3'] =
    '<jdoc:include type="modules" name="main-top-C3" style="xhtml"/>';

$this->guest_views['main-top-D1'] =
    '<jdoc:include type="modules" name="main-top-D1" style="xhtml"/>';

$this->guest_views['main-top-D2'] =
    '<jdoc:include type="modules" name="main-top-D2" style="xhtml"/>';

$this->guest_views['main-top-D3'] =
    '<jdoc:include type="modules" name="main-top-D3" style="xhtml"/>';

$this->guest_views['main-top-D4'] =
    '<jdoc:include type="modules" name="main-top-D4" style="xhtml"/>';

$this->guest_views['footer-top-A'] =
    '<jdoc:include type="modules" name="footer-top-A" style="xhtml"/>';

$this->guest_views['footer-top-B1'] =
    '<jdoc:include type="modules" name="footer-top-B1" style="xhtml"/>';

$this->guest_views['footer-top-B2'] =
    '<jdoc:include type="modules" name="footer-top-B2" style="xhtml"/>';

$this->guest_views['footer-top-C1'] =
    '<jdoc:include type="modules" name="footer-top-C1" style="xhtml"/>';

$this->guest_views['footer-top-C2'] =
    '<jdoc:include type="modules" name="footer-top-C2" style="xhtml"/>';

$this->guest_views['footer-top-C3'] =
    '<jdoc:include type="modules" name="footer-top-C3" style="xhtml"/>';

$this->guest_views['footer-top-D1'] =
    '<jdoc:include type="modules" name="footer-top-D1" style="xhtml"/>';

$this->guest_views['footer-top-D2'] =
    '<jdoc:include type="modules" name="footer-top-D2" style="xhtml"/>';

$this->guest_views['footer-top-D3'] =
    '<jdoc:include type="modules" name="footer-top-D3" style="xhtml"/>';

$this->guest_views['footer-top-D4'] =
    '<jdoc:include type="modules" name="footer-top-D4" style="xhtml"/>';
