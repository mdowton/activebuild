<?php
register_taxonomy(
	'portfolio_categories',
	'portfolio_page',
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Portfolio Categories', 'framework' ),
			'singular_name' => __( 'Portfolio Category', 'framework'),
			'search_items' =>  __( 'Search Categories', 'framework'),
			'popular_items' => __( 'Popular Categories', 'framework' ),
			'all_items' => __( 'All Categories', 'framework' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category', 'framework' ), 
			'update_item' => __( 'Update Portfolio Category', 'framework' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'framework' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'framework' ),
			'separate_items_with_commas' => __( 'Separate Portfolio category with commas', 'framework' ),
			'add_or_remove_items' => __( 'Add or remove portfolio category', 'framework' ),
			'choose_from_most_used' => __( 'Choose from the most used portfolio category', 'framework' )
		),
		'query_var' => true
		
	)
);
// Create Portfolio Post Type

	add_action('init', 'create_portfolio');
	function create_portfolio() {
	
	$labels = array(
		'name' => __('Portfolio', 'framework'),
		'singular_name' => __('Portfolio Item', 'framework'),
		'add_new' => __('Add New', 'framework'),
		'add_new_item' => __('Add New Portfolio Item', 'framework'),
		'edit_item' => __('Edit Portfolio Item', 'framework'),
		'new_item' => __('New Portfolio Item', 'framework'),
		'view_item' => __('View Portfolio Item', 'framework'),
		'search_items' => __('Search Portfolio', 'framework'),
		'not_found' =>  __('Nothing found', 'framework'),
		'not_found_in_trash' => __('Nothing found in Trash', 'framework'),
		'parent_item_colon' => ''
	);

	
    	$portfolio_args = array(
        	'labels' => $labels,
        	'singular_label' => __('Portfolio', 'framework'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
        	'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'excerpt', 'comments'),
			'taxonomies' => array('portfolio_categories') // this is IMPORTANT

        );
    	register_post_type('portfolio_page',$portfolio_args);
	}
?>
<?php
add_action( 'admin_head', 'portfolio_icon' );
function portfolio_icon() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio_page .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio_icon.png) no-repeat 6px -17px !important;
        }
	#menu-posts-portfolio_page:hover .wp-menu-image, #menu-posts-portfolio_page.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php } ?>