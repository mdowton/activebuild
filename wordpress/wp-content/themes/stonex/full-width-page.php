<?php
/*
Template Name: Full Width Page
*/
?>
<?php get_header(); ?>
<!--content-->
<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>>
  <div class="page_title">
    <h2>
      <span><?php the_title(); ?></span>
    </h2>
  </div>
  <!--post-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="full_width_page" id="post-<?php the_ID(); ?>">
    <?php  the_content();?>
    
    <?php wp_link_pages() ?>
    
    <p class="metadata">
      <?php edit_post_link(__('<br />Edit this entry.', 'framework'),'',''); ?>
    </p>
    
    <!--post-end-->
    <?php endwhile; else: ?>
    <p class="no-posts">
      <?php _e('Sorry, no posts matched your criteria.', 'framework') ?>
    </p>
    <?php endif; ?>
  </div>
</div>
<!--content-end-->
</div>
<!--wrapper-end-->
<?php get_footer(); ?>
