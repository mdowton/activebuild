<?php
global $data;
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>

<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'framework') ?></p>
<?php
		return;
	}
?>
<?php if ( comments_open() ) : ?> 
<!-- You can start editing here. -->
<div id="comments">
<?php if( $data['facebook_comments_hide'] == '1') { ?>
<h4 class="facebook_comments_title"><span><?php _e('Comments via facebook', 'framework'); ?></span></h4>
<iframe src="http://www.facebook.com/plugins/comments.php?href=<?php the_permalink(); ?>&amp;permalink=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:600px; height:16px; margin-top: 20px;" allowTransparency="true"></iframe> 
<div id="fbcomments"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php the_permalink(); ?>" width="536" style="margin: 0 0 20px 0;padding-bottom: 10px;border-bottom: 1px solid #F2F4F7;"></fb:comments></div>
<?php } else  echo '';?>
  <?php if ( have_comments() ) : ?>
  <?php if ( ! empty($comments_by_type['comment']) ) : ?>
  <div class="clear">&nbsp;</div>
  <h4 class="facebook_comments_title">
    <span><?php comments_number(__('Leave a comment', 'framework'), __('1 Comment', 'framework'), __('% Comments', 'framework') );?></span>
  </h4>
  <div class="clear">&nbsp;</div>
  <ol class="commentlist">
    <?php wp_list_comments('type=comment&avatar_size=50&callback=custom_comment_fun'); ?>
  </ol>
  <?php endif; ?>
  <?php endif; ?>  
<?php if( $data['trackbacks_pings_hide'] == '1') { ?>
  <?php if ( ! empty($comments_by_type['pings']) ) : ?>
  <div class="trackbacks">
    <h4 class="facebook_comments_title"><span>Trackbacks/Pings</span></h4>
    <div class="clear">&nbsp;</div>
    <ul>
      <?php wp_list_comments('type=pings&callback=list_pings'); ?>
    </ul>
  </div>
  <?php endif; ?>
<?php } else  echo '';?>
  <div class="navigation">
    <div class="alignleft">
      <?php previous_comments_link() ?>
    </div>
    <div class="alignright">
      <?php next_comments_link() ?>
    </div>
  </div>
  <?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
  <!-- If comments are open, but there are no comments. -->
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  
  <?php endif; ?>
  <?php endif; ?>
  
  <?php if ( comments_open() ) : ?>
  <div id="respond">
  <div class="clear">&nbsp;</div>
    <h4 class="facebook_comments_title">
     <span><?php comment_form_title( __('Leave a Comment', 'framework'), __('Leave a Reply to %s', 'framework') ); ?></span>
    </h4>
    <div class="clear">&nbsp;</div>
    <div class="cancel-comment-reply">
      <?php cancel_comment_reply_link(); ?>
    </div>
    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <p><?php _e('You must be', 'framework') ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in', 'framework') ?></a> <?php _e('to post a comment.', 'framework') ?></p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( is_user_logged_in() ) : ?>
      <p><?php _e('Logged in as', 'framework') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'framework') ?>"><?php _e('Log out &raquo;', 'framework') ?></a></p>
		<?php else: ?>
      <p class="comment_form">
        <label for="author"><small><?php _e('Name', 'framework') ?><span style="color: #f26535;">*</span></small></label>
       
        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1"/>
      </p>
      <p class="comment_form">
        <label for="email"><small><?php _e('Email', 'framework') ?><span style="color: #f26535;">*</span></small></label>
        
        <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
      </p>
      <p class="comment_form">
        <label for="url"><small><?php _e('Website', 'framework') ?></small></label>
       
        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
      </p>
      <?php endif; ?>
      <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
      <p class="comment_form">
        <label for="comment"><small><?php _e('Comment', 'framework') ?><span style="color: #f26535;">*</span></small></label>
        
        <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
      </p>
      <p>
        <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Yeah, I said it!', 'framework') ?>" />
        <?php comment_id_fields(); ?>
      </p>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
  
  <?php endif; // If registration required and not logged in ?>
  </div></div>
  <?php endif; // if you delete this the sky will fall on your head ?>
