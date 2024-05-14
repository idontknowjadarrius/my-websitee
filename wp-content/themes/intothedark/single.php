<?php get_header(); ?>


<?php if(has_post_thumbnail()){ ?>

  <?php /* Image Url */
  $image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
  ?>
  <div class="cover cover__single text-white"style="background: url(<?php echo $image_attributes[0]; ?>) center center;background-size: cover;">
          
          <div class="cover__content">
              <h1 class="text-0 text-reveal"><?php the_title(); ?></h1>
          </div>

  </div>
<?php } else {?>

  <div class="spacer"></div>
  <h1 class="text-0 text-center text-reveal"><?php the_title(); ?></h1>

<?php }?>


<main class="grid grid__center" id="main-content">

  <div class="col-70">

    <?php if (have_posts()): ?>
      <?php while (have_posts()):
        the_post(); ?>

        <!-- loop content -->

        <article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>

         
          <div class="fade-in mb-2  text-content clearfix <?php if (has_post_thumbnail()) echo 'thumbnail'; ?>"> <?php the_content();  ?> </div>
          
          <div class="cat">
            <p class="fade-in">
                <span class="icon-text-container date">
                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/icons/calendar-clear-outline.svg'; ?>" alt="<?php _e('calendar', 'intothedark'); ?>" class="icon-white icon-small">
                    
                    <?php 
                      $date_format = get_option( 'date_format' );
                      $current_date = the_date( $date_format ); 
                      echo $current_date;
                    ?>
                
                </span>
                <span class="icon-text-container tag">
                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/icons/add-circle-outline.svg'; ?>" alt="<?php _e('category', 'intothedark'); ?>" class="icon-white icon-small">
                    <?php the_category(', '); ?>
                </span>
                <?php the_tags('(', ', ', ')'); ?>
            </p>
          </div>

          <?php wp_link_pages();  ?>

          <div class="grid grid__center">
            <div class="col-70">
              <hr class="mt-2 mb-2">
            </div>
          </div>

          <div id="comments">
            <?php comments_template(); ?>
          </div>

        </article>

        

      <?php endwhile; else:  ?>

      

      <p>
        <?php esc_html_e('Sorry, no posts matched your criteria.', 'intothedark');  ?>
      </p>

    <?php endif; ?>
  
  </div>

</main>



<?php get_footer();  ?>