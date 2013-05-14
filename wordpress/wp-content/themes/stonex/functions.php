<?php
if ( ! isset( $content_width ) )
    $content_width = 940;
   
add_editor_style();
/*-----------------------------------------------------------------------------------*/
/* Options Framework Functions
/*-----------------------------------------------------------------------------------*/
 
/* Set the file path based on whether the Options Framework is in a parent theme or child theme */
    define('OF_FILEPATH', TEMPLATEPATH);
    define('ADMIN_PATH', STYLESHEETPATH . '/admin/');
    define('ADMIN_DIR', get_template_directory_uri() . '/admin/');
    define('LAYOUT_PATH', ADMIN_PATH . '/layouts/');
    define('OF_DIRECTORY', get_template_directory_uri());
 
// You can mess with these 2 if you wish.
    $themedata = get_theme_data(STYLESHEETPATH . '/style.css');
    define('THEMENAME', $themedata['Name']);
    define('OPTIONS', 'of_options'); // Name of the database row where your options are stored
    define('BACKUPS','of_backups');
 
// Build Options
    require_once (ADMIN_PATH . 'admin-interface.php');      // Admin Interfaces
    require_once (ADMIN_PATH . 'theme-options.php');        // Options panel settings and custom settings
    require_once (ADMIN_PATH . 'admin-functions.php');  // Theme actions based on options settings
    require_once (ADMIN_PATH . 'medialibrary-uploader.php'); // Media Library Uploader
    require_once (ADMIN_PATH . 'theme-functions.php'); //some theme functions
//add scripts
function my_jquery_scripts() {
if( !is_admin()){
   wp_deregister_script('jquery');
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"), false, '', false);
   wp_enqueue_script('jquery');
   wp_register_script('preloader', get_template_directory_uri() . '/js/jquery.tools.min.js', false, '', false);
   wp_enqueue_script('preloader');
   wp_register_script('jquery-tools', get_template_directory_uri() . '/js/jquery.preloader.js', false, '', true);
   wp_enqueue_script('jquery-tools');
   wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.js', false, '', true);
   wp_enqueue_script('isotope');   
   wp_register_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, '', true);
   wp_enqueue_script('jquery-easing');  
   wp_register_script('pretty-photo', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', false, '', true);
   wp_enqueue_script('pretty-photo');
   wp_register_script('audio-player', get_template_directory_uri() . '/audio_player/audio-player.js', false, '');
   wp_enqueue_script('audio-player');
   wp_register_script('video-player', get_template_directory_uri() . '/video_player/projekktor.min.js', false, '');
   wp_enqueue_script('video-player');
   wp_register_script('hover-int', get_template_directory_uri() . '/js/hoverIntent.js', false, '', true);
   wp_enqueue_script('hover-int');
   wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', false, '', true);
   wp_enqueue_script('superfish');  
   wp_register_script('jquery-mobile-customized', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', false, '', true);
   wp_enqueue_script('jquery-mobile-customized');
   wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', false, '', true);
   wp_enqueue_script('flexslider');
   wp_register_script('elastislide', get_template_directory_uri() . '/js/jquery.elastislide.js', false, '', true);
   wp_enqueue_script('elastislide');
   wp_register_script('quovolver', get_template_directory_uri() . '/js/jquery.quovolver.js', false, '', true);
   wp_enqueue_script('quovolver');  
   wp_register_script('gmap-api', ("http://maps.google.com/maps/api/js?sensor=false"), false, '', true);
   wp_enqueue_script('gmap-api');  
   wp_register_script('jquery-gmap', get_template_directory_uri() . '/js/jquery.gmap-1.1.0-min.js', false, '', true);
   wp_enqueue_script('jquery-gmap');  
   wp_register_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.8.11.custom.min.js', false, '', true);
   wp_enqueue_script('jquery-ui');
   wp_register_script('mobile-menu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', false, '', true);
   wp_enqueue_script('mobile-menu');
   wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', false, '', true);
   wp_enqueue_script('custom');
}
}
add_action('wp_enqueue_scripts', 'my_jquery_scripts');
// Add support for WP 2.9+ post thumbnails
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
    add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 189, 189, true ); // default Post Thumbnail dimensions
    add_image_size( 'large', 535, '', true ); // default large size
    add_image_size( 'slider-large', 940, 350, true ); // slider large image
    add_image_size( 'three-columns-portfolio', 250, 145, true ); // portfolio slider image
    add_image_size( 'latest-blog', 199, 90, true ); // latest blog image
    add_image_size( 'blog-thumbs', 590, 290, true ); // blog thumbs
    add_image_size( 'recent-thumbs', 50, 50, true ); // recent posts thumbs
    add_image_size( 'related-thumbs', 118, 67, true ); // related posts thumbs
    add_image_size( 'single-portfolio-thumbs', 590, 190, true ); // single portfolio thumbs
	add_image_size( 'homepage-portfolio-slider', 190, 90, true ); // homepage portfolio thumbs
}
//custom image sizes in media uploader 
function my_image_sizes($sizes) {
        $addsizes = array(
 				"slider-large" => __( "Large Slider Size", "framework")
                );
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
}
add_filter('image_size_names_choose', 'my_image_sizes');
 
