<!--featured slider -->
<div class="slider_wrapper">
<div class="featured_slider">
    <?php if($data['slider_type'] == 'flex_slider') : ?>
    <div class="flexslider">
      <ul class="slides">
        <?php
$slides = $data['featured_slider']; //get the slides array
foreach ($slides as $slide) {
	?>
        <li>
          <?php if(!empty($slide['link'])) : ?>
          <a href="<?php echo $slide['link']; ?>" title="<?php echo $slide['title']; ?>">
          <?php endif; ?>
          <img src="<?php echo $slide['url']; ?>" alt="" />
          <?php if(!empty($slide['link'])) : ?>
          </a>
          <?php endif; ?>
          <?php if (!empty($slide['description'])) : ?>
          <p class="flex-caption"><?php echo do_shortcode($slide['description']); ?></p>
          <?php endif; ?>
        </li>
        <?php
}
?>
      </ul>
    </div>
    <!-- flexslider end -->
    
    <?php else : ?>
    <img src="<?php echo $data['static_image']; ?>" alt="" width="940" height="350" />
    <?php endif; ?>
</div>
<!--featured slider end-->
</div>