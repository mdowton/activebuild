<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->post_name] = $of_page->post_title; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:"); 

//slider effects

$slider_effects_list = array('fade' => 'Fade','slide' => 'Slide');

//Testing 
$of_options_select = array("one","two","three","four","five"); 
$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
$of_options_homepage_blocks = array( 
	"disabled" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"homepage_content"	=> __('Homepage Content Section', 'framework'),
		"latest_work"		=> __('Latest Work Section', 'framework'),
		"custom_content"		=> __('Custom Content Section', 'framework')
	), 
	"enabled" => array (
		"placebo" => "placebo", //REQUIRED!
	),
);


//Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//Background Images Reader
$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
$bg_images = array();

if ( is_dir($bg_images_path) ) {
    if ($bg_images_dir = opendir($bg_images_path) ) { 
        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                $bg_images[] = $bg_images_url . $bg_images_file;
            }
        }    
    }
}

/*-----------------------------------------------------------------------------------*/
/* TO DO: Add options/functions that use these */
/*-----------------------------------------------------------------------------------*/

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat" => "no-repeat", "repeat-x" => "repeat-x", "repeat-y" => "repeat-y", "repeat" => "repeat");
$body_pos = array("top left" => "top left", "top center" => "top center", "top right" => "top right", "center left" => "center left", "center center" => "center center", "center right" => "center right", "bottom left" => "bottom left", "bottom center" => "bottom center", "bottom right" => "bottom right");

// Image Alignment radio box
$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//default rss url
$default_feed = get_bloginfo('rss2_url');
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( "name" => __('General', 'framework'),
                    "type" => "heading");
					
$of_options[] = array( "name" => __('Hello There!', 'framework'),
					"desc" => "",
					"id" => "introduction",
					"std" => "<h3 style=\"margin: 0 0 10px;\">". __('Welcome to the innoVative Options Panel.', 'framework') ."</h3>". __('innoVative has a simple to use administration panel. The theme options are conveniently spread over a number of tabs. Each tab contains the options that pertain to a particular area of the theme.', 'framework') ."",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __('Enable/Disable Top Page Search Icon', 'framework'),
					"desc" => __('Enable or disable the top page search icon', 'framework'),
					"id" => "search_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Enable/Disable Top Page Social Icons', 'framework'),
					"desc" => __('Enable or disable the top page social icons', 'framework'),
					"id" => "social_icons_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Enable/Disable Facebook Icon', 'framework'),
					"desc" => __('Enable or disable the top page facebook icon', 'framework'),
					"id" => "facebook_icon_hide",
					"std" => 0,
					"type" => "checkbox");
										
$of_options[] = array( "name" => __('Your Facebook Profile Url', 'framework'),
                    "desc" => __('Enter your facebook profile url.', 'framework'),
                    "id" => "facebook_profile",
                    "std" => "#",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Enable/Disable Twitter Icon', 'framework'),
					"desc" => __('Enable or disable the top page twitter icon', 'framework'),
					"id" => "twitter_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Your Twitter Username', 'framework'),
                    "desc" => __('Enter your twitter username.', 'framework'),
                    "id" => "twitter_username",
                    "std" => "skatdesign",
                    "type" => "text");
				
$of_options[] = array( "name" => __('Enable/Disable LinkedIn Icon', 'framework'),
					"desc" => __('Enable or disable the top page LinkedIn icon', 'framework'),
					"id" => "linkedin_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Your LinkedIn Profile URL', 'framework'),
                    "desc" => __('Enter your LinkedIn profile url.', 'framework'),
                    "id" => "linkedin_profile",
                    "std" => "#",
                    "type" => "text");
					
					
$of_options[] = array( "name" => __('Enable/Disable Google Plus Icon', 'framework'),
					"desc" => __('Enable or disable the top page Google Plus icon', 'framework'),
					"id" => "googleplus_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Your Google Plus Profile URL', 'framework'),
                    "desc" => __('Enter your Google Plus profile url.', 'framework'),
                    "id" => "googleplus_profile",
                    "std" => "#",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Enable/Disable Pinterest Icon', 'framework'),
					"desc" => __('Enable or disable the top page Pinterest icon', 'framework'),
					"id" => "pinterest_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Your Pinterest Profile URL', 'framework'),
                    "desc" => __('Enter your Pinterest profile url.', 'framework'),
                    "id" => "pinterest_profile",
                    "std" => "#",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Enable/Disable Rss Icon', 'framework'),
					"desc" => __('Enable or disable the top page Rss icon', 'framework'),
					"id" => "rss_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Your Rss URL', 'framework'),
                    "desc" => __('Enter your Rss url.', 'framework'),
                    "id" => "rss_profile",
                    "std" => $default_feed,
                    "type" => "text");

