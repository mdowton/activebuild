<?php
register_taxonomy(
	'featured_categories',
	'featured-slider',
	array(
		'hierarchical' => true,
		'label' => __('Featured Categories', 'framework'),
		'query_var' => true,
	)
);
// Create Featured Post Type

	add_action('init', 'create_featured');
	function create_featured() {
		
		$labels = array(
		'name' => __('Feat. Slider', 'framework'),
		'singular_name' => __('Slider Item', 'framework'),
		'add_new' => __('Add New', 'framework'),
		'add_new_item' => __('Add New Slide', 'framework'),
		'edit_item' => __('Edit Slider Item', 'framework'),
		'new_item' => __('New Slider Item', 'framework'),
		'view_item' => __('View Slider Item', 'framework'),
		'search_items' => __('Search Slides', 'framework'),
		'not_found' =>  __('Nothing found', 'framework'),
		'not_found_in_trash' => __('Nothing found in Trash', 'framework'),
		'parent_item_colon' => ''
	);
	
    	$featured_args = array(
        	'labels' => $labels,
        	'singular_label' => __('Feat. Slider', 'framework'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail','comments'),
			'taxonomies' => array('featured_categories') // this is IMPORTANT

        );
    	register_post_type('featured-slider',$featured_args);
	}

$prefix = 'dbt_';

$featured_meta_box = array(
    'id' => 'featured-meta-box',
    'title' => __('Featured Slider Options', 'framework'),
    'page' => 'featured-slider',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
		
		array(
            'name' => __('Slide Link', 'framework'),
            'id' => $prefix . 'slide_link',
			'desc' => __('Insert a custom link for your slide (optional)', 'framework'),
            'type' => 'text',
        ),
		array(
            'name' => __('Slide Type', 'framework'),
            'id' => $prefix . 'slide_type',
            'type' => 'select',
			'desc' => __('Select the type of your slide', 'framework'),
			'options' => array('full image', 'small image with text', 'youtube video with text', 'vimeo video with text', 'text only')
        ),
		array(
            'name' => __('Video ID', 'framework'),
			'desc' => __('Example: http://www.youtube.com/watch?v=<strong>Bb1CuDI5IcA</strong>', 'framework'),
            'id' => $prefix . 'video_url',
            'type' => 'text',
        ),
		array(
            'name' => __('Display Caption', 'framework'),
            'id' => $prefix . 'caption',
			'desc' => __('Tick if you want to enable a caption for your slide', 'framework'),
            'type' => 'checkbox'
        ),
		array(
            'name' => __('Caption Text', 'framework'),
            'id' => $prefix . 'caption_text',
			'desc' => __('Insert the content of the caption (shortcodes &amp; html are allowed)', 'framework'),
            'type' => 'textarea'
        )
    )
);
add_action('admin_menu', 'featured_add_box');

// Add meta box
function featured_add_box() {
    global $featured_meta_box;
    
    add_meta_box($featured_meta_box['id'], $featured_meta_box['title'], 'featured_show_box', $featured_meta_box['page'], $featured_meta_box['context'], $featured_meta_box['priority']);
}

// Callback function to show fields in meta box
function featured_show_box() {
    global $featured_meta_box, $post;
    
    // Use nonce for verification
    echo '<input type="hidden" name="featured_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    
    echo '<table class="form-table">';

    foreach ($featured_meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        
        echo '<tr>',
                '<th style="width: 20%;"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
				if (!isset($field['std'])) {
					//If not isset -> set with dumy value
					$field['std'] = "";
				}
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:400px" />', '<br />', $field['desc'];
                break;
            case 'textarea':
				if (!isset($field['std'])) {
					//If not isset -> set with dumy value
					$field['std'] = "";
				}
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select><br />', $field['desc'];
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" id="', $option['value'], '" value="',  $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' /><label style="margin-right: 10px;" for="'.$option['value'].'">',$option['name'].'</label>';
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    
    echo '</table>';
}
add_action('save_post', 'featured_save_data');

// Save data from meta box
function featured_save_data($post_id) {
    global $featured_meta_box;
    
    // verify nonce
    if (!wp_verify_nonce($_POST['featured_meta_box_nonce'], basename(__FILE__))) {
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
    
    foreach ($featured_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

?>
<?php
add_action( 'admin_head', 'featured_icon' );
function featured_icon() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-featured-slider .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/featured_icon.png) no-repeat 6px -17px !important;
        }
	#menu-posts-featured-slider:hover .wp-menu-image, #menu-posts-featured-slider.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php } ?>