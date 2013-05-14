<?php get_header(); ?>
<!--content-->

<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>>
  <div class="page_title">
    <h2>
      <span><?php the_title(); ?></span>
    </h2>
  </div>
  <!--left col-->
  <div id="left_col"> 
    <!--post-->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('single_post'); ?>>
      <?php  the_content();?>
      <strong class="pagination"><br />
      <?php wp_link_pages() ?>
      </strong>
      <p class="metadata">
        <?php edit_post_link('<br />Edit this entry.','',''); ?>
      </p>
    </div>
    
    <!--post-end-->
    <?php endwhile; else: ?>
    <p class="no-posts">
      <?php _e('Sorry, no posts matched your criteria.', 'framework') ?>
    </p>
    <?php endif; ?>
  </div>
  <!--left-col-end--> 
  
  <!-- sidebar -->
  <?php get_sidebar(); ?>
  <!-- sidebar end--> 
</div>
<!--content-end-->
</div>
<!--wrapper-end-->
<?php get_footer(); ?>
