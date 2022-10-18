<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->global_vars['assets']['php-js-bridge-params'] = array(

    'defaultFontSize' =>
        $this->params['theme']['default-font-size'],

    'defaultLayoutWidth' =>
        $this->params['theme']['max-layout-width'],

    'tooltipsEnabled' =>
        '\''.$this->params['self']['enable-javascript-tooltips'].'\'',

    'enableMobileSwitcher' =>
        $this->params['theme']['enable-mobile-link'],

    'enableFontSizeRelativizer' =>
        $this->params['self']['enable-font-size-relativizer'],

    'alertsPanelCookieAware' =>
        $this->params['theme']['alerts-panel--cookie-aware'],

    'parentPlatform' =>
        '\''.$this->params['parent-platform']['name'].'\'',

    'parentPlatformReleaseClass' =>
        '\''.$this->params['parent-platform']['release-class'].'\'',

    'enableSemanticOutline' =>
        $this->params['theme']['enable-semantic-outline'],

);

$this->global_vars['assets']['php-js-bridge-lang'] = array(

    'languageOptions' =>
        '\''.str_replace('\'', '', html_entity_decode($this->global_vars['language']['language-options'], ENT_NOQUOTES, 'UTF-8') ).'\'',

    'breadcrumbs' =>
        '\''.str_replace('\'', '', html_entity_decode($this->global_vars['language']['breadcrumbs'], ENT_NOQUOTES, 'UTF-8') ).'\'',

    'footerMenu' =>
        '\''.str_replace('\'', '', html_entity_decode($this->global_vars['language']['footer-menu'], ENT_NOQUOTES, 'UTF-8') ).'\'',

);
