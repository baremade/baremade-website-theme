
<?php
function create_content_slider_shortcode_wp_register_scripts() {
  wp_register_style('slider-style', get_template_directory_uri() . '/assets/css/swiper.min.css' , array(), '3.4.2', 'all');
  wp_register_script('slider-script', get_template_directory_uri() . '/assets/js/vendor/swiper.jquery.min.js' , array('jquery'), '3.4.2', true);
}
add_action( 'wp_enqueue_scripts', 'create_content_slider_shortcode_wp_register_scripts' );

// Use the shortcode: [content-slider]
function create_content_slider_shortcode($atts, $content = null) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'effect' => 'fade',
      'speed' => '300',
			'show_navigation' => 'true',
			'auto_play_speed' => '0'
		),
		$atts,
		'content-slider'
	);
	// Attributes in var
  $slideSpeed = $atts['speed'];
	$slideEffect = $atts['effect'];
	$showNavigation = $atts['show_navigation'] === 'true';
	$autoPlaySpeed = $atts['auto_play_speed'];

	$uuid = wp_generate_uuid4();

	ob_start();
	?>
  <div class="content-slider">
	  <div class="js-slider-container-<?php echo $uuid?> swiper-container">
	    <div class="swiper-wrapper">
				<?php echo do_shortcode($content); ?>
	    </div>
	  </div>
		<?php if ($showNavigation) { ?>
	  <div class="cs-navigation-buttons hidden-sm-down">
	    <button class="js-left-arrow-<?php echo $uuid?> reset-button left-arrow">&larr;</button>
	    <button class="js-right-arrow-<?php echo $uuid?> reset-button right-arrow">&rarr;</button>
	  </div>
		<?php } ?>
  </div>
  <script>
    (function(document) {
      jQuery(document).ready(function () {
				var isFadeEffect = '<?php echo $slideEffect ?>' === 'fade',
						isAutoPlay = <?php echo $autoPlaySpeed ?> > 0,
						config = {
							loop: true,
							speed: <?php echo $slideSpeed ?>,
							effect: '<?php echo $slideEffect ?>',
		          prevButton: jQuery('.js-left-arrow-<?php echo $uuid?>'),
		          nextButton: jQuery('.js-right-arrow-<?php echo $uuid?>')
						};

				if (isFadeEffect) {
					config.fade = { crossFade: true };
				}
				if (isAutoPlay) {
					config.autoplay = <?php echo $autoPlaySpeed ?>;
					config.autoplayDisableOnInteraction = false;
				}

        //initialize swiper when document ready
        var sliderSwiper = new Swiper ('.js-slider-container-<?php echo $uuid?>', config);
      });
    })(document);
  </script>
	<?php
  wp_enqueue_style('slider-style');
  wp_enqueue_script('slider-script');
	return ob_get_clean();
}
add_shortcode( 'content-slider', 'create_content_slider_shortcode' );