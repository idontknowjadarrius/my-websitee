<?php
function intothedark_setup() {

  // Enable custom header
  add_theme_support( "custom-header" );

  // Enable title in header
  add_theme_support( "title-tag" );

  // Enable feed link
  add_theme_support( 'automatic-feed-links' );

  //Enable block style
  add_theme_support( 'wp-block-styles' );

  //Enable embeds responsive
  add_theme_support( 'responsive-embeds' );

  //Enable html5
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style',    'script', ) );

  // Enable align wide & full
  add_theme_support( 'align-wide' );

  // Enable featured image
  add_theme_support( 'post-thumbnails' );

  // Editor style
  add_editor_style( 'editor-style.css' );

  //custom logo
  $intothedark_logo_defaults = array(
    'height'               => 100,
    'width'                => 400,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true,
  );
  add_theme_support( 'custom-logo', $intothedark_logo_defaults );

  
  //image size
  add_image_size('intothedark__image-small',350,270,true);
  add_image_size('intothedark__image-big',1400,900,true);

  //Page excerpt
  add_post_type_support('page','excerpt');

  // Custom menu areas
  register_nav_menus( array(
    'header' => esc_html__( 'Header', 'intothedark' )
  ));

  // Load theme languages
  load_theme_textdomain( 'intothedark', get_template_directory().'/languages' );

  //custom background
  $intothedark_bg_defaults = array(
    'default-color'          => '222222',
  );
  add_theme_support( 'custom-background', $intothedark_bg_defaults );


}

add_action( 'after_setup_theme', 'intothedark_setup' );


/*  Enqueue css
/* ------------------------------------ */

function intothedark_styles() {

	wp_enqueue_style( 'simple-style', get_template_directory_uri().'/style.css');

}

add_action( 'wp_enqueue_scripts', 'intothedark_styles' );

/*  Enqueue js
/* ------------------------------------ */

function intothedark_scripts() {

  wp_enqueue_script( 'intothedark-bundle', get_template_directory_uri() . '/assets/js/bundle.min.js', '','', true );
  wp_enqueue_script( 'intothedark-scripts', get_template_directory_uri() . '/assets/js/scripts.js', '','', true );
  
  if ( is_singular() && get_option( 'thread_comments' ) )  { wp_enqueue_script( 'comment-reply' ); }

}

add_action( 'wp_enqueue_scripts', 'intothedark_scripts' );


/*  Register sidebars
/* ------------------------------------ */


  function intothedark_sidebars() {
    register_sidebar(array( 'name' => esc_html__( 'Footer', 'intothedark' ),'id' => 'footer','description' => esc_html__( 'Normal full width sidebar.', 'intothedark' ), 'before_widget' => '<div id="%1$s" class="col-33 fade-up %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
  }


add_action( 'widgets_init', 'intothedark_sidebars' );



require_once('assets/extras.php');







?>
