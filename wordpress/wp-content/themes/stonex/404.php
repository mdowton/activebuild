<?php get_header(); ?>
<!--content-->

<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>> 
  <div class="page_title">
    <h2>
      <span><?php _e('OOOPS! 404 PAGE NOT FOUND', 'framework'); ?></span>
    </h2>
  </div>
  <!--left-col-->
  <div id="left_col"> 
    <!--single post-->
    <div class="single_post">
      <p class="not_found">
      <a href="<?php echo home_url('/'); ?>" title="<?php _e('Back to Homepage', 'framework'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="<?php _e('Back to Homepage', 'framework'); ?>" title="<?php _e('Back to Homepage', 'framework'); ?>" /></a><br/>
      <?php _e('We are really sorry, but the page you requested was not found.', 'framework'); ?><br />
      </p>
      <p>
      <?php _e('It seems that the page you were trying to reach does not exist any more or maybe it has just been moved.', 'framework'); ?>
      <?php _e('If you\'re looking for something try using the search form from the top or just click on the image to go to the homepage.', 'framework'); ?>
      </p>
      <p>
     <?php _e('Sorry for the inconvenience.', 'framework'); ?>
      </p>
    </div>
    <!--single post end--> 
  </div>
  <!--left-col-end-->
  <?php get_sidebar(); ?>
</div>
<!--content-end-->
</div>
<!--wrapper-end-->
<?php get_footer(); ?>
