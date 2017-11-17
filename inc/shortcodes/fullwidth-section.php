<?php
// Create Shortcode fullwidth-section
// Use the shortcode: [fullwidth-section class="" with_image=false]Content[/fullwidth-section]
function create_fullwidthsection_shortcode($atts, $content = null) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'class' => '',
			'with_image' => 'false',
			'img_src' => ''
		),
		$atts,
		'fullwidth-section'
	);
	// Attributes in var
	$class = $atts['class'];
	$withImage = $atts['with_image'];
	$imgSrc = $atts['img_src'];

	if ($withImage == 'true') {
 	$parsedContent = do_shortcode($content);
$output = <<<EOD
<section class="full-width-section fws-with-image $class">
<div class="container">
<div class="row">
<div class="col-12">
$parsedContent
<img class="hidden-md-down" src="$imgSrc" />
</div>
</div>
</div>
<div class="hidden-lg-up">
<img class="small-image" src="$imgSrc" />
</div>
</section>
EOD;
		return $output;
	}

	return '<section class="full-width-section ' . $class . '"><div class="container"><div class="row"><div class="col-12">' . do_shortcode($content) . '</div></div></div></section>';

}
add_shortcode( 'fullwidth-section', 'create_fullwidthsection_shortcode' );