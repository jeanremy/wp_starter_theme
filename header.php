<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Favicons & tiles-->
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.png">
        <!--[if IE]>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico">
        <![endif]-->
        <meta name="msapplication-TileColor" content="#290005">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicon/win8-tile-icon.png">

        <!--Facebook-->
        <meta property="og:title" content="<?php bloginfo('name'); ?>" />
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php bloginfo('url'); ?>">
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/favicon/facebook-icon.png" />
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">

        <!--CSS & JS-->
        <?php wp_head(); ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>

	<body <?php body_class(); ?>>
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

					<!-- if you'd like to use the site description you can un-comment it below -->
					<?php // bloginfo('description'); ?>


					<nav role="navigation">
					</nav>

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->
