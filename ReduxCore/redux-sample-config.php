<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', 'minar_opt' );

    // Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {
        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();
            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    // All the possible arguments for Redux.
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'minar-toolkit' ),
        'page_title'           => __( 'Theme Options', 'minar-toolkit' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'minar_opt',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'minar-toolkit' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'minar-toolkit' );
    }
    Redux::setArgs( $opt_name, $args );

// General Options
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'General Options', 'minar-toolkit' ),
    'id'                => 'general_options',
    'customizer'        => false,
    'icon'              => ' el el-home',
    'fields'     => array(
        array(
            'title'     => __( 'Site Logo Dimensions', 'minar-toolkit' ),
            'id'        => 'main_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.header-2 .header-logo img'
        ),
         array(
            'id'        => 'enable_back_to_top',
            'type'      => 'switch',
            'title'     => esc_html__('Enable back-to-top Button', 'minar-toolkit'),
            'default'   => '1'
        ),
    ),
) );
// Preloader Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Preloader', 'minar-toolkit' ),
    'id'               => 'preloader_opt',
    'customizer'        => false,
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(

        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'minar-toolkit' ),
            'on'      => esc_html__( 'Enable', 'minar-toolkit' ),
            'off'     => esc_html__( 'Disable', 'minar-toolkit' ),
            'default' => true,
        ),
        array(
            'id'        => 'preloader_title',
            'type'      => 'text',
            'title'     => esc_html__('Preloader Title', 'minar-toolkit'),
            'default'   => 'minar',
            'desc'      => esc_html__('Default: minar', 'minar-toolkit'),
        ),
        array(
            'id'        => 'preloader_image',
            'type'      => 'media',
            'title'     => esc_html__('Preloader Image', 'minar-toolkit'),
            'desc'      => esc_html__('Upload your custom preloader image (GIF recommended). Leave empty to use the default spinner.', 'minar-toolkit'),
            'default'   => array(
                'url' => get_template_directory_uri() . '/assets/img/13.gif'
            ),
        ),
    )
));
     // Cursor  Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Mouse Cursor', 'minar-toolkit' ),
    'id'               => 'mouse_cursor_opt',
    'customizer'       => false,
    'icon'             => 'dashicons dashicons-admin-customizer',
    'fields'           => array(
        array(
            'id'      => 'enable_mouse_cursor',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Custom Mouse Cursor', 'minar-toolkit' ),
            'on'      => esc_html__( 'Enable', 'minar-toolkit' ),
            'off'     => esc_html__( 'Disable', 'minar-toolkit' ),
            'default' => true,
        ),
        array(
            'id'        => 'cursor_outer_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Cursor Outer Color', 'minar-toolkit' ),
            'default'   => '#C79C65',
            'validate'  => 'color',
            'transparent' => false,
            'required'  => array( 'enable_mouse_cursor', '=', true ),
        ),
        array(
            'id'        => 'cursor_inner_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Cursor Inner Color', 'minar-toolkit' ),
            'default'   => '#ffffff',
            'validate'  => 'color',
            'transparent' => false,
            'required'  => array( 'enable_mouse_cursor', '=', true ),
        ),
        array(
            'id'        => 'cursor_outer_size',
            'type'      => 'slider',
            'title'     => esc_html__( 'Cursor Outer Size', 'minar-toolkit' ),
            'default'   => 30,
            'min'       => 10,
            'max'       => 60,
            'step'      => 1,
            'required'  => array( 'enable_mouse_cursor', '=', true ),
        ),
        array(
            'id'        => 'cursor_inner_size',
            'type'      => 'slider',
            'title'     => esc_html__( 'Cursor Inner Size', 'minar-toolkit' ),
            'default'   => 8,
            'min'       => 4,
            'max'       => 20,
            'step'      => 1,
            'required'  => array( 'enable_mouse_cursor', '=', true ),
        ),
        array(
            'id'        => 'cursor_blend_mode',
            'type'      => 'select',
            'title'     => esc_html__( 'Cursor Blend Mode', 'minar-toolkit' ),
            'options'   => array(
                'normal'      => esc_html__( 'Normal', 'minar-toolkit' ),
                'difference'  => esc_html__( 'Difference', 'minar-toolkit' ),
                'multiply'    => esc_html__( 'Multiply', 'minar-toolkit' ),
                'screen'      => esc_html__( 'Screen', 'minar-toolkit' ),
            ),
            'default'   => 'Normal',
            'required'  => array( 'enable_mouse_cursor', '=', true ),
        ),
    )
) );
// Header & Off-canvas Controls
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Header & Slide-out Panel', 'minar-toolkit' ),
    'id'         => 'header_slideout',
    'customizer' => false,
    'icon'       => 'el el-cog',
    'fields'     => array(

        /* ---------- Header ---------- */
        array(
            'id'    => 'header_section_start',
            'type'  => 'section',
            'title' => esc_html__( 'Header Settings', 'minar-toolkit' ),
            'indent'=> true,
        ),
        array(
            'id'        => 'header_logo_white',
            'type'      => 'media',
            'title'     => esc_html__( 'Header Logo (Light)', 'minar-toolkit' ),
            'desc'      => esc_html__( 'Upload logo used in header.', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/logo-white-2.png' ),
        ),
        array(
            'id'        => 'header_menu_typography',
            'type'      => 'typography',
            'title'     => esc_html__( 'Header Menu Typography', 'minar-toolkit' ),
            'output'    => '.header .nav__menu > li > a',
        ),
        array(
            'id'        => 'header_menu_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Header Menu Color', 'minar-toolkit' ),
            'validate'  => 'color',
            'transparent'=> false,
            'output'    => array( 'color' => '.header .nav__menu > li > a' ),
        ),
        array(
            'id'        => 'header_menu_hover_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Header Menu Hover Color', 'minar-toolkit' ),
            'validate'  => 'color',
            'transparent'=> false,
            'output'    => array( 'color' => '.header .nav__menu > li > a:hover' ),
        ),
        array(
            'id'     => 'header_section_end',
            'type'   => 'section',
            'indent' => false,
        ),

        /* ---------- Slide-out Panel ---------- */
        array(
            'id'    => 'slideout_section_start',
            'type'  => 'section',
            'title' => esc_html__( 'Slide-out Panel Settings', 'minar-toolkit' ),
            'indent'=> true,
        ),
        array(
            'id'        => 'slideout_logo_dark',
            'type'      => 'media',
            'title'     => esc_html__( 'Slide-out Panel Logo (Dark)', 'minar-toolkit' ),
            'desc'      => esc_html__( 'Upload logo used in slide-out panel.', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/logo-black.png' ),
        ),
        array(
            'id'        => 'slideout_menu_typography',
            'type'      => 'typography',
            'title'     => esc_html__( 'Slide-out Menu Typography', 'minar-toolkit' ),
            'output'    => '.slideout .nav__menu > li > a',
        ),
        array(
            'id'        => 'slideout_menu_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Slide-out Menu Color', 'minar-toolkit' ),
            'validate'  => 'color',
            'transparent'=> false,
            'output'    => array( 'color' => '.slideout .nav__menu > li > a' ),
        ),
        array(
            'id'        => 'slideout_menu_hover_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Slide-out Menu Hover Color', 'minar-toolkit' ),
            'validate'  => 'color',
            'transparent'=> false,
            'output'    => array( 'color' => '.slideout .nav__menu > li > a:hover' ),
        ),
        array(
            'id'        => 'slideout_bg_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Slide-out Panel Background Color', 'minar-toolkit' ),
            'validate'  => 'color',
            'transparent'=> false,
            'output'    => array( 'background-color' => '.slideout' ),
        ),
        array(
            'id'        => 'slideout_close_btn_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Slide-out Close Button Color', 'minar-toolkit' ),
            'validate'  => 'color',
            'transparent'=> false,
            'output'    => array( 'color' => '.slideout__close' ),
        ),
        array(
            'id'     => 'slideout_section_end',
            'type'   => 'section',
            'indent' => false,
        ),

        /* ---------- Menu Icons (optional) ---------- */
        array(
            'id'    => 'menu_icons_section_start',
            'type'  => 'section',
            'title' => esc_html__( 'Slide-out Menu Icons', 'minar-toolkit' ),
            'indent'=> true,
        ),
        array(
            'id'        => 'menu_icon_home',
            'type'      => 'media',
            'title'     => esc_html__( 'Home Icon', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/menu-icon/home.svg' ),
        ),
        array(
            'id'        => 'menu_icon_mission',
            'type'      => 'media',
            'title'     => esc_html__( 'Our Mission Icon', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/menu-icon/Our-Mission.svg' ),
        ),
        array(
            'id'        => 'menu_icon_product',
            'type'      => 'media',
            'title'     => esc_html__( 'Products Icon', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/menu-icon/product.svg' ),
        ),
        array(
            'id'        => 'menu_icon_blog',
            'type'      => 'media',
            'title'     => esc_html__( 'Blog Icon', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/menu-icon/blogs.svg' ),
        ),
        array(
            'id'        => 'menu_icon_vanish',
            'type'      => 'media',
            'title'     => esc_html__( 'Vanish Icon', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/menu-icon/Vanish.svg' ),
        ),
        array(
            'id'        => 'menu_icon_contact',
            'type'      => 'media',
            'title'     => esc_html__( 'Contact Icon', 'minar-toolkit' ),
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/menu-icon/contact.svg' ),
        ),
        array(
            'id'     => 'menu_icons_section_end',
            'type'   => 'section',
            'indent' => false,
        ),

        /* ---------- Off-canvas Text & URL Controls ---------- */
        array(
            'id'    => 'offcanvas_text_url_section_start',
            'type'  => 'section',
            'title' => esc_html__( 'Off-canvas Menu Text & URLs', 'minar-toolkit' ),
            'indent'=> true,
        ),
        /* Home */
        array(
            'id'        => 'offcanvas_home_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Home Menu Text', 'minar-toolkit' ),
            'default'   => esc_html__( 'Home', 'minar-toolkit' ),
        ),
        array(
            'id'        => 'offcanvas_home_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Home Menu URL', 'minar-toolkit' ),
            'default'   => home_url( '/' ),
        ),
        /* Our Mission */
        array(
            'id'        => 'offcanvas_mission_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Our Mission Menu Text', 'minar-toolkit' ),
            'default'   => esc_html__( 'Our Mission', 'minar-toolkit' ),
        ),
        array(
            'id'        => 'offcanvas_mission_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Our Mission Menu URL', 'minar-toolkit' ),
            'default'   => home_url( '/our-mission.html' ),
        ),
        /* Products */
        array(
            'id'        => 'offcanvas_product_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Products Menu Text', 'minar-toolkit' ),
            'default'   => esc_html__( 'Products', 'minar-toolkit' ),
        ),
        array(
            'id'        => 'offcanvas_product_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Products Menu URL', 'minar-toolkit' ),
            'default'   => home_url( '/product.html' ),
        ),
        /* Blog */
        array(
            'id'        => 'offcanvas_blog_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Blog Menu Text', 'minar-toolkit' ),
            'default'   => esc_html__( 'Blog', 'minar-toolkit' ),
        ),
        array(
            'id'        => 'offcanvas_blog_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Blog Menu URL', 'minar-toolkit' ),
            'default'   => home_url( '/blog.html' ),
        ),
        /* Vanish */
        array(
            'id'        => 'offcanvas_vanish_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Vanish Menu Text', 'minar-toolkit' ),
            'default'   => esc_html__( 'Vanish', 'minar-toolkit' ),
        ),
        array(
            'id'        => 'offcanvas_vanish_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Vanish Menu URL', 'minar-toolkit' ),
            'default'   => home_url( '/vanish.html' ),
        ),
        /* Contact */
        array(
            'id'        => 'offcanvas_contact_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Contact Menu Text', 'minar-toolkit' ),
            'default'   => esc_html__( 'Contact', 'minar-toolkit' ),
        ),
        array(
            'id'        => 'offcanvas_contact_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Contact Menu URL', 'minar-toolkit' ),
            'default'   => home_url( '/vanish.html' ),
        ),
        array(
            'id'     => 'offcanvas_text_url_section_end',
            'type'   => 'section',
            'indent' => false,
        ),

        /* ---------- Sub Menu Controls ---------- */
        array(
            'id'    => 'submenu_section_start',
            'type'  => 'section',
            'title' => esc_html__( 'Sub Menu Text & URLs', 'minar-toolkit' ),
            'indent'=> true,
        ),
        array(
            'id'        => 'submenu_items',
            'type'      => 'repeater',
            'title'     => esc_html__( 'Sub Menu Items', 'minar-toolkit' ),
            'subtitle'  => esc_html__( 'Add / edit sub menu links.', 'minar-toolkit' ),
            'fields'    => array(
                array(
                    'id'        => 'text',
                    'type'      => 'text',
                    'title'     => esc_html__( 'Menu Text', 'minar-toolkit' ),
                    'default'   => '',
                ),
                array(
                    'id'        => 'url',
                    'type'      => 'text',
                    'title'     => esc_html__( 'Menu URL', 'minar-toolkit' ),
                    'default'   => '',
                ),
            ),
            'default'   => array(),
        ),
        array(
            'id'     => 'submenu_section_end',
            'type'   => 'section',
            'indent' => false,
        ),
    ),
) );
// Footer Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Footer', 'minar-toolkit' ),
    'id'                => 'footer',
    'customizer'        => false,
    'icon'              => 'el el-edit',
    'fields' => array(
        array(
            'id'   =>'divider_footer',
            'desc' => '<div style="font-size:16px;">The minar footer is built using Elementor. To add or update footer content, please navigate to UAE -> Elementor Header & Footer Builder.</div>',
            'type' => 'info',
        ),
    )
));

