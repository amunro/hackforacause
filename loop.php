<?php
/**
 * Main Loop
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>
    
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