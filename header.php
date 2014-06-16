<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/libs/modernizr-2.6.2.min.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<header></header>
		<div id="main" role="main">