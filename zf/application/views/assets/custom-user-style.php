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
   USER STYLES FROM PARAMS
------------------------------------------------------------*/

// --------- Global font-size --------- //
// Note: more priority given in case other frameworks (eg Bootstrap) set a different font-size

echo '#zf__html{font-size:'.$this->params['theme']['default-font-size'].'%;}';

// --------- Custom left/right column width --------- //

if($this->params['theme']['default-columns-width'] === 'false'){
    echo 
        '#zf--body #zf--left-column{width:'.$this->params['theme']['custom-left-column-width'].'%;}'.
        '#zf--body #zf--right-column{width:'.$this->params['theme']['custom-right-column-width'].'%;}'.
        'body.zf--left-column-exists #zf--main-content{width:'.(100 - $this->params['theme']['custom-left-column-width']).'%;}'.
        'body.zf--right-column-exists #zf--main-content{width:'.(100 - $this->params['theme']['custom-right-column-width']).'%;}'.
        'body.zf--left-column-exists.zf--right-column-exists #zf--main-content{width:'.(100 - ($this->params['theme']['custom-left-column-width'] + $this->params['theme']['custom-right-column-width'])).'%;}'
    ;
}

// --------- Custom layout width --------- //

echo '.zf--encloser{max-width:'.$this->params['theme']['max-layout-width'].'px;}';

// --------- Custom logo size --------- //

if(
    $this->params['theme']['logo-max-width'] !== 0 && // Note: intval returns 0 on failure, in this case it's probably set to "auto"
    $this->params['theme']['show-logo'] === 'true' &&
    (
        $this->params['theme']['full-width-logo'] === 'false' || // Enable custom-width in any case if this is false
        ( // Enable custom-width even if full-width-logo is true but the presentation is not centered
            $this->params['theme']['full-width-logo'] === 'true' &&
            $this->params['theme']['presentation-alignment'] !== 'center'
        )
    )
){
    echo
        '#zf__html #zf--body #zf--site-logo{max-width:100%;width:'.$this->params['theme']['logo-max-width'].'px;}'.
        // IMPORTANT NOTE: IE8/7 need few hacks in order to display and resize the image properly;
        // also note that two different hacks are required for side alignment and the center one
        '#zf__html.lt-ie9 #zf--header.zf--site-banner-alignment-center #zf--site-logo{'.
            'width:100%;max-width:'.$this->params['theme']['logo-max-width'].'px;'.
        '}'.
        '#zf__html.lt-ie9 #zf--header.zf--site-banner-alignment-side #zf--site-logo-image{'.
            'width:'.$this->params['theme']['logo-max-width'].'px;max-width:'.$this->params['theme']['logo-max-width'].'px;'.
        '}'
    ;
}

/*------------------------------------------------------------
   CUSTOM USER COLORS
------------------------------------------------------------*/

ob_start(); // Start buffering, it will be minified afterwards

/*----------------------------------------------------------------
   GENERAL (custom user color)
---------------------------------------------------------------- */

// Body Background Color
if($this->params['theme']['custom-user-style--enabled-body-bg'] === 'custom'){ ?>
#zf__html #zf--body{
    background:<?php echo $this->params['theme']['custom-user-style--body-bg'];?>;
}
<?php }

// Body Background Image
if($this->params['theme']['custom-user-style--enable-body-bg-image'] === 'custom'){ ?>
#zf__html #zf--body{
    background-image:url('<?php echo $this->params['site']['site-base-uri'].$this->params['theme']['custom-user-style--body-bg-image-path'];?>');
    background-attachment:<?php echo $this->params['theme']['custom-user-style--body-bg-image-attachment'];?>;
    background-position:
        <?php echo $this->params['theme']['custom-user-style--body-bg-image-position-x'].' '.$this->params['theme']['custom-user-style--body-bg-image-position-y']; ?>;
    background-repeat:<?php echo $this->params['theme']['custom-user-style--body-bg-image-repeat']; ?>;
}
<?php }

// Text Color *no priority here*
if($this->params['theme']['custom-user-style--enabled-text-color'] === 'custom'){ ?>
body{
	color:<?php echo $this->params['theme']['custom-user-style--text-color'];?>;
}
<?php }

// Headings Color *no priority here*
if($this->params['theme']['custom-user-style--enabled-headings-color'] === 'custom'){ ?>
h1, h2, h3, h4, h5, h6{
	text-shadow:none;
	color:<?php echo $this->params['theme']['custom-user-style--headings-color'];?>;
}
<?php }

