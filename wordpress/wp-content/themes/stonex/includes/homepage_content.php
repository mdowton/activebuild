<!-- homepage custom content -->

<div class="homepage_content">
  <?php $homepage_slug = ''; if (!$homepage_slug) $custom_query = new WP_Query('pagename='.$homepage_slug.''); while ($custom_query->have_posts()) : $custom_query->the_post(); $do_not_duplicate = $post->ID; ?>
  <?php the_content(); ?>
  <?php edit_post_link(__('Edit this entry.', 'framework'),'',''); ?>
  <?php endwhile; ?>
</div>
<!-- homepage custom content end --> 