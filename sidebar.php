<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || is_page() ) {
	return;
}
?>

<aside id="secondary" class="col-md-3 col-12 widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
