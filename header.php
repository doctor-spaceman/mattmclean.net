<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <? language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <? language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html 
<? language_attributes(); ?>
<?php if ( is_page_template('templates/portfolio-sidebar.php') ) : ?>
class="has-sidebar"
<?php endif; ?>
>
<!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.86">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

    <!-- TODO -->
    <noscript>
      <style>
      </style>
    </noscript>

		<?php wp_head(); ?>

  </head>
  
  <?php 
  $background = false;
  if ( has_post_thumbnail() ) : 
    $background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
  endif; 
  ?>
  <body 
    <?php if ( is_page_template('templates/portfolio-sidebar.php') && $background ) : ?>
    style="background: url('<?php echo $background[0]; ?>') center top / cover no-repeat;" 
    <?php endif; ?>
    <?php if ( is_page_template('templates/portfolio-sidebar.php') ) : body_class('has-sidebar'); 
    else : body_class();
    endif; ?>
  >
    <a class="screen-reader-text" href="#pageContent">Jump to Page Content</a>
    
    <?php 
    if ( is_front_page() ) : 
      get_template_part('partials/header','home');
    elseif ( is_page_template('templates/portfolio-sidebar.php') ) : 
      get_template_part('partials/header','sidebar');
    else : 
      get_template_part('partials/header');
    endif;
    ?>

    <main id="pageContent">
    