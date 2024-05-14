  
  </div> <!-- Content!-->

  <footer class="footer">

  <div class="grid grid__small">

    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
        
          

     <?php endif; ?>
     
 
  </div>

  


    <div class="grid">
      <div class="col-50 fade-up">
         <p class="sma-center">
          <?php esc_html_e('&copy; Copyright ', 'intothedark'); ?> - <?php echo date("Y"); ?> | <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name');?></a>
         </p>
      </div>
      <div class="col-50 fade-up">
      <p class="sma-center privacy"><a href="/privacy-policy"><?php esc_html_e('Privacy Policy','intothedark'); ?></a> - <a href="/cookie-policy"> <?php esc_html_e('Cookie Policy','intothedark'); ?></a></p> 
      </div>
    </div>
    
    
   

    <div class="mini-footer">
      <div class="grid grid__center">
        <div class="col-20">
          <hr>
        </div>
        <div class="col-100 fade-up">
          <p class="m-0 text-center"><?php esc_html_e('Handcoded by ','intothedark'); ?><a href="/privacy-policy"><?php esc_html_e('Gianni Porto','intothedark'); ?></a></p>
        </div>
      </div>
    </div>
   
   
    
    
  </footer>


  <?php if (get_theme_mod('intothedark_show_scroll_to_top', true)) { echo '<a href="#top" class="scroll-to-top scroll-to"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/chevron-up-outline.svg" alt="Scroll Top" class="icon-small icon-white"></a>'; } ?>

</div> <!--  Overflow  !-->


<?php wp_footer(); ?>

</body>
</html>
