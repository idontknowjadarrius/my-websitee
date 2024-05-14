<?php get_header(); ?>


<div class="spacer"></div>


<main id="main-content">
  <div class="grid">
    <div class="col-100">

      <?php if (is_search()) { ?>

      <h1>
        <?php esc_html_e('Results for: ', 'intothedark');  ?>
        <?php echo $s;  ?>
      </h1>

      <?php } else if (is_category() || is_tag() || is_tax()) { ?>

        <h1 class="text-center mb-3"> <?php echo single_cat_title(); ?> </h1>

    <?php } else if (is_home()) {  ?>

      <h1 class="text-center mb-4"> <?php single_post_title(); ?> </h1>

          <?php get_search_form(); ?>

    </div>

  </div>
  
    
    <?php } ?>

    
      <div class="grid">


      <?php $intothedark_counter = 0; 
    
    if (have_posts()): while (have_posts()): the_post();  ?>

        <!-- loop content -->

        

        
          
          <article class="col-33 fade-up text-white">

            

              <?php if ($intothedark_counter == 0) { ?>
                 
                 <?php the_post_thumbnail('intothedark__image-small', array('class' => 'img-res mb-2', 'alt' => get_the_title())); ?>
                 <a  href="<?php the_permalink();  ?>"><h3> <?php the_title();?> </h3></a>
                 <p><?php the_excerpt();?></p>
              
              <?php }else if ($intothedark_counter == 1) { ?>
              
                 
                <a  href="<?php the_permalink();  ?>"><h3> <?php the_title();?> </h3></a>
                 <?php the_post_thumbnail('intothedark__image-small', array('class' => 'img-res mb-2', 'alt' => get_the_title())); ?>
                 <p><?php the_excerpt();?></p>
              
              <?php } ?>
            

            <?php the_category(', '); ?>

            <?php the_tags('(', ', ', ')'); ?>

          </article>

          <?php 
            $intothedark_counter++;
            if ($intothedark_counter == 2) {
              $intothedark_counter = 0;
            }
          ?>

        
        
      <?php endwhile;  ?>


      </div>

    

     <div class="col-100 text-center pagination">
        <?php
        global $wp_query;

        $big = 999999999; // Numero molto grande per garantire che ci siano abbastanza pagine.
        $pagination_args = array(
            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'  => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total'   => $wp_query->max_num_pages,
            'prev_text' => '<span class="prev-icon" aria-hidden="true"></span>', // Aggiunto un placeholder per l'icona
            'next_text' => '<span class="next-icon" aria-hidden="true"></span>', // Aggiunto un placeholder per l'icona
        );

        echo paginate_links($pagination_args);
        ?>
     </div>


    <?php else:  ?>

      <div class="col-100">
        <?php esc_html_e('Sorry, no posts matched your criteria.', 'intothedark');  ?>
      </div>

    <?php endif; ?>
 
</main>


<?php get_footer(); ?>