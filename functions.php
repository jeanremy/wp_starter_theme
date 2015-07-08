<?php

#-----------------------------------
# 		WP OPTIONS
#-----------------------------------
$options = get_fields('option');


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


add_action('wp_enqueue_scripts', 'theme_add_custom_scripts');
function theme_add_custom_scripts() {
	
	wp_register_style('main_css', get_template_directory_uri() . '/css/main.min.css');	
	wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr/modernizr.js', '', null, false);
	if( !is_admin()){
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery/dist/jquery.min.js', '', null, true);
	}
	wp_register_script('main_js', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true );

	wp_enqueue_style('main_css');
	wp_enqueue_script('modernizr');	
	wp_enqueue_script('main_js');
}


#-----------------------------------
#		CUSTOM QUERIES & UTILITIES
#-----------------------------------


//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$newclasses[] = $post->post_name;
	} 
	return $newclasses;
}

add_filter( 'body_class', 'add_slug_body_class' );


/* A function to encode email takaen from David Walsh : http://davidwalsh.name/php-email-encode-prevent-spam*/
/* see also https://codex.wordpress.org/Function_Reference/antispambot */
function encode_email($e) {
	$output= '';
	for ($i = 0; $i < strlen($e); $i++) { 
		$output .= '&#'.ord($e[$i]).';'; 
	}
	return $output;
}

#------------------------------------
# 		OPTION PAGE ACF
#------------------------------------
if( function_exists('acf_add_options_page') ) {
 
	$page = acf_add_options_page(array(
		'page_title' 	=> 'Titre de la page',
		'menu_title' 	=> 'Titre dans le menu',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 		=> false
	));


	// Deuxième sous-page
	// acf_add_options_sub_page(array(
	// 	'page_title'    => 'Abonnements',
	// 	'menu_title'    => 'Abonnements',
	// 	'parent_slug'   => 'theme-general-settings',
	// ));

}



?>
