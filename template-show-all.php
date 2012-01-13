<?php
/**
 * Template Name: Products List (all events)
 * Loops out products by most recent event
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/

// Query all Events, order by last event created
$events = new WP_Query(array(
	'post_type' => 'event',
	'posts_per_page' => -1
));

while($events->have_posts()) { 
	$events->the_post();
	// store post_meta values into $events array only if all post_meta values exist
	if (''!==get_post_meta($post->ID, 'event_city', true) 
			&& '' !== get_post_meta($post->ID, 'event_date', true)
			&& '' !== get_post_meta($post->ID, 'event_fb_group', true)) {
		
		$event[] = array(
			'post_name' => $post->post_name,
			'city' => get_post_meta($post->ID, 'event_city', true),
			'date' => get_post_meta($post->ID, 'event_date', true),
			'fb_group' => get_post_meta($post->ID, 'event_fb_group', true)
		);
	}
}

?>

<?php get_header(); ?>

	<h2 class="page-title">Showcase</h2>
	
	<?php foreach ($event as $hack_item): ?>
	
	<?php $product = new WP_Query(array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'meta_value' => $hack_item['post_name']
	)); ?>
	
	<div class="hack-items category">
		
		<?php if (count($product->posts) != 0) : //only showcase the city if products were made in that city ?>
		
		<h4 class="category-title"><?php echo strtoupper($hack_item['city']); ?><span>// <?php echo $hack_item['date'] ?> </span> <a href="<?php echo $hack_item['fb_group']; ?>" class="category-link" target="_blank">Official Group</a></h4>
		
		<?php endif; ?>
		
		<?php if ($product->have_posts()) : while($product->have_posts()) : $product->the_post(); ?>
		
		<div class="hack-item">
			<ul>
				<li class="app-image">
					<?php the_post_thumbnail(array(280, 250)); ?>
				</li>
				<li class="app-name"><?php the_title(); ?></li>
				<li class="app-description">
					<div class="app-description-container">
						<?php the_content(); ?>
					</div><!--app-description-container-->
				</li>
				
				<?php if ('' !== get_post_meta($post->ID, 'product_fb_like', true)) : ?>
				
				<li class="app-link">
					<iframe src="//<?php echo preg_replace('/http:\/\/www.facebook.com/', 'www.facebook.com', get_post_meta($post->ID, 'product_fb_like', true)); ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowtransparency="true"></iframe>
				</li>
				
				<?php endif; ?>
				
			</ul>
		</div><!--hack-item-->
		
		<?php endwhile; endif; ?>

	</div><!--end .hack-items.category-->
	
	<?php endforeach; ?>

<?php get_footer(); ?>