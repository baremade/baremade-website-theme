
<?php
function create_projects_slider_shortcode_wp_register_scripts() {
  wp_register_style('slider-style', get_template_directory_uri() . '/assets/css/swiper.min.css' , array(), '3.4.2', 'all');
  wp_register_script('slider-script', get_template_directory_uri() . '/assets/js/vendor/swiper.jquery.min.js' , array('jquery'), '3.4.2', true);
}
add_action( 'wp_enqueue_scripts', 'create_projects_slider_shortcode_wp_register_scripts' );

function show_project_types_links() {
  $terms = wp_get_post_terms(get_the_ID(), 'type');

  $output = '<ul class="reset-ul ps-project-types">';

  foreach ( $terms as $term ) {
      $term_link = get_term_link( $term );
      if ( is_wp_error( $term_link ) ) {
        continue;
      }
      $output = $output . '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
  }

  $output = $output . '</ul>';

  echo $output;
}

// Use the shortcode: [projects-slider]
function create_projects_slider_shortcode($atts, $content = null) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'project_ids' => 'all',
      'speed' => '300'
		),
		$atts,
		'projects-slider'
	);
	// Attributes in var
	$projectIds = $atts['project_ids'];
  $slideSpeed = $atts['speed'];

	$args = array(
    'post_status' => 'publish',
    'post_type'   => 'project',
    'nopaging'    => true,
    'meta_query' => array(
      array(
        'key' => '_thumbnail_id'
      )
    )
	);
	if ($projectIds != 'all') {
		$args['post__in'] = str_getcsv($projectIds);
	}
	$query = new WP_Query( $args );
  $titles = array();

	ob_start();
	?>
  <div class="projects-slider container-fluid no-padding">
    <div class="row no-margin">
      <div class="col-sm-12 col-md-8 no-left-padding">
        <div class="js-project-slider swiper-container">
          <div class="swiper-wrapper">
          <?php
          while ( $query->have_posts() ) : $query->the_post();
          $images = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full-sized' );
          array_push($titles, get_the_title());
          ?>
            <div class="swiper-slide">
              <a class="no-border" href="<?php the_permalink(); ?>">
                <img alt="<?php the_title(); ?>" data-src="<?php echo $images[0]; ?>" class="swiper-lazy" />
              </a>
              <p class="hidden-md-up"><?php the_title(); ?></p>
              <div class="hidden-sm-down"><?php show_project_types_links(); ?></div>
            </div>
          <?php
          endwhile;
          ?>
          </div>
        </div>
        <div class="ps-navigation-buttons hidden-sm-down">
          <button class="js-left-arrow reset-button left-arrow">&larr;</button>
          <button class="js-right-arrow reset-button right-arrow">&rarr;</button>
        </div>
      </div>
      <div class="js-project-list ps-project-list col-md-4 no-right-padding hidden-sm-down">
        <ul class="reset-ul">
          <?php foreach ($titles as $index => $title) { ?>
            <li class="<?php echo $index == 0 ? 'active' : '' ?>"><?php echo $title; ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <script>
    (function(document) {
      jQuery(document).ready(function () {
        var $pageElemets = jQuery('.js-project-list ul li');
        //initialize swiper when document ready
        var projectSliderSwiper = new Swiper ('.js-project-slider', {
          loop: true,
          speed: <?php echo $slideSpeed ?>,
          prevButton: jQuery('.js-left-arrow'),
          nextButton: jQuery('.js-right-arrow'),
          slidesPerView: 1,
          spaceBetween: 0,
          roundLengths: true,
          preloadImages: false,
          lazyLoading: true,
          lazyLoadingInPrevNext: true,
          lazyLoadingInPrevNextAmount: 1,
          lazyLoadingOnTransitionStart: true,
          breakpoints: {
            767: {
              loopedSlides: 1,
              slidesPerView: 'auto',
              spaceBetween: 20
            }
          }
        });
        projectSliderSwiper.on('onTransitionEnd', function(swiper) {
          $pageElemets.removeClass('active');
          $pageElemets.eq(swiper.realIndex).addClass('active');
        });
        $pageElemets.on('click', function(event) {
          var index = $pageElemets.index(event.currentTarget);
          projectSliderSwiper.slideTo(index + 1);
        });
      });
    })(document);
  </script>
	<?php
  wp_enqueue_style('slider-style');
  wp_enqueue_script('slider-script');
	return ob_get_clean();
}
add_shortcode( 'projects-slider', 'create_projects_slider_shortcode' );