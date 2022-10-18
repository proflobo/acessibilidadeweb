<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// ~~~ Main content, opening ~~~ //
$this->helpers__viewsBuilders__sectionOpening( array(

    'section-id' => 'main-content',

    'main-div-class-attribute' => '',
    'main-div-additional-attributes' => '',
    'skin-div-class-attribute' => '',
    'skin-div-additional-attributes' => '',

    'semantic-tag' => 'main',
    'semantic-tag-attributes' => 'role="main"'

));

/*------------------------------------------------------------
   BREADCRUMBS
------------------------------------------------------------*/
if( // This check is included only for backward compatibility; it will be removed in future versions
    $this->params['self']['restore-top-bar'] !== 'true'
){
    $this->views__sections__breadcrumbs();
}

/*------------------------------------------------------------
   SYSTEM MESSAGES
------------------------------------------------------------*/
$this->helpers__views__printGuestView('system-messages');

/*------------------------------------------------------------
   MAIN TOP
------------------------------------------------------------*/
$this->views__sections__mainTop();

/*------------------------------------------------------------
   MAIN CONTENT
------------------------------------------------------------*/

$this->helpers__viewsBuilders__wrapperOpening( array(
    'wrapper-id' => 'main-article'
));

$this->helpers__views__printGuestView('main-article');

$this->helpers__viewsBuilders__wrapperClosing();

// ~~~ Main content, closing ~~~ //
$this->helpers__viewsBuilders__sectionClosing( array(
    'closing-semantic-tag' => 'main',
));
