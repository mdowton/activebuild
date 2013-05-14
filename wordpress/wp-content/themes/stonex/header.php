<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php global $data; ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php echo get_bloginfo('html_type'); ?>; charset=<?php echo get_bloginfo('charset'); ?>" />
<meta name="robots" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="msnbot" content="index,follow" />
<meta name="search engines" content="Aeiwi, Alexa, AllTheWeb, AltaVista, AOL Netfind, Anzwers, Canada, DirectHit, EuroSeek, Excite, Overture, Go, Google, HotBot. InfoMak, Kanoodle, Lycos, MasterSite, National Directory, Northern Light, SearchIt, SimpleSearch, WebsMostLinked, WebTop, What-U-Seek, AOL, Yahoo, WebCrawler, Infoseek, Excite, Magellan, LookSmart, CNET, Googlebot" />
<meta name="distribution" content="global" />
<meta name="rating" content="general" />
<meta name="language" content="en" />
<?php if( $data['facebook_comments_hide'] == 1) : ?>
<meta property="fb:app_id" content="<?php echo $data['facebook_app_id']?>" />
<?php endif;?>
<title>
<?php if (is_front_page()) {
	echo get_bloginfo('name');
	}
	elseif ( is_single() ) {
		the_title();
		}
		elseif (is_page()) {
			the_title(); echo ' | '; echo get_bloginfo('name');
			}
			elseif (is_category()) {
				single_cat_title(); echo ' | '; echo get_bloginfo('name');
				}
				elseif (is_month()) {
					echo 'Archive for '; echo the_time('F, Y');
					}
					elseif (is_tag()) {
						echo 'Items tagged '; echo single_tag_title();
						}
						else {
							}
?>
</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<style type="text/css">
.js {
	display: none;
}
</style>
<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> RSS Feed" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php echo get_bloginfo('pingback_url'); ?>" />
<!-- google fonts -->
<?php
$titles_font = str_replace('_', '+', $data['titles_font']['face']);
$menu_font = str_replace('_', '+', $data['menu_font']['face']);
$body_font = str_replace('_', '+', $data['body_font']['face']);


if ($menu_font != $titles_font && $menu_font != 'Droid+Sans' && $menu_font != 'Arial' && $menu_font != 'Verdana' && $menu_font != 'Tahoma' && $menu_font != 'Helvetica' && $menu_font != 'Georgia' && $menu_font != 'Times+New+Roman') : ?>
<link href="http://fonts.googleapis.com/css?family=<?php echo $menu_font; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>


<?php 
if ($titles_font != $menu_font && $titles_font != 'Droid+Sans' && $titles_font != 'Arial' && $titles_font != 'Verdana' && $titles_font != 'Tahoma' && $titles_font != 'Helvetica' && $titles_font != 'Georgia' && $titles_font != 'Times+New+Roman') : ?>
<link href="http://fonts.googleapis.com/css?family=<?php echo $titles_font; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>

<?php 
if ($body_font != $menu_font && $body_font != $titles_font && $body_font != 'Arial' && $body_font != 'Verdana' && $body_font != 'Tahoma' && $body_font != 'Helvetica' && $body_font != 'Georgia' && $body_font != 'Times+New+Roman') : ?>
<link href="http://fonts.googleapis.com/css?family=<?php echo $body_font; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>


<link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
<!-- default stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/<?php echo (empty($data['theme_color']) ? 'default.css' : $data['theme_color'] );  ?>"  />
<!-- pretty photo stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/prettyPhoto.css"  />
<!-- pretty photo stylesheet end -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/video_player/theme/style.css" type="text/css" media="screen" />
<!-- featured slider stylesheet -->
<?php if (is_front_page() && $data['slider_on_off'] == 1 ) : ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/featured_slider.css"  />
<?php endif; ?>
<!-- featured slider stylesheet end -->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/ie6.css"  />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/ie7.css"  />
<![endif]-->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- flash audio player -->
<script type="text/javascript">  
AudioPlayer.setup("<?php echo get_template_directory_uri(); ?>/audio_player/player.swf", {  
	width: 290  
});  
var jsimagepath = '<?php echo get_template_directory_uri(); ?>';
</script>
<?php if (is_front_page() && $data['slider_on_off'] == 1 && $data['slider_type'] == 'flex_slider') : ?>
<!-- featured slider settings -->
<script type="text/javascript">
jQuery(window).load(function() {
			jQuery('.flexslider').flexslider({
			animation: "<?php echo $data['slider_effect']; ?>",
			slideshow: true,
			slideshowSpeed: <?php echo $data['slider_pause_time']; ?>,
			animationDuration: <?php echo $data['slider_speed']; ?>,
			directionNav: true,
			controlNav: false,
			pausePlay: true,
			pauseOnAction: true,
			pauseOnHover: <?php echo ($data['slider_pause'] == 1 ? 'true' : 'false');  ?>
			});
		});
