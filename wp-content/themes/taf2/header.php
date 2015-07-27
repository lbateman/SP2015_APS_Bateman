<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package taf
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<section class="site-branding clear">
			<section class="search-bar">
				<?php get_sidebar(); ?>
			</section>
			<section class="site-logo">
				<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/header_logo.png" alt="T@F Logo">
			</section>
			<section class="typographic-logo">
				<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/header_text.png" alt="T@F Typographic Logo">
			</section>
		</section>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<section class="nav-inner">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'taf' ); ?></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'taf' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</section> <!-- .nav-inner -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
