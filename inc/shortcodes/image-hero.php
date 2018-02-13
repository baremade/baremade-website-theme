<?php
// Create Shortcode image-hero
// Use the shortcode: [image-hero class="" img_src=""]Content[/image-hero]
function create_image_hero_shortcode($atts, $content = null) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'class' => '',
			'img_src' => ''
		),
		$atts,
		'image-hero'
	);
	// Attributes in var
	$class = $atts['class'];
	$imgSrc = $atts['img_src'];

 	$parsedContent = do_shortcode($content);
$output = <<<EOD
<section class="image-hero $class" style="background-image: url($imgSrc)">
<div class="container height-100">
<div class="row">
<div class="col-12">
$parsedContent
</div>
</div>
</div>
</section>
EOD;

  return $output;

}
add_shortcode( 'image-hero', 'create_image_hero_shortcode' );