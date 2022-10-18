<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http:// www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// Submenus effect (+ string init!!)
$this->global_vars['views']['body-tag-classes'] = 'zf--submenus-effect-'.$this->params['theme']['floating-submenus-effect'];

// Right/Left columns exist
if( $this->params['guest-views']['right-column-exists'] ){
    $this->global_vars['views']['body-tag-classes'] .= ' zf--right-column-exists';
} else {
    $this->global_vars['views']['body-tag-classes'] .= ' zf--right-column-absent';
}
if( $this->params['guest-views']['left-column-exists'] ){
    $this->global_vars['views']['body-tag-classes'] .= ' zf--left-column-exists';
} else {
    $this->global_vars['views']['body-tag-classes'] .= ' zf--left-column-absent';
}

// ZF's theme
$this->global_vars['views']['body-tag-classes'] .= ' zf-theme-skin--'.$this->params['self']['theme-skin-id'];

// Parent platform
$this->global_vars['views']['body-tag-classes'] .= ' zf--parent-platform-'.$this->params['parent-platform']['name'];
$this->global_vars['views']['body-tag-classes'] .= ' zf--parent-platform-release-class-'.$this->params['parent-platform']['release-class'];
if($this->params['parent-platform']['additional-body-classes'] !== ''){
    $this->global_vars['views']['body-tag-classes'] .= ' '.$this->params['parent-platform']['additional-body-classes'];
}
