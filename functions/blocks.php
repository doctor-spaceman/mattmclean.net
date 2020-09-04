<?php 
/**
 * Register Blocks
 */

function mm_register_blocks_acf() {
	
	if ( function_exists( 'acf_register_block_type' ) ) :

  // Resume Sections
	acf_register_block_type( array(
		'name'			      => 'resume-section',
		'title'			      => __( 'Résumé Section' ),
		'render_template'	=> 'partials/block-resume-section.php',
		'category'		    => 'widgets',
		'icon'			      => 'media-text',
		'mode'			      => 'auto',
		'keywords'		    => array( 'resume' )
  ));
  
  endif; 
}
add_action('init', 'mm_register_blocks_acf' );
