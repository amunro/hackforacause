<?php
/** 
 * Template for single event page
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 */
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>
    
<?php get_template_part('loop','event'); ?>

<?php get_footer(); ?>