<?php
/**
 * Template Name: Timeline
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/

$check_list = new WP_Query(array(
    'post_type' => 'checklist',
    'posts_per_page' => -1
));

?>
<?php get_header(); ?>

        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
        <article <?php post_class(); ?>>
            <header>
                <h1 class="the-title"><?php the_title(); ?></h1>
            </header>
            
            <?php the_content(); ?>
        
        </article>    
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 - Not Found</h1>
            <p>The content you were looking for was not found.</p>
            <p><?php get_search_form(); ?></p>
        </article>
        
        <?php endif; ?>
            
        <div id="timeline">
			<h4 class="timeline-title">Timeline</h4>
            
            <?php if($check_list->have_posts()) : while($check_list->have_posts()) : $check_list->the_post(); ?>

			<div class="parent">
				<h5 class="parent-title"><?php the_title(); ?></h5>
                
                <?php the_content(); ?>
						
			</div><!-- end .parent -->
            
            <?php endwhile; endif; ?>
			
		</div><!-- end #timeline -->

<?php get_footer(); ?>