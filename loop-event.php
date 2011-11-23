<?php
/**
 * Loop for the single event template
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>
    <div id="main" role="main" class="grid_18 clearfix">
    <!-- single event -->
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1 class="the-title"><a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
            </header>
            
            <section class="post-meta">
                <div class="author-info clearfix">
                    <div class="grid_3 alpha author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                    </div>
                    
                    <div class="grid_15 omega author-description">
                        <h2><?php the_author(); ?></h2>
                        <?php the_author_meta('description'); ?>
                        <p>View all posts written by <?php the_author_posts_link(); ?></p>
                    </div>
                </div>
                
                <div class="posted-under">
                    <p>Posted under: <?php the_category(); ?></p>
                    <p><?php the_tags(); ?></p>
                    <?php edit_post_link('Edit this post'); ?>
                </div>  
            </section>
            
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
            }?>
            
            <?php the_content(); ?>
            
            <?php comments_template( '' , true); ?>
            
            <?php if(have_comments()): ?>
            
            <footer>
                
                <?php if (comments_open()) : ?>
                
                <a href="<?php comments_link(); ?>" title="Link to <?php the_title();?>'s Comments"><?php comments_number('No responses' , 'One response', '% responses'); ?></a>
                
                <?php endif; ?>
                
            </footer>
            
            <?php endif; ?>
            
        </article>
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 Goes here</h1>
        </article>
        
        <?php endif; ?>
    
    </div><!--main-->