//run shortcodes in widgets
add_filter('widget_text', 'do_shortcode');
 
add_theme_support('automatic-feed-links');

//remove automatic formatting
function webtreats_formatter($content) {
    $new_content = '';
 
    /* Matches the contents and the open and closing tags */
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';
 
    /* Matches just the contents */
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
 
    /* Divide content into pieces */
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
 
    /* Loop over pieces */
    foreach ($pieces as $piece) {
        /* Look for presence of the shortcode */
        if (preg_match($pattern_contents, $piece, $matches)) {
 
            /* Append to content (no formatting) */
            $new_content .= $matches[1];
        } else {
 
            /* Format and append to content */
            $new_content .= wptexturize(wpautop($piece));
        }
    }
 
    return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
 
// Before displaying for viewing, apply this function
add_filter('the_content', 'webtreats_formatter', 99);
add_filter('widget_text', 'webtreats_formatter', 99);
 
function raw_formatter($content) {
  // Shortcode [raw] ... {/raw] to preserve code formatting
    $new_content = '';
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
 
    foreach ($pieces as $piece) {
        if (preg_match($pattern_contents, $piece, $matches)) {
        $newstr = htmlspecialchars($matches[1], ENT_NOQUOTES);
        $new_content .= '<pre>' . preg_replace('/\n/is','',$newstr) . '</pre>';
        } else {
            $new_content .= wptexturize(wpautop($piece));
        }
    }
 
    return $new_content;
}
 
// localization
 
$lang = TEMPLATEPATH . '/lang';
load_theme_textdomain('framework', $lang);
 
//Change WordPress Admin Logo
 
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/admin_logo.png) !important; }
    </style>';
}
 
add_action('login_head', 'my_custom_login_logo');
 
// Theme support adding changed from 'nav-menus' to just 'menus'
add_theme_support( 'menus' );
 
// Function for registering wp_nav_menu() in 2 locations
add_action( 'init', 'register_navmenus' );
function register_navmenus() {
    register_nav_menus( array(
        'Header'    => __( 'Header Navigation', 'framework')
        )
    );
}
 
function my_page_menu_args($args) {
    $args['show_home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', 'my_page_menu_args');

//MEWNU DESCRIPTION WALKER CLASS

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '&nbsp;</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}
 
// WIDGETIZED SIDEBARS
 
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'framework'),
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4><span>',
        'after_title' => '</span></h4>',
    ));
}
 
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer Left Sidebar',
        'before_widget' => '<div class="footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer Middle Sidebar',
        'before_widget' => '<div class="footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
 
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer Right Sidebar',
        'before_widget' => '<div class="footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
 
