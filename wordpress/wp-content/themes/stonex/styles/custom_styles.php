html {
	background-image:  url(<?php echo '../images/'.$data['html_bg_pattern']; ?>);

}
body {
	background-image:  url(<?php echo '../images/'.$data['header_bg_pattern']; ?>);
    font-family: "<?php echo str_replace('_', ' ', $data['body_font']['face']); ?>", Tahoma, sans-serif;
   	font-size: <?php echo $data['body_font_size']; ?>px;
   	line-height: <?php echo $data['body_line_height']; ?>px;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "<?php echo str_replace('_', ' ', $data['titles_font']['face']); ?>", Arial, sans-serif;
}
#footer {
	background-image:  url(<?php echo '../images/footer_'.$data['header_bg_pattern']; ?>);
}
.sf-menu li {
	font-family: "<?php echo str_replace('_', ' ', $data['menu_font']['face']); ?>", Arial, sans-serif;
   	font-size: <?php echo $data['menu_font_size']; ?>px;
}
.intro_slogan {
	background-image:  url(<?php echo '../images/footer_'.$data['header_bg_pattern']; ?>);
}
.slider_wrapper {
	background-image:  url(<?php echo '../images/slider_'.$data['header_bg_pattern']; ?>);
}
