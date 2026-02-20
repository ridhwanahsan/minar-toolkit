<?php
/**
 * Render the Reusable Content Blocks Settings page.
 *
 * @package reusablec-block
 *
 * @return void
 */

add_action('admin_menu', 'rcb_register_options_page'); //init plugin options menu

//register plugin options menu
function rcb_register_options_page() {
	add_submenu_page( 'edit.php?post_type=minar_blocks', 'Reusable Content Blocks Settings', 'Settings', 'manage_options', 'reusablecb-options', 'rcb_options_page_callback' ); 
}

add_action( 'admin_init', 'rcb_register_settings' );
function rcb_register_settings() {

    register_setting( 'rcb-settings-group', 'rcb_hide_unpub' );
	register_setting( 'rcb-settings-group', 'rcb_enable_widget' );
	register_setting( 'rcb-settings-group', 'rcb_css_metakeys' );
}

//plugin options page function
function rcb_options_page_callback() {
	?>
	<div class="wrap">
	<h2><?php echo esc_html__( 'Reusable Content Blocks Settings', 'minar-toolkit' ); ?></h2>	
    <form method="post" action="options.php">
	
    <?php settings_fields( 'rcb-settings-group' ); ?>
    <?php do_settings_sections( 'rcb-settings-group' ); ?>
   
    <table class="form-table">
       
        <tr valign="top">
        <th scope="row"><?php echo esc_html__( 'Hide unpublished blocks:', 'minar-toolkit' ); ?></th>
        <td><input type="checkbox" name="rcb_hide_unpub" value="enable" <?php checked( get_option('rcb_hide_unpub'), 'enable', true ); ?>/></td>
        <td></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php echo esc_html__( 'Enable widget support:', 'minar-toolkit' ); ?></th>
        <td><input type="checkbox" name="rcb_enable_widget" value="enable" <?php checked( get_option('rcb_enable_widget'), 'enable', true ); ?>/></td>
        <td><?php _e( 'If your Theme support shortcodes in Widget areas, you can use reusable shortcodes in Text/HTML Widgets.', 'minar-toolkit' ); ?>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html__( 'CSS Metakeys:', 'minar-toolkit' ); ?></th>
        <td><textarea name="rcb_css_metakeys" rows="5" cols="40"><?php echo get_option('rcb_css_metakeys'); ?></textarea></td>
        <td><?php echo sprintf( __( '(Optional) Some page builders save element\'s custom CSS as meta keys and render it when the page is viewed. If elements from your theme or page builder addons missing style when inserted with shortcode, add your meta keys here one in a line.', 'minar-toolkit' ) );  ?>
        </td>
        </tr>
    </table>
    <?php submit_button();  ?>
    </form>
<?php  }