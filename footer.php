<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */

$footerElements = get_field('footer_elements', 'option');

?>
		</div>
  </main>
  <footer>
  <?php 
  if ( is_page_template('page-photography.php') ) : 
    include( locate_template('partials/footer-sidebar.php', false, false) );
  elseif ( is_front_page() ) :
    include( locate_template('partials/footer-home.php', false, false) );
  else : 
    include( locate_template('partials/footer.php', false, false) );
  endif; 
  ?>		
	</footer>

<?php wp_footer(); ?>

</body>
</html>
