<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<article class="row" itemscope itemtype="http://schema.org/Article">	

	<div id="post-<?php the_ID(); ?>" <?php post_class('medium-12 columns'); ?>>

		<h2 itemprop="name"><?php the_title(); ?></h2>

		<div class="meta">
			<span itemprop="dateCreated"><?php the_date(); ?></span>
		</div>

		<div itemprop="articleBody">
			<?php the_content(); ?>
		</div>

		<?php comments_template(); ?>
		
	</div>

</article>

<?php endwhile; ?>

<?php else : ?>
	<p><?php _e('Sorry, no post was found.'); ?></p>
<?php endif; ?>
	
<?php get_footer(); ?>	