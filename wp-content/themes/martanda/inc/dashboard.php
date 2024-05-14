<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'martanda_create_menu' ) ) {
	add_action( 'admin_menu', 'martanda_create_menu' );
	/**
	 * Adds our "Martanda" dashboard menu item
	 *
	 */
	function martanda_create_menu() {
		$martanda_page = add_theme_page( 'Martanda', 'Martanda', apply_filters( 'martanda_dashboard_page_capability', 'edit_theme_options' ), 'martanda-options', 'martanda_settings_page' );
		add_action( "admin_print_styles-$martanda_page", 'martanda_options_styles' );
	}
}

if ( ! function_exists( 'martanda_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Martanda dashboard page
	 *
	 */
	function martanda_options_styles() {
		wp_enqueue_style( 'martanda-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), MARTANDA_VERSION );
	}
}

if ( ! function_exists( 'martanda_settings_page' ) ) {
	/**
	 * Builds the content of our Martanda dashboard page
	 *
	 */
	function martanda_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="martanda-masthead clearfix">
					<div class="martanda-container">
						<div class="martanda-title">
							<a href="<?php echo esc_url(martanda_theme_uri_link()); ?>" target="_blank"><?php esc_html_e( 'Martanda', 'martanda' ); ?></a> <span class="martanda-version"><?php echo esc_html( MARTANDA_VERSION ); ?></span>
						</div>
						<div class="martanda-masthead-links">
							<?php if ( ! defined( 'MARTANDA_PREMIUM_VERSION' ) ) : ?>
								<a class="martanda-masthead-links-bold" href="<?php echo esc_url(martanda_theme_uri_link()); ?>" target="_blank"><?php esc_html_e( 'Premium', 'martanda' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(MARTANDA_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'martanda' ); ?></a>
                            <a href="<?php echo esc_url(MARTANDA_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'martanda' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * martanda_dashboard_after_header hook.
				 *
				 */
				 do_action( 'martanda_dashboard_after_header' );
				 ?>

				<div class="martanda-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * martanda_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'martanda_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'martanda-settings-group' ); ?>
									<?php do_settings_sections( 'martanda-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="martanda_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'martanda' )
										);
										?>
									</div>

									<?php
									/**
									 * martanda_inside_options_form hook.
									 *
									 */
									 do_action( 'martanda_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Demo Import' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Colors' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Typography' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Copyright Footer' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Elementor Addon' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Disable Elements' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Hooks' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Spacing' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Button Functions' => array(
											'url' => martanda_theme_uri_link(),
									),
									'Fixed Side Content Functions' => array(
											'url' => martanda_theme_uri_link(),
									)
								);

								if ( ! defined( 'MARTANDA_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox martanda-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'martanda' ); ?></h3>
                                        <p class="martanda-dashtext"><?php esc_html_e( 'Martanda premium has some extra functions to make Your site better.', 'martanda' ); ?></p>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated martanda-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'martanda' ); ?></a>
													</div>
												</div>
												<div class="martanda-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * martanda_options_items hook.
								 *
								 */
								do_action( 'martanda_options_items' );
								?>
							</div>

							<div class="martanda-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="martanda_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'martanda' )
									);
									?>
								</div>

								<?php
								/**
								 * martanda_admin_right_panel hook.
								 *
								 */
								 do_action( 'martanda_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Martanda documentation', 'martanda' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'martanda' ); ?></p>
                                    <a href="<?php echo esc_url(MARTANDA_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Martanda documentation', 'martanda' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'martanda' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'martanda' ); ?></p>
                                    <a href="<?php echo esc_url(MARTANDA_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'martanda' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'martanda' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Martanda theme, show it to the world with Your review. Your feedback helps a lot.', 'martanda' ); ?></p>
                                    <a href="<?php echo esc_url(MARTANDA_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'martanda' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'martanda_admin_errors' ) ) {
	add_action( 'admin_notices', 'martanda_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function martanda_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_martanda-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'martanda-notices', 'true', esc_html__( 'Settings saved.', 'martanda' ), 'updated' );
		}

		settings_errors( 'martanda-notices' );
	}
}
