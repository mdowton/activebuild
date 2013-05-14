<?php get_header(); ?>
<!--content-->

<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>> 
  <!--left-col-->
  <div id="left_col">
    <!--post-->
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="single_post" id="post-<?php the_ID(); ?>">
    	<h2 class="blog_post_title"><span class="recent_post_date"><?php the_time('M d, Y'); ?></span>
		<?php the_title(); ?>
    	</h2>
      <?php if ($data['post_thumb_hide'] == '1' ) : ?>
      <!-- post thumbnail -->
      <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
      <div class="blog_post_thumb">
        <?php   
$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id,'blog-thumbs');  
$image_url = $image_url[0]; 
?>
        <a href="<?php the_permalink() ?>"><img src="<?php echo $image_url; ?>" alt="" title="" width="590" height="290" /> </a>
        <span class="img_shadow">&nbsp;</span>
        </div>
      <?php endif; ?>
      <!-- post thumbnail end--> 
      <?php endif; ?>
      <!-- post meta -->
      <div class="post_meta">
        <ul>
          <li>
            <?php _e('Categories:', 'framework'); ?>
            <br />
            <?php the_category(', ') ?>
          </li>
          <li>
            <?php comments_popup_link (__('0 <span class="grey">Comments</span>', 'framework'), __('1 <span class="grey">Comment</span>', 'framework'), __('% <span class="grey">Comments</span>', 'framework')); ?>
          </li>
          <?php
$posttags = the_tags('<li>' .__('Tagged as:<br /> ', 'framework'). '', ', ', '</li>');
if ($posttags) {
echo '$posttags';
}
?>
        </ul>
      </div>
      <!-- post meta end --> 
      <!--post content -->
      <div class="excerpt">
        <?php  the_content();?>
        <strong class="pagination"><br />
        <?php wp_link_pages() ?>
        </strong> </div>
      <p class="metadata">
        <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

            // Both Comments and Pings are open ?>
        <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

            // Only Pings are Open ?>
        <?php _e('Responses are currently closed, but you can', 'framework') ?>
        <a href="<?php trackback_url(); ?> " rel="trackback">
        <?php _e('trackback', 'framework') ?>
        </a>
        <?php _e('from your own site.', 'framework') ?>
        <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

            // Comments are open, Pings are not ?>
        <?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'framework') ?>
        <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

            // Neither Comments, nor Pings are open ?>
        <?php _e('Both comments and pings are currently closed.', 'framework') ?>
        <?php }  edit_post_link(__('<br />Edit this entry.', 'framework'),'',''); ?>
      </p>
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
      <?php if( $data['author_box_hide'] == '1') : ?>
      <!-- author box -->
      <div id="authorarea"> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
        <?php if (function_exists('get_avatar')) { echo get_avatar(get_the_author_meta('email'), '84' ); }?>
        </a>
        <div class="authorinfo">
          <h4>About <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php the_author_meta('display_name'); ?>
            </a></h4>
          <p>
            <?php the_author_meta('description') ?>
          </p>
        </div>
      </div>
      <!-- author box end -->
      <?php endif; ?>
    </div>
    <!--post-end-->
    
    <?php endwhile; else: ?>
    <p style="text-align:center;">
      <?php _e('Sorry, no posts matched your criteria.', 'framework') ?>
    </p>
    <?php endif; ?>
    <?php if( $data['related_box_hide'] == '1'): ?>
    <!-- Related Posts -->
    <?php $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>4 // Number of related posts that will be shown.
    );
    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {

    echo '<div class="related_posts"><h4><span>' .__('You may also like', 'framework'). '</span></h4><ul>';

    while( $my_query->have_posts() ) {
    $my_query->the_post(); ?>
    <li>
      <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
      <div class="related_thumb">
        <?php   
$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id,'related-thumbs');  
$image_url = $image_url[0]; 
?>
        <a href="<?php the_permalink(); ?>"> <img src="<?php echo $image_url; ?>" alt="" title="" width="118" height="67" /> </a> </div>
      <?php endif; ?>
      <div class="related_content">
        <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a>
      </div>
    </li>
    <?php }
    echo '</ul></div>';
    }
    }
    $post = $orig_post;
    wp_reset_query(); ?>
    <div class="clear"  ></div>
    <!-- Related Posts  End-->
    <?php endif; ?>
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
