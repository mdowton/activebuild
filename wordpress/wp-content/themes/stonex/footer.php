<?php global $data ?>
<!--footer-->

<div id="footer"> 
  <!--footer-content-->
  <div class="footer_content"> 
  <div class="copyright_info">
        <?php /* Replace default text if option is set */
			if( $data['footer_copyright'] == '1'){
				echo "<p>".$data['footer_copyright_text']."</p>";
			} else { 
			?>
        <p>Copyright &copy; <?php echo get_option('Y'); ?> - <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' ); ?> </a> </p><?php } ?>
      </div>
    <!--footer left widget section-->
    <div class="footer_left">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Left Sidebar") ) : ?>
      <?php endif; // end of left footer sidebar ?>
    </div>
    <!--footer middle widget section-->
    <div class="footer_middle">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Middle Sidebar") ) : ?>
      <?php endif; // end of right middle footer sidebar ?>
    </div>
    <!--footer right widget section-->
    <div class="footer_right">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Right Sidebar") ) : ?>
      <?php endif; // end of right footer sidebar ?>
    </div>
    <a class="top" href="#top"><span>Back to top</span></a>
  </div>
  <!--footer-content-end-->
	<span class="footer_bottom">&nbsp;</span> 
</div>
<!--footer-end-->
<?php wp_footer(); ?>
</body></html>