<?php
/**
 * Theme Support Elementor 
 */

// Main Elementor minar Extension Class
final class Elementor_minar_Extension {

    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    // Constructor
    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
		add_action( 'elementor/editor/after_enqueue_styles',    array( $this, 'editor_style' ) );
        add_action('elementor/widgets/register', [$this, 'register_widgets']);

    }

    // init
    public function init() {
        load_plugin_textdomain( 'minar-toolkit' );

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }
    }

    // Admin notice
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'minar-toolkit' ),
            '<strong>' . esc_html__( 'minar Toolkit', 'minar-toolkit' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'minar-toolkit' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'minar-toolkit' ),
            '<strong>' . esc_html__( 'minar Toolkit', 'minar-toolkit' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'minar-toolkit' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'minar-toolkit' ),
            '<strong>' . esc_html__( 'minar Toolkit', 'minar-toolkit' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'minar-toolkit' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function editor_style() {
        // Fallback: use the plugin’s own assets folder if the constant is undefined
        $img = defined('MINAR_IMG') && MINAR_IMG
            ? MINAR_IMG . '/elementor-icon.svg'
            : plugin_dir_url(dirname(__FILE__)) . 'assets/img/elementor-icon.svg';

       wp_add_inline_style(
            'elementor-editor',
            '.elementor-control-type-select2 .elementor-control-input-wrapper{min-width:130px;}' .
            '.elementor-element .icon .et-el-custom{content:url(' . esc_url_raw($img) . ');width:22px;}'
        );
    }

  
    public function register_widgets($widgets_manager)
    {
        // Register other widgets
        foreach ($this->minar_widget_list() as $widget_file_name) {
            $widget_path = plugin_dir_path(__FILE__) . "widgets/{$widget_file_name}.php";
            if (file_exists($widget_path)) {
                require_once $widget_path;
            }
        }
        foreach ($this->minar_widget__element_list() as $widget_file_name) {
            $widget_path = plugin_dir_path(__FILE__) . "widgets/element/{$widget_file_name}.php";
            if (file_exists($widget_path)) {
                require_once $widget_path;
            }
        }
        foreach ($this->minar_header_footer_widget_list() as $widget_file_name) {
            $widget_path = plugin_dir_path(__FILE__) . "widgets/header-footer/{$widget_file_name}.php";
            if (file_exists($widget_path)) {
                require_once $widget_path;
            }
        }
    }

    /**
     * The function `minar_widget_list` returns an array of widget names for a PHP application.
     *
     * @return An array of widget names is being returned. The array contains 'hero-banner' and
     * 'hero-banner2' widget names, and more widget names can be added as needed.
     */
    public function minar_widget_list()
    {
        return [ 
          'news-section-grid', 
          'work-section-1',
          'hr-news-section',
          
            // Add more widget names here as needed
        ];
    }
    public function minar_widget__element_list()
    {
        return [ 
        'about-inner-section', 
        'hero-01', 
        'hero-01', 
        'hero-02', 
        'woo-single-product', 
        'awareness-widget',
        'why-choose-us',
        'testimonials-widget',    
        'mission-widget',    
        'experience-widget',    
        'faq-widget1',    
        'faq-widget2',    
        'products-grid',    
        'banner-widget5',    
        'product--details',    
        'banner-widget2',    
        'vanish-2',    
        'banner-widget55',    
           
            // Add more widget names here as needed
        ];
    }

    /**
     * The function returns an array of header and footer widget names.
     *
     * @return The function `minar_header_footer_widget_list()` is returning an array with one
     */
    public function minar_header_footer_widget_list()
    {
        return [
            'footer-1',  
            'header01',  
            'header02',  
        ];
    }

}
Elementor_minar_Extension::instance();