<?php
/*
Flickr Photostream Widget
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'flickr_photo_widget' );

/*
 * Register widget.
 */
function flickr_photo_widget() {
	register_widget( 'FLICKR_photo_Widget' );
}

/*
 * Widget class.
 */
class FLICKR_photo_Widget extends WP_Widget {

	function FLICKR_photo_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'FLICKR_photo_Widget', 'description' => __('A widget that displays your Flickr photos.', 'framework') );

		/* Widget control settings. */
		//$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_ad_widget' );
		$control_ops = "";
		/* Create the widget. */
		$this->WP_Widget( 'FLICKR_photo_Widget', __('Stonex - Flickr Photos', 'framework'), $widget_ops, $control_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Widget variables settings */
		$title = apply_filters('widget_title', $instance['title'] );
		$flickrID = $instance['flickrID'];
		$postcount = $instance['postcount'];
		$type = $instance['type'];
		$display = $instance['display'];
		$how_many = $instance['how_many'];

		/* Before widget. */
		echo $before_widget;

		/* Display the widget title. */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Flickr Photos */
		 ?>
			
			<div class="flickr">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $how_many; ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>
			</div>
		
		<?php

		/* After widget. */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );
		$instance['postcount'] = $new_instance['postcount'];
		$instance['type'] = $new_instance['type'];
		$instance['display'] = $new_instance['display'];
		$instance['how_many'] = $new_instance['how_many'];

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	function form( $instance ) {

		/* Default widget settings. */
		$defaults = array(
		'title' => __('Photostream', 'framework'),
		'flickrID' => '37513079@N08',
		'type' => 'user',
		'how_many' => '6',
		'display' => 'random',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Flickr ID: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'framework') ?> (<a href="http://idgettr.com/">idGettr</a>)</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
		</p>

		<!-- Type: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'framework') ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
				<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
				<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
			</select>
		</p>
		
		<!-- Display: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'framework') ?></label>
			<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
				<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
				<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
			</select>
		</p>

   		<!-- Number of items: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'how_many' ); ?>"><?php _e('Number of images to display:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'how_many' ); ?>" name="<?php echo $this->get_field_name( 'how_many' ); ?>" value="<?php echo $instance['how_many']; ?>" />
		</p>

		
	<?php
	}
}
?>