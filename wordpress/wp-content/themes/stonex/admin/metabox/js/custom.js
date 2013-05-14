jQuery(document).ready(function($){
jQuery('#meta_item_type').change(function() {
    if (jQuery('#meta_item_type option:selected').val() == "video") {
        jQuery('.meta_video').show();
        jQuery('.meta_slider_images, .meta_slider_id, .meta_audio_id, .meta_audio, .meta_audio_title, .meta_audio_artist').hide();
	} else if (jQuery('#meta_item_type option:selected').val() == "audio") {
        jQuery('.meta_audio, .meta_audio_id, .meta_audio_title, .meta_audio_artist').show();
        jQuery('.meta_slider_images, .meta_video, .meta_slider_id').hide();
     } else {
	 jQuery('.meta_slider_images, .meta_slider_id, .meta_video, .meta_audio_id, .meta_audio, .meta_audio_title, .meta_audio_artist').hide();
	 }
	
});

// show and hide sections on page load based off of the currently selected option 
if (jQuery('#meta_item_type option:selected').val() == "video") {
    jQuery('.meta_video').show();
    jQuery('.meta_slider_images, .meta_slider_id, .meta_audio_id, .meta_audio, .meta_audio_title, .meta_audio_artist').hide();
    };
if (jQuery('#meta_item_type option:selected').val() == "audio") {
    jQuery('.meta_audio, .meta_audio_id, .meta_audio_title, .meta_audio_artist').show();
    jQuery('.meta_slider_images, .meta_slider_id, .meta_video').hide();
    };
if (jQuery('#meta_item_type option:selected').val() == "photo") {
    jQuery('.meta_slider_images, .meta_slider_id, .meta_video, .meta_audio_id, .meta_audio, .meta_audio_title, .meta_audio_artist').hide();
    };
});
