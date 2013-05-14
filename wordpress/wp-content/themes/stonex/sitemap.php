<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>
<!--content-->
<div id="content" <?php if (!is_front_page()) echo 'class="content_margin"'; ?>>
  <!--post-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="full_width_page" id="post-<?php the_ID(); ?>">
    
      <?php  the_content();?>
      <strong class="pagination"><br />
      <?php wp_link_pages() ?>
      </strong>
      <div class="sitemap">
        <h2>
          <?php _e('Pages','framework');?>
        </h2>
        <ul>
          <?php wp_list_pages('depth=0&sort_column=menu_order&title_li=' ); ?>
        </ul>
        <div class="space_divider" ></div>
        <h2>
          <?php _e( 'Category Archives','framework'); ?>
        </h2>
        <ul>
          <?php wp_list_categories( array('use_desc_for_title' => false, 'title_li' => false ) ); ?>
        </ul>
        <div class="space_divider" ></div>
        <?php 
	$archive_query = new WP_Query( array('showposts' => 1000));
?>
        <h2>
          <?php _e( 'Blog Posts','framework'); ?>
        </h2>
        <ul>
          <?php while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __("Permanent Link to %s", 'framework'), get_the_title() ); ?>">
            <?php the_title(); ?>
            </a></li>
          <?php endwhile; ?>
        </ul>
        <div class="space_divider" ></div>
        <?php 
	$portfolio_query = new WP_Query( array('post_type' => 'portfolio_page','showposts' => 1000 ));
	if($portfolio_query->have_posts()):
?>
        <h2>
          <?php _e( 'Portfolios','framework'); ?>
        </h2>
        <ul>
          <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __("Permanent Link to %s", 'framework'), get_the_title() ); ?>">
            <?php the_title(); ?>
            </a></li>
          <?php endwhile; ?>
        </ul>
        <?php endif;?>
        <div class="space_divider" ></div>
        <?php 
	$portfolio_query = new WP_Query( array('post_type' => 'featured-slider','showposts' => 1000 ));
	if($portfolio_query->have_posts()):
?>
        <h2>
          <?php _e( 'Featured','framework'); ?>
        </h2>
        <ul>
          <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __("Permanent Link to %s", 'framework'), get_the_title() ); ?>">
            <?php the_title(); ?>
            </a></li>
          <?php endwhile; ?>
        </ul>
        <?php endif;?>
      </div>
      <p class="metadata">
        <?php edit_post_link('<br />Edit this entry.','',''); ?>
      </p>

    
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




