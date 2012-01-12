<?php
/**
 * Template Name: Home
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>

<?php get_header(); ?>

            <div class="opening-statement">
                
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                
                <?php the_content(); ?>
                
                <?php endwhile; endif; ?>
                
            </div>

<?php get_footer(); ?>