<nav id="site-navigation" class="main-navigation" role="navigation">
	<div class="container-fluid main-nav-container">
		<div class="row align-items-center mobile-menu-wrap">
			<div class="col-4 mnc-logo-col">
				<span class="mnc-top-logo"><?php base_theme_the_custom_logo(); ?></span>
				<div class="mnc-scroll-logo">
						<a href="/"><span class="small-logo-light align-self-center"></span></a>
				</div>
			</div>
			<div class="col-8 right">
				<button id="menu-toggle-button" class="menu-toggle" aria-controls="top-menu" aria-expanded="false"></button>
			</div>
		</div>
		<div class="row align-items-center desktop-menu-wrap">
			<div class="col-2 mnc-logo-col">
				<span class="mnc-top-logo"><?php base_theme_the_custom_logo(); ?></span>
				<div class="mnc-scroll-logo">
					<a href="/" class="small-logo-light-wrap align-self-center"><span class="small-logo-light"></span></a>
				</div>
			</div>
			<div class="col-10">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'top-menu', 'container' => null, 'menu_class' => 'nav-menu reset-ul' ) ); ?>
			</div>
		</div>
	</div>
	<div class="mobile-menu-items right">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'top-menu-mobile', 'container' => null, 'menu_class' => 'nav-menu reset-ul' ) ); ?>
	</div>
</nav>
