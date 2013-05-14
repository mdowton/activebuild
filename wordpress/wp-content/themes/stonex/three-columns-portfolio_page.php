<?php
/*
Template Name: Three Columns Portfolio
*/
?>
<?php get_header(); ?>
<!--content-->

<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>> 
      <div class="filter_links">
    <ul class="option-set" data-option-key="filter">
        <li class="show_all"><a href="#" data-option-value="*" class="selected"><?php _e('show all', 'framework'); ?></a></li>
        <?php 
$results = get_terms('portfolio_categories');
if ($results) {
   foreach ($results as $result) {
	  echo '<li><a href="#filter" data-option-value=".'.$result->slug.'"><span>'.$result->name.'</span></a></li>';
   }
}
?>
      </ul>
      </div>

<div class="clear"></div>
  <!--portfolio-->
  <div class="three_columns_portfolio">
      <?php
  $portfolio_items = $data['portfolio_items'];
  $type = 'portfolio_page';
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args=array(
    'post_type' => $type,
    'post_status' => 'publish',
    'paged' => $paged,
    'posts_per_page' => $portfolio_items
  );
  $temp = $wp_query;  // assign original query to temp variable for later use
  $wp_query = null;
  $wp_query = new WP_Query();
  $wp_query->query($args);

if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
	$portfolio_item_type = get_post_meta( get_the_ID(), 'meta_item_type', true );
	$audio_url = get_post_meta( get_the_ID(), 'meta_audio', true );
	$audio_id = get_post_meta( get_the_ID(), 'meta_audio_id', true );
	$audio_title = get_post_meta( get_the_ID(), 'meta_audio_title', true );
	$audio_artist = get_post_meta( get_the_ID(), 'meta_audio_artist', true );
	$video_url = get_post_meta( get_the_ID(), 'meta_video', true );
	$image_id = get_post_thumbnail_id();  
	$full_image_url = wp_get_attachment_image_src($image_id,'full');  
	$full_image_url = $full_image_url[0];
	$image_url = wp_get_attachment_image_src($image_id,'homepage-portfolio-slider');  
	$image_url = $image_url[0];
?>
      <!--portfolio item-->
      <div class="three_columns_portfolio_item <?php
$output = array();
$terms = get_the_terms($post->ID, 'portfolio_categories');
foreach ($terms as $taxindex => $taxitem) 
$output[] = $taxitem->slug;
echo implode(' ', $output);
?>">
        
        
		<?php // pull featured image
			if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */
		?>
        <img src="<?php echo $image_url; ?>" alt="" title="<?php the_title(); ?>" width="190" height="90" />
        <?php endif; //end if post has thumbnail ?>
        <div class="latest_portfolio_overlay">
        <a class="view_case" href="<?php echo the_permalink(); ?>">
        <?php _e('view case', 'framework'); ?>
        </a>
        <?php switch($portfolio_item_type) {
				case 'video':
					$out = '<a class="play_video" href="'.$video_url.'" rel="portfolio" title="'. get_the_title() .'">'. __('play video', 'framework') .'</a>';
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
					$out .= '<a class="play_audio" href="#inline-'. $audio_id .'" rel="recent_projects[inline]" title="'. get_the_title() .'">'. __('play audio', 'framework') .'</a>';
					$out .= '<div id="inline-'. $audio_id .'" class="hide pretty_audio">';
					$out .= '<p id="'. $audio_id .'"><a href="http://get.adobe.com/flashplayer/">Adobe Website.</a></p>';
					$out .= '</div>';
					echo $out;
	          		break;

          		case 'photo':
					$out = '<a class="view_photo" href="'. $full_image_url .'" rel="portfolio" title="'. get_the_title() .'">'. __('view image', 'framework') .'</a>';
					echo $out;
					break;
			  } ?>
              </div>
              <div class="portfolio_content">
      <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
      <p><?php echo substr(get_the_excerpt(), 0, 58); ?></p>
      <span class="img_shadow">&nbsp;</span>
      </div>
        <!-- portfolio content end --> 
      
         </div>
         <!-- portfolio item end -->
      <?php endwhile; else : ?>
      <?php endif; ?>
 </div>
  <!-- portfolio end -->
  <!--portfolio pagination-->
  <div class="portfolio_pagination">
<?php if (function_exists("emm_paginate")) {
    emm_paginate();
} ?>
</div>
<!--portfolio pagination end--> 
</div>
<!-- content end -->
</div>
<!--wrapper-end-->
<?php get_footer(); ?>
