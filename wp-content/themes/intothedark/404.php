<?php get_header(); ?>

<div class="spacer"></div>

<main class="grid grid__center" id="main-content">

  <article class="col-80">

    <h1><?php esc_html_e( 'Oops! That page can\'t be found.', 'intothedark' ); ?></h1>
    <h2><?php esc_html_e( '404 Error', 'intothedark' ); ?></h2>
    <p><?php esc_html_e( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'intothedark' ); ?></p>

    <div class="col-80">
      <?php get_search_form(); ?>
    </div>

  </article>

</main>

<?php get_footer(); ?>
