<div class="content-card content-card--post corner--slant col-1-3">
  <p class="post__date supplemental">
    <?php echo get_the_date('m-d-y'); ?>
  </p>  
  <a href="<?php the_permalink(); ?>">
    <h2 class="post__title">
      <?php the_title(); ?>
    </h2>
  </a>
  <?php if ( has_excerpt() ) : ?>
  <p class="post__subtitle supplemental">
    <?php echo get_the_excerpt(); ?>
  </p>
  <?php endif; ?>
</div>