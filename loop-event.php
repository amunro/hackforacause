<?php
/**
 * Loop for the single event template
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
                <?php /**
				<ul class="hackers-gallery">
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-01.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-02.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-03.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-04.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-05.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-06.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-07.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-08.jpg" width="180" height="119" /></a></li>
					<li><a href="https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523"><img src="assets/img/hacker-to-09.jpg" width="180" height="119" /></a></li>
				</ul>
                 *
                 */?>
			</div>
		</div><!-- end event-toronto -->
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 - Not Found</h1>
            <p>The content you were looking for was not found.</p>
            <p><?php get_search_form(); ?></p>
        </article>
        
        <?php endif; ?>