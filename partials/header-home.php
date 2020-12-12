<header>
  <div id="walkway" class="hero-outline" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/outline-landscape.svg'; ?>');"></div>
  <div class="hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/landscape-color.png'; ?>');"></div>
  <div class="hero-graphic grid grid--center"></div>
  <div class="hero-graphic__morph">
    <p class="typed"></p>
  </div>
  <div id="hero">
    <div class="hero-content wrapper wrapper--xlarge">
    <?php 
      wp_nav_menu(
      array(
        'container' => 'nav',
        'container_class' => 'hero-menu skew--left',
        'menu' => 'Main Menu', 
        'walker' => new Home_Stylized_Walker()
      )); 
      ?>
    </div>
  </div>
</header>