<?php
/** 
 * Handles the registration of the products custom post type
 * 
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage functions
 */

/**
 * Hooks the registration of products custom post type
 */
add_action('init' , 'register_product');

/**
 * Registers the product custom post type and its taxonomy
 */
function register_product(){
	$labels = array(
		'name' => 'Products',
		'singular_name' => 'Product',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Product',
		'edit_item' => 'Edit Product',
		'new_item' => 'New Product',
		'all_items' => 'All Product',
		'view_item' => 'View Product',
		'search_items' => 'Search Products',
		'not_found' => 'No Products Found',
		'not_found_in_trash' => 'No Products Found in Trash',
		'menu_name' => 'Products'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail'),
		'menu_icon' => '/wp-content/themes/hack-for-a-cause-theme/img/admin/icons/product.png'
	);
	
	register_post_type('product' , $args);

}