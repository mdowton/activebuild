<?php
// columns shortcode
function short_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'short_one_third');

function short_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'short_one_third_last');

function short_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'short_two_third');

function short_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'short_two_third_last');

function short_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'short_one_half');

function short_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'short_one_half_last');

function short_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'short_one_fourth');

function short_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'short_one_fourth_last');

function short_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'short_three_fourth');

function short_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'short_three_fourth_last');

function short_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'short_one_fifth');

function short_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'short_one_fifth_last');

function short_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'short_two_fifth');

function short_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'short_two_fifth_last');

function short_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'short_three_fifth');

function short_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'short_three_fifth_last');

function short_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'short_four_fifth');

function short_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'short_four_fifth_last');

function short_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'short_one_sixth');

function short_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'short_one_sixth_last');

function short_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'short_five_sixth');

function short_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'short_five_sixth_last');

//bordered images

function bordered_image( $atts, $content = null ) {
   return '<div class="bordered_image">' . do_shortcode($content) . '</div>';
}
add_shortcode('bimg', 'bordered_image');

//horizontal image divider

function divider_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
	'type'    => ''
    ), $atts));

	if ($type == "image") {
    $out = "<div class=\"image_divider\"></div>";
} elseif ($type == "space") {
    $out = "<div class=\"space_divider\"></div>";
}

    return $out;
}
add_shortcode('divider', 'divider_shortcode');


//read more button

function more_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '',
    'target'	=> '',
    'rel'	=> '',
    'align'	=> '',
    ), $atts));

	$align = ($align) ? ' align'.$align : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="read_more' .$align. '" href="' .$link. '" rel="'.$rel.'"><span>'.$content.'</span></a>';

    return $out;
}
add_shortcode('more', 'more_button');

//call to action button

function action_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '',
    'target'	=> '',
    'rel'	=> '',
    'align'	=> '',
    'type'	=> ''
    ), $atts));
	
	$type = (empty($type)) ? '' : '<span class="action_icon action_'.$type.'">&nbsp;</span>';
	$action_class = (empty($type)) ? '' : 'class="action_text"';
	$align = ($align) ? ' align'.$align : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="call_to_action' .$align. '" href="' .$link. '" rel="'.$rel.'">'.$type.'<span '.$action_class.'>'.$content.'</span></a>';

    return $out;
}
add_shortcode('actionbutton', 'action_button');



//audio player shortcode

function audio_player( $atts, $content = null ) {
    extract(shortcode_atts(array(
	'id'    => '',
    'src'	=> '',
    'title'	=> '',
    'artist'	=> '',
    'autostart'	=> 'no',
    'align'	=> 'left'
    ), $atts));

	$out = '[raw]<div class="audio_'.$align.'"><p id="'.$id.'">'. __('The audio player requires Flash Player to work. Please download Flash Player from', 'framework') .' <a href="http://get.adobe.com/flashplayer/">Adobe Website.</a></p>
	<script type="text/javascript">  
AudioPlayer.embed("'.$id.'", {  
soundFile: "'.$src.'",  
titles: "'.$title.'",  
artists: "'.$artist.'",
animation: "no",
autostart: "'.$autostart.'",
loader: "00a2ff" 
});  
</script>  
	</div>[/raw]';

    return $out;
}
add_shortcode('audio', 'audio_player');

//video player shortcode

function video_player( $atts, $content = null ) {
$timthumb = get_template_directory_uri().'/timthumb.php';
$swf_player = get_template_directory_uri().'/video_player/jarisplayer.swf';
    extract(shortcode_atts(array(
    'id'	=> '',
    'mp4'	=> '',
    'webm'	=> '',
    'ogg'	=> '',
	'youtube'	=> '',
    'title'	=> '',
    'width'	=> '430',
    'height'	=> '350',
    'poster'	=> ''.get_template_directory_uri().'/images/poster.png',
    'align'	=> ''
    ), $atts));
	
	if(empty($mp4))
	$mp4_source = '';
	else
	$mp4_source = '<source src="'.$mp4.'" type="video/mp4" />';
	
	if(empty($webm))
	$webm_source = '';
	else
	$webm_source = '<source src="'.$webm.'" type="video/webm" />';
	
	if(empty($ogg))
	$ogg_source = '';
	else
	$ogg_source = '<source src="'.$ogg.'" type="video/ogg" />';
	
	if(empty($youtube))
	$youtube_source = '';
	else
	$youtube_source = '<source src="'.$youtube.'" type="video/youtube" />';
	
	$poster_image = $timthumb.'?src='.$poster.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1';


	$out = '[raw]<div class="video1'.$align.'" style="width: '.$width.'px;"><video id="player_'.$id.'" class="projekktor" poster="'.$poster_image.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" controls>
	'.$mp4_source.'
	'.$webm_source.'
	'.$ogg_source.'
	'.$youtube_source.'
    </video><div class="clear"></div></div>
	<script type="text/javascript">
	$(document).ready(function() {
	    projekktor(\'#player_'.$id.'\', {
		playerFlashMP4:		\''.$swf_player.'\'	
		});
	});
    </script>[/raw]
	';

    return $out;
}
add_shortcode('video', 'video_player');