$of_options[] = array( "name" => __('Enable/Disable Add This Icon', 'framework'),
					"desc" => __('Enable or disable the top page Add This icon', 'framework'),
					"id" => "addthis_icon_hide",
					"std" => 0,
					"type" => "checkbox");
					
					
$of_options[] = array( "name" => __('Homepage', 'framework'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Enable/Disable Homepage Intro', 'framework'),
					"desc" => __('Enable or disable the homepage intro section', 'framework'),
					"id" => "intro_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Intro Content', 'framework'),
					"desc" => __('Insert the intro section content. (html &amp; shortcodes are supported)', 'framework'),
					"id" => "intro_content",
					"std" => '<h3>
We create impactful designs, craft elegant user experiences, produce interactive marketing campaigns with measurable results, and build web applications that work seamlessly
</h3>

[actionbutton type="action"  link="#"]Request a Quote![/actionbutton]',
					"type" => "textarea");
					
$of_options[] = array( "name" => __('Homepage Layout Manager', 'framework'),
					"desc" => __('Organize how you want the layout to appear on the homepage', 'framework'),
					"id" => "homepage_layout",
					"std" => $of_options_homepage_blocks,
					"type" => "sorter");
					
$of_options[] = array( "name" => __('Latest Work Section Title', 'framework'),
					"desc" => __('Enter the title of the latest work section', 'framework'),
					"id" => "recent_projects_title",
					"std" => "Featured Work",
					"type" => "text");
					
$of_options[] = array( "name" => __('Latest Work Section Description', 'framework'),
					"desc" => __('Enter the content of the description of latest work section', 'framework'),
					"id" => "recent_projects_description",
					"std" => "Sed risus dui, lobortis quis anime vulputate eu, luctus sed massad. Aliquam erat volutpat. Fusce ouid vehicula felis in tortor tempus vel dignissim.
<br/><br/>
Vestibulum elementum quam ac lacus mollis elementum et ips.",
					"type" => "textarea");
					
$of_options[] = array( "name" => __('Portfolio Page', 'framework'),
					"desc" => __('Select your portfolio page.', 'framework'),
					"id" => "portfolio_page_url",
					"std" => __('Select a page:', 'framework'),
					"type" => "select",
					"options" => $of_pages);
					
$of_options[] = array( "name" => __('Custom Section Content', 'framework'),
					"desc" => __('Enter the content of custom section', 'framework'),
					"id" => "custom_content_section",
					"std" => "[one_half]
<h3>What's New?</h3>
[recent_posts]
[/one_half]

[one_half_last]
<h3>Watch our Promo Video</h3>
[youtube id=\"1iIZeIy7TqM\" width=\"440\" height=\"260\"]
[/one_half_last]",
					"type" => "textarea");

$of_options[] = array( "name" => __('Blog', 'framework'),
                    "type" => "heading");
					
$url =  ADMIN_DIR . 'images/';
$of_options[] = array( "name" => __('Main Layout', 'framework'),
					"desc" => __('Select main content and sidebar alignment. Choose between left or right side column layout.', 'framework'),
					"id" => "layout",
					"std" => "layout-2cr",
					"type" => "images",
					"options" => array(
						'layout-2cr' => $url . '2cr.png',
						'layout-2cl' => $url . '2cl.png')
					);

$of_options[] = array( "name" => __('Blog Posts Number', 'framework'),
					"desc" => __('Number of posts to show on the blog page.', 'framework'),
					"id" => "number_blogposts",
					"std" => "5",
					"type" => "text");

$of_options[] = array( "name" => __('Display Thumbnail on Blog Single Post', 'framework'),
					"desc" => __('Enable or disable the thumbnail on blog single post', 'framework'),
					"id" => "post_thumb_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Display Author Box', 'framework'),
					"desc" => __('Enable or disable the post\' author box', 'framework'),
					"id" => "author_box_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Display Trackbacks and Pings', 'framework'),
					"desc" => __('Enable or disable the display of trackbacks and pings', 'framework'),
					"id" => "trackbacks_pings_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Display Related Posts', 'framework'),
					"desc" => __('Enable or disable the related posts section', 'framework'),
					"id" => "related_box_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Display Social Share Buttons', 'framework'),
					"desc" => __('Enable or disable the social share buttons', 'framework'),
					"id" => "social_share_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Enable/Disable Facebook Comments', 'framework'),
					"desc" => __('Enable or disable the facebook blog comments', 'framework'),
					"id" => "facebook_comments_hide",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Facebook Comments App ID', 'framework'),
					"desc" => __('If Facebook comments are enabled insert your Facebook App ID', 'framework'),
					"id" => "facebook_app_id",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Portfolio', 'framework'),
                    "type" => "heading");

$of_options[] = array( "name" => __('Number of Portfolio Items to Display on Portfolio Page', 'framework'),
					"desc" => __('Number of portfolio items to show on the portfolio page.', 'framework'),
					"id" => "portfolio_items",
					"std" => "6",
					"type" => "text");

$of_options[] = array( "name" => __('Styling', 'framework'),
					"type" => "heading");

$of_options[] = array( "name" => __('Custom Logo', 'framework'),
					"desc" => __('Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)', 'framework'),
					"id" => "logo",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => __('Custom Favicon', 'framework'),
					"desc" => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'framework'),
					"id" => "custom_favicon",
					"std" => "",
					"type" => "upload");
					
$url =  ADMIN_DIR . 'images/';

$of_options[] = array( "name" => __('Theme Color', 'framework'),
					"desc" => __('Select the color of the theme.', 'framework'),
					"id" => "theme_color",
					"std" => "default.css",
					"type" => "images",
					"options" => array(
						'default.css' => $url . 'yellow.png',
						'blue.css' => $url . 'blue.png',
						'green.css' => $url . 'green.png',
						'red.css' => $url . 'red.png',
						'orange.css' => $url . 'orange.png',
						'purple.css' => $url . 'purple.png',
						'pink.css' => $url . 'pink.png')
						);

$of_options[] = array( "name" => __('Header &amp; Footer Background Pattern', 'framework'),
					"desc" => __('Select the body background pattern.', 'framework'),
					"id" => "header_bg_pattern",
					"std" => "body_bg.jpg",
					"type" => "images",
					"options" => array(
						'body_bg.jpg' => $url . 'body_bg.png',
						'body_bg2.jpg' => $url . 'body_bg2.png',
						'body_bg3.jpg' => $url . 'body_bg3.png',
						'body_bg4.jpg' => $url . 'body_bg4.png',
						'body_bg5.jpg' => $url . 'body_bg5.png',
						'body_bg6.jpg' => $url . 'body_bg6.png')
						);
						
$of_options[] = array( "name" => __('Body Background Pattern', 'framework'),
					"desc" => __('Select the body background pattern.', 'framework'),
					"id" => "html_bg_pattern",
					"std" => "html_bg.jpg",
					"type" => "images",
					"options" => array(
						'html_bg.jpg' => $url . 'html_bg.png',
						'html_bg2.jpg' => $url . 'html_bg2.png',
						'html_bg3.jpg' => $url . 'html_bg3.png',
						'html_bg4.jpg' => $url . 'html_bg4.png',
						'html_bg5.jpg' => $url . 'html_bg5.png',
						'html_bg6.jpg' => $url . 'html_bg6.png')
						);

$of_options[] = array( "name" => __('Custom CSS', 'framework'),
                    "desc" => __('Quickly add some CSS to your theme by adding it to this block.', 'framework'),
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");

$of_options[] = array( "name" => __('Typography', 'framework'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Sitewide Body Font Family', 'framework'),
					"desc" => __('Font face of the body', 'framework'),
					"id" => "body_font",
					"std" => array('face' => 'PT_Sans'),
					"type" => "typography");
					
$of_options[] = array( "name" => __('Sitewide Body Font Size', 'framework'),
					"desc" => __('Set up the body font size (px).', 'framework'),
					"id" => "body_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "13",
					"type" => "range");
					
$of_options[] = array( "name" => __('Sitewide Body Font Line Height', 'framework'),
					"desc" => __('Set up the body font line height size (px).', 'framework'),
					"id" => "body_line_height",
					"min" => "9",
					"max" => "50",
					"std" => "20",
					"type" => "range");

$of_options[] = array( "name" => __('Menu Font Family', 'framework'),
					"desc" => __('Font face of the menu', 'framework'),
					"id" => "menu_font",
					"std" => array('face' => 'Oswald'),
					"type" => "typography");
					
$of_options[] = array( "name" => __('Menu Font Size', 'framework'),
					"desc" => __('Set up the menu font size (px).', 'framework'),
					"id" => "menu_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "12",
					"type" => "range");

$of_options[] = array( "name" => __('Titles Font Family', 'framework'),
					"desc" => __('Font face of the titles', 'framework'),
					"id" => "titles_font",
					"std" => array('face' => 'Oswald'),
					"type" => "typography");
					
$of_options[] = array( "name" => __('H1 Title Font Size', 'framework'),
					"desc" => __('Set up the h1 titles font size (px).', 'framework'),
					"id" => "h1_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "22",
					"type" => "range");
					
$of_options[] = array( "name" => __('H2 Title Font Size', 'framework'),
					"desc" => __('Set up the h2 titles font size (px).', 'framework'),
					"id" => "h2_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "20",
					"type" => "range");
					
$of_options[] = array( "name" => __('H3 Title Font Size', 'framework'),
					"desc" => __('Set up the h3 titles font size (px).', 'framework'),
					"id" => "h3_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "18",
					"type" => "range");

$of_options[] = array( "name" => __('H4 Title Font Size', 'framework'),
					"desc" => __('Set up the h4 titles font size (px).', 'framework'),
					"id" => "h4_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "16",
					"type" => "range");

$of_options[] = array( "name" => __('H5 Title Font Size', 'framework'),
					"desc" => __('Set up the h5 titles font size (px).', 'framework'),
					"id" => "h5_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "14",
					"type" => "range");

$of_options[] = array( "name" => __('H6 Title Font Size', 'framework'),
					"desc" => __('Set up the h6 titles font size (px).', 'framework'),
					"id" => "h6_font_size",
					"min" => "9",
					"max" => "50",
					"std" => "12",
					"type" => "range");

$of_options[] = array( "name" => __('Feat. Slider', 'framework'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Enable/Disable Featured Slider', 'framework'),
					"desc" => __('Enable or disable the homepage featured slider', 'framework'),
					"id" => "slider_on_off",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Slider Type', 'framework'),
					"desc" => __('Select the type of the slider', 'framework'),
					"id" => "slider_type",
					"std" => "flex_slider",
					"options" => array('flex_slider' => 'Flex Slider', 'static_image' => 'Static Image'),
					"type" => "select");
					
$of_options[] = array( "name" => __('Static Image', 'framework'),
					"desc" => __('Upload your image (946x375)', 'framework'),
					"id" => "static_image",
					"std" => "",
					"type" => "media");  
					
$of_options[] = array( "name" => __('Featured Slider', 'framework'),
					"desc" => __('Enable or disable the homepage featured slider', 'framework'),
					"id" => "featured_slider",
					"std" => ' ',
					"type" => "slider");
					
$of_options[] = array( "name" => __('Slider Effect', 'framework'),
					"desc" => __('Select the effect of the featured slider', 'framework'),
					"id" => "slider_effect",
					"std" => "fade",
					"options" => $slider_effects_list,
					"type" => "select");
	
$of_options[] = array( "name" => __('Transition Speed', 'framework'),
					"desc" => __('Slide transition speed.', 'framework'),
					"id" => "slider_speed",
					"min" => "500",
					"max" => "3000",
					"std" => "1500",
					"type" => "range");
					
$of_options[] = array( "name" => __('Slide Pause Time', 'framework'),
					"desc" => __('How long each slide will show (milliseconds).', 'framework'),
					"id" => "slider_pause_time",
					"std" => "3000",
					"min" => "1000",
					"max" => "9000",
					"type" => "range");

$of_options[] = array( "name" => __('Pause on Hover', 'framework'),
					"desc" => __('Stop animation while hovering.', 'framework'),
					"id" => "slider_pause",
					"std" => 0,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Footer', 'framework'),
					"type" => "heading");

$of_options[] = array( "name" => __('Enable Custom Footer Copyright', 'framework'),
					"desc" => __('Displays your custom copyright text.', 'framework'),
					"id" => "footer_copyright",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __('Insert Your Custom Copyright Text', 'framework'),
					"desc" => __('Insert your custom copyright text.', 'framework'),
					"id" => "footer_copyright_text",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Tracking Code', 'framework'),
					"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'framework'),
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Backup', 'framework'),
                    "type" => "heading");

$of_options[] = array( "name" => __('Backup and Restore Options', 'framework'),
                    "desc" => "",
                    "id" => "aq_backup",
                    "std" => "",
                    "type" => "backup",
                    "options" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'framework'),
                    );
	}
}
?>