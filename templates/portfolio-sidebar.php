<?php
/*
Template Name: Portfolio Sidebar
*/
?>

<?php get_header(); ?>

<div class="content content--m">
  <?php 
  if ( get_the_content() ) : 
    the_content(); 
  endif; 
  ?>

  <?php if ( have_rows('sidebar_gallery') ) : ?>
  <div class="masonry">
    <div class="grid-sizer"></div>

    <?php while ( have_rows('sidebar_gallery') ) :
    the_row();

    $image = get_sub_field('sidebar_gallery_image');
    $image_src = wp_get_attachment_image_url($image, 'medium');
    $image_src_full = wp_get_attachment_image_url($image, 'full');
    $image_srcset = wp_get_attachment_image_srcset($image, 'medium');
    $image_sizes = '
      (max-width: 782px) 400px,
      (max-width: 880px) 240px,
      (max-width: 1000px) 320px,
      100vw';
    $image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
    ?>
    <div class="grid-item">
      <img 
      data-full-url="<?php echo esc_url($image_src_full); ?>" 
      src="<?php echo esc_url($image_src); ?>" 
      srcset="<?php echo esc_attr($image_srcset); ?>" 
      sizes="<?php echo $image_sizes; ?>" 
      alt="<?php echo esc_attr($image_alt); ?>"
      />
    </div>
   
    <?php endwhile; ?>
  </div>
  <?php endif; ?>

  <?php if ( $post->post_parent ) : ?>	
  <!-- Begin Mailchimp Signup Form -->
  <div id="mc_embed_signup">
    <form action="https://mattmclean.us18.list-manage.com/subscribe/post?u=6c69d075cf7a6000d8c414126&amp;id=a23cae0719" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
        <label for="mce-EMAIL">Sign up for updates about<br>limited edition prints, Matt's activities, and more.</label>
        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6c69d075cf7a6000d8c414126_a23cae0719" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
      </div>
    </form>
  </div>
  <!--End mc_embed_signup-->
  <?php endif; ?>
</div>

<?php get_footer(); ?>
