<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
							<?php the_title('<h1>', '</h1>')?>
							<?php echo '<div class="post-categories">' . get_the_category_list(', ') . '</div>'; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'components/post/content', get_post_format() );

		?>
		<div class="col-12">
			<nav class="navigation post-navigation" role="navigation">
				<h2 class="screen-reader-text">Post navigation</h2>
				<div class="nav-links row">
					<div class="nav-previous col-6">
						<?php previous_post_link('&larr; %link') ?>
					</div>
					<div class="nav-next col-6 text-right">
						<?php next_post_link('%link &rarr;') ?>
					</div>
				</div>
			</nav>
		</div>
		<?php
		endwhile; // End of the loop.
		?>
			  </div>
			</div>
		</main>
	</div>
<?php
get_footer();
