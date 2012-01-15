<?php
/** 
 * Handles the registration of the build custom post type
 * 
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage functions
 */

/**
 * Hooks the registration of the build custom post type
 */
add_action('init' , 'register_checklist_item');

/**
 * Registers the build custom post type and its taxonomy
 */
function register_checklist_item(){
	$labels = array(
		'name' => 'Checklist Item',
		'singular_name' => 'Checklist Item',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Checklist Item',
		'edit_item' => 'Edit Checklist Item',
		'new_item' => 'New Checklist Item',
		'all_items' => 'All Checklist Items',
		'view_item' => 'View Checklist Item',
		'search_items' => 'Search Checklist Items',
		'not_found' => 'No Checklist Items Found',
		'not_found_in_trash' => 'No Checklist Items Found in Trash',
		'menu_name' => 'Checklist Item'
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
		'supports' => array('title','editor'),
		'menu_icon' => get_bloginfo('stylesheet_directory') . '/img/admin/icons/check-icon.png'
	);
	
	register_post_type('checklist' , $args);

}


/**
 * Function that outputs default helper content for the checklist post type.
 * 
 * @global type $current_screen
 * @param string $content
 * @return string 
 */
function default_checklist_content($content){
    global $current_screen;
    if ('checklist' == $current_screen->post_type) {
        $content = '
            <div class="child clearfix">
                <div class="child-description-container">
                    &nbsp;
                    <span class="child-description">Develop the idea.</span>
                </div>
                <div class="grand-child">
                    &nbsp;
                    <ul class="task-list">
                        <li>Find a Cause</li>
                        <li>Create a Facebook Group</li>
                        <li>Build a dream team</li>
                    </ul>
                </div>
            </div>
            ';
    }
    
    return $content;
}
/**
 * Adds default content to checklist post type
 * 
 * @see default_checklist_content()
 */
add_filter('default_content' , 'default_checklist_content');