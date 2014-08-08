<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php get_template_part('meta'); ?>
<title><?php wp_title('|',true,'right'); ?> <?php bloginfo( 'name' ); ?></title>
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
	
<?php get_template_part('google-tag-manager'); ?>

<?php if (has_nav_menu( 'header' )): ?>
<div class="contain-to-grid">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name">
				<h1 class="hide"><a href="<?php bloginfo( 'url' ); ?>"><span><?php bloginfo( 'name' ); ?></span></a></h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<?php wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'header',
				'items_wrap' => '<ul id="%1$s" class="right %2$s">%3$s</ul>',
			)); ?>
		</section>
	</nav>
</div>
<?php endif; ?>

<section class="row">

	<header class="large-12 columns text-center panel">
		<h2>
			<a href="<?php bloginfo( 'url' ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h2>
		<p><?php bloginfo( 'description' ); ?></p>
	</header>

</section>

<main>
