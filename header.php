<?php
/**
 * The template for displaying the header
 */

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PSNB85P');</script>
		<!-- End Google Tag Manager -->
		<meta name="viewport" content="width=device-width, initial-scale=0.86">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
		<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup {
				background: #363636;
				background: rgba(0,0,0,.3);
				clear: left;
				width: auto;
				border-top: .3em solid #fff;
				padding: .5em 1em 1em 1em;
				margin-bottom: 2em;
			}
			#mc_embed_signup input[type=email] {
				border-radius: 0;
			}
			#mc_embed_signup input[type=submit] {
				border-radius: 0;
				font-weight: bold;
				font-family: 'Montserrat', sans-serif;
			}
			#mc_embed_signup label {
				font-weight: normal;
			}
		</style>
		<title><?php wp_title(); ?></title>
	    <noscript>
	        <style>
	            .hero {min-height: 100vh;}
	            #navContainer {
				    background: #171717;
				    background: rgba(0,0,0,.6);
					box-shadow:
						0 10px 20px rgba(0,0,0,0.19),
						0 6px 6px rgba(0,0,0,0.23);
	            }
				.current-menu-item {border-bottom: 2px solid #fff;}
			    #navIcon {display: none !important;}
			    .main-menu {
			    	display: block !important;
			    	width: 60%;
			    }
			    .main-menu ul {
			        display: -webkit-flex !important;
			        display: -ms-flexbox !important;
			        display: flex !important;
			        -webkit-flex-direction: row !important;
			        -ms-flex-direction: row !important;
			        flex-direction: row !important;
			        -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			        flex-wrap: wrap;
			        -webkit-justify-content: space-between;
			        -ms-flex-pack: justify;
			        justify-content: space-between;			        
			    }
			    .main-menu li {
			        margin: 0 !important;
			        padding: .25em !important;
			        font-size: .8em !important;
			    }
			    .mg_grid_wrap:before {
			    	position: absolute;
			    	width: 100%;
			    	height: 100%;
			    	padding: 4em;
			    	content: 'Sorry! You must have Javascript enabled to see this content.';
			    	text-align: center;
			    	border-top: .3em solid #fff;
			    	box-sizing: border-box;
			    }
	        </style>
	    </noscript>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSNB85P"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
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
		<content>
			<?php else : 
			// Select background image
			$backgroundMode = 'no-repeat top center/cover;';
			if ( has_post_thumbnail() ) : 
				// use featured image
				$background = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'full', false, '' );
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
		<content>
			<?php else : ?>
				<span id="goDown" class="fas fa-chevron-down bounce"><a href="#contentAnchor"></a></span>
			</div>
		</header>
		<content><a name="contentAnchor" id="contentAnchor"><span>Jump to Page Content</span></a>
			<?php endif; ?>
		<?php endif; ?>