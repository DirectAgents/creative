<!-- HEADER NAVIGATION (.nav-secondary) -->
<nav class="nav-secondary" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

	<div class="wrap">

		<?php if ( tb_option('search_secnav') ) { ?>
			<a title="<?php _e( 'Display Search Form', 'themebeagle' ); ?>" href="#" class="search-button">
				<i class="fa fa-search"></i>
			</a>
		<?php }

		$showicons = tb_option('show_icons');
		if ( $showicons && in_array('icons_secnav', $showicons) ) {
			get_template_part( 'icons-site' );
		} ?>

		<span class="menu-toggle">
			<i class="fa fa-bars"></i>
		</span>

		<?php wp_nav_menu( array( 'theme_location' => 'catnav', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'secnav' ) ); ?>

	</div><!-- .wrap -->

</nav> 
<!-- END SECONDARY NAVIGATION (.nav-secondary) -->