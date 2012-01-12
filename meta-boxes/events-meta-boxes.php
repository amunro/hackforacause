<?php
/**
 * Global variables
 */
$event_prefix = 'event_';
$event_meta_box = array(
	'id' => 'events-meta',
	'title' => 'Event Information',
	'page' => 'event',
	'context' => 'advanced',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'City',
			'desc' => 'Enter the city this hackathon took place',
			'id' => $event_prefix . 'city',
			'type' => 'text',
			'std' => 'City Name'
		),
		array(
			'name' => 'Date',
			'desc' => 'Enter the date this hackathon took place',
			'id' => $event_prefix . 'date',
			'type' => 'date',
			'std' => 'MM.DD.YYYY'
		),
		array(
			'name' => 'Charity',
			'desc' => 'Enter the name of the charity',
			'id' => $event_prefix . 'charity_name',
			'type' => 'text',
			'std' => 'Charity name'
		),
		array(
			'name' => 'Charity Website',
			'desc' => 'Enter the URL of the charity <br /> eg: http://www.domain.com (optional)',
			'id' => $event_prefix . 'charity_url',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => 'Facebook Group',
			'desc' => 'Enter the URL of the Facebook Group <br /> eg: http://www.facebook.com/groups/causehackers/',
			'id' => $event_prefix . 'fb_group',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => 'Facebook Photo Gallery',
			'desc' => 'Enter the URL of the Facebook Photo Gallery <br /> eg: https://www.facebook.com/media/set/?set=a.278318222210676.60729.277579752284523',
			'id' => $event_prefix . 'fb_photo',
			'type' => 'text',
			'std' => ''
		)
		/*array(
			'name' => 'Select box',
			'id' => $event_prefix . 'select',
			'type' => 'select',
			'options' => array('Option 1', 'Option 2', 'Option 3')
		),
		array(
			'name' => 'Radio',
			'id' => $event_prefix . 'radio',
			'type' => 'radio',
			'options' => array(
				array('name' => 'Name 1', 'value' => 'Value 1'),
				array('name' => 'Name 2', 'value' => 'Value 2')
			)
		),
		array(
			'name' => 'Checkbox',
			'id' => $event_prefix . 'checkbox',
			'type' => 'checkbox'
		)*/
	)
);

add_action('admin_menu', 'event_add_box');

/**
 * Sets up the meta box fields on an event custom post type
 * 
 * @see event_show_box()
 * @global array $event_meta_box 
 */
function event_add_box() {
	global $event_meta_box;
	
	add_meta_box($event_meta_box['id'], $event_meta_box['title'], 'event_show_box', $event_meta_box['page'], $event_meta_box['context'], $event_meta_box['priority']);
}

/**
 * Outputs the meta box fields on an event custom post type
 * 
 * @global array $event_meta_box
 * @global type $post 
 */

function event_show_box() {
	global $event_meta_box, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($event_meta_box['fields'] as $field) {
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
			case 'date':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:30%; background: #fff url('. get_bloginfo('template_url') .'/img/admin/icons/event.png) no-repeat right center;" />',
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
	
	echo '</table>'.
		 '<script type="text/javascript">jQuery("#date").datepicker();</script>';
	
}

add_action('save_post', 'event_save_data');

/**
 * Saves meta box data for event custom post type
 * 
 * @global array $event_meta_box
 * @param type $post_id
 */
function event_save_data($post_id) {
	global $event_meta_box;
	
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
	
	foreach ($event_meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}