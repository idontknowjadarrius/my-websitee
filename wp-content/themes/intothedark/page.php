<?php get_header(); ?>

<div class="spacer"></div>

<main class="grid grid__center" id="main-content">

  <div class="col-100">

    <?php if (have_posts()): ?>
      <?php while (have_posts()):
        the_post(); ?>

        <!-- loop content -->

        <article class="article">

          <h1>
            <?php the_title(); ?>
          </h1>

          <?php the_post_thumbnail('intothedark__image-big', array('class' => 'img-res mb-2', 'alt' => get_the_title()));  ?>

          <div class="text-content">
            <?php the_content(); ?>
          </div>
          

        </article>


      <?php endwhile; else: ?>

      <p>
        <?php esc_html_e('Sorry, no posts matched your criteria.', 'intothedark'); ?>
      </p>

    <?php endif; ?>
  
  </div>

</main>

<?php get_footer();   ?>