<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// --------- Title & subtitle, opening --------- //

if(
    $this->params['theme']['show-title'] === 'true' ||
    $this->params['theme']['show-subtitle'] === 'true'
){
    echo '<div id="zf--site-titles"><div id="zf--site-titles--skin">';
}

// --------- The title --------- //

if($this->params['theme']['show-title'] === 'true'){
    echo '<'.
    (
        $this->params['self']['custom-heading-level--site-banner'] === 'disabled' ?
        'div' :
        ('h'. $this->params['self']['custom-heading-level--site-banner'])
    ).
    ' id="zf--site-title">'.
        $this->params['theme']['title'].
    '</'.
    (
        $this->params['self']['custom-heading-level--site-banner'] === 'disabled' ?
        'div' :
        ('h'. $this->params['self']['custom-heading-level--site-banner'])
    ).
    '>';
}
// If the title and logo are disabled, then force a hidden heading
if($this->params['theme']['show-title'] === 'false' && $this->params['theme']['show-logo'] === 'false'){
    echo '<h1 id="zf--site-name-heading" class="visually-hidden">'.$this->params['site']['site-name'].'</h1>';
}

// --------- The subtitle --------- //

if($this->params['theme']['show-subtitle'] === 'true'){
    echo '<div id="zf--site-subtitle">'.$this->params['theme']['subtitle'].'</div>';
}

// --------- Title & subtitle, closing --------- //

if($this->params['theme']['show-title'] === 'true' || $this->params['theme']['show-subtitle'] === 'true'){
    echo '</div></div>';
}
