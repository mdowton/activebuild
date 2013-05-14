<?php get_header(); ?>
<!--content-->
<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>>
  <!--left-col-->
  <div id="left_col"> 
    <!--post-->
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	$portfolio_item_type = get_post_meta( get_the_ID(), 'meta_item_type', true );
	$audio_url = get_post_meta( get_the_ID(), 'meta_audio', true );
	$audio_id = get_post_meta( get_the_ID(), 'meta_audio_id', true );
	$audio_title = get_post_meta( get_the_ID(), 'meta_audio_title', true );
	$audio_artist = get_post_meta( get_the_ID(), 'meta_audio_artist', true );
	$video_url = get_post_meta( get_the_ID(), 'meta_video', true );
	$image_id = get_post_thumbnail_id();  
	$full_image_url = wp_get_attachment_image_src($image_id,'full');  
	$full_image_url = $full_image_url[0];
	$image_url = wp_get_attachment_image_src($image_id,'single-portfolio-thumbs');  
	$image_url = $image_url[0];
	$client_name = get_post_meta(get_the_ID(), 'meta_client_name', true );
	$classification = get_post_meta(get_the_ID(), 'meta_classification', true );
?>
    <div class="single_post_portfolio" id="post-<?php the_ID(); ?>">
    <h2 class="blog_post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a></h2>
     <!-- post thumbnail -->
      <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
      <div class="blog_post_thumb">
        <?php   
$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id,'blog-thumbs');  
$image_url = $image_url[0]; 
?>
        <img src="<?php echo $image_url; ?>" alt="" title="" width="590" height="290" />
        <span class="img_shadow">&nbsp;</span>
        </div>
      <?php endif; ?>
      <!-- post thumbnail end-->
      <!-- post meta -->
      <div class="post_meta portfolio_meta">
          <?php switch($portfolio_item_type) {
				case 'video':
					$out = '<a class="list_play_video" href="'.$video_url.'" rel="portfolio" title="'. get_the_title() .'">'. __('play video', 'framework') .'</a>';
					echo $out;
          			break;

				case 'audio':
					$out = '<script type="text/javascript">';
					$out .= 'AudioPlayer.embed("'. $audio_id .'", {';
					$out .= 'soundFile: "'. $audio_url .'",';
					$out .= 'titles: "'. $audio_title. '",';
					$out .= 'artists: "'. $audio_artist .'",';
					$out .= 'animation: "no",';
					$out .= 'autostart: "yes",';
					$out .= 'loader: "00a2ff"';
					$out .= '});';
					$out .= '</script>';
					$out .= '<a class="list_play_audio" href="#inline-'. $audio_id .'" rel="recent_projects[inline]" title="'. get_the_title() .'">'. __('play audio', 'framework') .'</a>';
					$out .= '<div id="inline-'. $audio_id .'" class="hide pretty_audio">';
					$out .= '<p id="'. $audio_id .'"><a href="http://get.adobe.com/flashplayer/">Adobe Website.</a></p>';
					$out .= '</div>';
					echo $out;
	          		break;

          		case 'photo':
					$out = '<a class="list_view_photo" href="'. $full_image_url .'" rel="portfolio" title="'. get_the_title() .'">'. __('view image', 'framework') .'</a>';
					echo $out;
					break;
			  } ?>
      </div>
      <!-- post meta end --> 
      <!--post content -->
      <div class="excerpt">
        <?php  the_content();?>
        <strong class="pagination"><br />
        <?php wp_link_pages() ?>
        </strong> </div>
      <!--post content end -->
          <?php if ($data['social_share_hide'] == '1' ) : ?>
    <!--social share-->
    <div class="social_share">
      <ul>
        <li class="twitter_button"><!-- twitter button -->
          <div class="twitter-root"> 
            <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script> 
            <a style="float: left;" href="http://twitter.com/share" class="twitter-share-button"
      data-url="<?php the_permalink(); ?>"
      data-text="<?php the_title(); ?>"
      data-count="vertical">Tweet</a> </div>
          <!-- twitter button end --></li>
        <li class="plus_button"><script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
          <g:plusone size="tall" annotation="bubble" href="<?php the_permalink(); ?>"></g:plusone>
        </li>
        <li class="facebook_button"><!-- facebook button --> 
          <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-like" data-href="<?php the_permalink(''); ?>" data-send="false" data-layout="box_count" data-width="" data-show-faces="true"></div>
          <!-- facebook button end --></li>
          <li class="pinterest_button">
         <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */
		$image_id = get_post_thumbnail_id();  
		$image_url = wp_get_attachment_image_src($image_id,'single-post');  
		$image_url = $image_url[0]; 
		echo $image_url;
		endif;?>&amp;description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>
         </li>
        <li class="linkedin_button"> 
          <!-- linkedin button --> 
          <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script> 
          <script type="IN/Share" data-counter="top"></script> 
          <!-- linkedin button end-->
          </li>
      </ul>
    </div>
    <!--social share end-->
    <?php endif; ?>

    </div>
    <!--post-end-->
    
    <?php endwhile; else: ?>
    <p style="text-align:center;">Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
    <div class="clear"></div>
    <!--comments-->
    <?php comments_template('', true); ?>
    <!--comments end--> 
  </div>
  <!--left-col-end--> 
  <!--sidebar-->
  <?php get_sidebar(); ?>
  <!--sidebar end--> 
</div>
<!--content-end-->
</div>
<!--wrapper-end-->
<?php get_footer(); ?>
