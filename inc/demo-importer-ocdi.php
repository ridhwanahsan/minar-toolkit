<?php
/**
 * Demo Import with One Click Demo Importer Plugin
 */


if (! defined('ABSPATH')) {
    exit;
}

class Demo_Importer_OCDI
{

    public function __construct()
    {
        add_filter('pt-ocdi/import_files', array( $this, 'demo_config' ));
        add_filter('pt-ocdi/after_import', array( $this, 'after_import' ));
        add_filter('pt-ocdi/disable_pt_branding', '__return_true');
    }

    public function demo_config()
    {

        $demos_array = array(
            'minar-demo' => array(
                'title' => __('Minar Demo', 'minar-toolkit'),
                'page' => __('UX/UI DESIGNER', 'minar-toolkit'),
                'screenshot' => get_template_directory_uri().'/screenshot.png',
                'preview_link' => 'https://minar.baseecom.com/',
            ),
        );

        $config = array();
        $import_path  = trailingslashit(get_template_directory()) . 'lib/sample-data/';
        $redux_option = 'minar_opt';

        foreach ($demos_array as $key => $demo) {
            $config[] = array(
                'import_file_id'               => $key,
                'import_page_name'             => $demo['page'],
                'import_file_name'             => $demo['title'],
                'local_import_file'            => $import_path . 'contents.xml',
                'local_import_widget_file'     => $import_path . 'widgets.wie',
                'local_import_customizer_file' => $import_path . 'customizer.dat',
                'local_import_redux'           => array(
                    array(
                        'file_path'   => $import_path . 'options.json',
                        'option_name' => $redux_option,
                    ),
                ),
                'import_preview_image_url'   => $demo['screenshot'],
                'preview_url'                => $demo['preview_link'],
            );
        }

        return $config;
    }

    public function after_import($selected_import)
    {
        $this->assign_menu();
        $this->assign_frontpage($selected_import);
        // $this->assign_woocommerce_pages();
        $this->update_permalinks();
        $this->replace_urls_in_content();
    }

    private function assign_menu()
    {
        $primary  = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', array(
            'primary'  => $primary->term_id,
        ));
    }

    private function assign_frontpage($selected_import)
    {
        $blog_page  = get_page_by_title('Blog');
        $front_page = get_page_by_title($selected_import['import_page_name']);

        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page->ID);
        update_option('page_for_posts', $blog_page->ID);
    }

    private function assign_woocommerce_pages()
    {
        $shop     = get_page_by_title('Shop');
        $cart     = get_page_by_title('Cart');
        $checkout = get_page_by_title('Checkout');
        $account  = get_page_by_title('My Account');

        // update_option('woocommerce_shop_page_id', $shop->ID);
        // update_option('woocommerce_cart_page_id', $cart->ID);
        // update_option('woocommerce_checkout_page_id', $checkout->ID);
        // update_option('woocommerce_myaccount_page_id', $account->ID);
    }

    private function update_permalinks()
    {
        update_option('permalink_structure', '/%postname%/');
    }

    private function replace_urls_in_content()
    {
        global $wpdb;

        $old_url = 'https:\/\/demo.3digit.agency\/minar';
        $new_url = home_url();
        $new_url = addcslashes($new_url, '/');

        // Update posts
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->posts} SET post_content = REPLACE(post_content, %s, %s)",
                $old_url, $new_url
            )
        );

        // Update postmeta
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->postmeta} SET meta_value = REPLACE(meta_value, %s, %s)",
                $old_url, $new_url
            )
        );

        // Update usermeta
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->usermeta} SET meta_value = REPLACE(meta_value, %s, %s)",
                $old_url, $new_url
            )
        );

        // Update links
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->links} SET link_url = REPLACE(link_url, %s, %s)",
                $old_url, $new_url
            )
        );

        // Update comments
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->comments} SET comment_content = REPLACE(comment_content, %s, %s)",
                $old_url, $new_url
            )
        );

        // Update guid
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->posts} SET guid = REPLACE(guid, %s, %s)",
                $old_url, $new_url
            )
        );

    }
}

new Demo_Importer_OCDI;
