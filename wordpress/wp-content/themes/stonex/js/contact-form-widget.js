$(document).ready(function() {
	$('form#contactFormWidget').submit(function() {
		$('form#contactFormWidget .contact_form_error_widget').remove();
		var hasError = false;
		$('.requiredFieldWidget').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				var labelText = $(this).prev('.contact_form_input label').text();
				$('.contact_form_widget').append('<span class="contact_form_error_widget">*You forgot to enter your '+labelText+'.</span>');
				$(this).focus(function() {
  $(this).removeClass('contact_form_error_widget');
  $('.contact_form_error_widget').remove();
});

				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).prev('.right_input label').text();
					$('.contact_form_widget').append('<span class="contact_form_error_widget">*You entered an invalid '+labelText+'.</span>');
					$(this).focus(function() {
  $(this).removeClass('contact_form_error_widget');
  $('.contact_form_error_widget').remove();
});
					hasError = true;
				}
			}
		});
		if(!hasError) {
			$('.contact_submit_widget').fadeOut('normal', function() {
				$(this).parent().append('<img style="float: right; margin-top: 4px;" src="'+ jsimagepath +'/images/contact_loader.gif" alt="Loading&hellip;" height="16" width="16" />');
			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#contactFormWidget').slideUp("fast", function() {				   
					$(this).before('<p class="thanks"><strong>Thank you!</strong> Your email was successfully sent. We should be in touch soon.</p>');
				});
			});
		}
		
		return false;
		
	});
});

