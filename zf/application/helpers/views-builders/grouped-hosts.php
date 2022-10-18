<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

/*------------------------------------------------------------
   INIT
------------------------------------------------------------*/

// Just create a shortcut:
$grouped_hosts_id = $function_parameters['grouped-hosts-id'];

/*------------------------------------------------------------
   ROW "A", 1 HOST
------------------------------------------------------------*/

if( $this->params['guest-views'][$grouped_hosts_id.'-A-exists'] ){

    // --------- Row opening --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-row-A" class="zf--grouped-hosts-row clearfix">';

    // --------- A --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-A" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-A'].'%-md">';
    echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-A'].'">';
    $this->helpers__views__printGuestView($grouped_hosts_id.'-A');
    echo '</div></div>';
        
    // --------- Row closing --------- //

    echo '</div>';

}

/*------------------------------------------------------------
   ROW "B", 2 HOSTS
------------------------------------------------------------*/

if(
    $this->params['guest-views'][$grouped_hosts_id.'-B1-exists'] || 
    $this->params['guest-views'][$grouped_hosts_id.'-B2-exists']
){

    // --------- Row opening --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-row-B" class="zf--grouped-hosts-row clearfix">';

    // --------- B-1 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-B1" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-B1'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-B1-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-B1'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-B1');
        echo '</div>';          
    }
    echo '</div>';

    // --------- B-2 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-B2" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-B2'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-B2-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-B2'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-B2');
        echo '</div>';          
    }
    echo '</div>';
    
    // --------- Row closing --------- //

    echo '</div>';

}

/*------------------------------------------------------------
   ROW "C", 3 HOSTS
------------------------------------------------------------*/

if(
    $this->params['guest-views'][$grouped_hosts_id.'-C1-exists'] || 
    $this->params['guest-views'][$grouped_hosts_id.'-C2-exists'] || 
    $this->params['guest-views'][$grouped_hosts_id.'-C3-exists']
){

    // --------- Row opening --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-row-C" class="zf--grouped-hosts-row clearfix">';

    // --------- C-1 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-C1" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-C1'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-C1-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-C1'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-C1');
        echo '</div>';          
    }
    echo '</div>';

    // --------- C-2 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-C2" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-C2'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-C2-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-C2'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-C2');
        echo '</div>';          
    }
    echo '</div>';

    // --------- C-3 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-C3" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-C3'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-C3-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-C3'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-C3');
        echo '</div>';          
    }
    echo '</div>';
    
    // --------- Row closing --------- //

    echo '</div>';

}

/*------------------------------------------------------------
   ROW "D", 4 HOSTS
------------------------------------------------------------*/

if(
    $this->params['guest-views'][$grouped_hosts_id.'-D1-exists'] || 
    $this->params['guest-views'][$grouped_hosts_id.'-D2-exists'] || 
    $this->params['guest-views'][$grouped_hosts_id.'-D3-exists'] || 
    $this->params['guest-views'][$grouped_hosts_id.'-D4-exists']
){

    // --------- Row opening --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-row-D" class="zf--grouped-hosts-row clearfix">';

    // --------- D-1 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-D1" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-D1'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-D1-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-D1'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-D1');
        echo '</div>';          
    }
    echo '</div>';

    // --------- D-2 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-D2" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-D2'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-D2-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-D2'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-D2');
        echo '</div>';          
    }
    echo '</div>';

    // --------- D-3 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-D3" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-D3'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-D3-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-D3'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-D3');
        echo '</div>';          
    }
    echo '</div>';

    // --------- D-4 --------- //

    echo '<div id="zf--'.$grouped_hosts_id.'-D4" ';
    echo 'class="zf--grouped-host zf--float-left-md zf--width-'.$this->params['theme']['custom-block-width--'.$grouped_hosts_id.'-D4'].'%-md">';
    if($this->params['guest-views'][$grouped_hosts_id.'-D4-exists']){
        echo '<div class="zf--grouped-host--skin zf--block-coat--'.$this->params['theme']['block-coat--'.$grouped_hosts_id.'-D4'].'">';            
        $this->helpers__views__printGuestView($grouped_hosts_id.'-D4');
        echo '</div>';          
    }
    echo '</div>';
    
    // --------- Row closing --------- //

    echo '</div>';

}
