jQuery(document).ready(function() {

// I changed the trigger to a class.
jQuery('.image_uploader_button').click(function() {
// I switched the id for the this-prev selector that sends the name of the input field that proceeds it.
formfield = jQuery(this).parent().prev('').attr('name');
tb_show('', 'media-upload.php?type=image&amp;TB_iframe=1');
return false;
});

window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
// I then called the name and joined with # for the id.
jQuery("#"+formfield).val(imgurl);
tb_remove();
}
});