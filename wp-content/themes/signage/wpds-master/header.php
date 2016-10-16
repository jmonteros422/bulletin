<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php language_attributes(); ?>" > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php bloginfo('name'); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/app.css">
	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/custom.modernizr.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/ninja-slider.css">
	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/ninjaVideoPlugin.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/ninja-slider.js"></script>
	<script type="text/javascript">
		//don't copy the script below into your page.
		if (!document.domain) alert("The video will not work properly if opening the page by local path. Please test this page through HTTP on a web or localhost server");
	</script>
	<title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
	<style>


		.header-container{
			height: 10%;
			background-color:green;
		}

		.left{
			width:80%;
			height:100%;
			background-color:red;
			overflow:hidden;
		}
		.left h3, p {
			font-size: 100%;
		}

		.right{
			width: 20%;
			height:100%;
			overflow:hidden;

		}
		.right p {
			font-size: 100%;
			margin: 30px 30px;
		}

	</style>
</head>
<body <?php body_class(); ?>>
<div class="header-container">
	<div class="left">
		<h3>St. Therese Private School</h3>
		<p>#720 Sgt. Bumatay St. Plainview Subd. <br>Mandaluyong City</p>
	</div>
	<div class="right"><?php echo date('l jS \of F Y h:i:s A') ?></div>
</div>

	<div class="content"

		