<?php get_header(); ?>

<?php 
if(is_home()) {
	get_template_part( 'part', 'home' );
} elseif(is_page()) {
	get_template_part( 'loop', 'page' );
} else {
	get_template_part( 'loop' );
} ?>

<?php get_footer(); ?>