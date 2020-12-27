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

    $item_image = get_sub_field('gallery_item');
    $item_iframe = get_sub_field('gallery_item_iframe');
    $item_name = get_sub_field('gallery_item_name');
    $item_desc = get_sub_field('gallery_item_description');
?>

  <li>
  <?php if ( $item_image ) : ?>
    <img src="<?php echo $item_image['url']; ?>" alt="<?php echo $item_image['alt']; ?>"></img>
  <?php elseif ( $item_iframe ) : ?>
    <!--<div class="slide-iframe">-->
      <?php echo $item_iframe; ?>
    <!--</div>-->
  <?php endif; ?>
  </li>

<?php
  endwhile;
endif; 
?>

</ul>
