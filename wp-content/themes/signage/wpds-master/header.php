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
	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,900' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/app.css">
	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/custom.modernizr.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/ninja-slider.css">
	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/ninjaVideoPlugin.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/ninja-slider.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/styles.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> -->
	<script type="text/javascript">
		//don't copy the script below into your page.
		if (!document.domain) alert("The video will not work properly if opening the page by local path. Please test this page through HTTP on a web or localhost server");
	</script>
	<title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="header-container">
	<div class="left">
		<div class="logo">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Custom Header Logo") ) : ?>
				<img src="wp-content/themes/signage/wpds-master/images/logo.png" alt="" />
			<?php endif;?>
		</div>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Text Beside Logo") ) : ?>
		<?php endif;?>


	</div>
	<div class="right">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Right") ) : ?>
		<?php echo date('l jS \of F Y h:i:s A') ?></div>
		<?php endif;?>
	</div>


	<div class="content"
