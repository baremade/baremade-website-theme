<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Base_Theme
 */

?>

<?php
 if ( !is_single() ) {
   $extra_post_classes = array(
    'col-lg-4 col-md-3 col-sm-12 post-list-item'
   );
 } else {
   $extra_post_classes = array(
    'col-12'
   );
 }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($extra_post_classes); ?>>
	<header class="entry-header">
    <?php if ( !is_single() && '' != get_the_post_thumbnail() ) : ?>
  		<div class="post-thumbnail">
  			<a class="no-border" href="<?php the_permalink(); ?>">
  				<?php the_post_thumbnail( 'base_theme-featured-image' ); ?>
  			</a>
  		</div>
  	<?php endif; ?>
		<?php
			if (!is_single()) {
        echo '<div class="post-categories">' . get_the_term_list(get_the_ID(), 'category', '<h4>', '</h4>, <h4>', '</h4>') . '</div>';
			}
		?>
	</header>
  <?php if ( is_single() ) : ?>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&gt;</span>', 'base_theme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'base_theme' ),
				'after'  => '</div>',
			) );
		?>
	</div>
  <?php endif; ?>
	<?php is_single() && get_template_part( 'components/post/content', 'footer' ); ?>
</article><!-- #post-## -->