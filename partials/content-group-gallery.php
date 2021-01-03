<?php 
/* Content Group Layout: Gallery */ 

?>

<?php 
$gallery_name = get_sub_field('group_name');
$gallery_desc = get_sub_field('group_description');
?>

<ul class="slider slider-<?php echo esc_attr($content_group); ?>">

<?php
if ( have_rows('gallery_images') ) : 
  while ( have_rows('gallery_images') ) :
    the_row();

    $item_name = get_sub_field('gallery_item_name');
    $item_desc = get_sub_field('gallery_item_description');
    $item_iframe = get_sub_field('gallery_item_iframe');
    $item_image = get_sub_field('gallery_item');
    $item_image_src = wp_get_attachment_image_url($item_image, 'large');
    $item_image_srcset = wp_get_attachment_image_srcset($item_image, 'large');
    $item_image_sizes = '(min-width: 782px) 50vw,
                         (min-width: 880px) 66.6vw,
                         100vw';
    $item_image_alt = get_post_meta( $item_image, '_wp_attachment_image_alt', true );
?>

  <li>
  <?php if ( $item_image ) : ?>
    <img 
    src="<?php echo $item_image_src; ?>" 
    srcset="<?php echo esc_attr($item_image_srcset); ?>" 
    sizes="<?php echo esc_attr($item_image_sizes); ?>" 
    alt="<?php echo $item_image_alt; ?>" 
    />
  <?php elseif ( $item_iframe ) : ?>
    <div class="slide-iframe">
      <?php echo $item_iframe; ?>
    </div>
  <?php endif; ?>
  </li>

<?php
  endwhile;
endif; 
?>

</ul>
