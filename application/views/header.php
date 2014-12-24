<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<title></title>
	<meta name="author" content="" />
	<meta name="description" content="" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="favicon.ico" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_config_item('base_url'); ?>css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_config_item('base_url'); ?>css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_config_item('base_url'); ?>css/main.css" />
	
	<script src="<?php echo get_config_item('base_url'); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo get_config_item('base_url'); ?>js/main.js"></script>
</head>
<body>
	<header class="block-wide">
		<div class="header-block">
			<a href="<?php echo get_config_item('base_url'); ?>" id="logo"><img src="<?php echo get_config_item('base_url'); ?>images/logo.png" alt="" title=""/></a>
			<nav class="main-menu block-wrap">
<?php foreach($categories as $cat): ?>
				<a href="<?php echo $cat->url; ?>" class="main-menu-element" title="<?php echo $cat->title; ?>" style="background-position: -<?php echo $cat->position->x; ?>px -<?php echo $cat->position->y; ?>px" data-category-show="<?php echo $cat->id; ?>">
					<span><?php echo $cat->name; ?></span>
				</a>
<?php endforeach; ?>
			</nav>
		</div>
		<div class="sub-menu-wrap block-wide">
<?php foreach($subcategories as $id => $catList): ?>
			<nav class="sub-menu block-wrap" data-category="<?php echo $id; ?>">
<?php foreach($catList as $cat): ?>
				<a href="<?php echo $cat->url; ?>" class="main-menu-element" title="<?php echo $cat->title; ?>" style="background-position: -<?php echo $cat->position->x; ?>px -<?php echo $cat->position->y; ?>px">
					<span><?php echo $cat->name; ?></span>
				</a>
<?php endforeach; ?>
			</nav>
<?php endforeach; ?>
		</div>
	</header>
	<div class="header-hr block-wide"></div>
	<script src="<?php echo get_config_item('base_url'); ?>js/header.js"></script>