//CUSTOM PAGINATION
function emm_paginate($args = null) {
    $defaults = array(
        'page' => null, 'pages' => null,
        'range' => 3, 'gap' => 3, 'anchor' => 1,
        'before' => '<div class="page_nav">', 'after' => '</div>',
        'title' => __('', 'framework'),
        'nextpage' => __('&raquo;', 'framework'), 'previouspage' => __('&laquo', 'framework'),
        'echo' => 1
    );

    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);

    if (!$page && !$pages) {
        global $wp_query;

        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;
 
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }
   
    $output = "";
    if ($pages > 1) {  
        $output .= "$before";
        $ellipsis = "<span class='emm-gap'>...</span>";
 
        if ($page > 1 && !empty($previouspage)) {
            $output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";
        }
       
        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
 
        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s',
                emm_paginate_loop(1, $anchor),
                $ellipsis,
                emm_paginate_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s',
                emm_paginate_loop(1, $anchor),
                $ellipsis,
                emm_paginate_loop($block_min, $block_high, $page),
                $ellipsis,
                emm_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s',
                emm_paginate_loop(1, $block_high, $page),
                $ellipsis,
                emm_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else {
            $output .= emm_paginate_loop(1, $pages, $page);
        }
 
        if ($page < $pages && !empty($nextpage)) {
            $output .= "<a href='" . get_pagenum_link($page + 1) . "' class='emm-next'>$nextpage</a>";
        }
 
        $output .= $after;
    }
 
    if ($echo) {
        echo $output;
    }
 
    return $output;
}
 
function emm_paginate_loop($start, $max, $page = 0) {
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i))
            ? "<span class='emm-page current'>$i</span>"
            : "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
    }
    return $output;
}
 
// filter tag clould output so that it can be styled by CSS
function style_tag_cloud($tags)
{
    $tags = preg_replace_callback("|(class='tag-link-[0-9]+)('.*?)(style='font-size: )([0-9]+)(pt;')|",
        create_function(
            '$match',
            '$low=1; $high=5; $sz=($match[4]-8.0)/(22-8)*($high-$low)+$low; return "{$match[1]} tagsz-{$sz}{$match[2]}";'
        ),
        $tags);
    return $tags;
}
 
// Hook into the rendering of the tag cloud widget
add_action('wp_tag_cloud', 'style_tag_cloud');
 
 
// TINYURL FOR SHARING ON TWITTER
function get_tiny_url($url) {
 
    if (function_exists('curl_init')) {
        $url = 'http://tinyurl.com/api-create.php?url=' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $tinyurl = curl_exec($ch);
        curl_close($ch);
 
        return $tinyurl;
    }
 
    else {
        # cURL disabled on server; Can't shorten URL
        # Return long URL instead.
    return $url;
    }
 
}
 
//gallery
 
function custom_gallery_shortcode($attr) {
    global $post, $wp_locale;
 
    static $instance = 0;
    $instance++;
 
    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;
 
    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }
 
    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));
 
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';
 
    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }
 
    if ( empty($attachments) )
        return '';
 
    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
 
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
 
    $selector = "gallery-{$instance}";
 
    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 0px;
                text-align: center;
                width: 200px;
            }
            #{$selector} img {
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->";
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
 
    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $image_attributes = wp_get_attachment_image_src( $id, 'full' );
        $link = '<a href="'.$image_attributes[0].'" rel="gallery_img[gallery]">'.wp_get_attachment_image($id, $size, false, false).'</a>';
 
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }
 
    $output .= "
            <br style='clear: both;' />
        </div>\n";
 
    return $output;
}
 
add_shortcode('gallery', 'custom_gallery_shortcode');
 
   
 
// Change Excerpt [...] to new string : WP2.8+
function excerpt_more($excerpt) {
return str_replace('[...]', '', $excerpt); }
add_filter('wp_trim_excerpt', 'excerpt_more');
 
// AUTOMATIC POST THUMBNAILS
function findImage() {
    $content = get_the_content();
    $count = substr_count($content, '<img');
    if ($count > 0) return true;
    else return false;
}
 
// retreives image from the post
function getImage($num) {
    global $more;
    $more = 1;
 
    $content = get_the_content();
    $count = substr_count($content, '<img');
    $start = 0;
 
    for($i=1;$i<=$count;$i++) {
        $imgBeg = strpos($content, '<img', $start);
        $post = substr($content, $imgBeg);
        $imgEnd = strpos($post, '>');
        $postOutput = substr($post, 0, $imgEnd+1);
        $image[$i] = $postOutput;
        $start=$imgEnd+1;    
        $cleanF = strpos($image[$num],'src="')+5;
        $cleanB = strpos($image[$num],'"',$cleanF)-$cleanF;
        $imgThumb = substr($image[$num],$cleanF,$cleanB);    
    }
   
    if(stristr($image[$num],'<img')) {
    echo $imgThumb; }
    $more = 0;
}
// SHOW NUMBER OF COMMENTS EXCLUDING PINGS/TRACKBACKS
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
return count($comments_by_type['comment']);
} else {
return $count;
}
}
// RAW HTML
function mish_code_filter($content_text) {
    $content_text = preg_replace('!(<pre.*?>)(.*?)</pre>!ise', " '$1' .  stripslashes( str_replace(array('<','>'),array('<','>'),'$2') )  . '</pre>' ", $content_text);
    return $content_text;
    }
 
