<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die( 'Restricted access' );

define('ZHONG_FRAMEWORK', true);
define('ZHONG_FRAMEWORK_ROOT_DIR', dirname(__FILE__)."/..");
define('ZHONG_FRAMEWORK_VERSION', '4.0.0');

class ZhongFramework
{

/*==========================================================================
   FRAMEWORK VARS
==========================================================================*/

    public $global_vars = array( // Internal vars
        'views' => array(),
        'language' => array(),
        'assets' => array(),
        'views-overrides' => array(),
    );

    public $params = array( // Mostly parameters from the external world (e.g. parent platform)
        'self' => array(),
        'theme' => array(),
        'site' => array(),
        'guest-views' => array(),
        'parent-platform' => array(),
    );

    public $guest_views = array(); // Views from the external world (e.g. parent platform)

/*==========================================================================
   CONSTRUCTOR
==========================================================================*/
    
    public function __construct($zhong_framework_parameters)
    {

        // --------- Initialization --------- //

        // PHP debugger, disable in production
        if( false ){
            ini_set('display_errors', 1);
            error_reporting(E_ALL | E_STRICT);
        }

        // --------- Gatherers (Parameters/Vars) --------- //

        // Internal framework vars
        $this->gatherers__self__params();

        // If the parent platform is Joomla, get the parameters
        if($zhong_framework_parameters['parent-platform'] === 'Joomla'){

            defined('_JEXEC') or die('Restricted access');

            $this->params['parent-platform']['name'] = 'Joomla';
            $this->params['parent-platform']['joomla-instance'] = $zhong_framework_parameters['joomla-instance'];

            // Gather parameters and guest views from Joomla
            $this->gatherers__joomla__parentPlatformParameters();
            $this->gatherers__joomla__siteParameters();
            $this->gatherers__joomla__templateParameters();
            $this->gatherers__joomla__guestViewsParameters();
            $this->gatherers__joomla__guestViews();

        }

        // If the parent platform is not supported, the user can define custom parameters
        else{
            require ZHONG_FRAMEWORK_ROOT_DIR.'/custom/parameters.php'; // This file should be created by the user
        }

        // --------- Handlers --------- //

        $this->handlers__self__language();
        $this->handlers__self__phpDebugger();
        $this->handlers__views__bodyTagClasses();
        $this->handlers__assets__stylesheets();
        $this->handlers__assets__phpJsBridge();
        $this->handlers__self__vars();

        // --------- Overrides --------- //

        // Changing the core files of the framework is bad, an override approach is better;
        // Users can override any variable/views using this file:
        require ZHONG_FRAMEWORK_ROOT_DIR.'/custom/overrides/application/framework-vars-overrides.php';

    }

/*==========================================================================
   HANDLERS
   These functions set or modify configuration variables
==========================================================================*/

    /*------------------------------------------------------------
       SELF
    ------------------------------------------------------------*/

    /**
     * Set the language variables
     */

    public function handlers__self__language()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/handlers/self/language.php';
    }
    
    /**
     * Enable or Disable the PHP error_reporting
     */

    public function handlers__self__phpDebugger()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/handlers/self/php-debugger.php';
    }
    
    /**
     * Self overrides and helper vars settings
     */

    public function handlers__self__vars()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/handlers/self/vars.php';
    }

    /*------------------------------------------------------------
       VIEWS
    ------------------------------------------------------------*/

    /**
     * Build the body classes
     */

    public function handlers__views__bodyTagClasses()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/handlers/views/body-tag-classes.php';
    }

    /*------------------------------------------------------------
       ASSETS
    ------------------------------------------------------------*/

    /**
     * Build the paths of the stylesheets to be included
     */

    public function handlers__assets__stylesheets()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/handlers/assets/stylesheets.php';
    }

    /**
     * Define all PHP parameters that will be injected into a javascript object
     */

    public function handlers__assets__phpJsBridge()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/handlers/assets/php-js-bridge.php';
    }

