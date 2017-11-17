<?php
function create_animated_number_shortcode_wp_register_scripts() {
  wp_register_script('animated-number-script', get_template_directory_uri() . '/assets/js/vendor/jquery.waypoints.min.js' , array('jquery'), '4.0.1', true);
  wp_register_script('animated-number-init-script', get_template_directory_uri() . '/assets/js/waypoint-number-svg.js' , array('animated-number-script'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'create_animated_number_shortcode_wp_register_scripts' );

// Create Shortcode fullwidth-section
// Use the shortcode: [animated-number number=1]
function create_animated_number_shortcode($atts, $content = null) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'number' => 1,
      'width' => '100px'
		),
		$atts,
		'animated-number'
	);

	// Attributes in var
	$number = $atts['number'];
  $width = $atts['width'];

$one = <<<EOD
<svg class="number-svg" style="width: $width" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 50"><path class="st0 js-number line fill" d="M44.8 32.7l1.8-.2c1.7-.1 2.6-.3 2.8-1l4.5-24.2-5.4-1 .3-1 15-1.8-5.3 28c-.1.6.9.8 2.7 1l1.6.2v1.2H44.4l.4-1.2zM11.6 21.3c0-9.5 7.1-17.8 16.4-17.8 8.3 0 13.9 5.6 13.9 13.4 0 9.5-7.1 17.8-16.4 17.8-8.3 0-13.9-5.5-13.9-13.4zm22-9.5c0-4.4-1.6-6.7-4.7-6.7-5.3 0-9.1 13.8-9.1 21.5 0 4.3 1.5 6.6 4.6 6.6 5.5-.1 9.2-13.3 9.2-21.4z"/><path class="st1" d="M50 50.2L0 .2V50z"/><path class="st2 js-underline line" d="M0 .2l50 50"/></svg>
EOD;
$two = <<<EOD
<svg class="number-svg" style="width: $width" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 50"><path class="st0 js-number line fill" d="M43.4 30.7c12.7-7.3 17.3-10.9 17.5-16.1.1-3.3-1.8-6-5.9-6-2.4-.1-4.5 1-6.8 3.6l-.5-.7c3.5-4.9 8-8.1 13.4-7.9 5.9.1 9.6 3.6 9.4 8.1-.2 6-7.5 9.3-19.7 16l-.1.2h12.4c3.9 0 5.5-1.5 8.5-6.1l.9-1.4 1.1.1-5.7 13.8H43.2l.2-3.6zM11.6 21.3c0-9.5 7.1-17.8 16.4-17.8 8.3 0 13.9 5.6 13.9 13.4 0 9.5-7.1 17.8-16.4 17.8-8.3 0-13.9-5.5-13.9-13.4zm22-9.5c0-4.4-1.6-6.7-4.7-6.7-5.3 0-9.1 13.8-9.1 21.5 0 4.3 1.5 6.6 4.6 6.6 5.5-.1 9.2-13.3 9.2-21.4z"/><path class="st1" d="M50 50.2L0 .2V50z"/><path class="st2 js-underline  line" d="M0 .2l50 50"/></svg>
EOD;
$three = <<<EOD
<svg class="number-svg" style="width: $width" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 50"><path class="st0 js-number line fill" d="M42.9 34c0-1.7 1.3-3.6 3.6-3.6 3.4 0 4.9 3.9 3.3 7.1.5.3 1.2.6 1.9.6 4.3 0 7.5-4.5 7.5-9.1 0-4.3-2.5-7-6.5-7-1.2 0-2.4.3-3.7.7l-.4-.9c8-3.6 11.8-5.4 11.8-10 0-2.9-2.2-4.8-5.1-4.8-2.5 0-4.8 1.8-6.3 3.7l-.4-.7c2.9-4.2 6.8-7.4 11.6-7.4 4.6 0 8.1 2.7 8.1 6.6 0 4.3-4.2 6.7-10.6 9.1v.2c.4-.1 1-.2 1.4-.2 5 0 8.1 3.9 8.1 8 0 7-8 12.9-15.3 12.9-4.9.1-9-1.6-9-5.2zM11.6 21.3c0-9.5 7.1-17.8 16.4-17.8 8.3 0 13.9 5.6 13.9 13.4 0 9.5-7.1 17.8-16.4 17.8-8.3 0-13.9-5.5-13.9-13.4zm22-9.5c0-4.4-1.6-6.7-4.7-6.7-5.3 0-9.1 13.8-9.1 21.5 0 4.3 1.5 6.6 4.6 6.6 5.5-.1 9.2-13.3 9.2-21.4z"/><path class="st1" d="M50 50.2L0 .2V50z"/><path class="st2 js-underline line" d="M0 .2l50 50"/></svg>
EOD;
$four = <<<EOD
<svg class="number-svg" style="width: $width" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 50"><path class="st0 js-number line fill" d="M11.6 21.3c0-9.5 7.1-17.8 16.4-17.8 8.3 0 13.9 5.6 13.9 13.4 0 9.5-7.1 17.8-16.4 17.8-8.3 0-13.9-5.5-13.9-13.4zm22-9.5c0-4.4-1.6-6.7-4.7-6.7-5.3 0-9.1 13.8-9.1 21.5 0 4.3 1.5 6.6 4.6 6.6 5.5-.1 9.2-13.3 9.2-21.4z"/><path class="st1" d="M50 50.2L0 .2V50z"/><path class="st2 js-underline line" d="M0 .2l50 50"/><path class="st0" d="M58.5 28.5H44.6v-1.3L66.8 2.6l4 .4-4 21.2 6 .1-1.3 4.2H66l-2 10.1h-7.3l1.8-10.1zm.9-4.3l2.8-14.4H62L49 24.2h10.4z"/></svg>
EOD;
$five = <<<EOD
<svg class="number-svg" style="width: $width" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 50"><path class="st0 js-number line fill" d="M41.6 33.9c0-2.1 1.6-4.1 3.8-4.1 3.4 0 4.7 3.8 2.5 6.4.6.6 1.8 1.3 3.3 1.3 3.7 0 6.7-3.6 6.7-8 0-5-4.8-8.4-11.4-9.4l7.6-17h14.7l-1.2 6.5h-15l-2 4.4c9.2 1.3 14.1 6 14.1 12 0 6.9-7.4 12.8-14.8 12.8-4.7 0-8.3-2-8.3-4.9zM11.6 21.3c0-9.5 7.1-17.8 16.4-17.8 8.3 0 13.9 5.6 13.9 13.4 0 9.5-7.1 17.8-16.4 17.8-8.3 0-13.9-5.5-13.9-13.4zm22-9.5c0-4.4-1.6-6.7-4.7-6.7-5.3 0-9.1 13.8-9.1 21.5 0 4.3 1.5 6.6 4.6 6.6 5.5-.1 9.2-13.3 9.2-21.4z"/><path class="st1" d="M50 50.2L0 .2V50z"/><path class="st2 js-underline line" d="M0 .2l50 50"/></svg>
EOD;
$six = <<<EOD
<svg class="number-svg" style="width: $width" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 50"><path class="st0 js-number line fill" d="M45 22.9C45 11.2 57-.3 74.5 0l.5 1c-9.8.7-16.5 6.4-19.7 13.6l.2.1c2.4-1.6 4.8-2.7 7.2-2.7 4.8 0 8.2 4 8.2 9.1 0 7.4-6.4 13.7-14 13.7-7.4-.1-11.9-4.9-11.9-11.9zm17.7-2.2c0-4.2-1.8-6.2-4.6-6.2-1.1 0-2.2.5-3 1.3-1.6 3.5-2.5 7.7-2.5 11.5 0 3.9 1.2 6.2 3.6 6.2 3.9 0 6.5-7.3 6.5-12.8zM20.4 20.6c1.3-7.3 4.4-15.5 8.5-15.5 3.1 0 4.7 2.3 4.7 6.7 0 5.4-1.6 13.1-4.4 17.6l3.5 3.5c5.5-2.9 9.2-9.1 9.2-16 0-7.8-5.6-13.4-13.9-13.4-6.6 0-12.1 4.2-14.7 10l7.1 7.1z"/><path class="st1" d="M50 50.2L0 .2V50z"/><path class="st2 js-underline line" d="M0 .2l50 50"/></svg>
EOD;

  wp_enqueue_script('animated-number-script');
  wp_enqueue_script('animated-number-init-script');

  switch ($number) {
      case 1:
          return $one;
          break;
      case 2:
          return $two;
          break;
      case 3:
          return $three;
          break;
      case 4:
          return $four;
          break;
      case 5:
          return $five;
          break;
      case 6:
          return $six;
          break;
      default:
          return $one;
  }

}
add_shortcode( 'animated-number', 'create_animated_number_shortcode' );