// Blog Area
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Blog Settings', 'minar-toolkit' ),
    'id'            => 'minar_blog',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your blog settings.',
    'fields' => array(
        array(
			'id'    => 'hide_blog_banner',
            'type'  => 'switch',
            'title' => esc_html__('Hide Blog Banner', 'minar-toolkit'),
            'default'   => '0',
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'minar-toolkit' ),
        ),

        array(
			'id'    => 'hide_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Blog Breadcrumb', 'minar-toolkit'),
            'default'   => '0',
            'required'      => array('hide_blog_banner','equals','0'),
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'minar-toolkit' ),
        ),
        array(
            'id'       => 'breadcrumbs_title_margintop',
            'type'     => 'text',
            'title'    => esc_html__( 'Breadcrumbs Title Margin Top', 'minar-toolkit' ),
            'default'  => '4rem',
            'desc'     => esc_html__( 'Enter margin-top value for .breadcrumbs__title (e.g. 4rem, 40px)', 'minar-toolkit' ),
            'output'   => '.breadcrumbs__title',
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'minar-toolkit' ),
            'required'      => array('hide_blog_banner','equals','0'),
        ),

        array(
            'id'       => 'blog_banner_img',
            'type'     => 'media',
            'title'    => esc_html__( 'Blog Banner Image', 'minar-toolkit' ),
            'required' => array('hide_blog_banner','equals','0'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/assets/images/breadcrumbs-bg.png'
            ),
        ),

        array(
            'id'       => 'blog_breadcrumb_icon',
            'type'     => 'media',
            'title'    => esc_html__( 'Blog Breadcrumb Icon Image', 'minar-toolkit' ),
            'required' => array('hide_blog_banner','equals','0'),
            'desc'     => esc_html__( 'Upload a custom icon to replace the default breadcrumb separator or home icon.', 'minar-toolkit' ),
        ),
        array(
            'id'       => 'page_title_tag',
            'type'     => 'select',
            'title'    => esc_html__( 'Blog Title HTML Tag', 'minar-toolkit' ),
            'options'  => array(
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
            ),
            'default'  => 'h1',
            'required' => array('hide_blog_banner','equals','0'),
        ),
        array(
            'id'       => 'Minar_blog_layout',
            'type'     => 'select',
            'title'    => esc_html__( 'Blog Container Layout', 'minar-toolkit' ),
            'options'  => array(
                'container'        => esc_html__( 'Container', 'minar-toolkit' ),
                'container-fluid'  => esc_html__( 'Container Fluid', 'minar-toolkit' ),
            ),
            'default'  => 'container',
        ),
        array(
            'id'       => 'Minar_blog_sidebar',
            'type'     => 'select',
            'title'    => esc_html__( 'Blog Sidebar', 'minar-toolkit' ),
            'options'  => array(
                'Minar_with_sidebar'             => esc_html__( 'Right Sidebar', 'minar-toolkit' ),
                'Minar_with_sidebar_left'        => esc_html__( 'Left Sidebar', 'minar-toolkit' ),
                'Minar_with_sidebar_both'        => esc_html__( 'Left & Right Sidebar', 'minar-toolkit' ),
                'Minar_without_sidebar'          => esc_html__( 'Without Sidebar', 'minar-toolkit' ),
                'Minar_without_sidebar_center'   => esc_html__( 'Without Sidebar (Center Content)', 'minar-toolkit' ),
            ),
            'default'  => 'Minar_with_sidebar',
        ),
        array(
            'id'       => 'Minar_single_blog_sidebar',
            'type'     => 'select',
            'title'    => esc_html__( 'Single Post Sidebar', 'minar-toolkit' ),
            'options'  => array(
                'Minar_with_sidebar'             => esc_html__( 'Right Sidebar', 'minar-toolkit' ),
                'Minar_with_sidebar_left'        => esc_html__( 'Left Sidebar', 'minar-toolkit' ),
                'Minar_with_sidebar_both'        => esc_html__( 'Left & Right Sidebar', 'minar-toolkit' ),
                'Minar_without_sidebar'          => esc_html__( 'Without Sidebar', 'minar-toolkit' ),
                'Minar_without_sidebar_center'   => esc_html__( 'Without Sidebar (Center Content)', 'minar-toolkit' ),
            ),
            'default'  => 'Minar_with_sidebar',
        ),
   
        array(
            'id'       => 'next_post_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Next Post Text', 'minar-toolkit' ),
            'default'  => esc_html__( 'Next Post', 'minar-toolkit'),
        ),
        array(
            'id'       => 'previous_post_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Previous Post Title', 'minar-toolkit' ),
            'default'  => esc_html__( 'Previous Post', 'minar-toolkit'),
        ),

        // Social Share Options
        array(
            'id'        => 'enable_social_share',
            'type'      => 'switch',
            'title'     => esc_html__( 'Enable Social Share', 'minar-toolkit' ),
            'on'        => esc_html__( 'Enable', 'minar-toolkit' ),
            'off'       => esc_html__( 'Disable', 'minar-toolkit' ),
            'default'   => true,
        ),
        array(
            'id'        => 'social_share_label',
            'type'      => 'text',
            'title'     => esc_html__( 'Social Share Label', 'minar-toolkit' ),
            'default'   => esc_html__( 'Share:', 'minar-toolkit' ),
            'required'  => array( 'enable_social_share', '=', true ),
        ),
        array(
            'id'        => 'social_share_facebook_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Facebook Share URL', 'minar-toolkit' ),
            'default'   => '',
            'required'  => array( 'enable_social_share', '=', true ),
        ),
        array(
            'id'        => 'social_share_twitter_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Twitter Share URL', 'minar-toolkit' ),
            'default'   => '',
            'required'  => array( 'enable_social_share', '=', true ),
        ),
        array(
            'id'        => 'social_share_linkedin_url',
            'type'      => 'text',
            'title'     => esc_html__( 'LinkedIn Share URL', 'minar-toolkit' ),
            'default'   => '',
            'required'  => array( 'enable_social_share', '=', true ),
        ),
        
    )
));


