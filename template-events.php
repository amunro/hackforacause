<?php
/**
 * Template Name: Events List
 * Loops out events content type (by most recent post)
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/

$events = new WP_Query(array(
	'post_type' => 'event',
	'posts_per_page' => -1
));

?>

<?php get_header(); ?>

        <h2 class="page-title">Events</h2>
    
        <?php if($events->have_posts()) : while($events->have_posts()) : $events->the_post(); ?>
		<div class="event event-toronto">
			<div class="col1">
				<h4 class="event-title"><?php echo strtoupper(get_post_meta($post->ID, 'event_city', true)); ?> // <?php echo get_post_meta($post->ID, 'event_date', true); ?> // <a href="<?php echo get_post_meta($post->ID, 'event_charity_url', true); ?>" target="_blank"><?php echo strtoupper(get_post_meta($post->ID, 'event_charity_name', true)); ?></a></h4>
                
                <?php the_content(); ?>
                
			</div>
			<div class="col2">
				<?php if ('' !== get_post_meta($post->ID, 'event_fb_group', true)): ?>
				<a class="link-group" href="<?php echo get_post_meta($post->ID, 'event_fb_group', true); ?>"><span>Official Facebook Group</span></a>
				<?php endif; ?>
				<?php if ( '' !== get_post_meta($post->ID, 'event_fb_photo', true)) : ?>
				<a class="link-hackers" href="<?php echo get_post_meta($post->ID, 'event_fb_photo', true); ?>"><span>Cause Hackers</span></a>
				<?php endif; ?>

                <?php if( '' !== get_post_meta($post->ID, 'event_fb_photo')) : ?>
                
				<ul class="hackers-gallery">
                    
                    <?php
                        $gallery_image = 1;
                        while ($gallery_image <= 9 ):
                            if(get_post_meta($post->ID, 'ev_gallery_image_'.$gallery_image)):
                    ?>
                    
					<li>
                        <a href="<?php echo get_post_meta($post->ID, 'event_fb_photo', true); ?>">
                            <img src="<?php echo get_post_meta($post->ID, 'ev_gallery_image_'.$gallery_image, true); ?>" width="180" height="119" />
                        </a>
                    </li>
                    
                    <?php
                            endif;
                        $gallery_image++;    
                        endwhile;
                    ?>
                    
				</ul>
                
                <?php endif; ?>

			</div>
		</div><!-- end event-toronto -->
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 - Not Found</h1>
            <p>The content you were looking for was not found.</p>
            <p><?php get_search_form(); ?></p>
        </article>
        
        <?php endif; ?>

<?php get_footer(); ?>