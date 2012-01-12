<?php
/**
 * Functions file for the Radical Framework
 *
 * @package hack_theme
 * @subpackage functions
 * @author Conrad Muan <con.muan@gmail.com>
 */

/**
 * Includes the events post type registration
 */
include_once(TEMPLATEPATH . '/post-types/events.php');

/**
 * Includes the events meta boxes
 */
include_once(TEMPLATEPATH . '/meta-boxes/events-meta-boxes.php');

/**
 * Includes the products post type registration
 */
include_once(TEMPLATEPATH .'/post-types/products.php');

/**
 * Include the products meta boxes
 */
include_once(TEMPLATEPATH . '/meta-boxes/products-meta-boxes.php');

/**
 * Definitions to be used in add_custom_image_header()
 * @see add_custom_image_header()
 **/
define('HEADER_TEXTCOLOR' , '');
define('NO_HEADER_TEXT' , true);
define('HEADER_IMAGE', '%s/img/logo.png');
define('HEADER_IMAGE_WIDTH' , '285');
define('HEADER_IMAGE_HEIGHT', '111');

/**
 * Enables uploading a custom header image. In this theme, it is used to house the logo
 * @see admin_header_style()
 * @see output_header_image()
 **/
add_custom_image_header('output_header_image', 'admin_header_style');

/**
 * Callback function to ouput the header image in the admin screen
 **/
function admin_header_style(){ ?>
    <style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background: no-repeat;
        }
    </style><?php
}

/**
 * Callback to output the header image in the theme
 **/
function output_header_image() { ?>
    <style type="text/css">
        #logo {
            background:url('<?php header_image(); ?>');
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            display:block;
            margin-left:auto;
            margin-right:auto;
        }
    </style><?php
}

/**
 * Runs launch_theme method at init()
 * @see launch_theme()
 **/
add_action('init' , 'launch_theme');

/**
 * Method that registers sidebars and menus
 **/
function launch_theme(){
    register_sidebar(array(
        'name'=>'Sidebar',
        'id' => 'sidebar-1'
    ));
    register_nav_menus(array(
        'header_menu' => 'Header Navigation',
        'footer_menu' => 'Footer Navigation'
    ));
}

/**
 * Properly enqueues js in wp_head()
 * @see boilerplate_scripts()
 */
add_action('wp_enqueue_scripts' , 'boilerplate_scripts');

/**
 * Method wrapping calling html5 boilerplate js
 **/
function boilerplate_scripts(){
    // Store template path for use in this method
    $template_path = get_template_directory_uri();
    
    wp_enqueue_script('jquery');
    
    // Register Modernizr (html5 for older browsers)
    wp_register_script('modernizr' , $template_path.'/js/libs/modernizr-2.0.6.min.js');
    wp_enqueue_script('modernizr');
    
    // Register plugin.js
    wp_register_script ('boilerplate_plugins' , $template_path.'/js/plugins.js');
    wp_enqueue_script('boilerplate_plugins');
    
    // Register script.js
    wp_register_script ('theme_script' , $template_path.'/js/script.js');
    wp_enqueue_script('theme_script');
}

/**
 * Styles the tinymce editor 
 */
add_editor_style('editor-style_1.css');

/**
 * Post thumbnails enabled
 */
add_theme_support('post-thumbnails');