<?php
/*
Template Name: Portfolio Sidebar
*/
?>

<?php get_header(); ?>

<?php if ( $post->post_parent ) : ?>
<div 
class="content 
       content--m
       <?php if ( have_rows('sidebar_gallery') ) : ?> has-grid<?php endif; ?>">
  <?php if ( $post->post_parent ) : ?>
  <h1><?php the_title(); ?></h1>
  <?php endif; ?>
  <section>
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
      $image_name = get_sub_field('sidebar_gallery_image_name');
      $image_desc = get_sub_field('sidebar_gallery_image_desc');
      $image_src = wp_get_attachment_image_url($image, 'medium');
      $image_src_overlay = wp_get_attachment_image_url($image, 'large');
      $image_srcset = wp_get_attachment_image_srcset($image, 'medium');
      $image_sizes = '(min-width: 782px) 50vw,
                      (min-width: 1000px) 33.3vw,
                      100vw';
      $image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
      
      ?>
      <div class="grid-item">
        <img 
        data-overlay="<?php echo esc_url($image_src_overlay); ?>" 
        src="<?php echo esc_url($image_src); ?>" 
        srcset="<?php echo esc_attr($image_srcset); ?>" 
        sizes="<?php echo esc_attr($image_sizes); ?>" 
        <?php if ( $image_alt ) : ?>alt="<?php echo esc_attr($image_alt); ?>"<?php endif; ?>
        <?php if ( $image_name ) : ?>data-name="<?php echo esc_attr($image_name); ?>" <?php endif; ?>
        <?php if ( $image_desc ) : ?>data-caption="<?php echo esc_attr($image_desc); ?>"<?php endif; ?>
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
  </section>
</div>
<?php endif; ?>

<?php get_footer(); ?>
