<?php
$theme = wp_get_theme(); // gets the current theme
if ( 'minar' == $theme->name || 'minar' == $theme->parent_theme ) {

    if (version_compare($theme->get('Version'), MINAR_TOOLKIT_VERSION, '>')) {
        function minar_toolkit_update_notice() {
            $update_message = sprintf(
                /* translators: %1$s: Plugins page URL, %2$s: minar Theme Plugins page URL */
                esc_html__(
                    'A new version of minar Toolkit is available! Please navigate to %1$s, delete the old minar Toolkit plugin, and then install the updated version from %2$s.',
                    'minar'
                ),
                '<a href="' . esc_url(admin_url('plugins.php')) . '"><strong>' . esc_html__('Dashboard → Plugins', 'minar') . '</strong></a>',
                '<a href="' . esc_url(admin_url('admin.php?page=minar-admin-plugins')) . '"><strong>' . esc_html__('Dashboard → minar Theme → Plugins', 'minar') . '</strong></a>'
            );
        
            echo '<div class="notice notice-error is-dismissible">';
            echo '<p><strong>' . esc_html__('Important Update:', 'minar') . '</strong> ' . $update_message . '</p>';
            echo '</div>';
        }
        add_action('admin_notices', 'minar_toolkit_update_notice');
    }
}