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
	<?php if ( is_page_template('page-photography.php') && ($post->post_parent) ) : //is a child page?>
	<footer class="sidebar-footer--under-content">
	<?php elseif ( is_page_template('page-photography.php') ) : ?>
	<footer class="sidebar-footer">
	<?php else : ?>
	<footer>
	<?php endif; ?>
		<?php get_template_part('partials/footer'); ?>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
