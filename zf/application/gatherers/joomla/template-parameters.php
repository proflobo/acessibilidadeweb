<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

$this->params['theme'] = array(

/*==========================================================================
   BASIC OPTIONS
==========================================================================*/

    'title' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_title'), ENT_QUOTES, 'UTF-8'),

    'show-title' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_showTitle'), ENT_QUOTES, 'UTF-8'),

    'subtitle' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_subtitle'), ENT_QUOTES, 'UTF-8'),

    'show-subtitle' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_showSubtitle'), ENT_QUOTES, 'UTF-8'),

    'show-logo' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_showLogo'), ENT_QUOTES, 'UTF-8'),

    'logo-path' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_logoPath'), ENT_QUOTES, 'UTF-8'),

    'logo-max-width' =>
        intval($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_logoWidth')),

    'alt-logo' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_altLogo'), ENT_QUOTES, 'UTF-8'),

    'enable-logo-link' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_logoLink'), ENT_QUOTES, 'UTF-8'),

    'presentation-alignment' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_presentationAlignment'), ENT_QUOTES, 'UTF-8'),

    'full-width-logo' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_fullWidthLogo'), ENT_QUOTES, 'UTF-8'),

    'site-favicon' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_websiteFavicon'), ENT_QUOTES, 'UTF-8'),

    'max-layout-width' =>
        intval($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_maxLayoutWidth')),

    'default-font-size' =>
        floatval($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_fontSize')),

    'enable-quick-access-menu' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_quickAccessMenu_defaultLayout'), ENT_QUOTES, 'UTF-8'),

    'header-buttons-style' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam__headerButtonsStyle'), ENT_QUOTES, 'UTF-8'),

    'default-columns-width' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customWidth_leftRightColumn'), ENT_QUOTES, 'UTF-8'),

    'custom-left-column-width' =>
        intval($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customWidth_leftColumn')),

    'custom-right-column-width' =>
        intval($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customWidth_rightColumn')),

    'enable-top-button' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_top_button_default_layout'), ENT_QUOTES, 'UTF-8'),

    'enable-mobile-link' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable____mobileSwitcherBtn'), ENT_QUOTES, 'UTF-8'),

/*==========================================================================
   MENU STYLE
==========================================================================*/

    'main-menu-alignment' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_main_menu_alignment'), ENT_QUOTES, 'UTF-8'),

    'floating-submenus-effect' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_floating_submenus_effect'), ENT_QUOTES, 'UTF-8'),

/*==========================================================================
   ACCESSIBILITY OPTIONS
==========================================================================*/

    'enable-accessibility-panel' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_access_features'), ENT_QUOTES, 'UTF-8'),

    'enable-legibility-switcher' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable___legibility_switcher'), ENT_QUOTES, 'UTF-8'),

    'enable-theme-switcher' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable___theme_switcher'), ENT_QUOTES, 'UTF-8'),

    'enable-semantic-outline' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enableHiddenHeadingsDefaultLayout'), ENT_QUOTES, 'UTF-8'),


    'enable-mobile-logo' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_showLogo_mobile'), ENT_QUOTES, 'UTF-8'),

    'mobile-logo-path' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_logoPath_mobile'), ENT_QUOTES, 'UTF-8'),

/*==========================================================================
   CUSTOM STYLE & COLORS
==========================================================================*/
    // Layout structure

    'header-footer-layout-width-type' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_global_layout_width_type'), ENT_QUOTES, 'UTF-8'),

    'aside-top-bottom-layout-width-type' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_asideTopBottom_layout_width_type'), ENT_QUOTES, 'UTF-8'),

    'force-full-width-homepage' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_fullWidthHomepage'), ENT_QUOTES, 'UTF-8'),

    // General

    'custom-user-style--enabled-body-bg' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_background'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--body-bg' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_background'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--enable-body-bg-image' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_body_background_image'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--body-bg-image-path' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customStyle_body_background_image_path'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--body-bg-image-attachment' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customStyle_body_background_image_attachment'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--body-bg-image-position-x' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customStyle_body_background_image_positionX'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--body-bg-image-position-y' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customStyle_body_background_image_positionY'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--body-bg-image-repeat' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customStyle_body_background_image_repeat'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--enabled-text-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_text'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--text-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_text'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--enabled-headings-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_headings'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--headings-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_headings'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--enabled-links-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_links'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--links-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_links'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--visited-links-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_visitedLinks'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--hover-links-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_hoverLinks'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--enabled-buttons' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_buttons'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-bg' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BG'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-bg-hover' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BG_hover'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-text' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_Text'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-text-hover' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_Text_hover'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-border-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BorderColor'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-border-color-hover' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BorderColor_hover'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-border-style' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BorderStyle'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-border-width' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BorderWidth'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--buttons-border-radius' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_buttons_BorderRadius'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--enabled-tables' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_customColor_tables'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-bg' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_BG'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-text' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_Text'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-border-color' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_BorderColor'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-border-style' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_BorderStyle'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-border-width' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_BorderWidth'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-header-bg' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_header_BG'), ENT_QUOTES, 'UTF-8'),

    'custom-user-style--tables-header-text' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_customColor_tables_header_Text'), ENT_QUOTES, 'UTF-8'),



/*==========================================================================
   ADVANCED OPTIONS
==========================================================================*/

    'enable-php-debugger' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_php_debugger'), ENT_QUOTES, 'UTF-8'),

    'enable-user-overrides-css' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_user_overrides_css'), ENT_QUOTES, 'UTF-8'),

    'enable-user-overrides-js' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_user_overrides_js'), ENT_QUOTES, 'UTF-8'),

    'custom-user-inline-css' =>
        $this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_custom_user_inlineCSS'),

    'user-custom-code-head-bottom' =>
        $this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_custom_code_head_bottom'),

    'user-custom-code-document-closing-bottom' =>
        $this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_custom_code_body_bottom'),

/*==========================================================================
   OTHER OPTIONS
==========================================================================*/

    'print-font-type' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam__print_font_type'), ENT_QUOTES, 'UTF-8'),

    'print-font-size' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_print_font_size'), ENT_QUOTES, 'UTF-8'),

    'print-show-header' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam__print_show_header'), ENT_QUOTES, 'UTF-8'),

    'print-show-footer' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam__print_show_footer'), ENT_QUOTES, 'UTF-8'),

    'print-images' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_print_images'), ENT_QUOTES, 'UTF-8'),

    'enable-google-analytics' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_enable_googleAnalytics'), ENT_QUOTES, 'UTF-8'),

    'google-analytics-id' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_googleAnalytics_ID'), ENT_QUOTES, 'UTF-8'),

    'google-analytics-anonymization-enabled' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_googleAnalytics_anonymizationEnabled'), ENT_QUOTES, 'UTF-8'),

    'alerts-panel--provided-control' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_alertsPanel_providedControl'), ENT_QUOTES, 'UTF-8'),

    'alerts-panel--position' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_alertsPanel_position'), ENT_QUOTES, 'UTF-8'),

    'alerts-panel--cookie-aware' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_alertsPanel_cookieAware'), ENT_QUOTES, 'UTF-8'),

/*==========================================================================
   BLOCKS CUSTOM STYLE
==========================================================================*/

    'custom-block-width--aside-top-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_1'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_2'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_3'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_4'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_5'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_6'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_7'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_8'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_9'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-top-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_10'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_11'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_12'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_13'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_14'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_15'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_16'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_17'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_18'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_19'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--main-top-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_20'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_21'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_22'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_23'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_24'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_25'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_26'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_27'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_28'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_29'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--aside-bottom-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_30'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_31'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_32'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_33'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_34'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_35'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_36'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_37'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_38'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_39'), ENT_QUOTES, 'UTF-8'),

    'custom-block-width--footer-top-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleWidth_40'), ENT_QUOTES, 'UTF-8'),

    // Custom host container style
    'block-coat--aside-top-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_1'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_2'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_3'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_4'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_5'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_6'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_7'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_8'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_9'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-top-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_10'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_11'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_12'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_13'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_14'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_15'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_16'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_17'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_18'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_19'), ENT_QUOTES, 'UTF-8'),

    'block-coat--main-top-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_20'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_21'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_22'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_23'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_24'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_25'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_26'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_27'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_28'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_29'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-bottom-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_30'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-A' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_31'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-B1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_32'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-B2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_33'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-C1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_34'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-C2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_35'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-C3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_36'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-D1' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_37'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-D2' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_38'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-D3' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_39'), ENT_QUOTES, 'UTF-8'),

    'block-coat--footer-top-D4' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_userModuleStyle_40'), ENT_QUOTES, 'UTF-8'),

    'block-coat--side-menu' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_moduleStyle_mainMenu'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-left' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_moduleStyle_left'), ENT_QUOTES, 'UTF-8'),

    'block-coat--aside-right' =>
        htmlspecialchars($this->params['parent-platform']['joomla-instance']->params->get('zhongframework_Jparam_moduleStyle_right'), ENT_QUOTES, 'UTF-8'),


); // End theme-parameters array
