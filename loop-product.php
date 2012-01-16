<?php
/**
 * Loop for the single product template
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>

        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php $mainProductPostID = $post->ID; ?>
        <article <?php post_class(); ?> id="main_product">
        
			<div class="category">
				<div>
					<div style="float:left;">
						<?php the_post_thumbnail(array(280, 250)); ?>
					</div>		
					<div style="float:left; margin-left:10px; width:500px;">	
						<h2 class="app_name"><?php the_title(); ?></h2>
						<div class="app_description"><?php the_content(); ?></div>
						<?php if ('' !== get_post_meta($post->ID, 'product_fb_like', true)) : ?>				
						<ul>				
							<li class="app-link">
								<div class="fb-like" data-layout="button_count" data-href="<?= the_permalink($post->ID) ?>" data-send="false" data-width="450" data-show-faces="true"></div>
							</li>
						</ul>				
						<?php endif; ?>
					</div>
				</div><!--hack-item-->
			</div>
			
        </article>
				
<?php
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

	<div style="background:#fafafa; padding:20px; box-shadow:inset 0px 0px 3px #666;">

		<h2 class="page-title">More Products</h2>
		<style> 
		.hack-item                       { width:140px; height:250px; }
		.hack-item .app-image            { height:125px }
		.hack-item .app-name             { font-size:12px; line-height:16px; }
		.hack-item .app-description p    { font-size:11px; line-height:15px; }
		#main_product .app_name          { font-size:26px; font-weight:bold; }
		#main_product .app_description p { color:#666; margin:10px 0; line-height:20px !important; }
		</style> 

	
	<?php foreach ($event as $hack_item): ?>
	
	<?php $product = new WP_Query(array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'meta_value' => $hack_item['post_name']
	)); ?>
	
		
		<div class="hack-items category" style="margin-top:0;">		

		<?php if (count($product->posts) != 0) : //only showcase the city if products were made in that city ?>
			<h4 class="category-title"><?php echo strtoupper($hack_item['city']); ?><span>// <?php echo $hack_item['date'] ?> </span> <a href="<?php echo $hack_item['fb_group']; ?>" class="category-link" target="_blank">Official Group</a></h4>		
		<?php endif; ?>
		
		<?php if ($product->have_posts()) : while($product->have_posts()) : $product->the_post(); ?>
		
		<?php if ($mainProductPostID == $post->ID) { continue; } ?>

				<div class="hack-item">
					<ul>
						<li class="app-image">
						<?php the_post_thumbnail(array(140, 125)); ?>
						</li>
						<li class="app-name"><?php the_title(); ?></li>

						<?php if ('' !== get_post_meta($post->ID, 'product_fb_like', true)) : ?>

						<li class="app-link">
						<div class="fb-like" data-layout="button_count" data-href="<?= the_permalink($post->ID) ?>" data-send="false" data-show-faces="true"></div>
						</li>

						<?php endif; ?>

					</ul>
				</div><!--hack-item-->
				
		<?php endwhile; endif; ?>	

		<?php if (count($product->posts) != 0) : //only showcase the city if products were made in that city ?>
		</div><!--end .hack-items.category-->
		<?php endif; ?>

	<?php endforeach; ?>

			</div>
            
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 - Not Found</h1>
            <p>The content you were looking for was not found.</p>
            <p><?php get_search_form(); ?></p>
        </article>
        
        <?php endif; ?>