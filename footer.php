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
	</content>
	<?php if ( is_page_template('page-photography.php') && ($post->post_parent) ) : //is a child page?>
	<footer class="sidebar-footer--under-content">
	<?php elseif ( is_page_template('page-photography.php') ) : ?>
	<footer class="sidebar-footer">
	<?php else : ?>
	<footer>
	<?php endif; ?>
		<div class ="attribution wrapper">
			<div>
				<ul id="footerSocial" class="social">
				<?php 
					if ( is_page_template('page-photography.php') ) : dynamic_sidebar('footer-social-photo');
					else : dynamic_sidebar('footer-social');
					endif;
				?>
				</ul>
			</div>
			<div id="footerAttribution">
				<?php dynamic_sidebar('footer-attribution'); ?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
