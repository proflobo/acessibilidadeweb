<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

switch($this->params['site']['site-language']){
    case "it-it":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/it-IT.php';
        break;
    case "fr-fr":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/fr-FR.php';
        break;
    case "fr-ca":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/fr-FR.php';
        break;
    case "de-de":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/de-DE.php';
        break;
    case "zh-cn":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/zh-CN.php';
        break;
    case "zh-tw":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/zh-TW.php';
        break;
    case "nb-no":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/nb-NO.php';
        break;
    case "nl-nl":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/nl-NL.php';
        break;
    case "ru-ru":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/ru-RU.php';
        break;
    case "es-es":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/es-ES.php';
        break;
    case "hr-hr":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/hr-HR.php';
        break;
    case "el-gr":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/el-GR.php';
        break;
    case "pl-pl":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/pl-PL.php';
        break;
    case "sl-si":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/sl-SI.php';
        break;
    case "fa-ir":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/fa-IR.php';
        break;
    case "ms-my":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/ms-MY.php';
        break;
    case "sv-se":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/sv-SE.php';
        break;
    case "sw-ke":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/sw-KE.php';
        break;
    case "tr-tr":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/tr-TR.php';
        break;
    case "ar-aa":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/ar-AA.php';
        break;
    case "he-il":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/he-IL.php';
        break;
    case "hu-hu":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/hu-HU.php';
        break;
    case "sk-sk":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/sk-SK.php';
        break;
    case "th-th":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/th-TH.php';
        break;
    case "hi-in":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/hi-IN.php';
        break;
    case "af-za":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/af-ZA.php';
        break;
    case "pt-pt":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/pt-PT.php';
        break;
    case "pt-br":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/pt-PT.php';
        break;
    case "cs-cz":
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/cs-CZ.php';
        break;
    default: // The English language is loaded by default
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/languages/en-GB.php';
}