add_filter('the_content','mish_code_filter', 1, 1);
// excerpt limit

function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content.
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content.
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
 
    $allowed_tags = '<p>,<a>,<em>,<strong>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
 
    $excerpt_word_count = 130; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
 
    $excerpt_end = '...'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
 
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');

//custom admin widgets style
function custom_widgets_style() {
    echo <<<EOF
<style type="text/css">
div.widget[id*=_contact_form_] .widget-top {
	color: #2191bf;
}
div.widget[id*=_flickr_photo_] .widget-top {
	color: #2191bf;
}
div.widget[id*=_ads_] .widget-top {
	color: #2191bf;
}
div.widget[id*=_contact_us_] .widget-top {
	color: #2191bf;
}
div.widget[id*=_tweets_] .widget-top {
	color: #2191bf;
}
</style>
EOF;
}
add_action('admin_print_styles-widgets.php', 'custom_widgets_style');
// CUSTOM GRAVATARS
if ( !function_exists('fb_addgravatar') ) {
function fb_addgravatar( $avatar_defaults ) {
$myavatar = get_stylesheet_directory_uri() . '/images/people-avatar.png';
$avatar_defaults[$myavatar] = 'people';
 
$myavatar2 = get_stylesheet_directory_uri() . '/images/admin-avatar.png';
$avatar_defaults[$myavatar2] = 'Admin';
 
return $avatar_defaults;
}
 
add_filter( 'avatar_defaults', 'fb_addgravatar' );
};
 
function the_title2($before = '', $after = '', $echo = true, $length = false) {
         $title = get_the_title();
 
      if ( $length && is_numeric($length) ) {
 
             $title = substr( $title, 0, $length );
 
          }
 
        if ( strlen($title)> 0 ) {
 
             $title = apply_filters('the_title2', $before . $title . $after, $before, $after);
 
             if ( $echo )
 
                echo $title;
 
             else
 
                return $title;
 
          }
 
      }
   
function get_attachment_id_by_src ($image_src) {
 
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;
}
//Metabox

    // Re-define meta box path and URL
    define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/admin/metabox/' ) );
    define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/admin/metabox/' ) );
    // Include the meta box script
    require_once RWMB_DIR . 'meta-box.php';
    // Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
    include RWMB_DIR . 'the-meta-boxes.php';

// Shortcodes
 
require("admin/shortcodes.php");
require("admin/tinymce_buttons.php");
 
//Widgets
 
// Contact Form Widget
require("admin/widgets/contact_form.php");
// Flickr Photos
require("admin/widgets/flickr.php");
// 125x125 Ads Widget
require("admin/widgets/125x125_ads.php");
// Contact US Widget
require("admin/widgets/contact_us.php");
// Twitter Widget
require("admin/widgets/latest_tweets.php");

//post types
require("admin/post_types/portfolio.php");
//Plugins
require("admin/plugins/sidebar_generator.php");
// Update Notifier
require('admin/update-notifier.php');
?>
<?php
// COMMENTS CALLBACK
function custom_comment_fun($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>" class="comment-body">
    <div class="comment-author vcard"> <?php echo get_avatar($comment,$size=$args['avatar_size']); ?> <cite class="fn"><?php echo get_comment_author_link(); ?></cite> <span class="says"> <?php echo get_comment_date('m/d/Y');?>, <?php echo get_comment_time();?></span>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em>
    <?php __('Your comment is awaiting moderation.', 'framework') ?>
    </em>
    <?php endif; ?>
    <div class="comment-meta commentmetadata"> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>
      <?php edit_comment_link(__('(Edit)', 'framework'),'&nbsp;&nbsp;','') ?>
    </div>
    <?php comment_text(); ?>
   
    <div class="clear"></div>
  </div>
  <?php
  // Do not include the </li> tag.
}
?>
<?php
//PINGS/TRACKBACKS CALLBACK
function list_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>">
<?php comment_author_link(); ?>
<?php } ?>