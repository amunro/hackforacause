<?php
/** Template for single blog entry. Post type is post
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 */
?>

<?php get_header(); ?>
    
<?php get_template_part('loop','single'); ?>

<?php get_footer(); ?>