<header>
  <div class="hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/bw-landscape.jpg'; ?>');"></div>
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
        <div class="hero-graphic grid grid--center">
          <div class="hero-graphic__morph">
            <p class="typed"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>