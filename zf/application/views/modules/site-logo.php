<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['theme']['show-logo'] === 'true'){

    echo '<div id="zf--site-logo"><div id="zf--site-logo--skin">';

    /*------------------------------------------------------------
       Is the logo a heading?
    ------------------------------------------------------------*/
    if(
        $this->params['self']['custom-heading-level--site-banner'] !== 'disabled' &&
        $this->params['theme']['show-title'] === 'false'
    ){
        echo '<h'.$this->params['self']['custom-heading-level--site-banner'].' id="zf--site-logo-heading" class="style-reset">';
    }

    /*------------------------------------------------------------
       Is the logo a link to the homepage?
    ------------------------------------------------------------*/
    if($this->params['theme']['enable-logo-link'] === 'true'){
        echo '<a id="zf--site-logo-link" href="'.$this->params['site']['site-base-uri'].'index.php" rel="home">';
    }

    /*------------------------------------------------------------
       Logo <img>
    ------------------------------------------------------------*/

    // --------- ALT attribute init --------- //

    if(
        $this->params['theme']['alt-logo'] === ''
    ) $this->params['theme']['alt-logo'] = $this->params['site']['site-name'];

    // --------- Mobile logo (if set) --------- //

    if(
        $this->params['theme']['enable-mobile-logo'] === 'true' &&
        $this->params['theme']['mobile-logo-path'] !== ''
    ){
        echo
            '<img id="zf--site-logo-image-mobile" src="'.$this->params['theme']['mobile-logo-path'].
            '" alt="'.$this->params['theme']['alt-logo'].'" />'
        ;
    }

    // --------- Default logo --------- //

    echo '<img id="zf--site-logo-image" src="';

    //If no logo is set, keep the default logo ( in the template directory )
    if($this->params['theme']['logo-path'] === ''){
        echo $this->params['site']['zhong-framework-root-uri'].'/assets/img/theme-logo.png';
    } else { //else, print the selected one
        echo $this->params['theme']['logo-path'];
    }

    echo '" alt="'.$this->params['theme']['alt-logo'].'" />';

    /*------------------------------------------------------------
       End link tag
    ------------------------------------------------------------*/

    if($this->params['theme']['enable-logo-link'] === 'true'){
        echo '</a>';
    }

    /*------------------------------------------------------------
       Is the logo a heading?
    ------------------------------------------------------------*/

    if(
        $this->params['self']['custom-heading-level--site-banner'] !== 'disabled' &&
        $this->params['theme']['show-title'] === 'false'
    ){
        echo '</h'.$this->params['self']['custom-heading-level--site-banner'].'>';
    }

    echo '</div></div>'; //end "logo-wrap"
}