//youtube shortcode

function youtube_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'id'	=> '',
    'width'	=> '',
    'height'	=> '',
    'align'	=> ''
    ), $atts));

	$frame_width = $width - 5;
	$frame_height = $height - 5;

	$out = '<div class="video1'.$align.'" style="width: '.$width.'px; height: '.$height.'px; padding: 5px 0 0 5px; border: 1px solid #ebebeb; background: #fff;" ><iframe title="YouTube video player" width="'.$frame_width.'" height="'.$frame_height.'" src="http://www.youtube.com/embed/'.$id.'?wmode=transparent&amp;modestbranding=1&amp;autohide=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe><span class="img_shadow">&nbsp;</span></div>';

    return $out;
}
add_shortcode('youtube', 'youtube_shortcode');

//vimeo shortcode

function vimeo_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'id'	=> '',
    'width'	=> '',
    'height'	=> '',
    'align'	=> ''
    ), $atts));

	$frame_width = $width - 5;
	$frame_height = $height - 5;

	$out = '<div class="video1'.$align.'" style="width: '.$width.'px; height: '.$height.'px; padding: 5px 0 0 5px; border: 1px solid #ebebeb; background: #fff;" ><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$frame_width.'" height="'.$frame_height.'" frameborder="0"></iframe><span class="img_shadow">&nbsp;</span></div>';

    return $out;
}
add_shortcode('vimeo', 'vimeo_shortcode');



// button shortcode
function button_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target'	=> '',
    'style'	=> '',
    'size'	=> '',
    'align'	=> '',
    'rel'	=> ''
    ), $atts));

	$variation = ($style) ? ' '.$style. '_gradient' : '';
	$align = ($align) ? ' align'.$align : '';
	$size = ($size == 'large') ? ' large_button' : '';

	if(empty($rel))
	$nofollow = '';
	else
	$nofollow = 'rel="'.$rel.'"';

	if(empty($target))
	$button_target = '';
	else
	$button_target = 'target="'.$target.'"';

	
	$out = '<a ' .$button_target. ' class="button_link' .$variation.$size.$align. '" href="' .$link. '" '.$nofollow.'><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'button_shortcode');

//drop caps shortcode

function drop_caps( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'style'	=> 'normal',
    ), $atts));

	$out = '<span class="dropcaps_'.$style.'">'.do_shortcode($content).'</span>';

    return $out;
}
add_shortcode('dropcaps', 'drop_caps');

//lists shortcode

function list_style( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'style'	=> 'arrow'
    ), $atts));

	$out = '<ul class="list_'.$style.'">'.do_shortcode($content).'</ul>';

    return $out;
}
add_shortcode('list', 'list_style');

//icons shortcode

function icon_style( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'style'	=> 'home'
    ), $atts));
	$out = '<span class="icon_text icon_'.$style.'">'.do_shortcode($content).'</span>';

    return $out;
}
add_shortcode('icon', 'icon_style');

//icons shortcode

function lightbox_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'src'	=> '',
	'caption'	=> '',
	'group' => ''
    ), $atts));
	
	if(empty($group)) { $img_group = ''; } else $img_group = '['.$group.']';
	
	$out = '<a href="'.$src.'" rel="gallery_img'.$img_group.'" title="'.$caption.'">'. do_shortcode($content) .'</a>';

    return $out;
}
add_shortcode('lightbox', 'lightbox_shortcode');

//framed boxes shortcode

function framed_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
	'style'	=> ''
    ), $atts));
	
	if(empty($style))
	$framed_box = '<div class="framed_box"><div class="framed_box_content">';
	// info box
	elseif ($style == 'info')
	$framed_box = '<div class="info_box"><div class="info_box_content">';
	//note box
	elseif ($style == 'note')
	$framed_box = '<div class="note_box"><div class="note_box_content">';
	else
	$framed_box = '<div class="framed_box"><div class="framed_box_content">';

	$out = $framed_box.do_shortcode($content).'</div></div>';

    return $out;
}
add_shortcode('framed_box', 'framed_box_shortcode');


