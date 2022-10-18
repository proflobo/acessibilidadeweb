<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if( $this->params['theme']['enable-mobile-link'] === 'true' ){

    echo
        '<a id="zf--desktop-site-switcher-link" role="button" href="#" class="removed-no-js" rel="nofollow">'.$this->global_vars['language']['desktop-layout-title'].'</a>'. // hidden in desktop-layout
        '<a id="zf--mobile-site-switcher-link" role="button" href="#" class="removed-no-js" rel="nofollow">'.$this->global_vars['language']['mobile-layout-title'].'</a>' // hidden in mobile-layout
    ;

}