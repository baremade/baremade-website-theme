<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base_Theme
 */

?>
	</div>
	<footer id="colophon" class="site-footer secondary-bg" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4 margin-top-1 center f-right-border">
					<span class="h1">Let's Get Social.</span>
					<ul class="reset-ul">
						<li><a href="https://www.facebook.com/baremadestudio/">Facebook</a></li>
						<li><a href="https://www.instagram.com/baremadestudio/">Instagram</a></li>
						<li><a href="https://twitter.com/baremadestudio">Twitter</a></li>
						<li><a href="https://www.pinterest.com/baremadestudio/">Pinterest</a></li>
					</ul>
					<span class="f-section-border"></span>
				</div>
				<div class="col-12 col-md-4 align-self-center margin-top-1 center">
					<span class="small-logo"></span>
				</div>
				<div class="col-md-4 hidden-sm-down margin-top-1 center f-left-border">
					<span class="h1">Learn More.</span>
					<ul class="reset-ul">
						<li><a href="/studio">Studio</a></li>
						<li><a href="/contact">Contact Us</a></li>
						<li><a href="/services">Services</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<?php get_template_part( 'components/footer/site', 'info' ); ?>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
