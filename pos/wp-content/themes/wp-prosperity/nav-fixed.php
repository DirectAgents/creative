<!-- FIXED NAVIGATION (.nav-fixed) -->
<nav class="nav-fixed" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

	<div class="wrap">

		<?php 
			$showicons = tb_option('show_icons');
			if ( $showicons && in_array('icons_fixednav', $showicons) ) {
				get_template_part( 'icons-site' );
			} 
		?>

		<span class="menu-toggle">
			<i class="fa fa-bars"></i>
		</span>

		<?php wp_nav_menu( array( 'theme_location' => 'fixednav', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'fixednav' ) ); ?>

	</div><!-- .wrap -->

</nav> 
<!-- END FIXED NAVIGATION (.nav-fixed) -->