<?php
/**
 * @package ThinkUpThemes
 * @subpackage Admin
 * @since 1.0.0
 */
if ( ! class_exists( 'thinkup_toolbox_section' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class thinkup_toolbox_section {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The thinkup_toolbox_section class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;
		/**
		 * Define the menu item name for the page.
		 *
		 * @var string $menu_name The name of the menu name under Appearance settings.
		 */
		private $menu_name;
		/**
		 * Define the page title name.
		 *
		 * @var string $page_name The title of the About page.
		 */
		private $page_name;
		/**
		 * Define the page tabs.
		 *
		 * @var array $tabs The page tabs.
		 */
		private $tabs;
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of thinkup_toolbox_section
		 *
		 * @var thinkup_toolbox_section $instance The thinkup_toolbox_section instance.
		 */
		private static $instance;

		/**
		 * The Main thinkup_toolbox_section instance.
		 *
		 * We make sure that only one instance of thinkup_toolbox_section exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof thinkup_toolbox_section ) ) {
				self::$instance = new thinkup_toolbox_section;
				if ( ! empty( $config ) && is_array( $config ) ) {
					self::$instance->config = $config;
					self::$instance->setup_config();
					self::$instance->setup_actions();
				}
			}

		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_active  = strtolower(str_replace(' ', '-', $theme->get( 'Name' )));
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();
			$this->menu_name     = isset( $this->config['menu_name'] ) ? $this->config['menu_name'] : 'Why ' . $this->theme_name;
			$this->page_name     = isset( $this->config['page_name'] ) ? $this->config['page_name'] : 'About ' . $this->theme_name;
			$this->notification  = isset( $this->config['notification'] ) ? $this->config['notification'] : ( '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s! To get started please make sure you visit our %2$s<strong>welcome page</strong>%3$s.', $this->theme_name, '<a href="' . esc_url( admin_url( 'admin.php?page=thinkup-setup' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'admin.php?page=thinkup-setup' ) ) . '" class="button button-primary" style="text-decoration: none;">' . sprintf( 'Get started with %s', $this->theme_name ) . '</a></p>' );
			$this->tabs          = isset( $this->config['tabs'] ) ? $this->config['tabs'] : array();

		}

		/**
		 * Setup the actions used for this page.
		 */
		public function setup_actions() {

			add_action( 'admin_body_class', array( $this, 'body_class' ) );
			add_action( 'admin_menu', array( $this, 'register' ) );
			add_action( 'wp_loaded', array( $this, 'hide_notice' ) );

			/* activation notice */
			add_action( 'admin_notices', array( $this, 'activation_admin_notice' ) );
			/* enqueue script and style for about page */
			add_action( 'admin_enqueue_scripts', array( $this, 'style_and_scripts' ) );
		}

		/**
		 * Add body class to admin area.
		 */
		function body_class( $classes ) {

			// Add theme specific classes
			$classes = $classes . ' theme-thinkupthemes';
			$classes = $classes . ' theme-parent-' . strtolower($this->theme_name);
			$classes = $classes . ' theme-child-' . $this->theme_active;

			return $classes;
		}

		/**
		 * Register the menu page under Appearance menu.
		 */
		function register() {

			// Add menu and subpages
			if ( ! empty( $this->menu_name ) && ! empty( $this->page_name ) ) {

				// Format theme name
				$theme_name = strtolower( $this->theme_name );
				$theme_name = str_replace( '(lite)', '', $theme_name );
				$theme_name = str_replace( '(free)', '', $theme_name );
				$theme_name = ucfirst( trim( $theme_name ) );

				// Appearance subpage
				add_theme_page( 
					$this->menu_name, 
					$this->page_name, 
					'activate_plugins', 
					'/admin.php?page=thinkup-setup'
				);

				// Menu page
				add_menu_page( 'Thinkup Setup', $theme_name . ' Theme', 'activate_plugins', 'thinkup-setup', '', get_template_directory_uri() . '/admin/main-toolbox/assets/img/icon.png' );

				// Menu subpages
				add_submenu_page(
					'thinkup-setup',
					esc_html__( 'Guide', strtolower( $theme_name ) ),
					esc_html__( 'Guide', strtolower( $theme_name ) ),
					'activate_plugins',
					'thinkup-setup',
					array(
						$this,
						'page_setup'
					)
				);
			    // add_submenu_page(
				// 	'thinkup-setup',
				// 	esc_html__( 'Free vs Pro', strtolower( $theme_name ) ),
				// 	esc_html__( 'Free vs Pro', strtolower( $theme_name ) ),
				// 	'activate_plugins',
				// 	'thinkup-pro',
				// 	array(
				// 		$this,
				// 		'page_free_pro'
				// 	)
				// );
				add_submenu_page(
					'thinkup-setup',
					esc_html__( 'Hire a Developer', strtolower( $theme_name ) ),
					esc_html__( 'Hire a Developer', strtolower( $theme_name ) ),
					'activate_plugins',
					esc_url( 'https://www.thinkupthemes.com/hire/' )
				);
				add_submenu_page(
					'thinkup-setup',
					esc_html__( 'Upgrade Now', strtolower( $theme_name ) ),
					esc_html__( 'Upgrade Now', strtolower( $theme_name ) ),
					'activate_plugins',
					esc_url( 'https://www.thinkupthemes.com/themes/' . strtolower($theme_name) . '/?utm_campaign=upgrade&utm_medium=sidebar&utm_source=WordPress' )
				);
			    // add_submenu_page(
				// 	'thinkup-setup',
				// 	esc_html__( 'Addons', strtolower($theme_name) ),
				// 	esc_html__( 'Addons', strtolower($theme_name) ),
				// 	'activate_plugins',
				// 	'thinkup-addons',
				// 	array(
				// 		$this,
				// 		'page_setup'
				// 	)
				// );
			}
		}

		/**
		 * Adds an admin notice upon successful activation.
		 */
		public function activation_admin_notice() {
			global $pagenow;

			add_action( 'admin_notices', array( $this, 'welcome_admin_notice' ), 99 );
		}

		/**
		 * Display an admin notice linking to the about page
		 */
		public function welcome_admin_notice() {

			// Format theme name
			$theme_name = strtolower( $this->theme_name );
			$theme_name = str_replace( '(lite)', '', $theme_name );
			$theme_name = str_replace( '(free)', '', $theme_name );

			if ( ! empty( $this->notification ) ) {

				// display notice if not previously dismissed
				if ( current_user_can( 'edit_theme_options' ) && !get_option( $theme_name . '_thinkup_notice_welcome' ) ) {

					echo '<div class="thinkup-toolbox-about updated notice is-dismissible">';
					echo '<a class="notice-dismiss" href="' . esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('thinkup-hide-notice', 'welcome')), 'thinkup_hide_notices_nonce', '_thinkup_notice_nonce')) . '" style="z-index: 0;padding: 10px;text-decoration: none;" >';
					echo '<span class="screen-reader-text">' . esc_html__('Dismiss this notice.', strtolower( $theme_name )). '</span>';
					echo '</a>';
					echo wp_kses_post( $this->notification );
					echo '</div>';

				}
			}
		}

		/**
		 * Render the main content page.
		 */
		public function page_setup() {

			if ( ! empty( $this->config['welcome_title'] ) ) {
				$welcome_title = $this->config['welcome_title'];
			}
			if ( ! empty( $this->config['welcome_content'] ) ) {
				$welcome_content = $this->config['welcome_content'];
			}

			if ( ! empty( $welcome_title ) || ! empty( $welcome_content ) || ! empty( $this->tabs ) ) {

				echo '<div class="wrap about-wrap epsilon-wrap">';

				if ( ! empty( $welcome_title ) ) {
					echo '<h1>';
					echo esc_html( $welcome_title );
//					if ( ! empty( $this->theme_version ) ) {
//						echo esc_html( $this->theme_version ) . ' </sup>';
//					}
					echo '</h1>';
				}
				if ( ! empty( $welcome_content ) ) {
					echo '<div class="about-text">' . wp_kses_post( $welcome_content ) . '</div>';
				}

				/* Add upgrade box */
				$upgrade = $this->config['upgrade'];

				echo	'<div id="thinkup-promotion-field-header">';

					echo	'<div id="promotion-table">';
					echo	'<div id="promotion-header">';
					echo	'<p class="main-title">' . esc_html( $upgrade['price_discount'] ) . '</p>';
					echo	'<a href="' . esc_url( $upgrade['upgrade_url'] ) . '" target="_blank" class="button button-primary">' . esc_html( $upgrade['button'] ) . '</a>';
					echo	'</div>';

					echo	'<div id="promotion-coupon">';
					echo	'<a href="' . esc_url( $upgrade['upgrade_url'] ) . '" target="_blank">' . esc_html( $upgrade['coupon'] ) . '<span>' . esc_html( $upgrade['price_normal'] ) . '</span></a>';
					echo	'</div>';
					echo	'</div>';

				echo	'</div>';

				/* Display tabs */
				if ( ! empty( $this->tabs ) ) {
					$active_tab = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'page_free_pro';

					echo '<h2 class="nav-tab-wrapper wp-clearfix">';

					foreach ( $this->tabs as $tab_key => $tab_name ) {

						echo '<a href="' . esc_url( admin_url( 'admin.php?page=thinkup-setup' ) ) . '&tab=' . $tab_key . '" class="nav-tab ' . ( $active_tab == $tab_key ? 'nav-tab-active' : '' ) . '" role="tab" data-toggle="tab">';
						echo esc_html( $tab_name );
						echo '</a>';

					}

					echo '</h2>';

					/* Display content for current tab */
					if ( method_exists( $this, $active_tab ) ) {
						$this->$active_tab();
					}
				}

				echo '</div><!--/.wrap.about-wrap-->';
			}
		}

		/**
		 * Get started tab
		 */
		public function page_start() {

			if ( ! empty( $this->config['page_start'] ) ) {

				$get_started = $this->config['page_start'];

				if ( ! empty( $get_started ) ) {

					echo '<div id="thinkup-get-started" class="feature-section three-col">';

					foreach ( $get_started as $get_started_item ) {

						echo '<div class="col">';
						if ( ! empty( $get_started_item['title'] ) ) {
							echo '<h3>' . $get_started_item['title'] . '</h3>';
						}
						if ( ! empty( $get_started_item['text'] ) ) {
							echo '<p>' . $get_started_item['text'] . '</p>';
						}
						if ( ! empty( $get_started_item['button_link'] ) && ! empty( $get_started_item['button_label'] ) ) {

							echo '<p>';
							$button_class = '';
							if ( $get_started_item['is_button'] ) {
								$button_class = 'button button-primary';
							}

                            $button_new_tab = '_self';
                            if ( isset( $get_started_item['is_new_tab'] ) ) {
                                if ( $get_started_item['is_new_tab'] ) {
                                    $button_new_tab = '_blank';
                                }
                            }

							echo '<a target="' . $button_new_tab . '" href="' . $get_started_item['button_link'] . '"class="' . $button_class . '">' . $get_started_item['button_label'] . '</a>';
							echo '</p>';
						}

						echo '</div><!-- .col -->';
					}
					echo '</div><!-- .feature-section three-col -->';
				}

			}
		}

		/**
		 * Documentation
		 */
		public function page_docs() {
			echo '<div id="thinkup-documentation" class="feature-section one-col">';

			if ( ! empty( $this->config['page_docs'] ) ) {

				$documentation_steps = $this->config['page_docs'];

				if ( ! empty( $documentation_steps ) ) {

					$section_name = NULL;

					echo '<div class="thinkup-documentation-info">';
					echo '<h3>' . $documentation_steps['intro']['title'] . '</h3>';
					echo wpautop( $documentation_steps['intro']['text_main'] );
					echo '</div>';

					foreach ( $documentation_steps as $documentation_step ) {

						/* Hide feature is needed */
						if ( $documentation_step['hidden'] == 'true' ) {
							$documentation_step['hidden'] = ' hidden';
						}

						/* Determine if side text should be added */
						if( ! empty( $documentation_step['text_side'] ) ) {
							$class_main = ' menu-item-main-hasside';
						} else {
							$class_main = NULL;
						}

						echo '<div class="menu-item menu-item-edit-inactive' . $documentation_step['hidden'] .'">';
						echo '<div class="menu-item-bar">';
						echo '<div class="menu-item-handle">';
						echo '<span class="item-title">' . $documentation_step['title'] . '</span>';
						echo '</div>';
						echo '</div>';
						echo '<div class="menu-item-settings wp-clearfix">';

						// Add information for documentation
						echo '<div class="menu-item-main two_third' . $class_main . '">';
						echo wpautop( $documentation_step['text_main'] );
						echo '</div><!-- .menu-item-main-->';

						// Add pro info for documentation
						if( ! empty( $documentation_step['text_side'] ) ) {

							echo '<div class="menu-item-side one_third last">';
							echo wpautop( $documentation_step['text_side'] );

							if ( ! empty( $documentation_step['button_link'] ) && ! empty( $documentation_step['button_label'] ) ) {

								echo '<p>';
								$button_class = '';
								if ( $documentation_step['is_button'] ) {
									$button_class = 'button button-primary';
								}

								$button_new_tab = '_self';
								if ( isset( $documentation_step['is_new_tab'] ) ) {
									if ( $documentation_step['is_new_tab'] ) {
										$button_new_tab = '_blank';
									}
								}
								echo '<a target="' . $button_new_tab . '" href="' . $documentation_step['button_link'] . '"class="' . $button_class . '">' . $documentation_step['button_label'] . '</a>';
								echo '</p>';
							}
							echo '</div><!-- .menu-item-side-->';

						}

						echo '</div><!-- .menu-item-settings-->';
						echo '</div>';

						$section_name = $documentation_step['section'];

					}

				}

			}

			echo '</div>';

		}

		/**
		 * Support tab
		 */
		public function page_support() {
			echo '<div id="thinkup-support-content" class="feature-section three-col">';

			if ( ! empty( $this->config['page_support'] ) ) {

				$support_steps = $this->config['page_support'];

				if ( ! empty( $support_steps ) ) {

					foreach ( $support_steps as $support_step ) {

						echo '<div class="col">';

						if ( ! empty( $support_step['title'] ) ) {
							echo '<h3>';
							if ( ! empty( $support_step['icon'] ) ) {
								echo '<i class="' . $support_step['icon'] . '"></i>';
							}
							echo $support_step['title'];
							echo '</h3>';
						}

						if ( ! empty( $support_step['text'] ) ) {
							echo '<p><i>' . $support_step['text'] . '</i></p>';
						}

						if ( ! empty( $support_step['button_link'] ) && ! empty( $support_step['button_label'] ) ) {

							echo '<p>';
							$button_class = '';
							if ( $support_step['is_button'] ) {
								$button_class = 'button button-primary';
							}

							$button_new_tab = '_self';
							if ( isset( $support_step['is_new_tab'] ) ) {
								if ( $support_step['is_new_tab'] ) {
									$button_new_tab = '_blank';
								}
							}
							echo '<a target="' . $button_new_tab . '" href="' . $support_step['button_link'] . '"class="' . $button_class . '">' . $support_step['button_label'] . '</a>';
							echo '</p>';
						}

						echo '</div>';

					}

				}

			}

			echo '</div>';
		}

		/**
		 * Free vs PRO tab
		 */
		public function page_free_pro() {
			$free_pro = isset( $this->config['page_free_pro'] ) ? $this->config['page_free_pro'] : array();
			if ( ! empty( $free_pro ) ) {
				if ( ! empty( $free_pro['free_theme_name'] ) && ! empty( $free_pro['pro_theme_name'] ) && ! empty( $free_pro['features'] ) && is_array( $free_pro['features'] ) ) {
					echo '<div id="thinkup-free-pro" class="feature-section">';
					echo '<div id="free_pro" class="">';
					echo '<table class="free-pro-table">';
					echo '<thead>';
					echo '<tr>';
					echo '<th></th>';
					echo '<th>' . esc_html( $free_pro['free_theme_name'] ) . '</th>';
					echo '<th>' . esc_html( $free_pro['pro_theme_name'] ) . '</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach ( $free_pro['features'] as $feature ) {

						/* Hide feature is needed */
						if ( $feature['hidden'] == 'true' ) {
							$feature['hidden'] = ' class="hidden"';
						}

						echo '<tr' . $feature['hidden'] . '>';
						if ( ! empty( $feature['title'] ) || ! empty( $feature['description'] ) ) {
							echo '<td>';
							if ( ! empty( $feature['title'] ) ) {
								echo '<h3>' . wp_kses_post( $feature['title'] ) . '</h3>';
							}
							if ( ! empty( $feature['description'] ) ) {
								echo '<p>' . wp_kses_post( $feature['description'] ) . '</p>';
							}
							echo '</td>';
						}

						/* Add in for lite version */
						if ( ! empty( $feature['is_in_lite'] ) && ( $feature['is_in_lite'] == 'true' ) && empty( $feature['is_in_lite_text'] ) ) {
							echo '<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>';
						} else if ( ! empty( $feature['is_in_lite_text'] ) ) {
							echo '<td class="only-lite"><span class="">' . $feature['is_in_lite_text'] . '</span></td>';
						} else {
							echo '<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>';
						}

						/* Add in for pro version */
						if ( ! empty( $feature['is_in_pro'] ) && ( $feature['is_in_pro'] == 'true' ) && empty( $feature['is_in_pro_text'] ) ) {
							echo '<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>';
						} else if ( ! empty( $feature['is_in_pro_text'] ) ) {
							echo '<td class="only-lite"><span class="">' . $feature['is_in_pro_text'] . '</span></td>';
						} else {
							echo '<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>';
						}

						echo '</tr>';

					}
					if ( ! empty( $free_pro['pro_theme_link'] ) && ! empty( $free_pro['get_pro_theme_label'] ) ) {
						echo '<tr class="thinkup-free-pro-button">';
						echo '<td></td>';
						echo '<td colspan="2"><a href="' . esc_url( $free_pro['pro_theme_link'] ) . '" target="_blank" class="button button-primary button-hero">' . wp_kses_post( $free_pro['get_pro_theme_label'] ) . '</a></td>';
						echo '</tr>';
					}
					echo '</tbody>';
					echo '</table>';
					echo '</div>';
					echo '</div>';

				}
			}
		}

		/**
		 * Load css and scripts for the about page
		 */
		public function style_and_scripts( $hook_suffix ) {

			global $pagenow;

			// enqueue global css files
			wp_enqueue_style( 'thinkup-global-css', get_template_directory_uri() . '/admin/main-toolbox/assets/css/toolbox-backend-global.css' );

			// enqueue css files
			if ( 'themes.php' === $pagenow || strpos($hook_suffix, 'thinkup') !== false ) {
				wp_enqueue_style( 'thinkup-page-css', get_template_directory_uri() . '/admin/main-toolbox/assets/css/toolbox-backend.css' );
			}

			// enqueue global js files
			wp_enqueue_script( 'thinkup-global-js', ( get_template_directory_uri() . '/admin/main-toolbox/assets/js/toolbox-backend-global.js' ), array( 'jquery' ), '', 'true' );

			// enqueue js files
			if ( strpos($hook_suffix, 'thinkup') !== false ) {
				wp_enqueue_script( 'thinkup-page-js', ( get_template_directory_uri() . '/admin/main-toolbox/assets/js/toolbox-backend.js' ), array( 'jquery' ), '', 'true' );
			}
		}

		/**
		 * Hide welcome notice when dismissed.
		 */
		public function hide_notice() {
			if (isset($_GET['thinkup-hide-notice']) && isset($_GET['_thinkup_notice_nonce'])) {
				if (!wp_verify_nonce($_GET['_thinkup_notice_nonce'], 'thinkup_hide_notices_nonce')) {
					wp_die(esc_html__('Action failed. Please refresh the page and retry.', strtolower( $theme_name )));
				}
				if (!current_user_can('edit_theme_options')) {
					wp_die(esc_html__('You do not have the necessary permission to perform this action.', strtolower( $theme_name )));
				}
				$hide_notice = sanitize_text_field($_GET['thinkup-hide-notice']);
				update_option('thinkup_notice_' . $hide_notice, 1);
			}
		}

	}
}