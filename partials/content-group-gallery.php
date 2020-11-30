<?php 
/* Content Group Layout: Gallery */ 

?>

<?php 
$gallery_name = get_sub_field('group_name');
$gallery_desc = get_sub_field('group_description');
?>

<div class="slider">

<?php
if ( have_rows('gallery_images') ) : 
  while ( have_rows('gallery_images') ) :
    the_row();

    $item_image = get_sub_field('gallery_item');
    $item_name = get_sub_field('gallery_item_name');
    $item_desc = get_sub_field('gallery_item_desc');
?>

  <div>
    <p><?php echo $gallery_name; ?></p>
    <p><?php echo $gallery_desc; ?></p>
    <p><?php echo $item_image['url']; ?></p>
    <p><?php echo $item_name; ?></p>
    <p><?php echo $item_desc; ?></p>
  </div>

<?php
  endwhile;
endif; 
?>

</div>
