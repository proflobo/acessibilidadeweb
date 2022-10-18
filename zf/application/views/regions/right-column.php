<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['right-column-exists']){

    // ~~~ Right column, opening ~~~ //
    $this->helpers__viewsBuilders__wrapperOpening( array(
        'wrapper-id' => 'right-column'
    ));

    /*----------------------------------------------------------------
       ASIDE RIGHT
    ----------------------------------------------------------------*/
    $this->views__sections__asideRight();

    // ~~~ Right column, closing ~~~ //
    $this->helpers__viewsBuilders__wrapperClosing();

}
