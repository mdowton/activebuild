<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit: 
 * @link http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'meta_';

global $meta_boxes;

$meta_boxes = array();

// Portfolio meta boxes
$meta_boxes[] = array(
	'id'		=> 'portfolio_options',
	'title'		=> 'Portfolio Options',
	'pages'		=> array( 'portfolio_page' ),
	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',
	// Order of meta box: high (default), low; optional
	'priority' => 'high',
	'fields'	=> array(
		
		array(
			'name'		=> __('Portfolio Item Type', 'framework'),
			'id'		=> "{$prefix}item_type",
			'type'		=> 'select',
			'options'	=> array(
				'photo'	=> __('Image', 'framework'),
				'video'	=> __('Video', 'framework'),
				'audio'		=> __('Audio', 'framework')
			),
			'desc'		=> __('Choose the type of your item', 'framework'),
			'std'		=> 'photo'
		),
		array(
			'name'		=> __('Video URL', 'framework'),
			'id'		=> "{$prefix}video",
			'type'		=> 'text',
			'size'		=> '50',
			'desc'		=> __('Enter the URL of your video', 'framework')
		),
		array(
			'name'		=> __('Audio File URL', 'framework'),
			'id'		=> "{$prefix}audio",
			'type'		=> 'text',
			'size'		=> '50',
			'desc'		=> __('Enter the URL of your audio file <small>(eg. yoursite.com/sound.mp3)</small>', 'framework')
		),
		array(
			'name'		=> __('Audio File ID', 'framework'),
			'id'		=> "{$prefix}audio_id",
			'type'		=> 'text',
			'size'		=> '50',
			'desc'		=> __('Enter a number for the audio ID <small>(must be unique in your portfolio)</small>', 'framework')
		),
		array(
			'name'		=> __('Audio File Title', 'framework'),
			'id'		=> "{$prefix}audio_title",
			'type'		=> 'text',
			'size'		=> '50',
			'desc'		=> __('Enter the title of the audio file', 'framework')
		),
		array(
			'name'		=> __('Audio File Artist', 'framework'),
			'id'		=> "{$prefix}audio_artist",
			'type'		=> 'text',
			'size'		=> '50',
			'desc'		=> __('Enter the name of the artist', 'framework')
		)
	)
);

// Slogan meta boxe
$meta_boxes[] = array(
	'id'		=> 'page_slogan',
	'title'		=> 'Page Slogan',
	'pages'		=> array( 'page' ),
	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',
	// Order of meta box: high (default), low; optional
	'priority' => 'high',
	'fields'	=> array(
		
		array(
			'name'		=> __('Page Slogan', 'framework'),
			'id'		=> "{$prefix}page_slogan",
			'type'		=> 'textarea',
			'desc'		=> __('Insert The Page Slogan', 'framework'),
			'cols'		=> "40",
			'rows'		=> "2",
			'std'		=> ''
		),
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );