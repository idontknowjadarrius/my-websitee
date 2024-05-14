<?php
  /*
  *
  * Template Name: Blank Template
  *
  */
?>



<?php get_header(); ?>


<main class="grid grid__center" id="main-content">

  <div class="col-100">

    <?php if (have_posts()): ?> <?php while (have_posts()): the_post(); ?>


      <?php the_content(); ?>

    <?php endwhile; else: ?>

      <p>
        <?php esc_html_e('Sorry, no posts matched your criteria.', 'intothedark'); ?>
      </p>

    <?php endif; ?>
  
  </div>

</main>

<?php get_footer();   ?>