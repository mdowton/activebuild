<?php
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'tweets_widgets' );

/*
 * Register widget.
 */
function tweets_widgets() {
	register_widget( 'tweets_widgets' );
}

class tweets_widgets extends WP_Widget {


	function tweets_widgets() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tweets_widgets', 'description' => __('A widget that displays your latest tweets.', 'framework') );

		/* Widget control settings. */
		$control_ops = "";
		/* Create the widget. */
		$this->WP_Widget( 'tweets_widgets', __('Stonex - Latest Tweets','framework'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];
		$postcount = $instance['postcount'];

		/* Before widget. */
		echo $before_widget;

		/* Display the widget title if one was input. */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Latest Tweets */
		 ?>

            <ul id="twitter_update_list">
                <li><p></p></li>
            </ul>
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $username ?>.json?callback=twitterCallback2&amp;count=<?php echo $postcount ?>"></script>
		
		<?php 

		/* After widget. */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );

		return $instance;
	}
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Twitter Feed',
		'username' => 'skatdesign',
		'postcount' => '3',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username e.g. skatdesign', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
		
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (max 20)', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
	<?php
	}
}
?>