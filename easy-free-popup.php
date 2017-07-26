<?php
/*
  Plugin Name: Easy Free Popup
  Version: 0.1
  Description: Popup with social media and newsletter box
  Author: Józef Curyłło
  Author URI: http://szalonypecet.pl
 */

include "settings.php";

/*
	Load Font-Awesome (to show icons of Social Media)
*/
function efp_enqueue_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','efp_enqueue_required_stylesheets');

/*
	Load necessary scripts
*/
function efp_enqueued_scripts() {
	wp_enqueue_script( 'efp-script', plugin_dir_url( __FILE__ ) . '/js/scripts.js', null, '1.0', true );
	
	$scriptData = array(
		'efp_run_days' => esc_attr( get_option('efp_run_days', 30) ),
        'efp_run_after_time' => esc_attr( get_option('efp_run_after_time', false) ),
		'efp_run_after_ms' => esc_attr( get_option('efp_run_after_ms', 2000) ),
		'efp_run_after_scrolling' => esc_attr( get_option('efp_run_after_scrolling', true) ),
		'efp_run_after_scroll_percent' => esc_attr( get_option('efp_run_after_scroll_percent', 70) ),
    );

    wp_localize_script('efp-script', 'efp_options', $scriptData);
}
add_action( 'wp_enqueue_scripts', 'efp_enqueued_scripts' );

/*
	Load necessary styles
*/
function efp_enqueued_styles() {
	wp_enqueue_style( 'efp-style', plugin_dir_url( __FILE__ ) . '/css/styles.css', null, '1.0' );
}
add_action( 'wp_enqueue_scripts', 'efp_enqueued_styles' );


/*
	Load HTML
*/
function efp_html(){
	?>
	<div id="efp_modal" class="efp-modal">
		<div class="efp-modal-content">
		  <div class="efp-modal-header">
			<span id="efp_close">&times;</span>
			<h2><?php echo esc_attr( get_option('efp_modal_header', __('Stay with us on social media!')) ); ?></h2>
		  </div>
		  <div class="efp-modal-body">
			<p class="efp-justify-text efp-padding-text"><?php echo get_option('efp_modal_content', __('If you like our page you should also stay connected with us. Just visit our social media pages and become our fan. You will obtain additional articles, news and you will be the first one who knows what is new on our website.')); ?></p>
			<div class="aligncenter efp-center-text efp-social-box">
			
				<?php if (get_option('efp_modal_facebook_link')): ?>
					<a href="<?php echo get_option('efp_modal_facebook_link'); ?>" 
					title="Facebook - <?php echo get_option('blogname'); ?>"
					target="_blank"> 
						<i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				
				<?php if (get_option('efp_modal_twitter_link')): ?>
					<a href="<?php echo get_option('efp_modal_twitter_link'); ?>" 
					title="Twitter - <?php echo get_option('blogname'); ?>"
					target="_blank"> 
						<i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				
				<?php if (get_option('efp_modal_instagram_link')): ?>
					<a href="<?php echo get_option('efp_modal_instagram_link'); ?>" 
					title="Instagram - <?php echo get_option('blogname'); ?>"
					target="_blank"> 
						<i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				
				<?php if (get_option('efp_modal_linkedin_link')): ?>
					<a href="<?php echo get_option('efp_modal_linkedin_link'); ?>" 
					title="LinkedIn - <?php echo get_option('blogname'); ?>"
					target="_blank"> 
						<i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				
				<?php if (get_option('efp_modal_youtube_link')): ?>
					<a href="<?php echo get_option('efp_modal_youtube_link'); ?>" 
					title="YouTube - <?php echo get_option('blogname'); ?>"
					target="_blank"> 
						<i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
				
				<?php if (get_option('efp_modal_snapchat_link')): ?>
					<a href="<?php echo get_option('efp_modal_snapchat_link'); ?>" 
					title="SnapChat - <?php echo get_option('blogname'); ?>"
					target="_blank"> 
						<i class="fa fa-snapchat-square fa-3x" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
			</div>
			
		  </div>
		  <div class="efp-modal-footer">
			<h3><?php echo esc_attr( get_option('efp_modal_footer', __('Thank you!')) ); ?></h3>
		  </div>
		</div>
	</div>
	<?php 
}
add_action('wp_footer', 'efp_html');

