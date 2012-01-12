<?php
/**
 * Grabs the list of events and stores in array
 * 
 * @return array
 */
function event_get_pages(){
    $pages = get_posts(array('post_type' => 'event', 'numberposts' => -1,));
    foreach ($pages as $page){
        $options[] = $page->post_name;
        
    }
    return $options;
}

/**
 * Global variables
 */
$product_prefix = 'product_';
$product_metabox = array(
	'id' => 'products-meta',
	'title' => 'Product Information',
	'page' => 'product',
	'context' => 'advanced',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Event',
			'id' => $product_prefix . 'associated_event',
			'type' => 'select',
			'options' => event_get_pages()
		),
        array(
            'name' => 'FB iFrame Like Link',
            'desc' => 'Enter the Facebook Like iFrame url',
            'id' => $product_prefix . 'fb_like',
            'type' => 'text'
        )
	)
);

add_action('admin_menu', 'product_add_box');

/**
 * Sets up the meta box fields on an product custom post type
 * 
 * @see product_show_box()
 * @global array $product_metabox 
 */
function product_add_box() {
	global $product_metabox;
	
	add_meta_box($product_metabox['id'], $product_metabox['title'], 'product_show_box', $product_metabox['page'], $product_metabox['context'], $product_metabox['priority']);
}

/**
 * Outputs the meta box fields on an product custom post type
 * 
 * @global array $product_metabox
 * @global type $post 
 */

function product_show_box() {
	global $product_metabox, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($product_metabox['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:30%"><label for="', $field['id'], '" style="font-size:15px; color:#464646; text-shadow:0px 1px 0px #fff; font-family: Georgia, \'Times New Roman\', Times">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					'<br />', $field['desc'];
				break;
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>';
				break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
			case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'product_save_data');

/**
 * Saves meta box data for product custom post type
 * 
 * @global array $product_metabox
 * @param type $post_id
 */
function product_save_data($post_id) {
	global $product_metabox;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($product_metabox['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}