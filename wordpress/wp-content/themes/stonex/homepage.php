<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<!--content-->
<div id="post-<?php the_ID(); ?>"> 
  
  <?php
$layout = $data['homepage_layout']['enabled'];

if ($layout):

foreach ($layout as $key=>$value) {

    switch($key) {
	case 'homepage_content':
		require('includes/homepage_content.php');
		break;
    case 'latest_work':
		require('includes/portfolio_work.php');	
		break;
	case 'custom_content':
		require('includes/custom_content_section.php');
		break;
    }
}

endif;
?>
  
  </div>
  <!-- full width page end --> 
  
</div>
<!--content-end-->
</div>
<!--wrapper-end-->
<?php get_footer(); ?>
