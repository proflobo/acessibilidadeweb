<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo '<ul>';

// Main content
// Note that, if anything is loaded in aside-top-*, the anchor will target the outer content container
echo '<li><a href="' . ( $this->params['guest-views']['aside-top-exists'] ? '#zf--main-body--skin' : '#zf--main-content--skin' ) . '" accesskey="1" id="zf--quick-access-menu-anchor-main-content">'.$this->global_vars['language']['content'].' - <span class="zf--quick-access-menu-accesskey-text">'.$this->global_vars['language']['accesskey'].' 1</span>'.'</a></li>';

// Main menu
if(
    $this->params['guest-views']['main-menu-exists'] &&
    $this->params['self']['custom-heading-level--main-menu'] !== 'disabled'
){

    // Note: this anchor doesn't link to #--skin cause in mobile it's collapsed
    echo '<li><a href="#zf--main-menu" accesskey="2" id="zf--quick-access-menu-anchor-main-menu">'.$this->global_vars['language']['main-menu'].' - <span class="zf--quick-access-menu-accesskey-text">'.$this->global_vars['language']['accesskey'].' 2</span>'.'</a></li>';

}

// Tools
if( // Note: condition duplicated in toolbox.php
    (
        $this->params['guest-views']['search-exists'] &&
        $this->params['self']['search-position'] === 'header-tool'
    ) ||
    $this->params['guest-views']['login-exists']
){

    echo '<li><a href="#zf--toolbox--skin" id="zf--quick-access-menu-anchor-toolbox">'.$this->global_vars['language']['tool-pane'].'</a></li>';

}

// Footer
if(
    $this->params['guest-views']['footer-exists'] &&
    $this->params['self']['custom-heading-level--footer'] !== 'disabled'
){

    echo '<li><a href="#zf--footer--skin" id="zf--quick-access-menu-anchor-footer">'.$this->global_vars['language']['footer'].'</a></li>';

}

echo '</ul>';