//styled table shortcode

function styled_table( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));

	$out = '<div class="styled_table">'.do_shortcode($content).'</div>';

    return $out;
}
add_shortcode('styled_table', 'styled_table');

//google maps shortcode

function google_maps( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'zoom'	=> '10',
    'address'	=> '',
    'latitude'	=> '0',
    'longitude'	=> '0',
    'popup'	=> '',
    'width'	=> '430',
    'height'	=> '350',
    'id'	=> '1'
    ), $atts));


	$out = '
	[raw]
<script type="text/javascript">
jQuery(document).ready(function(){ jQuery("#map_canvas'.$id.'").gMap({markers: [{
address: "'.$address.'",
latitude: '.$latitude.',
longitude: '.$longitude.',
html: "'.$popup.'",
popup: true
}],
zoom: '.$zoom.'}); });
</script>
<div id="map_canvas'.$id.'" class="google_map" style=" width: '.$width.'px; height:'.$height.'px">	
[/raw]

</div>

';

    return $out;
}
add_shortcode('googlemap', 'google_maps');
//latest from blog

function my_recent_posts_shortcode($atts){
	extract(shortcode_atts(array(
	'limit' => 2,
	'blogurl' => "#"
	), $atts));
 
	$q = new WP_Query('posts_per_page=' . $limit);
 
	$list = '<div class="latest_posts_shortcode"><ul>';
 
	while($q->have_posts()) : $q->the_post();
		$list .= '<li><span class="recent_post_date">' . get_the_time('M d, Y') . '</span><h5 class="recent_post_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5><p>' .substr(get_the_excerpt(), 0, 230). '...</p><div class="clear"></div></li>';
	endwhile;
 
	wp_reset_query();
 
	return $list . '</ul></div>';
}
 
add_shortcode('recent_posts', 'my_recent_posts_shortcode');

//newsletter subscribe

function newsletter_shortcode($atts){
	extract(shortcode_atts(array(
	'id' => 'skatdesign'
	), $atts));
 
 
	$out = '<div class="feedburner_submit">';
	$out .= "<form action=\"http://feedburner.google.com/fb/a/mailverify\" method=\"post\" target=\"popupwindow\" onsubmit=\"window.open('http://feedburner.google.com/fb/a/mailverify?uri=" .$id. "', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true\"><input style=\"color:#cccccc;\" maxlength=\"128\" onblur=\"this.value = this.value || this.defaultValue; this.style.color = '#cccccc';\" onfocus=\"this.value=''; this.style.color = '#42525d';\" type=\"text\" class=\"feedburner_input\" name=\"email\" value=\"your email address\"/><input type=\"hidden\" value=\"" .$id. "\" name=\"uri\"/><input type=\"hidden\" name=\"loc\" value=\"en_US\"/><input type=\"submit\" class=\"feedburner_button\" value=\" " . __('Join Now', 'framework') ."\" /></form>";
	$out .= '</div>';
 
 
	return $out;
}
 
add_shortcode('newsletter', 'newsletter_shortcode');


//tabs shortcode

function tabbed_content( $atts, $content ){
extract(shortcode_atts(array(
'type' => '',
'id' => ''
), $atts));
$GLOBALS['tab_count'] = 0;

do_shortcode( $content );

if ($type == 'horizontal')

if( is_array( $GLOBALS['tabs'] ) ){
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
$panes[] = '<div class="pane">'.do_shortcode($tab['content']).'</div>';
}
$return = '[raw] <!-- the tabs -->
<div class="the_tabs"><ul class="tabs">'.implode( "\n", $tabs ).'</ul>[/raw][raw]'."\n".'<!-- tab "panes" -->[/raw]<div class="panes">'.implode( "\n", $panes ).'</div>';

$return .= '</div>';
}

if ($type == 'vertical')

if( is_array( $GLOBALS['tabs'] ) ){
$i = 0;	
foreach( $GLOBALS['tabs'] as $tab){
$i++;	
$tabs[] = '<li><a class="" href="#tabs-'.$i.'">'.$tab['title'].'</a></li>';
$panes[] = '[raw]<div id="tabs-'.$i.'">'.do_shortcode($tab['content']).'[/raw]</div>';
}
$return ='[raw]<!-- the tabs -->
<div id="vertical_tabs" class="tabs-vertical"><ul>'.implode( "\n", $tabs ).'</ul>[/raw][raw]'."\n".'<!-- tab "panes" -->[/raw]'.implode( "\n", $panes ).''."\n";

$return .= '</div><div class="clear"></div>';
}


