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
    $item_name = get_sub_field('gallery_item_name');
    $item_desc = get_sub_field('gallery_item_desc');
?>

  <li>
    <img src="<?php echo $item_image['url']; ?>" alt="<?php echo $item_image['alt']; ?>"></img>
  </li>

<?php
  endwhile;
endif; 
?>

</ul>
