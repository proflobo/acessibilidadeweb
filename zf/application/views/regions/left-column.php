<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['left-column-exists']){

    // ~~~ Left column, opening ~~~ //
    $this->helpers__viewsBuilders__wrapperOpening( array(
        'wrapper-id' => 'left-column'
    ));

    /*----------------------------------------------------------------
       SIDE MENU
    ----------------------------------------------------------------*/
    $this->views__sections__sideMenu();

    /*----------------------------------------------------------------
       ASIDE-LEFT
    ----------------------------------------------------------------*/
    $this->views__sections__asideLeft();

    // ~~~ Left column, closing ~~~ //
    $this->helpers__viewsBuilders__wrapperClosing();

}
