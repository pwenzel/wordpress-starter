<?php 
/**
 * @link Escape post content in META Attributes, http://codex.wordpress.org/Data_Validation 
 * @link Complete List of HTML Meta Tags, https://gist.github.com/kevinSuttle/1997924
 * @link Twitter Summary Card, https://dev.twitter.com/docs/cards/types/summary-card
 * @example get_template_part('meta');
 */
?>

<?php if(is_singular()||is_home()):?> 
<meta property="og:title" itemprop="name" content="<?php echo is_singular() ? get_the_title() : get_bloginfo('name') ?>">
<meta property="twitter:title" content="<?php echo is_singular() ? get_the_title() : get_bloginfo('name') ?>">
<?php endif ?>

<?php if(is_single()||is_home()):?>
<meta property="og:description" content="<?php echo is_single() ? get_the_excerpt() : get_bloginfo('description') ?>">
<meta property="twitter:description" content="<?php echo is_single() ? get_the_excerpt() : get_bloginfo('description') ?>">
<meta name="description" itemprop="description" content="<?php echo is_single() ? get_the_excerpt() : get_bloginfo('description') ?>">
<?php endif ?>

<?php if(is_singular()||is_home()):?>
<meta property="og:url" itemprop="url" content="<?php echo is_singular() ? the_permalink() : bloginfo('wpurl'); ?>">
<meta property="twitter:url" itemprop="url" content="<?php echo is_singular() ? the_permalink() : bloginfo('wpurl'); ?>">
<?php endif ?>

<?php if(is_singular()):?>
<meta name="revised" content="<?php the_modified_date(DATE_RFC2822); ?>">
<?php endif; ?>

<?php 
if (is_singular()){
	if (has_post_thumbnail($post->ID)){
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
		$thumb_path = $thumb[0];
		echo '<meta property="og:image" itemprop="image" content="'.$thumb_path.'">';   
     	echo '<meta property="twitter:image" itemprop="image" content="'.$thumb_path.'">';   
	}
} ?>

<meta property="og:type" content="<?php echo is_singular() ? "article" : "website" ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">

<?php if(is_singular()):?>
	<meta name="author" content="<?php the_author_meta('display_name',$post->post_author);?>">
    <?php if (get_the_author_meta( 'twitter',$post->post_author )): ?>
		<meta name="twitter:creator" content="@<?php echo esc_attr(get_the_author_meta('twitter',$post->post_author));?>">
	<?php endif; ?>
<?php endif; ?>


