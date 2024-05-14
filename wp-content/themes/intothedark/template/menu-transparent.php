<?php
  /*
  *
  * Template Name: Menu Transparent
  *
  */
?>



<?php get_header(); ?>




<?php if (have_posts()): ?> <?php while (have_posts()): the_post(); ?>

<?php /* Image Url */
  $image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
?>

<div class="cover cover__intro text-white">
        <div class="cover__bg" style="background: url(<?php echo $image_attributes[0]; ?>) center center;background-size: cover;"></div>
        <div class="cover__content">
            <h1 class="text-reveal"><?php the_title(); ?></h1>
            <h2 class="text-reveal"><?php echo get_the_excerpt();?></h2>
            <a href="#main-content" class="button button__reverse fade-in scroll-to"><?php echo esc_html(get_theme_mod('intothedark_button_text', __('Discover more', 'intothedark'))); if (get_theme_mod('intothedark_arrow', true)) { echo '<span class="arrow"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/chevron-down-outline.svg" alt="Arrow" class="icon-small icon-white"></span>'; } ?></a>
        </div>

</div>

<main class="grid grid__center" id="main-content">

  <div class="col-100">

      <?php the_content(); ?>

  </div>

</main>

<?php endwhile; else: ?>

<p>
  <?php esc_html_e('Sorry, no posts matched your criteria.', 'intothedark'); ?>
</p>

<?php endif; ?>

<?php get_footer();   ?>