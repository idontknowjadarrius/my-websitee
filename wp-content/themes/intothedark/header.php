<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  

  <?php wp_head(); ?>

</head>

<body <?php body_class(has_post_thumbnail() ? 'has-thumbnail' : '');  ?>>

  <?php wp_body_open();  ?>

  <a class="skip-link screen-reader-text" href="#main-content"><?php _e( 'Skip to content', 'intothedark' ); ?></a>

  
    <header class="header-container" id="top">
      <div class="header">
        <?php 

          
        
            $intothedark_logo_id = get_theme_mod( 'custom_logo' );
            $intothedark_logo_url = wp_get_attachment_image_url( $intothedark_logo_id, 'full' );
            
        
          if ( has_custom_logo() ) { ?>
            
            <a class="header__logo" href="<?php echo esc_url(home_url()); ?>"><img class="header__logo-img" src="<?php echo esc_url( $intothedark_logo_url); ?>" alt="<?php echo esc_url( get_bloginfo( 'name' )); ?>"></a>
        <?php } else { ?>

          <a class="header__logo" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_bloginfo('name')); ?> </a>
        
        <?php } ?>

        <?php 
          wp_nav_menu(
            array(
              'theme_location' => 'header',
              'container' => false,
              'items_wrap' => '<ul class="header__menu">%3$s</ul>',
              'fallback_cb'   => 'wp_page_menu', //default menu
              'fallback_cb'   => function() {
                wp_page_menu(
                  array(
                      'menu_class' => 'header__menu', 
                      'show_home'  => true,           
                      'menu_id'    => 'header-menu',  
                  ),
                
              );
          },
            )
          );
        ?>

        <div class="header__hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

    </header>

    <div class="wrap">

   
  