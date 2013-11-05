<?php

#-----------------------------------
#WP OPTIONS
#-----------------------------------

/*For menus*/
add_theme_support( 'menus' );

/*For images sizes*/
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'sizename', 350, 163, true );
}

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
#HEADER	INCLUDES
#-----------------------------------

add_action('wp_head', 'my_header');
if( !function_exists('my_header')){
	function my_header(){
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<?php
	}
}

#-----------------------------------
#FOOTER	INCLUDES
#-----------------------------------



add_action('wp_footer', 'my_footer');
if( !function_exists('my_footer')){
	function my_footer(){
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<?php
	}
}

?>