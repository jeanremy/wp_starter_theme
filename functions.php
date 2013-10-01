<?php



#HEADER	INCLUDES

add_action('wp_head', 'my_header');
if( !function_exists('my_header')){
	function my_header(){
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<?php
	}
}


#FOOTER	INCLUDES


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