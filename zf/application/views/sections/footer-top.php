<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['guest-views']['footer-top-exists']){

    $this->helpers__viewsBuilders__wrapperOpening( array(
        'wrapper-id' => 'footer-top'
    ));

    $this->helpers__viewsBuilders__groupedHosts( array(
        'grouped-hosts-id' => 'footer-top',
    ));

    $this->helpers__viewsBuilders__wrapperClosing();

}
