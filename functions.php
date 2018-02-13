<?php
/**
 * Base Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Base_Theme
 */

if ( ! function_exists( 'base_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function base_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'base_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'base_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'base_theme-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'base_theme' ),
		) );

	register_nav_menus( array(
		'menu-2' => esc_html__( 'Bottom', 'base_theme' ),
		) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 175,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'base_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'base_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function base_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'base_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'base_theme_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function base_theme_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function base_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'base_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'base_theme_widgets_init' );

/**
 * Register project content type
 */
 add_action( 'init', 'create_project_type' );
 function create_project_type() {
	 $labels = array(
 		'name'               => _x( 'Projects', 'post type general name', 'base-theme-domain' ),
 		'singular_name'      => _x( 'Project', 'post type singular name', 'base-theme-domain' ),
 		'menu_name'          => _x( 'Projects', 'admin menu', 'base-theme-domain' ),
 		'name_admin_bar'     => _x( 'Projects', 'add new on admin bar', 'base-theme-domain' ),
 		'add_new'            => _x( 'Add Project', 'book', 'base-theme-domain' ),
 		'add_new_item'       => __( 'Add New Project', 'base-theme-domain' ),
 		'new_item'           => __( 'New Project', 'base-theme-domain' ),
 		'edit_item'          => __( 'Edit Project', 'base-theme-domain' ),
 		'view_item'          => __( 'View Project', 'base-theme-domain' ),
 		'all_items'          => __( 'All Projects', 'base-theme-domain' ),
 		'search_items'       => __( 'Search Projects', 'base-theme-domain' ),
 		'parent_item_colon'  => __( 'Parent Projects:', 'base-theme-domain' ),
 		'not_found'          => __( 'No projects found.', 'base-theme-domain' ),
 		'not_found_in_trash' => __( 'No projects found in Trash.', 'base-theme-domain' )
 	);

   register_post_type( 'project',
     array(
       'labels' => $labels,
       'public' => true,
       'has_archive' => true,
       'supports' => array(
         'title',
         'editor',
         'author',
         'thumbnail',
         'excerpt',
         'trackbacks',
         'custom-fields',
         'comments',
         'revisions',
         'page-attributes',
       ),
     )
   );

	 $tagLabels = array(
 		'name'                       => _x( 'Project Types', 'taxonomy general name', 'base-theme-domain' ),
 		'singular_name'              => _x( 'Project Type', 'taxonomy singular name', 'base-theme-domain' ),
 		'search_items'               => __( 'Search Project Types', 'base-theme-domain' ),
 		'popular_items'              => __( 'Popular Project Types', 'base-theme-domain' ),
 		'all_items'                  => __( 'All Project Types', 'base-theme-domain' ),
 		'parent_item'                => null,
 		'parent_item_colon'          => null,
 		'edit_item'                  => __( 'Edit Project Type', 'base-theme-domain' ),
 		'update_item'                => __( 'Update Project Type', 'base-theme-domain' ),
 		'add_new_item'               => __( 'Add New Project Type', 'base-theme-domain' ),
 		'new_item_name'              => __( 'New Project Type Name', 'base-theme-domain' ),
 		'separate_items_with_commas' => __( 'Separate project types with commas', 'base-theme-domain' ),
 		'add_or_remove_items'        => __( 'Add or remove project types', 'base-theme-domain' ),
 		'choose_from_most_used'      => __( 'Choose from the most used project types', 'base-theme-domain' ),
 		'not_found'                  => __( 'No project types found.', 'base-theme-domain' ),
 		'menu_name'                  => __( 'Project Types', 'base-theme-domain' ),
 	);

 	$args = array(
 		'hierarchical'          => false,
 		'labels'                => $tagLabels,
 		'show_ui'               => true,
 		'show_admin_column'     => true,
 		'update_count_callback' => '_update_post_term_count',
 		'query_var'             => true,
 		'rewrite'               => array( 'slug' => 'type' ),
 	);

 	register_taxonomy( 'type', 'project', $args );
 }

/**
 * Enqueue scripts and styles.
 */
function base_theme_scripts() {
	wp_enqueue_style( 'base_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'base_theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'base_theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'base_theme_scripts' );

remove_filter( 'the_content', 'wpautop' );

/**
 * Override search widget output
 */
require get_template_directory() . '/inc/custom-search-widget.php';

/**
 * Override post categories widget output
 */
require get_template_directory() . '/inc/categories-widget.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load full width section shortcode.
 */
require get_template_directory() . '/inc/shortcodes/fullwidth-section.php';

/**
 * Load project slider shortcode.
 */
require get_template_directory() . '/inc/shortcodes/projects-slider.php';

/**
 * Load content slider shortcode.
 */
require get_template_directory() . '/inc/shortcodes/content-slider.php';

/**
 * Load content slider shortcode.
 */
require get_template_directory() . '/inc/shortcodes/animated-number.php';

/**
 * Load image hero shortcode.
 */
require get_template_directory() . '/inc/shortcodes/image-hero.php';
