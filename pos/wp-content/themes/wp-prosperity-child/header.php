<?php 
/*-----------------------------------------------------------------------------------*/
// Theme Header - Displays the <head> section and everything up to .site-main
// @since 1.0
/*-----------------------------------------------------------------------------------*/
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) 
	// Force latest IE rendering engine & Chrome Frame; hat-tip: http://www.validatethis.co.uk/news/fix-bad-value-x-ua-compatible-once-and-for-all/
	header('X-UA-Compatible: IE=edge,chrome=1');
?>

<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>




<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

<?php themebeagle_head(); // action hook ?>

</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<?php if ( tb_option('show_fixednav') && !is_page_template('page-landing.php') ) { get_template_part( 'nav-fixed' ); } ?>

	<?php themebeagle_before_site_container(); // action hook ?>

	<!-- OUTER SITE CONTAINER (.site-container) -->
	<div class="site-container">

		<?php if ( tb_option('show_topnav') ) { get_template_part( 'nav-topbar' ); } ?>

		<!-- SITE HEADER (.site-header) -->
		<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

			<div class="wrap">

				<div class="site-branding">

					<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr(get_bloginfo('name','display')); ?>" rel="home">

					<a href="<?php //echo esc_url(home_url( '/' )); ?>http://www.pos.com" title="<?php echo esc_attr(get_bloginfo('name','display')); ?>" rel="home">

						<h1 class="site-title" itemprop="headline">
							<?php 
								if ( tb_option('header_logo') ) { ?>
									<div class="site-logo">
										<img src="<?php echo tb_option('logo_url'); ?>" alt="<?php echo esc_attr(get_bloginfo('name','display')); ?>" />
									</div>
								<?php }							
								if ( tb_option('site_title') ) {
									if ( tb_option('site_title_icon') ) { ?>
										<i class="fa <?php echo tb_option('site_title_icon'); ?>"></i>
									<?php }
									bloginfo( 'name' );
								} 
							?>
						</h1>
						<?php if ( tb_option('tagline') ) { ?>
							<div class="site-description" itemprop="description">
								<?php bloginfo( 'description' ); ?>
							</div>
						<?php } ?>
					</a>
				</div><!-- .site-branding -->

				<?php
					themebeagle_after_branding(); // action hook;

					global $post;
					if ( !get_post_meta($post->ID, 'tb_ad_header_code', true) && tb_option('show_secnav') && tb_option('secnav_align') == 'right' && !tb_option('ad_header') ) {
						get_template_part( 'nav-header' );
					} 
				?>

			</div><!-- .wrap -->
		</header>
		<!-- END SITE HEADER (.site-header) -->

		<?php  
			if (
				( tb_option('show_secnav') && tb_option('secnav_align') == 'below' ) || 
				( tb_option('ad_header') && tb_option('show_secnav') ) || 
				( tb_option('show_secnav') && is_singular() && get_post_meta($post->ID, 'tb_ad_header_code', true) ) 
			) {
			get_template_part( 'nav-header' );
		} ?>

		<?php if ( tb_option('search_topnav') == 1 || tb_option('search_secnav') == 1 ) { ?>
			<!-- TOPBAR SEARCH FORM (.topnav-search) -->
			<div class="topnav-search">
				<div class="wrap">
					<?php get_search_form(); ?>
				</div><!-- .wrap -->
			</div><!-- .topnav-search) -->
			<!-- END SEARCH FORM (.topnav-search) -->
		<?php } ?>

		<?php themebeagle_before_site_inner(); // action hook ?>

		<!-- INNER SITE CONTAINER (.site-inner) -->
		<div class="site-inner">

		<div class="site-inner-wrap">

			<div class="tb-col-border narrow"></div>

			<div class="tb-col-border wide"></div>

			<!-- PRIMARY CONTENT AREA (#primary) -->
			<div id="primary" class="content-area">

				<!-- CONTENT AREA (.site-content) -->
				<main id="content" class="site-content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<?php 
					if ( function_exists('yoast_breadcrumb') && !is_front_page() && is_page_template('rs-landing-page.php'))
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');

					
				 
					themebeagle_site_content(); // action hook 