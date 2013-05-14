<?php get_header(); ?>

<!--content-->

<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>>
  <?php if (have_posts()) : ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
      <div class="page_title">
     <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2><span><?php _e('Categorized as:', 'framework'); ?> <?php single_cat_title(); ?></span></h2>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2><span><?php _e('Tagged as:', 'framework'); ?> <?php single_tag_title(); ?></span></h2>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2><span><?php _e('Archive for', 'framework'); ?> <?php the_time('F jS, Y'); ?></span></h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2><span><?php _e('Archive for', 'framework'); ?> <?php the_time('F, Y'); ?></span></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2><span><?php _e('Archive for', 'framework'); ?> <?php the_time('Y'); ?></span></h2>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2><span><?php _e('Archive', 'framework'); ?></span></h2>
      <?php } ?>
  </div>
  <!--left-col-->
  <div id="left_col">
    <?php $count = 1; ?>
    <?php while (have_posts()) : the_post(); ?>
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
        <p> <?php echo substr(get_the_excerpt(), 0, 350); ?> </p>
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

  