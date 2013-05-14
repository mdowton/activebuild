<?php
/*
Contact UsWidget

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'contact_us_widget' );

/*
 * Register widget.
 */
function contact_us_widget() {
	register_widget( 'contact_us_widget' );
}

/*
 * Widget class.
 */
class contact_us_widget extends WP_Widget {

	function contact_us_widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'contact_us_widget', 'description' => __('A widget that displays your contact info.', 'framework') );

		/* Widget control settings. */
		//$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ad_widget' );
		$control_ops = "";
		/* Create the widget. */
		$this->WP_Widget( 'contact_us_widget', __('Stonex - Contact Us'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$contact_phone = $instance['contact_phone'];
		$contact_email = $instance['contact_email'];
		$contact_address = $instance['contact_address'];

		/* Before widget. */
		echo $before_widget;

		/* Display the widget title if one was input. */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Contact Icons */
		 ?>

            <div class="contact_widget">
            <ul>
   			<?php if(empty($contact_address)) { echo ''; } else { ?>
            <li class="contact_address"><?php echo $contact_address; ?></li>
            <?php } ?>
            <?php if(empty($contact_phone)) { echo ''; } else { ?>
            <li class="contact_phone"><?php echo $contact_phone; ?></li>
            <?php } ?>
			<?php if(empty($contact_email)) { echo ''; } else { ?>
            <li class="contact_email"><?php echo $contact_email; ?></li>
            <?php } ?>
            </ul>
            
            </div>
		
		<?php 

		/* After widget. */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['contact_phone'] = strip_tags( $new_instance['contact_phone'] );
		$instance['contact_email'] = strip_tags( $new_instance['contact_email'] );		
		$instance['contact_address'] = strip_tags( $new_instance['contact_address'] );

		return $instance;
	}
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => __('Contact Us', 'framework'),
		'contact_phone' => '(+01) 234-567-8910',
		'contact_email' => 'john@doe.com',
		'contact_address' => 'That Avenue, City, State, 98765',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Phone: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_phone' ); ?>"><?php _e('Phone #', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_phone' ); ?>" name="<?php echo $this->get_field_name( 'contact_phone' ); ?>" value="<?php echo $instance['contact_phone']; ?>" />
		</p>

		<!-- E-Mail: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_email' ); ?>"><?php _e('E-Mail', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_email' ); ?>" name="<?php echo $this->get_field_name( 'contact_email' ); ?>" value="<?php echo $instance['contact_email']; ?>" />
		</p>
     
		<!-- Address: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_address' ); ?>"><?php _e('Address', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_address' ); ?>" name="<?php echo $this->get_field_name( 'contact_address' ); ?>" value="<?php echo $instance['contact_address']; ?>" />
		</p>
		
	<?php
	}
}
?>