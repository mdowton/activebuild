<?php
/*
Contact UsWidget

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'contact_form_widget' );

/*
 * Register widget.
 */
function contact_form_widget() {
	register_widget( 'contact_form_widget' );
}

/*
 * Widget class.
 */
class contact_form_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function contact_form_widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'contact_form_widget', 'description' => __('A widget that displays a contact form.', 'framework') );

		/* Widget control settings. */
		//$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ad_widget' );
		$control_ops = "";
		/* Create the widget. */
		$this->WP_Widget( 'contact_form_widget', __('Stonex - Contact Form', 'framework'), $widget_ops, $control_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$email_address = $instance['email_address'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display Latest Tweets */
		 
$form_action_widget = get_permalink();
if(isset($_POST['submittedwidget'])) {

//Check to make sure that the name field is not empty
  if(trim(strip_tags($_POST['contactName'])) === '') {
   $nameError = '<span class="contact_form_error_widget"><br />'. __('*You forgot to enter your name.', 'framework') .'</span>';
   $hasError = true;
  } else {
   $formname = trim(strip_tags($_POST['contactName']));
  }
//Check to make sure sure that a valid email address is submitted
  if(trim(strip_tags($_POST['email'])) === '')  {
   $emailError = '<span class="contact_form_error_widget"><br />'. __('*You forgot to enter your email.', 'framework') .'</span>';
   $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$", trim($_POST['email']))) {
   $emailError = '<span class="contact_form_error_widget"><br />'. __('*You entered an invalid email.', 'framework') .'</span>';
   $hasError = true;
  } else {
   $email = trim(strip_tags($_POST['email']));
  }

//Check to make sure comments were entered 
  if(trim(strip_tags($_POST['comments'])) === '') {
   $commentError = '<span class="contact_form_error_widget"><br />'. __('*You forgot to enter your comments.', 'framework') .'</span>';
   $hasError = true;
  } else {
   if(function_exists('stripslashes')) {
    $comments = stripslashes(trim($_POST['comments']));
   } else {
    $comments = trim(strip_tags($_POST['comments']));
   }
  }
//If there is no error, send the email
  if(!isset($hasError)) {


			$emailTo = $email_address;
			$subject = __('Contact Form Submission from ', 'framework').$formname;
			$body = __('Name', 'framework').": $formname \n\nEmail: $email \n\n".__('Comments', 'framework').": $comments";
			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($email_address, $subject, $body, $headers);

			$emailSent = true;
  }
		}
if(isset($emailSent) && $emailSent == true) $thank_you = '<p class="thanks"><strong>'. __('Thank you!', 'framework') .'</strong> '. __('Your email was successfully sent. We should be in touch soon.', 'framework').'</p>';
?>

<div class="contact_form_widget">
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/contact-form-widget.js"></script>
<?php if(isset($thank_you)) echo $thank_you ?>
 <form action="<?php echo $form_action_widget ?>" id="contactFormWidget" method="post">
<div class="left_inputs">
<div class="contact_form_input">
			  <label for="contactName">Name</label>
              <input type="text" name="contactName" id="contactName" value="<?php if(isset($formname)) echo $formname ?><?php _e('Name*', 'framework') ?>" class="requiredFieldWidget" onblur="this.value = this.value || this.defaultValue; this.style.color = '#8c8c8c';" onfocus="this.value=''; this.style.color = '#8c8c8c';" />
              <?php if(isset($nameError)) echo $nameError ?>
</div>

<div class="right_input">
			  <label for="email">Email</label>
              <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email ?><?php _e('E-Mail*', 'framework'); ?>" class="requiredFieldWidget email" onblur="this.value = this.value || this.defaultValue; this.style.color = '#8c8c8c';" onfocus="this.value=''; this.style.color = '#8c8c8c';" />
              <?php if(isset($emailError)) echo $emailError ?>
</div>
</div>
<div class="right_inputs">
			  <label for="commentsText">Comments</label>
              <textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredFieldWidget" onblur="this.value = this.value || this.defaultValue; this.style.color = '#8c8c8c';" onfocus="this.value=''; this.style.color = '#8c8c8c';"><?php if(isset($comments)) echo $comments ?><?php _e('Comments*', 'framework'); ?></textarea>
              <?php if(isset($commentError)) echo $commentError ?>
              <input type="hidden" name="submittedwidget" id="submittedwidget" value="true" />
 <button type="submit" class="contact_submit_widget"><?php _e('Submit', 'framework'); ?></button>
</div>
        </form>
      </div>
<div class="clear"></div>
            
		<?php 

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['email_address'] = strip_tags( $new_instance['email_address'] );
		/* No need to strip tags for.. */

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => __('Contact Form', 'framework'),
		'email_address' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Email Address -->
		<p>
			<label for="<?php echo $this->get_field_id( 'email_address' ); ?>"><?php _e('Email Address', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'email_address' ); ?>" name="<?php echo $this->get_field_name( 'email_address' ); ?>" value="<?php echo $instance['email_address']; ?>" />
		</p>
	<?php
	}
}
?>