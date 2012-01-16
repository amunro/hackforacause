<?php
/**
 * Creates a metabox in the Events Post type where a user can input facebook gallery imgs
 * 
 * @author Conrad Muan <con.muan@gmail.com>
 */

$ev_gallery = 'ev_gallery_';

$ev_gallery_count = 1;
while($ev_gallery_count <= 9){
    $ev_gallery_fields[] = array(
        'name' => $ev_gallery.'image_'.$ev_gallery_count,
        'desc' => 'Enter the url of the facebook image url',
        'id' => $ev_gallery . 'image_' . $ev_gallery_count,
        'type' => 'text',
        'std' => ''
    );
    $ev_gallery_count++;
}

$ev_gallery_metabox = array(
	'id' => 'gallery-meta',
	'title' => 'Gallery Pictures',
	'page' => 'event',
	'context' => 'advanced',
	'priority' => 'high',
	'fields' => $ev_gallery_fields
);

add_action('admin_menu', 'ev_gallery_add_box');

/**
 * Sets up the meta box fields on an event custom post type
 * 
 * @see ev_gallery_show_box()
 * @global array $ev_gallery_metabox 
 */
function ev_gallery_add_box() {
	global $ev_gallery_metabox;
	
	add_meta_box($ev_gallery_metabox['id'], $ev_gallery_metabox['title'], 'ev_gallery_show_box', $ev_gallery_metabox['page'], $ev_gallery_metabox['context'], $ev_gallery_metabox['priority']);
}

/**
 * Outputs the meta box fields on an event custom post type
 * 
 * @global array $ev_gallery_metabox
 * @global type $post 
 */

function ev_gallery_show_box() {
	global $ev_gallery_metabox, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="ev_gallery_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($ev_gallery_metabox['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:20%; vertical-align:middle;"><label for="', $field['id'], '" style="font-size:15px; color:#464646; text-shadow:0px 1px 0px #fff; font-family: Georgia, \'Times New Roman\', Times">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
	
}

add_action('save_post', 'ev_gallery_save_data');

/**
 * Saves meta box data for event custom post type
 * 
 * @global array $ev_gallery_metabox
 * @param type $post_id
 */
function ev_gallery_save_data($post_id) {
	global $ev_gallery_metabox;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['ev_gallery_nonce'], basename(__FILE__))) {
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
	
	foreach ($ev_gallery_metabox['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}