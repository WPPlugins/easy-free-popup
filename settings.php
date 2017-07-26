<?php

/*
	Add menu in admin panel
*/ 
function efp_plugin_menu() {
    $page_title = 'Easy Free Popup';
    $menu_title = 'Easy Free Popup';
    $capability = 'administrator';
    $menu_slug = 'efp_settings';
    $function = 'efp_display_settings';
    $icon_url = 'dashicons-align-center';
    $position = null;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
add_action('admin_menu', 'efp_plugin_menu');


/*
	Function to show settings
*/
function efp_display_settings(){
?>
<div class="wrap">

<form method="post" action="options.php">
	<?php settings_fields( 'efp-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'efp-plugin-settings-group' ); ?>
	
	
	<h2><?php _e('Main settings', 'easy-free-popup'); ?></h2>
	<table class="form-table">
	
		<tr valign="top">
			<th scope="row">
				<?php _e('Show popup for one user only once for ... days', 'easy-free-popup'); ?>
			</th>
			<td>
				<input type="number" name="efp_run_days" value="<?php echo esc_attr( get_option('efp_run_days', 30) ); ?>" />
			</td>
        </tr>
	
        <tr valign="top">
			<th scope="row">
				<?php _e('Show popup after specific time', 'easy-free-popup'); ?>
			</th>
			<td>
				<input type="checkbox" name="efp_run_after_time" <?php if (esc_attr( get_option('efp_run_after_time', false) )) echo "checked"; ?> />
			</td>
        </tr>
		
		<tr valign="top">
			<th scope="row">
				<?php _e('Show popup after ... miliseconds after loading a page', 'easy-free-popup'); ?>
			</th>
			<td>
				<input type="number" name="efp_run_after_ms" value="<?php echo esc_attr( get_option('efp_run_after_ms', 2000) ); ?>" />
			</td>
        </tr>
		<tr valign="top">
			<th scope="row">
				<?php _e('Show popup after scrolling a page', 'easy-free-popup'); ?>
			</th>
			<td>
				<input type="checkbox" name="efp_run_after_scrolling" <?php if (esc_attr( get_option('efp_run_after_scrolling', true) )) echo "checked"; ?> />
			</td>
        </tr>
	
		<tr valign="top">
			<th scope="row">
				<?php _e('Show popup after scrolling ...% of a page', 'easy-free-popup'); ?>
			</th>
			<td>
				<input type="number" name="efp_run_after_scroll_percent" value="<?php echo esc_attr( get_option('efp_run_after_scroll_percent', 70) ); ?>" />
			</td>
        </tr>
    </table>
	
	<hr />
	<h2><?php _e('Set content', 'easy-free-popup'); ?></h2>
	<table class="form-table">
        <tr valign="top">
			<th scope="row">
				<?php _e('Header text', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea name="efp_modal_header"><?php echo esc_attr_e( get_option('efp_modal_header', 'Stay with us on social media!') ); ?></textarea>
			</td>
        </tr>
    
		<tr valign="top">
			<th scope="row">
				<?php _e('Content text', 'easy-free-popup'); ?> <p>Feel free to use here any HTML and JS you want (e.g. <a href="https://developers.facebook.com/docs/plugins/page-plugin"> Facebook page plugin</a>!</p>
			</th>
			<td>
				<textarea rows="10" name="efp_modal_content"><?php esc_attr_e( get_option('efp_modal_content', 'If you like our page you should also stay connected with us. Just visit our social media pages and become our fan. You will obtain additional articles, news and you will be the first one who knows what is new on our website.') ); ?></textarea>
			</td>
        </tr>
		
		<tr valign="top">
			<th scope="row">
				<?php _e('Footer text', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea name="efp_modal_footer"><?php esc_attr_e( get_option('efp_modal_footer', 'Thank you!') ); ?></textarea>
			</td>
        </tr>
    </table>
	
	<hr />
	<h2><?php _e('Set links', 'easy-free-popup'); ?></h2>
	
    <table class="form-table">
        <tr valign="top">
			<th scope="row">
				<?php _e('Link to Facebook', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea type="text" name="efp_modal_facebook_link"><?php echo esc_attr( get_option('efp_modal_facebook_link') ); ?></textarea>
			</td>
        </tr>
         
        <tr valign="top">
			<th scope="row">
				<?php _e('Link to Twitter', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea type="text" name="efp_modal_twitter_link"><?php echo esc_attr( get_option('efp_modal_twitter_link') ); ?></textarea>
			</td>
        </tr>
        
        <tr valign="top">
			<th scope="row">
				<?php _e('Link to Instagram', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea type="text" name="efp_modal_instagram_link"><?php echo esc_attr( get_option('efp_modal_instagram_link') ); ?></textarea>
			</td>
        </tr>
		
		 <tr valign="top">
			<th scope="row">
				<?php _e('Link to YouTube', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea type="text" name="efp_modal_youtube_link"><?php echo esc_attr( get_option('efp_modal_youtube_link') ); ?></textarea>
			</td>
        </tr>
		
		<tr valign="top">
			<th scope="row">
				<?php _e('Link to LinkedIn', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea type="text" name="efp_modal_linkedin_link"><?php echo esc_attr( get_option('efp_modal_linkedin_link') ); ?></textarea>
			</td>
        </tr>
		
		<tr valign="top">
			<th scope="row">
				<?php _e('Link to Snapchat', 'easy-free-popup'); ?>
			</th>
			<td>
				<textarea type="text" name="efp_modal_snapchat_link"><?php echo esc_attr( get_option('efp_modal_snapchat_link') ); ?></textarea>
			</td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php
	
}



/*
	Register settings
*/
add_action( 'admin_init', 'efp_plugin_settings' );
function efp_plugin_settings() {
	register_setting( 'efp-plugin-settings-group', 'efp_modal_header' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_content' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_footer' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_facebook_link' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_twitter_link' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_instagram_link' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_youtube_link' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_linkedin_link' );
	register_setting( 'efp-plugin-settings-group', 'efp_modal_snapchat_link' );
	
	register_setting( 'efp-plugin-settings-group', 'efp_run_days' );
	register_setting( 'efp-plugin-settings-group', 'efp_run_after_time' );
	register_setting( 'efp-plugin-settings-group', 'efp_run_after_ms' );
	register_setting( 'efp-plugin-settings-group', 'efp_run_after_scrolling' );
	register_setting( 'efp-plugin-settings-group', 'efp_run_after_scroll_percent' );
}

/*
	Unregister settings
*/
register_deactivation_hook(__FILE__, 'efp_plugin_unregister');
function efp_plugin_unregister() {
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_header' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_content' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_footer' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_facebook_link' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_twitter_link' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_instagram_link' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_youtube_link' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_linkedin_link' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_modal_snapchat_link' );
	
	unregister_setting( 'efp-plugin-settings-group', 'efp_run_days' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_run_after_time' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_run_after_ms' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_run_after_scrolling' );
	unregister_setting( 'efp-plugin-settings-group', 'efp_run_after_scroll_percent' );
	
	if (isset($_COOKIE['efp_modal_cookie'])) {
		unset($_COOKIE['efp_modal_cookie']);
	}
}