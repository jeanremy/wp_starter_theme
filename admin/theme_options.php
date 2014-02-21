<?php
/*
Plugin Name: Theme Options
Plugin URI: http://www.flydesigners.com
Description: Theme options
Author: JR
Author URI: http://www.flydesigners.com
*/
/*
Based on 
http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
*/

add_action('admin_init', 'theme_options_init' );
add_action('admin_menu', 'theme_options_add_page');

// Init plugin options to white list our options
function theme_options_init(){
	register_setting( 'theme_options', '_theme_options', 'theme_options_validate' );
}

// Add menu page
function theme_options_add_page() {
	add_theme_page('Options du thème', 'Theme Options', 'manage_options', 'theme_options', 'theme_options_page');

}

// Draw the menu page itself
function theme_options_page() {
	?>
	<div class="wrap">
		<h2>Theme Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields('theme_options'); ?>
			<?php $options = get_option('_theme_options');?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Clé Api Facebook</th>
					<td><input type="text" class="widefat" id="fb_app_id" name="_theme_options[fb_app_id]" value="<?php echo $options['fb_app_id']; ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row">URL du Profil Facebook</th>
					<td><input type="text" class="widefat" id="fb_id" name="_theme_options[fb_id]" value="<?php echo $options['fb_id']; ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row">Nom d'utilisateur Twitter</th>
					<td><input type="text" class="widefat" id="tw_id" name="_theme_options[tw_id]" value="<?php echo $options['tw_id']; ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row">Clé Google Analytics</th>
					<td><input type="text" class="widefat" id="ga_id" name="_theme_options[ga_id]" value="<?php echo $options['ga_id']; ?>" /></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php	
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function theme_options_validate($input) {
	
	// Say our second option must be safe text with no HTML tags
	$input['fb_app_id'] =  wp_filter_nohtml_kses($input['fb_app_id']);

	// Say our second option must be safe text with no HTML tags
	$input['fb_id'] =  wp_filter_nohtml_kses($input['fb_id']);

	// Say our second option must be safe text with no HTML tags
	$input['tw_id'] =  wp_filter_nohtml_kses($input['tw_id']);

	// Say our second option must be safe text with no HTML tags
	$input['ga_id'] =  wp_filter_nohtml_kses($input['ga_id']);
	
	return $input;
}


/*
	HOW TO USE IN FUNCTIONS

	$options = get_option('_theme_options');
	define('FB_ID', $options['fb_id']);
	define('FB_API', $options['fb_app_id']);
	define('TWITTER_ID', $options['tw_id']);
 */
