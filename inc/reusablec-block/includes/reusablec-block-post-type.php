<?php
/**
 * Register  Reusable Content Blocks post type.
 *
 * @package reusablec-block
 *
 */

$labels = [
    'name'               => _x('Minar Blocks', 'minar-toolkit'),
    'singular_name'      => _x('Minar Block', 'minar-toolkit'),
    'add_new'            => _x('Add New', 'minar-toolkit'),
    'add_new_item'       => _x('Add New Block', 'minar-toolkit'),
    'edit_item'          => _x('Edit Block', 'minar-toolkit'),
    'new_item'           => _x('New Block', 'minar-toolkit'),
    'all_items'          => _x('All Blocks', 'minar-toolkit'),
    'view_item'          => _x('View Blocks', 'minar-toolkit'),
    'search_items'       => _x('Search Blocks', 'minar-toolkit'),
    'not_found'          => _x('No Blocks found', 'minar-toolkit'),
    'not_found_in_trash' => _x('No Blocks found in Trash', 'minar-toolkit'),
    'parent_item_colon'  => '',
    'menu_name'          => _x('Minar Blocks', 'minar-toolkit'),
];

$args = [
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'query_var'           => true,
    'rewrite'             => ['slug' => 'minar_blocks'],
    'capability_type'     => 'post',
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-clipboard',
    'supports'            => ['title', 'editor'],
];

register_post_type('minar_blocks', $args);

//add Minar Blocks shortcode to post list view
add_filter('manage_minar_blocks_posts_columns', 'rcb_columns_head_minar_blocks', 10);
add_action('manage_minar_blocks_posts_custom_column', 'rcb_columns_content_minar_blocks', 10, 2);

//re arrange post list columns order and add new
function rcb_columns_head_minar_blocks($defaults)
{
    $new = [];
    foreach ($defaults as $key => $title) {
        if ($key == 'date') // Put the Thumbnail column before the Author column
        {
            $new['rcb_shortcode'] = esc_html__('Usage', 'minar-toolkit');
        }

        $new[$key] = $title;
    }

    return $new;
}
function rcb_columns_content_minar_blocks($column_name, $post_ID)
{
    if ($column_name == 'rcb_shortcode') {
        echo rcb_get_usage_codes($post_ID, $width = false);
    }
}

//add Minar Blocks shortcode to Publish metabox
add_action('post_submitbox_misc_actions', 'add_tcpshortcode_to_publish_meta_box');
function add_tcpshortcode_to_publish_meta_box($post_obj)
{

    global $post;
    $post_type = 'minar_blocks';
    $pid       = $post_obj->ID;

    if ($post_type == $post->post_type) {

        echo "<div class='misc-pub-section misc-pub-section-last'>";
        echo rcb_get_usage_codes($pid, $width = true);
        echo "</div>";

    }
}

function rcb_get_usage_codes($pid, $width)
{

    $shortocde = '[minar_block id="' . $pid . '"]';
    $function  = '<?php minar_block_by_id( "' . $pid . '" ); ?>';

    $class = ($width) ? "class='widefat'" : "style='width:230px'";

    $codes = esc_html('Shortcode:', 'minar-toolkit') . " <input type='text' value='" . $shortocde . "'" . $class . " readonly></br>";
    $codes .= esc_html('Function: &nbsp;', 'minar-toolkit') . " <input type='text' value='" . $function . "'" . $class . " readonly>";

    return $codes;
}
