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
        
        <article <?php post_class(); ?>>
			
			<div class="hack-items category">
				
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
				
			</div>
            
        </article>
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 - Not Found</h1>
            <p>The content you were looking for was not found.</p>
            <p><?php get_search_form(); ?></p>
        </article>
        
        <?php endif; ?>