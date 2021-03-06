<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<!--content-->

<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>>
  <!--left-col-->
  <div id="left_col"> 
    <!--post-->
    <?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('showposts='.$data['number_blogposts'].''.'&paged='.$paged);
?>
    <?php if (have_posts()) : while ($wp_query->have_posts()): $wp_query->the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('blog_post'); ?>>
      <h2 class="blog_post_title"><span class="recent_post_date"><?php the_time('M d, Y'); ?></span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a>
        </h2>
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
        </ul>
      </div>
      <!-- post meta end --> 
      <!-- post excerpt -->
      <div class="excerpt">
        <?php the_excerpt(); ?>
      </div>
      <!-- post excerpt end--> 
      <div class="read_more_section"> <a href="<?php the_permalink() ?>#more-<?php the_ID(); ?>" rel="nofollow">
          <?php _e('Read More', 'framework'); ?>
          </a> </div>
    </div>
    <!--post-end-->
    
    <?php endwhile; else: ?>
    <p style="text-align:center;">
      <?php _e('Sorry, no posts matched your criteria', 'framework') ?>
      .</p>
    <?php endif; ?>
  </div>
  <!--left-col-end--> 
  
  <!--sidebar-->
  <?php get_sidebar(); ?>
  <!--sidebar end--> 
  <!--pagination-->
  <?php if (function_exists("emm_paginate")) {
    emm_paginate();
} ?>
  <!--pagination end--> 
</div>
<!--content-end-->

</div>
<!--wrapper-end-->
<?php get_footer(); ?>
