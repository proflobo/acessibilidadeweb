<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if(
    $this->params['parent-platform']['is-homepage'] &&
    $this->params['theme']['force-full-width-homepage'] === 'true'
){

    $this->params['self']['main-body-middle-layout-width-type'] = 'full-width';

    $this->global_vars['views']['body-tag-classes'] .= ' zf--main-content-area-no-spacing';
    $this->global_vars['views']['body-tag-classes'] = str_replace(
        'zf--left-column-exists','zf--left-column-absent',
        $this->global_vars['views']['body-tag-classes']
    );
    $this->global_vars['views']['body-tag-classes'] = str_replace(
        'zf--right-column-exists','zf--right-column-absent',
        $this->global_vars['views']['body-tag-classes']
    );

    $this->params['guest-views']['aside-top-exists'] = 0;
    $this->params['guest-views']['aside-bottom-exists'] = 0;
    $this->params['guest-views']['left-column-exists'] = 0;
    $this->params['guest-views']['right-column-exists'] = 0;

}
