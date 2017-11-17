<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Base_Theme
 */

get_header('full'); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">
			<div class="row">
		<?php
		if ( have_posts() ) : ?>
			<div class="col-12">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'base-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'components/post/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>
			</div>
		</main>
	</section>
<?php
get_footer();