/*==========================================================================
   GATHERERS
   These functions gather data, parameters and views
==========================================================================*/

    /*------------------------------------------------------------
       SELF
    ------------------------------------------------------------*/

    /**
     * Self-set parameters
     */

    public function gatherers__self__params()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/gatherers/self/params.php';
    }

    /*------------------------------------------------------------
       JOOMLA
    ------------------------------------------------------------*/

    /**
     * Gather parameters from the Joomla's platform (eg, platform version)
     */

    public function gatherers__joomla__parentPlatformParameters()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/gatherers/joomla/parent-platform-parameters.php';
    }

    /**
     * Gather relevant parameters concerning the site from Joomla (eg. site name, site uri ...)
     */

    public function gatherers__joomla__siteParameters()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/gatherers/joomla/site-parameters.php';
    }

    /**
     * Gather the parameters for the template
     */

    public function gatherers__joomla__templateParameters()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/gatherers/joomla/template-parameters.php';
    }

    /**
     * Gather the guest views (Joomla modules views)
     */

    public function gatherers__joomla__guestViews()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/gatherers/joomla/guest-views.php';
    }

    /**
     * Gather the guest views' parameters
     */

    public function gatherers__joomla__guestViewsParameters()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/gatherers/joomla/guest-views-parameters.php';
    }