// Styling
Redux::setSection( $opt_name, array(
    'title'        => esc_html__( 'Styling Options', 'minar-toolkit' ),
    'id'           => 'styling_options',
    'customizer'   => false,
    'icon'         => ' el el-magic',
    'fields'     => array(
        array(
            'id'        => 'styling_options_info',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Warning', 'minar-toolkit' ),
            'desc'      => esc_html__( 'If some color does not affect by Theme Options then you have to change the color from page with Elementor edit mode.', 'minar-toolkit' ),
        ),
        array(
            'id'            => 'body',
            'type'          => 'color',
            'title'         => esc_html__('Body Color', 'minar-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'black',
            'type'          => 'color',
            'title'         => esc_html__('Black Color', 'minar-toolkit'),
            'default'       => '#2d2d2d',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'white',
            'type'          => 'color',
            'title'         => esc_html__('White Color', 'minar-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'theme',
            'type'          => 'color',
            'title'         => esc_html__('Theme Color', 'minar-toolkit'),
            'default'       => '#b4e717',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'header',
            'type'          => 'color',
            'title'         => esc_html__('Heading Color', 'minar-toolkit'),
            'default'       => '#161616',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'text',
            'type'          => 'color',
            'title'         => esc_html__('Paragraph Color', 'minar-toolkit'),
            'default'       => '#1c4b42',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'bg',
            'type'          => 'color',
            'title'         => esc_html__('Background Color One', 'minar-toolkit'),
            'default'       => '#f8f8f8',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'bg2',
            'type'          => 'color',
            'title'         => esc_html__('Background Color Two', 'minar-toolkit'),
            'default'       => '#000',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'bg3',
            'type'          => 'color',
            'title'         => esc_html__('Background Color Three', 'minar-toolkit'),
            'default'       => '#F3EDE4',
            'validate'      => 'color',
            'transparent'   => false,
        ),

    ),
) );

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'minar-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'minar-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'primary_typography',
            'type'          => 'typography',
            'title'         => esc_html__( 'Primary Typography', 'minar-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => false,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => true,
            'line-height'   => true,
            'output'        => 'body',
        ),
        array(
            'id'            => 'heading_typography',
            'type'          => 'typography',
            'title'         => esc_html__( 'Heading Typography', 'minar-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => false,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => true,
            'line-height'   => true,
            'output'        => 'h1, h2, h3, h4, h5, h6',
        ),
    ),
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => esc_html__('Advanced Settings', 'minar-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'minar-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'minar-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'minar-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'minar-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'minar-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'minar-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

 // 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404 Settings', 'minar-toolkit' ),
    'id'                => 'minar_404',
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'        => 'error_big_text',
            'type'      => 'text',
            'title'     => esc_html__('404 Big Text', 'minar-toolkit'),
            'default'   => '404',
            'desc'      => esc_html__('Default: 404', 'minar-toolkit'),
        ),
        array(
            'id'        => 'error_page_title',
            'type'      => 'text',
            'title'     => esc_html__('Error Content Title', 'minar-toolkit'),
            'default'   => 'Sorry! This Page is Not Available!',
            'desc'      => esc_html__('Default: Sorry! This Page is Not Available!', 'minar-toolkit'),
        ),
        array(
            'id'        => 'button_not_found',
            'type'      => 'text',
            'title'     => esc_html__( 'Back to Home Button Text', 'minar-toolkit' ),
            'default'   => 'Back to Home',
            'desc'      => esc_html__('Default: Back to Home', 'minar-toolkit'),
        ),
       
        // Page Styling Controls
        array(
            'id'       => 'error_page_number_typo',
            'type'     => 'typography',
            'title'    => esc_html__('404 Number Typography', 'minar-toolkit'),
            'output'   => '.error-section .error-content h2.title',
        ),
        array(
            'id'       => 'error_page_number_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Number Color', 'minar-toolkit'),
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
                'color' => '.error-section .error-content h2.title',
            ),
        ),
        array(
            'id'       => 'error_page_title_typo',
            'type'     => 'typography',
            'title'    => esc_html__('404 Content Title Typography', 'minar-toolkit'),
            'output'   => '.error-section .error-content h3',
        ),
        array(
            'id'       => 'error_page_title_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Content Title Color', 'minar-toolkit'),
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
                'color' => '.error-section .error-content h3',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Button Background Color', 'minar-toolkit'),
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'background-color' => '.error-section a.theme-btn',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_text_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Button Text Color', 'minar-toolkit'),
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'color' => '.error-section a.theme-btn',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_typography',
            'type'     => 'typography',
            'title'    => esc_html__('404 Button Typography', 'minar-toolkit'),
            'output'   => '.error-section a.theme-btn',
        ),
        array(
            'id'       => 'error_page_link_btn_bg_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('404 Button Hover Background Color', 'minar-toolkit'),
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'background-color' => '.error-section a.theme-btn:hover',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_text_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('404 Button Hover Text Color', 'minar-toolkit'),
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'color' => '.error-section a.theme-btn:hover',
            ),
        ),
    ),
));
 
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    // Custom function for the callback validation referenced above
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    // Custom function for the callback referenced above
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'minar-toolkit' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'minar-toolkit' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    // Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    // Filter hook for filtering the default value of any given field. Very useful in development mode.
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    // Removes the demo link and the notice of integrated demo from the redux-framework plugin
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
