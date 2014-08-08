<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<div class="row">

			<article id="post-<?php the_ID(); ?>" <?php post_class('large-7 large-centered columns'); ?>>

				<h2>
					<?php the_title(); ?>
				</h2>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			</article>

		</div>

		<?php endwhile; ?>

<?php else : ?>
	<p><?php _e('Sorry, no page was found.'); ?></p>
<?php endif; ?>
	
	