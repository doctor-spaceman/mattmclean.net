<?php 
/* Content Group Layout: Informational */ 

?>

<?php 
$item_title = get_sub_field('item_title');
$item_link_primary = get_sub_field('item_link_primary');
$item_link_secondary = get_sub_field('item_link_secondary');
$item_subtitle = get_sub_field('item_subtitle');
$item_content = get_sub_field('item_content');
?>

<div class="
  content-group-<?php echo esc_attr($content_group); ?>
  <?php if ( $item_title ) : ?> corner--slant<?php endif; ?>
">
  <?php if ( $item_title ) : ?>
  <h2 class="item-title"><?php echo esc_html($item_title); ?></h2>
  <?php endif; ?>
  <?php if ( $item_link_primary || $item_link_secondary ) : ?>
  <div class="item-links supplemental">
    <?php if ( $item_link_primary ) : ?>
    <a 
      href="<?php echo esc_url($item_link_primary['url']); ?>" 
      target="<?php echo esc_attr($item_link_primary['target']); ?>"
    >
      <?php echo esc_html($item_link_primary['title']); ?><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
    </a>
    <?php endif; ?>
    <?php if ( $item_link_secondary ) : ?>
    <a 
      href="<?php echo esc_url($item_link_secondary['url']); ?>" 
      target="<?php echo esc_attr($item_link_secondary['target']); ?>"
    >
      <?php echo esc_html($item_link_secondary['title']); ?><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
    </a>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  <?php if ( $item_subtitle ) : ?>
  <p class="supplemental"><?php echo wp_kses_post($item_subtitle); ?></p>
  <?php endif; ?>
  <?php if ( $item_content ) : ?>
  <?php echo apply_filters('the_content', $item_content); ?>
  <?php endif; ?>
</div>
