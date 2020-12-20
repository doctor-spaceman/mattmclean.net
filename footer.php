<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */

$footerElements = get_field('footer_elements', 'option');

?>
  </main>
  <?php 
  if ( is_front_page() ) :
    include( locate_template('partials/footer-home.php', false, false) );
  elseif ( is_page_template('templates/portfolio-sidebar.php') ) : 
    include( locate_template('partials/footer-sidebar.php', false, false) );
  else : 
    include( locate_template('partials/footer.php', false, false) );
  endif; 
  ?>		

<?php wp_footer(); ?>

</body>
</html>
