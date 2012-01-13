<?php
/** 
 * Handles the registration of the even custom post type
 * 
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage functions
 */

/**
 * Hooks the registration of event custom post type
 */
add_action('init' , 'register_event');
/**
 * Registers the portfolio custom post type and its taxonomy
 */
function register_event(){
	$labels = array(
		'name' => 'Events',
		'singular_name' => 'Event',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Event',
		'edit_item' => 'Edit Event',
		'new_item' => 'New Event',
		'all_items' => 'All Events',
		'view_item' => 'View Event',
		'search_items' => 'Search Events',
		'not_found' => 'No Events Found',
		'not_found_in_trash' => 'No Events Found in Trash',
		'menu_name' => 'Events'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array('with_front' => false),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'page-attributes'),
		'menu_icon' => get_bloginfo('stylesheet_directory') . '/img/admin/icons/event.png'
	);
	
	register_post_type('event' , $args);

}

/**
 * Function that outputs default helper content for the events post type.
 * 
 * @global type $current_screen
 * @param string $content
 * @return string 
 */
function default_event_content($content){
    global $current_screen;
	if ('event' == $current_screen->post_type){
		$content = '
        <p><strong>Challenge:</strong> "Enter your description of the challenge here."</p>
        <div class="logo-and-products clearfix">
            <div class="logo-col">
				&nbsp;
                <img src="'.get_stylesheet_directory_uri().'/img/eventlogo-toronto.png" alt="" />
            </div>
            <div class="product-col">
                &nbsp;
                <p><strong>Products Shipped:</strong></p>
            </div>
        </div>
		';
	}
	
	return $content;
}

/**
 * Adds default content to event post type
 * 
 * @see default_event_content()
 */
add_filter('default_content' , 'default_event_content');