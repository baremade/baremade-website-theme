<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Base_Theme
 */

get_header('full'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="full-width-section secondary-bg header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h1>Blog</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
		<?php
		if ( have_posts() ) :
		?>
		 <div class="col-12 post-cat-list-section">
			 <ul class="reset-ul post-cat-list">
				<?php
					$categories_list_opt = array(
				   'title_li' => '',
		       'show_option_all' => 'all',
		       'hide_empty' => 1,
		       'hide_title_if_empty' => 1
				  );
					wp_list_categories($categories_list_opt);
				?>
				</ul>
			</div>
		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'components/post/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>
				</div>
			</div>
		</main>
	</div>
<?php
get_footer();
