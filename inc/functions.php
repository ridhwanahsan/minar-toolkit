<?php
/**
 * minar Toolkit Functions
 */

add_filter('script_loader_tag', 'minar_clean_script_tag');
function minar_clean_script_tag($input) {
	$input = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $input );
	return $input;
}

function minar_toolkit_get_products_cat_list() {

	$courses_category_id = get_queried_object_id();
	$args = array(
		'parent' => $courses_category_id
	);

	$terms = get_terms( 'product_cat', get_the_ID());
	$cat_options = array('' => '');

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}

function minar_toolkit_get_cat_list() {
	$category_id = get_queried_object_id();
	$args = array(
		'parent' => $category_id
	);
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => false,
    ) );
	$cat_options = array('' => '');

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}


// Post Category Select
function minar_toolkit_get_post_cat_list() {
	$post_category_id = get_queried_object_id();
	$args = array(
		'parent' => $post_category_id
	);

	$terms = get_terms( 'category', get_the_ID());
	$cat_options = array(esc_html__('', 'minar-toolkit') => '');

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}

// Select page for link
function minar_toolkit_get_page_as_list() {
    $args = wp_parse_args(array(
        'post_type' => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts($args);
    $post_options = array(esc_html__('', 'minar-toolkit') => '');

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'minar-toolkit-activate' ) );
} );

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );

add_filter( 'navigation_markup_template', 'minar_navigation_template' );
function minar_navigation_template( $template ) {
    $template = '
    <nav class="navigation %1$s">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>';
    return $template;
}

/**
 * Get the existing menus in array format
 * @return array
 */
function minar_get_menu_array() {
    $menus = wp_get_nav_menus();
    $menu_array = [];
    foreach ( $menus as $menu ) {
        $menu_array[$menu->slug] = $menu->name;
    }
    return $menu_array;
}

/**
 * Post title array
 */
function minar_get_post_title_array( $postType = 'post' ) {
	$args = wp_parse_args(array(
        'post_type' => $postType,
        'numberposts' => -1,
    ));

    $posts = get_posts( $args );
    $post_options = array( '' => '' );

    if ($posts) {
        foreach ( $posts as $post ) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip( $post_options);
	return $flipped;
}

function minar_year_shortcode() {
	$year = date('Y');
	return $year;
  }
add_shortcode('year', 'minar_year_shortcode');

function minar_add_class_body_if_user_not_login($classes) {
	if(!is_user_logged_in()) {
		return array_merge( $classes, array( 'not-logged-in' ) );
	}else{
		return array_merge( $classes, array( '' ) );
	}
}
add_filter( 'body_class', 'minar_add_class_body_if_user_not_login' );

/**
 * Remove pages from search result
 */
if ( ! function_exists( 'minar_remove_pages_from_search' ) ) :
    function minar_remove_pages_from_search() {
		global $minar_opt;
		global $wp_post_types;

		if( isset( $minar_opt['minar_search_page'] ) ):
			if( $minar_opt['minar_search_page'] != true ):
				$wp_post_types['page']->exclude_from_search = true;
			else:
				$wp_post_types['page']->exclude_from_search = false;
			endif;
		else:
			$wp_post_types['page']->exclude_from_search = false;
		endif;
	}
endif;
add_action('init', 'minar_remove_pages_from_search');

function minar_toolkit_enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'minar_toolkit_enable_svg_upload', 10, 1 );

/**
* Get CPT Taxonomies
* @return array
*/
function minar_cpt_taxonomies($posttype,$value='id')
{
	$options = array();
	$terms = get_terms( $posttype );
	if (!empty($terms) && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			if ('name' == $value) {
				$options[$term->name] = $term->name;
			} else {
				$options[$term->term_id] = $term->name;
			}
		}
	}
	return $options;
}

function minar_cpt_get_post_title($cptname='') {
	if ( $cptname ) {
		$list = get_posts( array(
			'post_type'         => $cptname,
			'posts_per_page'    => -1,
		) );
		$options = array();
		if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
			foreach ( $list as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}
		}
		return $options;
	}
}


 // register widget category// 

function add_elementor_widget_categories($elements_manager)
{
    $categories = [
        'minar'    => [
            'title' => 'Minar',
            'icon'  => 'fa fa-plug',
        ],
        'header_footer' => [
            'title' => 'Header Footer',
            'icon'  => 'fa fa-plug',
        ],
    ];

    $old_categories = $elements_manager->get_categories();
    $categories     = array_merge($categories, $old_categories);

    // Remove duplicates and ensure 'minar' is at the top and 'header_footer' is under it
    $categories = array_unique($categories, SORT_REGULAR);
    uksort($categories, function ($key1, $key2) {
        if ($key1 === 'minar') {
            return -1;
        }
        if ($key2 === 'minar') {
            return 1;
        }
        if ($key1 === 'header_footer') {
            return -1;
        }
        if ($key2 === 'header_footer') {
            return 1;
        }
        return 0;
    });

    $set_categories = function ($categories) {
        $this->categories = $categories;
    };

    $set_categories->call($elements_manager, $categories);
}

add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');
