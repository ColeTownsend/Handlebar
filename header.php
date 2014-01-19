<!DOCTYPE html>

<html>
	<head>
		<!-- meta -->
		<meta charset="UTF-8"/>
		<title><?php echo get_bloginfo('name'); ?> :: <?php echo get_bloginfo('description'); ?></title>
		<meta name="description" content="<?php echo get_bloginfo('description'); ?>"/>
		<meta name='viewport' content='width=device-width,initial-scale=1,target-densitydpi=device-dpi'/>
		<!-- CSS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100|Stoke:300' rel='stylesheet'/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/responsive.css"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/grid.css"/>
		<!-- JS -->
		<!-- gross... just gross -->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
				<!-- JS pt2 -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/content.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scroll.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>

		<div class="loading">
			<div class="loading-center" align="center">
				<img src="<?php bloginfo('template_url'); ?>/imgs/m-light.png" alt="" class="stache loading-stache"/>
			</div>
		</div>

		<!-- start of navbar -->
		<div class="grid-100 navbar">
			<div class="grid-container">
				<div class="grid-25">
					<a href="<?php echo get_home_url(); ?>" class="navLogo"><?php echo get_bloginfo('name'); ?></a>
				</div>
				<?php if (is_single() == false) : ?>
					<div class="grid-75 navbar-links" style="text-align: right;">
						<a href="#portfolio" class="navLink">portfolio</a>
						<span class="navSep">&times;</span>
						<a href="#blog" class="navLink">blog</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<!-- end of navbar -->

		<!-- start of mobile navbar -->
		<div class="mobile-navbar">
			<a href="<?php echo get_home_url(); ?>" class="navLogo"><?php echo get_bloginfo('name'); ?></a>
		</div>
		<!-- end of mobile navbar -->

		<!-- start of hero -->
		<header class="header" align="center" role="banner">
			<h1><?php echo get_bloginfo('name'); ?></h1>
			<!-- remove this if you don't want description on homepage -->
			<?php if (get_bloginfo('description') <> '') : ?>
				<p class="lead"><?php echo get_bloginfo('description'); ?></p>
			<?php endif; ?>
			<!-- end of description -->
			<img src="<?php bloginfo('template_url'); ?>/imgs/m-light.png" class="stache"/>
		</header>
		<!-- end of hero -->