return $return;
}
add_shortcode( 'tabs', 'tabbed_content' );

function tabs_content( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'tabs_content' );


//accordion shortcode

function acordions_content($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
		'icon' => ''
	), $atts));

	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="tab">'. $matches[3][$i]['title'] .'</div>';
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}

		return '<div class="accordion">' . $output . '</div>';
	}
}
add_shortcode('accordions', 'acordions_content');

//toggles shortcode

function toggle_content($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	return '<div class="toggle"><h4 class="toggle_title">' . $title . '</h4><div class="toggle_content">' . do_shortcode(trim($content)) . '</div></div>';
}
add_shortcode('toggle', 'toggle_content');

//url shortner shortcode

function short($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'url' => '',
		'target' => '',
		'rel' => ''
	), $atts));
	
//This is the URL you want to shorten
$longUrl = $url;
$apiKey = '';
//Get API key from : http://code.google.com/apis/console/
 
$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
$jsonData = json_encode($postData);
 
$curlObj = curl_init();
 
curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlObj, CURLOPT_HEADER, 0);
curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
curl_setopt($curlObj, CURLOPT_POST, 1);
curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
 
$response = curl_exec($curlObj);
 
//change the response json string to object
$json = json_decode($response);
 
curl_close($curlObj);

return '<a href="'.$json->id.'" target="'.$target.'" rel="'.$rel.'">'.$json->id.'</a>';
}

add_shortcode('short', 'short');

//styled title shortcode

function styled_title_shortcode($atts, $content = null){
	extract(shortcode_atts(array(
	'size' => '3'
	), $atts));
 	
	$out = '<h'. $size .' class="styled_title"><span>'. $content .'</span></h'. $size .'>';

	return $out;
}
 
add_shortcode('styled_title', 'styled_title_shortcode');

//framed image shortcode

function framed_image_shortcode($atts, $content = null){
	extract(shortcode_atts(array(
	'align' => ''
	), $atts));
	$img_align = (!empty($align) ? 'align_'.$align : '');
	$out = '<span class="framed_img ' .$img_align. '">'. do_shortcode($content) .'<span class="img_shadow">&nbsp;</span></span>';

	return $out;
}
 
add_shortcode('framed_image', 'framed_image_shortcode');

//latest tweets shortcode

function latest_tweets_shortcode($atts, $content = null){
	extract(shortcode_atts(array(
	'user' => 'skatdesign',
	'tweets' => '1'
	), $atts));
 	
	$out = '<div class="twitter_shortcode">';
	$out .= '<ul id="twitter_update_list" class="tweets_list">';
    $out .= '<li>';
	$out .= '<p></p>';
	$out .= '</li>';
	$out .= '</ul>';
    $out .= '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
    $out .= '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'. $user .'.json?callback=twitterCallback2&amp;count='. $tweets .'"></script>';
	$out .= '</div>';

	return $out;
}
 
add_shortcode('tweets', 'latest_tweets_shortcode');

//google charts

function chart_shortcode( $atts ) {
	extract(shortcode_atts(array(
	    'data' => '',
	    'colors' => '',
	    'size' => '400x200',
	    'bg' => 'ffffff',
	    'title' => '',
	    'labels' => '',
	    'advanced' => '',
	    'type' => 'pie',
	    'align' => ''
	), $atts));
 
	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf=bg,s,'.$bg.'';
 
	return '[raw]<img class="'.$align.' google_chart" title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />[/raw]';
}
add_shortcode('chart', 'chart_shortcode');

//testimonial shortcode
function my_testimonial($atts, $content = null) {
$timthumb_url = ''.get_template_directory_uri().'/timthumb.php';
extract(shortcode_atts(array(
    'name' => '',
    'company' => '',
    'website' => ''
), $atts));

if (empty($website))
		$website_name = '';
		else $website_name = '<span class="testimonial_website">'.$website.'</span>';

if (empty($company))
		$company_name = '';
		else $company_name = '<span class="testimonial_company">'.$company.'</span>';

	$out = '[raw]<div class="testimonial">
	<div class="testimonial_content">
	<p class="testimonial_paragraph">'.$content.'</p>
	</div>
	<div class="testimonial_info"><span class="arrow-down"></span><span class="testimonial_name">'.$name.'</span>
	'.$company_name.'
	'.$website_name.'
	</div>
	</div>[/raw]';

  return $out;
}
add_shortcode('testimonial','my_testimonial');


