<?php
/**
 * Single posts
 */
?>

<?php get_header(); ?>

<article class="wrapper wrapper--large">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="section--l">
    <div class="content-card--post corner--slant">
      <p class="post__date">
        <?php echo get_the_date('m-d-y'); ?>
      </p>
      <h1 class="post__title"><?php the_title(); ?></h1>
      <?php if ( has_excerpt() ) : ?>
      <p class="post__subtitle supplemental"><?php echo get_the_excerpt(); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <section>
    <?php the_content(); ?>
  </section>

  <?php endwhile; else: ?>
  <p>Sorry, there's nothing here. Check back soon!</p>
  <?php endif; ?>

</article>

<div class="single-post__footer wrapper wrapper--large">
  <?php if ( has_tag() ) : ?>
  <div class="post__tags supplemental">
    <p class="grid grid--center">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
      <?php the_tags('&nbsp;&nbsp;',',&nbsp;',''); ?>
    </p>
  </div>
  <?php endif; ?>
  <nav class="pagination grid grid--space">
    <?php if ( get_previous_post_link() ) : ?>
    <div class="prev-posts-link">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
      <p><?php previous_post_link( '%link','Previous Post<br><span class="supplemental">%title</span>' ); ?></p>
    </div>
    <?php endif; ?>
    <?php if ( get_next_post_link() ) : ?>
    <div class="next-posts-link">
      <p><?php next_post_link( '%link','Next Post<br><span class="supplemental">%title</span>' ); ?></p>
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </div>
    <?php endif; ?>
  </nav>
</div>

<?php get_footer(); ?>
