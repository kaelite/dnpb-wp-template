<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fav/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fav/apple-touch-icon.png">
	<base href="<?=get_site_url(); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<?php include (TEMPLATEPATH . '/blocks/header.php'); ?>
	</header>

	<!-- Content -->
	<main>
