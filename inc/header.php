<header>
<?php 
    if ( is_page_template('page-photography.php') ) : ?>
    <div id="navContainer" class="sidebar-nav-container past-hero">
        <?php if ( $post->post_parent ) : //is a child page ?>
        <nav id="mainNav" class="sidebar-nav sidebar-wrapper">
        <?php else : ?>
        <nav id="mainNav" class="sidebar-nav sidebar-wrapper top-level">
        <?php endif; ?>
            <div id="navIcon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <?php
            wp_nav_menu(
            array(
                'menu' => 'Photo Menu', 
                'container_class' => 'main-menu--vertical'
            )); ?>
            
                <div id="brand" class="monogram"><a href="<?php bloginfo('url'); ?>/photography/">MM</a>
                    <div class="monogram-sub"><a href="<?php bloginfo('url'); ?>/photography/">Photography</a></div>
                </div>
    <?php else : ?>
    
    <div id="navContainer" class="nav-container">
        <nav id="mainNav" class="nav wrapper">
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
                        
            <div id="brand" class="monogram">
                <a href="<?php bloginfo('url'); ?>">MM</a>
            </div>
    <?php endif; ?>	
        </nav>
    </div>
    <div class="screen-overlay"></div>
<?php
if ( is_page_template('page-photography.php') && ($post->post_parent) ) : //is a child page?>
</header>
<main>
    <?php else : 
    // Select background image
    $backgroundMode = 'no-repeat top center/cover;';
    if ( has_post_thumbnail() ) : 
        // use featured image
        $background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
    elseif ( is_404() ) : 
        // use 404 image
        $background[0] = '/mmclean/wp-content/themes/mmclean/img/mmclean-404.jpg';
    else : 
        // use fallback image
        $background[0] = '/mmclean/wp-content/themes/mmclean/img/fallback.jpg';					
    endif; ?>
    <div class="hero" style="background: url('<?php echo $background[0]; ?>') <?php echo $backgroundMode ?>">
        <div id="main" class="copy-panel<?php if (is_page_template('page-photography.php')) : ?>--photo<?php else : endif; ?> wrapper">
        <?php
            // Get title
            if ( is_404() ) : ?>
            <h1 class="title">Page Not Found</h1>
            <?php elseif ( is_tag() ) : ?>
            <h1 class="title"><?php single_tag_title(); ?></h1>
            <?php else : ?>
            <h1 class="title"><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php 
            // Get subtitle
            if ( is_404() ) : ?>
            <h2 class="subtitle">Sorry about that! Please try again.<br/><a class="cta" href="<?php bloginfo('url'); ?>"><span class="fa fa-refresh"></span>  Go Home</a></h2>
            <?php elseif ( is_tag() ) : ?>
            <h2 class="subtitle">Tag Archive</h2>
            <?php elseif ( has_excerpt() ) : ?> 
            <h2 class="subtitle"><?php echo get_the_excerpt(); ?></h2>
            <?php else : 
            echo '';
        endif; ?>
        </div>
    <?php if ( is_page_template('page-photography.php' ) ) : ?>
    </div>
</header>
<main>
    <?php else : ?>
        <span id="goDown" class="fas fa-chevron-down bounce"><a href="#contentAnchor"></a></span>
    </div>
</header>
<main><a name="contentAnchor" id="contentAnchor"><span>Jump to Page Content</span></a>
    <?php endif; ?>
<?php endif; ?>