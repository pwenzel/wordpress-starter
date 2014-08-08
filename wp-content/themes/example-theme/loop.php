<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('large-12 columns'); ?>>

					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>

					<div class="meta">
						<span itemprop="dateCreated"><?php the_date(); ?></span> 
					</div>

					<div class="entry-content">
						<?php
							if(is_archive()) {
								the_excerpt();
							} else {
								the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'theme' ) );
							}
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'theme' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
					</div>

					<?php if(is_archive()): ?><hr><?php endif; ?>

			</article>

		<?php endwhile; ?>

		<div class="large-12 columns">
			<nav class="row">
				<div class="nav-previous small-6 columns"><?php next_posts_link( '&larr; Older posts' ); ?></div>
				<div class="nav-next small-6 columns text-right"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
			</nav>
		</div>

<?php else : ?>
	<p><?php _e('Sorry, no posts or pages matched your criteria.'); ?></p>
<?php endif; ?>
	
	