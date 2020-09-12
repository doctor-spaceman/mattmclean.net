<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>
			<div class="clearfix"></div>
		</div>
  </main>
  <footer>
  <?php 
  if ( is_page_template('page-photography.php') ) : 
    get_template_part('partials/footer','sidebar');
  elseif ( is_front_page() ) :
    get_template_part('partials/footer','home');
  else : 
    get_template_part('partials/footer');
  endif; 
  ?>		
	</footer>

<?php wp_footer(); ?>

</body>
</html>
