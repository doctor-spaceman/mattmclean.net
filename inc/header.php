<header>
  <?php 
  // Don't show the menu on the homepage
  if ( !is_front_page() ) : ?>
  <nav id="mainNav" class="header-content wrapper--large grid grid--center grid--space">
    <div id="brand" class="monogram">
      <a href="<?php bloginfo('url'); ?>">MM</a>
    </div>
    <div id="navIcon">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    
    <?php 
    wp_nav_menu(
    array(
      'menu' => 'Main Menu', 
      'container_class' => 'main-menu'
    )); ?> 

  </nav>
  <?php endif; ?>
  <div class="hero-bg" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/bw-landscape.jpg'; ?>');"></div>
  <section id="hero">
    <div class="hero-content wrapper wrapper--xlarge">
      <nav class="hero-menu">
        <div class="hero-menu-bar">
          <div class="hero-menu-bar__text">
            Resume
          </div>
        </div>
        <div class="hero-menu-bar">
          <div class="hero-menu-bar__text">
            Portfolio
          </div>
        </div>
        <div class="hero-menu-bar">
          <div class="hero-menu-bar__text">
            Contact
          </div>
        </div>
        <div class="hero-menu-bar">
          <div class="hero-menu-bar__text">
            Journal
          </div>
        </div>
      </nav>
      <div class="hero-graphic grid grid--center">
        <div class="hero-graphic__morph">
          <p class="typed"></p>
        </div>
      </div>
    </div>
  </section>
  <div class="screen-overlay"></div>
</header>
<main id="pageContent">
