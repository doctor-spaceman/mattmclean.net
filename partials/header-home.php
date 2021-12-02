<header>
  <div class="hero-outline" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/landscape-line.svg'; ?>');"></div>
  <div class="hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/landscape-color.png'; ?>');"></div>
  <div class="hero-graphic flex--center"></div>
  <div aria-label="Easter Egg Message" tabindex="0" class="hero-graphic__morph">
    <p class="typed"></p>
  </div>
  <div id="hero">
    <div class="hero-content wrapper wrapper--xlarge">
    <?php 
      wp_nav_menu(
      array(
        'container' => 'nav',
        'container_class' => 'hero-menu skew--left',
        'theme_location' => 'main-menu',
        'walker' => new Home_Stylized_Walker()
      )); 
      ?>
    </div>
  </div>
</header>