//testimonial slider

function my_testimonial_slider($atts, $content = null) {
extract(shortcode_atts(array(
	'title' => 'Our Clients Love Us'
), $atts));
	
	$out = '<div id="testimonial_slider"><div class="testimonial_slider_bg">'.do_shortcode($content).'</div></div><div class="clear"></div>';

  return $out;
}
add_shortcode('testimonial_slider','my_testimonial_slider');



function my_testimonial_item($atts, $content = null) {
extract(shortcode_atts(array(
	'name' => ''
), $atts));

	$out = '<blockquote><p>'.do_shortcode($content).'</p><cite>'.$name.'</cite></blockquote>';

  return $out;
}
add_shortcode('testimonial_item','my_testimonial_item');


//highlight shortcode

function highlight($atts, $content = null) {
extract(shortcode_atts(array(
    'color' => ''
), $atts));


	$out = '<span class="'.$color.'_highlight">'.$content.' </span>';

  return $out;
}
add_shortcode('highlight','highlight');

//tooltip shortcode

function tooltip($atts, $content = null) {
extract(shortcode_atts(array(
    'text' => ''
), $atts));

	$out = '<span class="tool_tip"><span class="tool_tip_content">'.$content.'</span><span class="tooltip">'.$text.'<span class="tooltip_arrow"></span></span></span>';

  return $out;
}
add_shortcode('tooltip','tooltip');

//pricing table shortcode

function pricing_table($atts, $content = null) {
extract(shortcode_atts(array(

), $atts));

	$out = '[raw]<div class="clear"></div><div class="pricing_table">'.do_shortcode($content).'</div><div class="clear"></div>[/raw]';

  return $out;
}
add_shortcode('pricing_table','pricing_table');

function pricing_header($atts, $content = null) {
extract(shortcode_atts(array(
	'title' => '',
	'desc' => '',
	'type' => ''
	
), $atts));
	
	if (empty($desc))
		$desc_text = '';
	else
		$desc_text = '<p>'.$desc.'</p>';
		
	if(empty($type))
		$table_type = '';
	else
		$table_type = 'pricing_'.$type.'';

	$out = '<div class="pricing_column '.$table_type.'">
    <div class="pricing_header">
      <h2>'.$title.'</h2>
      '.$desc_text.'
    </div>
	<!-- end pricing_header -->
	';

  return $out;
}
add_shortcode('pricing_header','pricing_header');

function pricing_content($atts, $content = null) {
extract(shortcode_atts(array(
	'price' => '',
	'decimals' => '',
	'currency' => '$',
	'button_text' => 'Sign Up!',
	'button_link' => '#',
	'target' => '_self'	
	
), $atts));
	
	if(empty($decimals))
		$price_dec = '';
	else 
		$price_dec = '<sup>'.$decimals.'</sup>';

	$out = ' <div class="pricing_content">
      <div class="pricing_column_inside">
        <ul class="pricing">
		'.do_shortcode($content).'
		</ul>
        <span class="table_price"><span class="dollar_sign">'.$currency.'</span>'.$price.$price_dec.'</span> 
        <a class="pricing_table_button" href="'.$button_link.'" target="'.$target.'">'.$button_text.'</a> 
       </div>
      <!-- end pricing_column_inside --> 
      
    </div>
    <!-- end pricing_content --> 
    
  </div>
  <!-- pricing_column -->
	';

  return $out;
}

add_shortcode('pricing_content','pricing_content');

function pricing_item($atts, $content = null) {
extract(shortcode_atts(array(
	'text' => '',
	'type' => ''
), $atts));

	if(empty($type))
		$list_class = '';
	else
		$list_class = 'class="'.$type.'_mark"';
	
	$out = '<li '.$list_class.'><span>'.do_shortcode($content).'</span></li>
	';

  return $out;
}
add_shortcode('pricing_item','pricing_item');

//custom menu shortcode

function my_custom_menu($atts, $content = null) {
extract(shortcode_atts(array(
	'text' => ''
), $atts));

	$out = // Using wp_nav_menu() to display menu
wp_nav_menu( array(
	'menu' => 'Custom', // Select the menu to show by Name
	'class' => '',
	'menu_class' =>'my_custom_menu',
	'echo' => 0,
	'menu_id' => '',
	'container' => false, // Remove the navigation container div
	'theme_location' => 'Custom'
	)
);


  return $out;
}
add_shortcode('custom_menu','my_custom_menu');