// Links Color *no priority here*
if($this->params['theme']['custom-user-style--enabled-links-color'] === 'custom'){ ?>
a{
	color:<?php echo $this->params['theme']['custom-user-style--links-color'];?>;
}
a:visited{
	color:<?php echo $this->params['theme']['custom-user-style--visited-links-color'];?>;
}
a:hover, a:focus, a:active{
	color:<?php echo $this->params['theme']['custom-user-style--hover-links-color'];?>;
}
<?php }

// Buttons *no priority here*
if($this->params['theme']['custom-user-style--enabled-buttons'] === 'custom'){ ?>
button,
.button, .button:visited,
[class*="-button-style"], [class*="-button-style"]:visited,
.zf--section-expand-button.grey-button-style, .zf--section-expand-button.grey-button-style:visited,
input[type=button],
input[type=reset],
input[type=submit]{
	text-shadow:none;
	background:<?php echo $this->params['theme']['custom-user-style--buttons-bg'];?>;
	color:<?php echo $this->params['theme']['custom-user-style--buttons-text'];?>;
	border-color:<?php echo $this->params['theme']['custom-user-style--buttons-border-color'];?>;
	<?php if($this->params['theme']['custom-user-style--buttons-border-style'] !== '')
		echo 'border-style:'.$this->params['theme']['custom-user-style--buttons-border-style'].';';?>
	<?php if($this->params['theme']['custom-user-style--buttons-border-width'] !== '')
		echo 'border-width:'.$this->params['theme']['custom-user-style--buttons-border-width'].';';?>
	<?php if($this->params['theme']['custom-user-style--buttons-border-radius'] !== ''){
		echo 'border-radius:'.$this->params['theme']['custom-user-style--buttons-border-radius'].';';
		echo '-moz-border-radius:'.$this->params['theme']['custom-user-style--buttons-border-radius'].';';
		echo '-webkit-border-radius:'.$this->params['theme']['custom-user-style--buttons-border-radius'].';';
		} ?>
}
button:hover,
.button:hover,
[class*="-button-style"]:hover,
.zf--section-expand-button.grey-button-style:hover,
input[type=button]:hover,
input[type=reset]:hover,
input[type=submit]:hover,
button:focus,
.button:focus,
[class*="-button-style"]:focus,
.zf--section-expand-button.grey-button-style:focus,
input[type=button]:focus,
input[type=reset]:focus,
input[type=submit]:focus,
button:active,
.button:active,
[class*="-button-style"]:active,
.zf--section-expand-button.grey-button-style:active,
input[type=button]:active,
input[type=reset]:active,
input[type=submit]:active{
	text-shadow:none;
	background:<?php echo $this->params['theme']['custom-user-style--buttons-bg-hover'];?>;
	color:<?php echo $this->params['theme']['custom-user-style--buttons-text-hover'];?>;
	border-color:<?php echo $this->params['theme']['custom-user-style--buttons-border-color-hover'];?>;
}
<?php }

// Tables *no priority here*
if($this->params['theme']['custom-user-style--enabled-tables'] === 'custom'){ ?>
table, td, tr, th{
	text-shadow:none;
	background:<?php echo $this->params['theme']['custom-user-style--tables-bg'];?>;
	color:<?php echo $this->params['theme']['custom-user-style--tables-text'];?>;
    border-color:<?php echo $this->params['theme']['custom-user-style--tables-border-color'];?>;
    <?php if($this->params['theme']['custom-user-style--tables-border-style'] !== '')
        echo 'border-style:'.$this->params['theme']['custom-user-style--tables-border-style'].';';?>
    <?php if($this->params['theme']['custom-user-style--tables-border-width'] !== '')
        echo 'border-width:'.$this->params['theme']['custom-user-style--tables-border-width'].';';?>
}
tfoot, caption{
	text-shadow:none;
	background:<?php echo $this->params['theme']['custom-user-style--tables-bg'];?>;
	color:<?php echo $this->params['theme']['custom-user-style--tables-text'];?>;
}
th, thead, thead td, thead tr, thead tr:hover, thead tr:hover td{
	text-shadow:none;
	background:<?php echo $this->params['theme']['custom-user-style--tables-header-bg'];?>;
	color:<?php echo $this->params['theme']['custom-user-style--tables-header-text'];?>;
}
<?php }


/*------------------------------------------------------------
   FLUSH THE BUFFER (and minify it)
------------------------------------------------------------*/

echo $this->helpers__contentFilters__genericMinification(ob_get_clean());
