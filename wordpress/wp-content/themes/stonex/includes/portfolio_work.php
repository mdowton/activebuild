<!-- latest portfolio --> 
<div class="latest_portfolio">
  <div class="portfolio_info">
    <h3><?php echo $data['recent_projects_title']; ?></h3>
    <p><?php echo $data['recent_projects_description']; ?> <a class="view_portfolio" href="<?php echo $data['portfolio_page_url']; ?>">
      <?php _e('View Portfolio', 'franework'); ?> &rarr;
      </a> </p>
  </div>
  <div class="the_carousel">
  <div id="carousel" class="es-carousel-wrapper">
					<div class="es-carousel">
						<ul>
      <?php
			$query = new WP_Query();
			$query->query(array('post_type'=>'portfolio_page', 'posts_per_page' => 6));
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
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
		<li>
        <?php // pull featured image
			if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */
		?>
        <img src="<?php echo $image_url; ?>" alt="" title="<?php the_title(); ?>" width="190" height="90" />
        <span class="thumb_glare">&nbsp;</span>
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
              </li>

      <?php endwhile; endif; ?>

      </ul>
					</div>
				</div>
                </div>
</div>
<!-- latest portfolio end --> 