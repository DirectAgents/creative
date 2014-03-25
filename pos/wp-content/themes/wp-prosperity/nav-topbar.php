<!-- TOPBAR NAVIGATION (.nav-primary) -->
<nav class="nav-primary" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

	<div class="wrap">

		<?php if ( tb_option('search_topnav') ) { ?>
			<a title="<?php _e( 'Display Search Form', 'themebeagle' ); ?>" href="#" class="search-button">
				<i class="fa fa-search"></i>
			</a>
		<?php }

		$showicons = tb_option('show_icons');
		if ( $showicons && in_array('icons_topnav', $showicons) ) {
			get_template_part( 'icons-site' );
		} ?>

		<span class="menu-toggle">
			<i class="fa fa-bars"></i>
		</span>

		<?php wp_nav_menu( array( 'theme_location' => 'topnav', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'topnav' ) ); ?>

	</div><!-- .wrap -->

</nav>
<!-- END PRIMARY NAVIGATION (.nav-primary) -->