</script>
<!-- featured slider settings end -->
<?php endif; ?>


<body <?php body_class(''); ?>>
<!--header-->
<div id="header">
  <!--menu -->
  <div class="main_menu">
  <!-- header menu-->
  <?php
// Using wp_nav_menu() to display menu
wp_nav_menu( array(
	'menu' => 'Header', // Select the menu to show by Name
	'class' => 'sf-menu',
	'menu_class' =>'sf-menu',
	'menu_id' => 'nav',
	'container' => false, // Remove the navigation container div
	'theme_location' => 'Header',
	'walker' => new description_walker()
	)
);
?>
</div>
  <!--header menu end--> 
    <!--blog title or logo -->
  <h1 id="site_title">
    <?php if ( $logo = $data['logo'] ) { ?>
    <span> <a name="top" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /> </a> </span>
    <?php } else { ?>
    <span class="text_logo"> <a name="top" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' );	?> </a> </span>
    <?php } ?>
  </h1>
  <!--blog title or logo end-->

  <?php if ($data['search_icon_hide'] == '1' ) : require('includes/searchform.php'); endif; ?>
  <?php if ($data['social_icons_hide'] == '1' ) : ?>
  <!-- subscribe icons -->
  <div class="subscribe">
    <ul>
      <?php if ($data['facebook_icon_hide'] == '1' ) : ?>
      <li class="subscribe_facebook"><a href="<?php echo $data['facebook_profile']; ?>"><span>Become a fan on Facebook</span></a></li>
      <?php endif; ?>
      <?php if ($data['twitter_icon_hide'] == '1' ) : ?>
      <li class="subscribe_twitter"><a href="http://www.twitter.com/<?php echo $data['twitter_username']; ?>"><span>Follow us on Twitter</span></a></li>
      <?php endif; ?>
      <?php if ($data['linkedin_icon_hide'] == '1' ) : ?>
      <li class="subscribe_linkedin"><a href="<?php echo $data['linkedin_profile']; ?>"><span>LinkedIn</span></a></li>
      <?php endif; ?>
      <?php if ($data['googleplus_icon_hide'] == '1' ) : ?>
      <li class="subscribe_googleplus"><a href="<?php echo $data['googleplus_profile']; ?>"><span>Google Plus</span></a></li>
      <?php endif; ?>
      <?php if ($data['pinterest_icon_hide'] == '1' ) : ?>
      <li class="subscribe_pinterest"><a href="<?php echo $data['pinterest_profile']; ?>"><span>Pinterest</span></a></li>
      <?php endif; ?>
      <?php if ($data['rss_icon_hide'] == '1' ) : ?>
      <li class="subscribe_rss"><a href="<?php echo $data['rss_profile']; ?>"><span>RSS</span></a></li>
      <?php if ($data['addthis_icon_hide'] == '1' ) : ?>
      <li class="subscribe_addthis">
      <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f2319434e9f3b79"></script> 
      <a class="addthis_button" href="#"><span>Add This</span></a></li>
      <?php endif; ?>
      <?php endif; ?>
    </ul>
  </div>
  <!-- subscribe icons end-->
  <?php endif; ?>
</div>
<!--header end-->
<!--intro slogan-->
<?php if(!is_search() && !is_404()) : ?>
<?php 
	$page_slogan = get_post_meta( get_the_ID(), 'meta_page_slogan', true );
	if (!empty($page_slogan)):
?>
<div class="intro_slogan">
<div class="intro_slogan_content">
<h2><?php echo $page_slogan; ?></h2>
<span class="intro_slogan_end">&nbsp;</span>
</div>
</div>
<!--intro slogan end-->
<?php endif ; ?>
<?php endif; ?>
<div class="clear"></div>

<?php
if (is_front_page() && $data['slider_on_off'] == 1 ) :
	require('includes/featured-slider.php');
endif;
?>
<?php if (is_front_page() && $data['intro_hide'] == 1 ): ?>
  <div class="intro_homepage">
  	<div class="intro_homepage_content">
  	<?php echo do_shortcode($data['intro_content']); ?>
  	</div>
  </div>
  <?php endif; ?>
<!--wrapper-->
<div id="wrapper">