/*==========================================================================
   HELPERS
   Useful and recurring functions
==========================================================================*/

    /*------------------------------------------------------------
       VIEWS BUILDERS
       Functions to construct recurring views
    ------------------------------------------------------------*/

    /**
     * Print preset view for a section opening
     */

    public function helpers__viewsBuilders__sectionOpening(
        $function_parameters = array(
            'section-id' => '', // Mandatory parameter!
            'main-div-class-attribute' => '', // Disabled if not provided
            'main-div-additional-attributes' => '', // Disabled if not provided
            'skin-div-class-attribute' => '', // Disabled if not provided
            'skin-div-additional-attributes' => '', // Disabled if not provided
            'semantic-tag' => '', // Mandatory parameter!
            'semantic-tag-attributes' => '', // Disabled if not provided
            'is-encloser' => false, // Default value: false
            'enclosed-style-type' => 'contained', // Default value: 'contained'
            'section-expand-button' => false, // Disabled if not provided
            'section-expand-button-class' => '',
            'section-expand-button-icon-class' => '',
            'section-expand-button-text' => '',
            'section-heading-parameters' => array(), // Disabled if not provided
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/section-opening.php';
    }

    /**
     * Print preset view for a section closing
     */

    public function helpers__viewsBuilders__sectionClosing(
        $function_parameters = array(
            'closing-semantic-tag' => '', // Mandatory parameter!
            'enable-no-css-divider' => true, // Default value: true
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/section-closing.php';
    }

    /**
     * Print preset view for a section heading
     */

    public function helpers__viewsBuilders__sectionHeading(
        $function_parameters = array(
            'heading-content' => '', // Mandatory parameter!
            'heading-level' => 2, // Default value: 2
            'heading-additional-classes' => '', // Disabled if not provided
            'related-section-id' => '', // Disabled if not provided
            'force-visibility' => false, // Default value: false
            'use-role-heading' => false, // Default value: false
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/section-heading.php';
    }

    /**
     * Print preset view for a generic container opening
     */

    public function helpers__viewsBuilders__wrapperOpening(
        $function_parameters = array(
            'wrapper-id' => '', // Mandatory parameter!
            'is-encloser' => false, // Default value: false
            'enclosed-style-type' => 'contained', // Default value: 'contained'
            'main-div-class-attribute' => '', // Disabled if not provided
            'main-div-additional-attributes' => '', // Disabled if not provided
            'skin-div-class-attribute' => '', // Disabled if not provided
            'skin-div-additional-attributes' => '', // Disabled if not provided
            'additional-semantic-tag' => '', // Disabled if not provided
            'additional-semantic-tag-attributes' => '', // Disabled if not provided
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/wrapper-opening.php';
    }

    /**
     * Print preset view for a generic container closing
     */

    public function helpers__viewsBuilders__wrapperClosing(
        $function_parameters = array(
            'is-encloser' => false, // Default value: false
            'closing-semantic-tag' => '', // Disabled if not provided
            'enable-no-css-divider' => false, // Default value: false
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/wrapper-closing.php';
    }

    /**
     * Print preset view for a hosts group
     */

    public function helpers__viewsBuilders__groupedHosts(
        $function_parameters = array(
            'grouped-hosts-id' => 1, // Mandatory parameter!
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/grouped-hosts.php';
    }

    /**
     * Print a toolbox button
     */

    public function helpers__viewsBuilders__toolboxButton(
        $function_parameters = array(
            'tool-id' => '', // Mandatory parameter!
            'button-text' => '', // Mandatory parameter!
            'button-title' => '', // Mandatory parameter!
            'button-icon-class' => '', // Mandatory parameter!
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/toolbox-button.php';
    }

    /**
     * Print a toolbox panel opening
     */

    public function helpers__viewsBuilders__toolboxPanelOpening(
        $function_parameters = array(
            'tool-id' => '', // Mandatory parameter!
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/toolbox-panel-opening.php';
    }

    /**
     * Print a toolbox panel closing
     */

    public function helpers__viewsBuilders__toolboxPanelClosing(){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views-builders/toolbox-panel-closing.php';
    }

    /*------------------------------------------------------------
       VIEWS HELPERS
    ------------------------------------------------------------*/

    /**
     * Start buffering a guest view. This function is useful for gathering guest views from external sources
     */

    public function helpers__views__startGuestViewBuffering()
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views/start-guest-view-buffering.php';
    }

    /**
     * Stop buffering a guest view. This function is useful for gathering guest views from external sources
     */

    public function helpers__views__storeGuestViewBuffer($guest_view_id)
    {
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views/store-guest-view-buffer.php';
    }

    /**
     * Print a guest view
     */

    public function helpers__views__printGuestView(
        $guest_view_id, // Mandatory parameter!
        $function_parameters = array(
            'wrap-guest-view' => true // Disabled if not provided
        )
    ){
        require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views/print-guest-view.php';
    }

    /**
     * Return a guest view
     * @return a guest view {string}
     */

    public function helpers__views__returnGuestView($guest_view_id)
    {
        return require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/views/return-guest-view.php';
    }

    /*------------------------------------------------------------
       CONTENT FILTERS
    ------------------------------------------------------------*/

    /**
     * Detele multiple spaces, tabs and new lines
     * @return The modified content {string}
     */

    public function helpers__contentFilters__genericMinification($buffer)
    {
        return require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/content-filters/generic-minification.php';
    }

    /**
     * Simple minification function, suited for CSS content
     * @return The modified content {string}
     */

    public function helpers__contentFilters__basicCssMinification($buffer)
    {
        return require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/content-filters/basic-css-minification.php';
    }

    /**
     * Simple minification function, suited for JS scripts
     * @return The modified content {string}
     */

    public function helpers__contentFilters__basicJsMinification($buffer)
    {
        return require ZHONG_FRAMEWORK_ROOT_DIR.'/application/helpers/content-filters/basic-js-minification.php';
    }

/*==========================================================================
   VIEWS
   Anything that prints content is a view
==========================================================================*/

    /*------------------------------------------------------------
       DOCUMENT
       This is the root view
    ------------------------------------------------------------*/

    public function views__document()
    {
        if( isset($this->global_vars['views-overrides']['views__document']) )
            echo $this->global_vars['views-overrides']['views__document'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/document.php';
    }

    /*------------------------------------------------------------
       DOCUMENT PARTIALS
       Tags and content "outside" of the <body>. Usually these views are shared among all layout types
    ------------------------------------------------------------*/

    /**
     * Document opening (<html>)
     */

    public function views__documentPartials__documentOpening()
    {
        if( isset($this->global_vars['views-overrides']['views__documentPartials__documentOpening']) )
            echo $this->global_vars['views-overrides']['views__documentPartials__documentOpening'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/document-partials/document-opening.php';
    }

    /**
     * Document closing (</body></html>)
     */

    public function views__documentPartials__documentClosing()
    {
        if( isset($this->global_vars['views-overrides']['views__documentPartials__documentClosing']) )
            echo $this->global_vars['views-overrides']['views__documentPartials__documentClosing'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/document-partials/document-closing.php';
    }

    /**
     * Head (<head>...</head>)
     */

    public function views__documentPartials__head()
    {
        if( isset($this->global_vars['views-overrides']['views__documentPartials__head']) )
            echo $this->global_vars['views-overrides']['views__documentPartials__head'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/document-partials/head.php';
    }

    /**
     * Body tag opening with classes
     */

    public function views__documentPartials__bodyTagOpening()
    {
        if( isset($this->global_vars['views-overrides']['views__documentPartials__bodyTagOpening']) )
            echo $this->global_vars['views-overrides']['views__documentPartials__bodyTagOpening'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/document-partials/body-tag-opening.php';
    }

    /*------------------------------------------------------------
       REGIONS
       Regions are generic containers. Usually they occupy a "wide" section of the screen. 
    ------------------------------------------------------------*/

    /**
     * The footer
     */

    public function views__regions__footer()
    {
        if( isset($this->global_vars['views-overrides']['views__regions__footer']) )
            echo $this->global_vars['views-overrides']['views__regions__footer'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/regions/footer.php';
    }

    /**
     * The header
     */

    public function views__regions__header()
    {
        if( isset($this->global_vars['views-overrides']['views__regions__header']) )
            echo $this->global_vars['views-overrides']['views__regions__header'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/regions/header.php';
    }

    /**
     * Left column
     */

    public function views__regions__leftColumn()
    {
        if( isset($this->global_vars['views-overrides']['views__regions__leftColumn']) )
            echo $this->global_vars['views-overrides']['views__regions__leftColumn'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/regions/left-column.php';
    }

    /**
     * Main content
     */

    public function views__regions__mainContent()
    {
        if( isset($this->global_vars['views-overrides']['views__regions__mainContent']) )
            echo $this->global_vars['views-overrides']['views__regions__mainContent'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/regions/main-content.php';
    }

    /**
     * Right column
     */

    public function views__regions__rightColumn()
    {
        if( isset($this->global_vars['views-overrides']['views__regions__rightColumn']) )
            echo $this->global_vars['views-overrides']['views__regions__rightColumn'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/regions/right-column.php';
    }

    /*------------------------------------------------------------
       SECTIONS
       A section is a container that has a semantic value, such as a menu (<nav>)
    ------------------------------------------------------------*/

    /**
     * The accessibility panel
     */

    public function views__sections__accessibilityOptions()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__accessibilityOptions']) )
            echo $this->global_vars['views-overrides']['views__sections__accessibilityOptions'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/accessibility-options.php';
    }

    /**
     * Location path
     */

    public function views__sections__breadcrumbs()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__breadcrumbs']) )
            echo $this->global_vars['views-overrides']['views__sections__breadcrumbs'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/breadcrumbs.php';
    }

    /**
     * Language switcher
     */

    public function views__sections__languageSwitcher()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__languageSwitcher']) )
            echo $this->global_vars['views-overrides']['views__sections__languageSwitcher'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/language-switcher.php';
    }

    /**
     * Aside left
     */

    public function views__sections__asideLeft()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__asideLeft']) )
            echo $this->global_vars['views-overrides']['views__sections__asideLeft'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/aside-left.php';
    }

    /**
     * Aside right
     */

    public function views__sections__asideRight()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__asideRight']) )
            echo $this->global_vars['views-overrides']['views__sections__asideRight'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/aside-right.php';
    }

    /**
     * Follow us (social links)
     */

    public function views__sections__followUs()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__followUs']) )
            echo $this->global_vars['views-overrides']['views__sections__followUs'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/follow-us.php';
    }

    /**
     * Footer credits
     */

    public function views__sections__footerCredits()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__footerCredits']) )
            echo $this->global_vars['views-overrides']['views__sections__footerCredits'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/footer-credits.php';
    }

    /**
     * Footer menu
     */

    public function views__sections__footerMenu()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__footerMenu']) )
            echo $this->global_vars['views-overrides']['views__sections__footerMenu'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/footer-menu.php';
    }

    /**
     * Login
     */

    public function views__sections__login()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__login']) )
            echo $this->global_vars['views-overrides']['views__sections__login'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/login.php';
    }

    /**
     * Main menu
     */

    public function views__sections__mainMenu()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__mainMenu']) )
            echo $this->global_vars['views-overrides']['views__sections__mainMenu'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/main-menu.php';
    }

    /**
     * Side menu
     */

    public function views__sections__sideMenu()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__sideMenu']) )
            echo $this->global_vars['views-overrides']['views__sections__sideMenu'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/side-menu.php';
    }

    /**
     * Search
     */

    public function views__sections__search()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__search']) )
            echo $this->global_vars['views-overrides']['views__sections__search'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/search.php';
    }

    /**
     * Support menu
     */

    public function views__sections__supportMenu()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__supportMenu']) )
            echo $this->global_vars['views-overrides']['views__sections__supportMenu'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/support-menu.php';
    }

    /**
     * Site banner (logo, title, subtitle)
     */

    public function views__sections__siteBanner()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__siteBanner']) )
            echo $this->global_vars['views-overrides']['views__sections__siteBanner'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/site-banner.php';
    }

    /**
     * Keyboard shortcuts menu
     */

    public function views__sections__quickAccessMenu()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__quickAccessMenu']) )
            echo $this->global_vars['views-overrides']['views__sections__quickAccessMenu'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/quick-access-menu.php';
    }

    /**
     * Toolbox buttons and panels
     */

    public function views__sections__toolbox()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__toolbox']) )
            echo $this->global_vars['views-overrides']['views__sections__toolbox'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/toolbox.php';
    }

    /**
     * Alerts panel. It is used to show warnings and messages to the user through a dialog panel
     */

    public function views__sections__alertsPanel()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__alertsPanel']) )
            echo $this->global_vars['views-overrides']['views__sections__alertsPanel'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/alerts-panel.php';
    }

    /**
     * Aside bottom
     */

    public function views__sections__asideBottom()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__asideBottom']) )
            echo $this->global_vars['views-overrides']['views__sections__asideBottom'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/aside-bottom.php';
    }

    /**
     * Aside top
     */

    public function views__sections__asideTop()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__asideTop']) )
            echo $this->global_vars['views-overrides']['views__sections__asideTop'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/aside-top.php';
    }

    /**
     * Footer top
     */

    public function views__sections__footerTop()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__footerTop']) )
            echo $this->global_vars['views-overrides']['views__sections__footerTop'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/footer-top.php';
    }

    /**
     * Main top
     */

    public function views__sections__mainTop()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__mainTop']) )
            echo $this->global_vars['views-overrides']['views__sections__mainTop'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/main-top.php';
    }

    /**
     * Top bar, kept only for backward compatibility; it will be removed in future versions
     */

    public function views__sections__topBar()
    {
        if( isset($this->global_vars['views-overrides']['views__sections__topBar']) )
            echo $this->global_vars['views-overrides']['views__sections__topBar'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/sections/top-bar.php';
    }
    

    /*------------------------------------------------------------
       MODULES
       A module is a rather small view that has a specific function. It shouldn't have a semantic value
    ------------------------------------------------------------*/

    /**
     * Follow us links
     */

    public function views__modules__followUsLinks()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__followUsLinks']) )
            echo $this->global_vars['views-overrides']['views__modules__followUsLinks'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/follow-us-links.php';
    }

    /**
     * Font resizer
     */

    public function views__modules__fontResizer()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__fontResizer']) )
            echo $this->global_vars['views-overrides']['views__modules__fontResizer'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/font-resizer.php';
    }

    /**
     * Layout width resizer
     */

    public function views__modules__layoutWidthResizer()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__layoutWidthResizer']) )
            echo $this->global_vars['views-overrides']['views__modules__layoutWidthResizer'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/layout-width-resizer.php';
    }

    /**
     * Line height resizer
     */

    public function views__modules__lineHeightResizer()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__lineHeightResizer']) )
            echo $this->global_vars['views-overrides']['views__modules__lineHeightResizer'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/line-height-resizer.php';
    }

    /**
     * Legibility switcher
     */

    public function views__modules__legibilitySwitcher()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__legibilitySwitcher']) )
            echo $this->global_vars['views-overrides']['views__modules__legibilitySwitcher'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/legibility-switcher.php';
    }

    /**
     * Theme switcher
     */

    public function views__modules__themeSwitcher()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__themeSwitcher']) )
            echo $this->global_vars['views-overrides']['views__modules__themeSwitcher'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/theme-switcher.php';
    }

    /**
     * Obsolete browser message
     */

    public function views__modules__obsoleteBrowserAlert()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__obsoleteBrowserAlert']) )
            echo $this->global_vars['views-overrides']['views__modules__obsoleteBrowserAlert'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/obsolete-browser-alert.php';
    }

    /**
     * Keyboard shortcuts menu
     */

    public function views__modules__quickAccessMenu()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__quickAccessMenu']) )
            echo $this->global_vars['views-overrides']['views__modules__quickAccessMenu'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/quick-access-menu.php';
    }

    /**
     * Top anchor
     */

    public function views__modules__topAnchor()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__topAnchor']) )
            echo $this->global_vars['views-overrides']['views__modules__topAnchor'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/top-anchor.php';
    }

    /**
     * Site logo
     */

    public function views__modules__siteLogo()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__siteLogo']) )
            echo $this->global_vars['views-overrides']['views__modules__siteLogo'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/site-logo.php';
    }

    /**
     * Site titles
     */

    public function views__modules__siteTitles()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__siteTitles']) )
            echo $this->global_vars['views-overrides']['views__modules__siteTitles'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/site-titles.php';
    }

    /**
     * Mobile featured panels
     */

    public function views__modules__mobileFeaturedPanels()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__mobileFeaturedPanels']) )
            echo $this->global_vars['views-overrides']['views__modules__mobileFeaturedPanels'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/mobile-featured-panels.php';
    }

    /**
     * Google analytics
     */

    public function views__modules__googleAnalytics()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__googleAnalytics']) )
            echo $this->global_vars['views-overrides']['views__modules__googleAnalytics'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/google-analytics.php';
    }

    /**
     * Desktop layout switcher
     */

    public function views__modules__desktopLayoutSwitcher()
    {
        if( isset($this->global_vars['views-overrides']['views__modules__desktopLayoutSwitcher']) )
            echo $this->global_vars['views-overrides']['views__modules__desktopLayoutSwitcher'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/modules/desktop-layout-switcher.php';
    }

    /*------------------------------------------------------------
       ASSETS
       These views regard front-end assets tags and code, such as "script" and "style" inclusions
    ------------------------------------------------------------*/

    /**
     * Inline styles and external stylesheets included in the <head>
     */

    public function views__assets__headStyles()
    {
        if( isset($this->global_vars['views-overrides']['views__assets__headStyles']) )
            echo $this->global_vars['views-overrides']['views__assets__headStyles'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/assets/head-styles.php';
    }


    /**
     * Javascripts included on top of all scripts
     */

    public function views__assets__headScriptsTop()
    {
        if( isset($this->global_vars['views-overrides']['views__assets__headScriptsTop']) )
            echo $this->global_vars['views-overrides']['views__assets__headScriptsTop'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/assets/head-scripts-top.php';
    }

    /**
     * Custom CSS codes set by the user (mostly defined by the options in the backend)
     */

    public function views__assets__customUserStyle()
    {
        if( isset($this->global_vars['views-overrides']['views__assets__customUserStyle']) )
            echo $this->global_vars['views-overrides']['views__assets__customUserStyle'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/assets/custom-user-style.php';
    }

    /**
     * Print PHP parameters as a javascript object
     */

    public function views__assets__phpJsBridge()
    {
        if( isset($this->global_vars['views-overrides']['views__assets__phpJsBridge']) )
            echo $this->global_vars['views-overrides']['views__assets__phpJsBridge'];
        else
            require ZHONG_FRAMEWORK_ROOT_DIR.'/application/views/assets/php-js-bridge.php';
    }

}
