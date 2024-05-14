<?php
/**
 * Header Eight Style Template
 *
 * @package JetBlack
 */

$jetblack_phone      = jetblack_gtm( 'jetblack_header_phone' );
$jetblack_email      = jetblack_gtm( 'jetblack_header_email' );
$jetblack_address    = jetblack_gtm( 'jetblack_header_address' );
$jetblack_open_hours = jetblack_gtm( 'jetblack_header_open_hours' );
?>
<div class="header-wrapper main-header-eight">
	<div id="top-header" class="main-top-header-eight <?php echo esc_attr( jetblack_gtm( 'jetblack_header_top_color_scheme' ) ); ?>">
		<div class="site-top-header-mobile">
			<div class="container">
				<button id="header-top-toggle" class="header-top-toggle" aria-controls="header-top" aria-expanded="false">
					<i class="fas fa-bars"></i><span class="menu-label"> <?php esc_html_e( 'Top Bar', 'jetblack-intro' ); ?></span>
				</button><!-- #header-top-toggle -->
				
				<div id="site-top-header-mobile-container">
					<?php if ( $jetblack_phone || $jetblack_email || $jetblack_address || $jetblack_open_hours ) : ?>
						<div id="quick-contact">
							<?php get_template_part( 'template-parts/header/quick-contact' ); ?>
						</div>
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ): ?>
						<div id="top-social">
							<div class="social-nav no-border circle-icon">
								<nav id="social-primary-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'jetblack-intro' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_class'     => 'social-links-menu',
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
										) );
									?>
								</nav><!-- .social-navigation -->
							</div>
						</div><!-- #top-social -->
					<?php endif; ?>
					
					<?php get_template_part( 'template-parts/header/header-mobile-search' ); ?>
				</div><!-- #site-top-header-mobile-container-->
			</div><!-- .container -->
		</div><!-- .site-top-header-mobile -->
		
		<div class="site-top-header">
			<div class="container">
		
				<?php if ( $jetblack_phone || $jetblack_email || $jetblack_address || $jetblack_open_hours ) : ?>
				<div id="quick-contact" class="pull-left">
					<?php get_template_part( 'template-parts/header/quick-contact' ); ?>
				</div>
				<?php endif; ?>
				<div class="pull-right">
				<?php if ( has_nav_menu( 'social' ) ): ?>
				<div id="top-social" class="pull-left">
					<div class="social-nav no-border">
						<nav id="social-primary-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'jetblack-intro' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
								) );
							?>
						</nav><!-- .social-navigation -->
					</div>
				</div><!-- #top-social -->
				<?php endif; ?>
				<div class="head-search-cart-wrap pull-right">
					<?php if ( function_exists( 'jetblack_woocommerce_header_cart' ) ) : ?>
					<div class="cart-contents pull-left">
						<?php jetblack_woocommerce_header_cart(); ?>
					</div>
					<?php endif; ?>
					<div class="header-search pull-right">
						<?php get_template_part( 'template-parts/header/header-search' ); ?>
					</div><!-- .header-search -->
				</div><!-- .head-search-cart-wrap -->
					</div>
			</div><!-- .container -->
		</div><!-- .site-top-header -->
	</div><!-- #top-header -->

	<header id="masthead" class="site-header clear-fix">
		<div class="container">
			<div class="site-header-main">
				<div class="row">
					<div class="ff-grid-12 no-margin site-branding center-site-branding">
						<?php get_template_part( 'template-parts/header/site-branding' ); ?>
					</div><!-- .site-branding -->
					
				</div><!-- .row -->
			</div><!-- .site-header-main -->
		</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="main-nav">
		<div class="nav-inner-wrapper site-border site-header clear-fix <?php echo jetblack_gtm( 'jetblack_header_sticky' ) ? ' sticky-enabled' : ''; ?>">
			<div class="container">
				<div class="text-aligncenter">
					<?php get_template_part( 'template-parts/navigation/navigation-primary' ); ?>
				</div><!-- .text-aligncenter -->
			</div><!-- .container -->
		</div><!-- .nav-inner-wrapper -->
	</div><!-- .main-nav -->
</div><!-- .header-wrapper -->