//contact form shortcode

function contact_form( $atts, $content = null ) 
{
$contact_js = ''.get_template_directory_uri().'/js/contact-form.js';
    extract(shortcode_atts(array(
    'admin'	=> '',
   
    ), $atts));
	
$form_action = get_permalink();
if(isset($_POST['submitted'])) {

//Check to make sure that the name field is not empty
  if(trim(strip_tags($_POST['contactName'])) === '') {
   $nameError = '<span class="contact_form_error"><br />'. __('*You forgot to enter your name.', 'framework') .'</span>';
   $hasError = true;
  } else {
   $name = trim(strip_tags($_POST['contactName']));
  }
  
//Company Name
   $company_name = trim(strip_tags($_POST['companyName']));
//Check to make sure sure that a valid email address is submitted
  if(trim(strip_tags($_POST['email'])) === '')  {
   $emailError = '<span class="contact_form_error"><br />'. __('*You forgot to enter your email.', 'framework') .'</span>';
   $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$", trim($_POST['email']))) {
   $emailError = '<span class="contact_form_error"><br />'. __('*You entered an invalid email.', 'framework') .'</span>';
   $hasError = true;
  } else {
   $email = trim(strip_tags($_POST['email']));
  }

//Check to make sure comments were entered 
  if(trim(strip_tags($_POST['comments'])) === '') {
   $commentError = '<span class="contact_form_error"><br />'. __('*You forgot to enter your comments.', 'framework') .'</span>';
   $hasError = true;
  } else {
   if(function_exists('stripslashes')) {
    $comments = stripslashes(trim($_POST['comments']));
   } else {
    $comments = trim(strip_tags($_POST['comments']));
   }
  }
//If there is no error, send the email
  if(!isset($hasError)) {


			$emailTo = $admin;
			$subject = __('Contact Form Submission from ', 'framework').$name;
			$body = __('Company Name', 'framework').": $company_name \n\n".__('Name', 'framework').": $name \n\nEmail: $email \n\n".__('Comments', 'framework').": $comments";
			$headers = 'From: My Site <'.$emailTo.'>' . "\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;
  }
		}
if(!isset($emailSent)) $emailSent = null;
if(!isset($name)) $name = null;
if(!isset($nameError)) $nameError = null;
if(!isset($email)) $email = null;
if(!isset($emailError)) $emailError = null;
if(!isset($comments)) $comments = null;
if(!isset($commentError)) $commentError = null;
if (!isset($company_name)) $company_name = null;
if(!isset($emailSent) && $emailSent == !true)	$thank_you = null;
if(isset($emailSent) && $emailSent == true) $thank_you = '<p class="thanks"><strong>'. __('Thank you!', 'framework') .'</strong> '. __('Your email was successfully sent. We should be in touch soon.', 'framework') .'</p>';

$name_label = __('Name <span class="red_error">*</span>', 'framework');
$company_label = __('Company Name', 'framework');
$comments_label = __('Comments*', 'framework');
$email_label = __('Email <span class="red_error">*</span>', 'framework');
$send_it = __('SEND IT', 'framework'); 
				  
    $out = <<<EOT

<div class="contact_form">

<script type="text/javascript" src="{$contact_js}"></script>
[raw]
{$thank_you}
 <form action="{$form_action}" id="contactForm" method="post">
<p>
              <label for="companyName">{$company_label}</label>
              <input type="text" name="companyName" id="companyName" value="" class="requiredField" />
</p>

<p>
              <label for="contactName">{$name_label}</label>
              <input type="text" name="contactName" id="contactName" value="" class="requiredField" />
              {$nameError}
</p>
<p>
              <label for="email">{$email_label}</label>
              <input type="text" name="email" id="email" value="" class="requiredField email" />
              {$emailError}
</p>
<p class="form_textarea">
              <label class="contact_form_textarea" for="commentsText">{$comments_label}</label>
              <textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField" ></textarea>
              {$commentError}
</p>
              <input type="hidden" name="submitted" id="submitted" value="true" />
              <button type="submit" class="contact_submit">{$send_it}</button>

        </form>
	
      </div>
[/raw]
EOT;

	return $out;

}
add_shortcode('contactform', 'contact_form');

//url shortnet
?>