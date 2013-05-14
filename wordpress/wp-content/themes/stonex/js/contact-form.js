$(document).ready(function() {
	$('form#contactForm').submit(function() {
		$('form#contactForm .contact_form_error').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				var labelText = $(this).prev('.contact_form label').text();
				$(this).parent().append('<span class="contact_form_error">You forgot to enter your '+labelText+'</span>');
				$(this).focus(function() {
  $(this).removeClass('inputError');
  $('.contact_form_error').remove();
});

				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).prev('.contact_form label').text();
					$(this).parent().append('<span class="contact_form_error">You entered an invalid '+labelText+'</span>');
					$(this).focus(function() {
  $(this).removeClass('inputError');
});
					hasError = true;
				}
			}
		});
		if(!hasError) {
			$('form#contactForm .buttons button').fadeOut('normal', function() {
				$(this).parent().append('<img src="<?php echo get_bloginfo("template_directory"); ?>/images/loading.gif" alt="Loading&hellip;" height="31" width="31" />');
			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#contactForm').slideUp("fast", function() {				   
					$(this).before('<p class="thanks"><strong>Thank you!</strong> Your email was successfully sent. We should be in touch soon.</p>');
				});
			});
		}
		
		return false;
		
	});
});