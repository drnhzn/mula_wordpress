<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage NWTheme
 * @since NW 1.0
 */ 

	$post_id = get_the_ID();
	$post_thumbnail_url = get_the_post_thumbnail_url($post_id, 'standard-post-thumbnail');
?>

	<?php if(is_single()): ?>
		<h1 class="my-4"><?php the_title(); ?></h1>
	<?php endif; ?>

	<!-- Blog Post -->
	<div class="card mb-4">
		<?php if($post_thumbnail_url): ?>
		<img class="card-img-top" src="<?php echo $post_thumbnail_url; ?>" alt="Card image cap">
		<?php endif; ?>
		<div class="card-body">
			<?php if(!is_single()) : ?>
			<h2 class="card-title">
				<?php the_title(); ?>
			</h2>
			<?php 
				endif; 
				
				if(!is_single()):
					the_excerpt();
				else:
					the_content();
				endif; 
			?>


			<?php if(!is_single()) : ?>
			<a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Read More →</a>
			<?php endif; ?>
		</div>
		<div class="card-footer text-muted">
			Posted on
			<strong>
				<?php the_time('F j, Y H:i:s a'); ?>
			</strong> by
			<?php the_author(); ?>
		</div>
	</div>