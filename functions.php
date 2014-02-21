<?php

#-----------------------------------
# 		WP OPTIONS
#-----------------------------------
require ('admin/theme_options.php');
$options = get_option('_theme_options');
define('FB_ID', $options['fb_id']);
define('FB_API', $options['fb_app_id']);
define('TWITTER_ID', $options['tw_id']);


#-----------------------------------
# 		MENU
#-----------------------------------
add_theme_support( 'menus' );


#-----------------------------------
# 		MINIATURES
#-----------------------------------
add_theme_support( 'post-thumbnails' );


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
# 		HEADER	INCLUDES
#-----------------------------------
add_action('init', 'add_custom_styles');

function add_custom_styles() {
	wp_deregister_script( 'jquery' ); 
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css' );
}


#-----------------------------------
# 		FOOTER	INCLUDES
#-----------------------------------
add_action('init', 'add_custom_scripts');

function add_custom_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js', '', '', true);
	wp_register_script('bootstrap_js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', '', '', true);
	wp_register_script('main_js', get_template_directory_uri() . '/js/main.min.js', '', '', true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('main_js');
	wp_enqueue_script('bootstrap_js');
}


?>