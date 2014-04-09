<?php

#-----------------------------------
# 		WP OPTIONS
#-----------------------------------
$options = get_option('_theme_options');
define('FB_ID', $options['fb_id']);
define('FB_API', $options['fb_app_id']);
define('TWITTER_ID', $options['tw_id']);


#-----------------------------------
# 		MENU
#-----------------------------------
add_theme_support( 'menus' );
/*function register_nav() {
  register_nav_menu('navigation',__( 'Navigation' ));
}
add_action( 'init', 'register_nav' );
*/


#-----------------------------------
# 		MINIATURES
#-----------------------------------
add_theme_support( 'post-thumbnails' );
/* Images sizes 

add_image_size( 'tiers', 270);
add_image_size( 'demi', 430 );
add_image_size( 'full', 910 );*/



#-----------------------------------
# 		ADMIN
#-----------------------------------
//disable Admin BAR
add_filter( 'show_admin_bar', '__return_false' );

function my_hide_admin_bar_settings() {
?>
<style type="text/css">
.show-admin-bar { display: none; }
</style>
<?php
}

function my_disable_admin_bar() {
	add_filter( 'show_admin_bar', '__return_false' );
	add_action( 'admin_print_scripts-profile.php', 'my_hide_admin_bar_settings' );
}

add_action( 'init', 'my_disable_admin_bar' , 9 );



#-----------------------------------
# 		CSS / JS
#-----------------------------------

//Deregister jquery
add_action('init', 'theme_deregister_jquery');
function theme_deregister_jquery() {
	wp_deregister_script( 'jquery' );
}

add_action('wp_enqueue_scripts', 'theme_add_custom_scripts');
function theme_add_custom_scripts() {
	
	wp_register_style('main_css', get_template_directory_uri() . '/css/main.min.css');	
	wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', '', null, false);
	wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js', '', '', true);
	wp_register_script('bootstrap_js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', '', '', true);
	wp_register_script('main_js', get_template_directory_uri() . '/js/main.min.js', array('jquery', 'bootstrap_js'), '', true );

	wp_enqueue_style('main_css');
	wp_enqueue_script('modernizr');	
	wp_enqueue_script('main_js');
}





?>
