<?php 
/* Content Group Layout: Gallery */ 

?>

<?php 
$gallery_name = get_sub_field('group_name');
$gallery_desc = get_sub_field('group_description');
?>
<div class="swiper-slide">
  <div class="adaptive-height swiper slider-<?php echo esc_attr($content_group); ?> content-group-<?php echo esc_attr($content_group); ?>">
    <ul class="swiper-wrapper">
    <?php
    if ( have_rows('gallery_images') ) : 
      while ( have_rows('gallery_images') ) :
        the_row();

        $item_name = get_sub_field('gallery_item_name');
        $item_desc = get_sub_field('gallery_item_description');
        $item_iframe = get_sub_field('gallery_item_iframe');
        $item_image = get_sub_field('gallery_item');
        $item_image_is_vertical = get_sub_field('is_vertical');
        $item_image_src = wp_get_attachment_image_url($item_image, 'large');
        $item_image_srcset = wp_get_attachment_image_srcset($item_image, 'large');
        $item_image_sizes = '(min-width: 782px) 50vw,
                            (min-width: 880px) 66.6vw,
                            100vw';
        $item_image_alt = get_post_meta( $item_image, '_wp_attachment_image_alt', true );
    ?>

      <li class="swiper-slide<?php if ( $item_name ) : ?> corner--slant<?php endif; ?>">
      <?php if ( $item_name ) : ?>
        <h2 class="item-title"><?php echo esc_html($item_name); ?></h2>
      <?php endif; ?>
      <?php if ( $gallery_desc ) : ?>
        <p><?php echo esc_html($gallery_desc); ?></p>
      <?php endif; ?>
      <?php if ( $item_image ) : ?>
        <img 
        <?php if ( $item_image_is_vertical ) : ?>
        class="is-vertical"
        <?php endif; ?> 
        src="<?php echo esc_url($item_image_src); ?>" 
        srcset="<?php echo esc_attr($item_image_srcset); ?>" 
        sizes="<?php echo esc_attr($item_image_sizes); ?>" 
        alt="<?php echo esc_attr($item_image_alt); ?>" 
        />
      <?php elseif ( $item_iframe ) : ?>
        <div class="responsive-iframe">
          <?php echo $item_iframe; ?>
        </div>
      <?php endif; ?>
      <?php if ( $item_desc ) : ?>
        <p class="supplemental"><?php echo esc_html($item_desc); ?></p>
      <?php endif; ?>
      </li>

    <?php
      endwhile;
    endif; 
    ?>
    </ul>
    <div class="swiper-pagination"></div>
  </div>
</div>