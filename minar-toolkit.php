<?php
/*
 * Plugin Name: Minar Toolkit
* Author: KinixThemes
 * Author URI: https: //themeforest.net/user/kinixthemes/
 * Description: A Light weight and easy toolkit for Minar Theme.
 * Version: 1.0
 */

if ( !defined('ABSPATH')) {
    exit; // Exit if accessed directly cbvn 
}

define('MINAR_TOOLKIT_VERSION', '1.0');
define('MINAR_ACC_PATH', plugin_dir_path(__FILE__));

    require_once(MINAR_ACC_PATH . 'theme-rt.php');

    // Require files
    require_once(MINAR_ACC_PATH . 'inc/elementor.php');
    require_once(MINAR_ACC_PATH . 'inc/widgets.php');
    require_once(MINAR_ACC_PATH . 'inc/icons.php');
    require_once MINAR_ACC_PATH . '/inc/acf.php'; 
    require_once MINAR_ACC_PATH . '/inc/demo-importer-ocdi.php';

add_action('after_setup_theme', function() {
    require(MINAR_ACC_PATH . 'ReduxCore/framework.php');
    require(MINAR_ACC_PATH . 'ReduxCore/redux-sample-config.php');
    require_once(MINAR_ACC_PATH . 'inc/functions.php');
    require_once MINAR_ACC_PATH . '/inc/reusablec-block/reusablec-block.php';
    require_once MINAR_ACC_PATH . '/inc/builder/defult-nav-walker.php';

}

);

function minar_programs_post_type() {
    register_post_type('programs',
        array(
            'labels'      => array(
                'name'          => __('Programs', 'minar-toolkit'),
                'singular_name' => __('Programs', 'minar-toolkit'),
            ),
            'public'      => true,
            'menu_icon'   => 'dashicons-admin-generic',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );
}
add_action('init', 'minar_programs_post_type');

// Programs Category
function minar_program_post_taxonomy(){
    register_taxonomy(
      'program_cat',
      'programs',
        array(
          'hierarchical'      => true,
          'label'             => esc_html__('Category', 'minar-toolkit'),
          'query_var'         => true,
          'show_admin_column' => true,
          'rewrite'         => array(
              'slug'          => 'program-category',
              'with_front'    => true
          )
        )
    );
}
add_action('init', 'minar_program_post_taxonomy');

// Services
function minar_services_post_type() {
    register_post_type('services',
        array(
            'labels'      => array(
                'name'          => __('Services', 'minar-toolkit'),
                'singular_name' => __('Service', 'minar-toolkit'),
            ),
            'public'      => true,
            'menu_icon'   => 'dashicons-admin-generic',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );
}
add_action('init', 'minar_services_post_type');

// Services Category
function minar_service_post_taxonomy(){
    register_taxonomy(
      'service_cat',
      'services',
        array(
          'hierarchical'      => true,
          'label'             => esc_html__('Category', 'minar-toolkit'),
          'query_var'         => true,
          'show_admin_column' => true,
          'rewrite'         => array(
              'slug'          => 'service-category',
              'with_front'    => true
          )
        )
    );
}
add_action('init', 'minar_service_post_taxonomy');

// Team
function minar_team_post_type() {
    register_post_type('team',
        array(
            'labels'      => array(
                'name'          => __('Team', 'minar-toolkit'),
                'singular_name' => __('Team', 'minar-toolkit'),
            ),
            'public'      => true,
            'menu_icon'   => 'dashicons-admin-users',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );
}
add_action('init', 'minar_team_post_type');

// Team Category
function minar_team_post_taxonomy(){
    register_taxonomy(
      'team_cat',
      'team',
        array(
          'hierarchical'      => true,
          'label'             => esc_html__('Categories', 'minar-toolkit'),
          'query_var'         => true,
          'show_admin_column' => true,
          'rewrite'         => array(
              'slug'          => 'team-category',
              'with_front'    => true
          )
        )
    );
}
add_action('init', 'minar_team_post_taxonomy');
