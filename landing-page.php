<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 * The template for displaying all pages.
 *
 * This template is for all baremade.com landing pages without nav
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Base_Theme
 */

get_header('landing-page'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'components/page/content', 'page' );
			endwhile; // End of the loop.
			?>
		</main>
	</div>
<?php
get_footer('landing-page');