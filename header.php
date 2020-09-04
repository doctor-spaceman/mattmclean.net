<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <? language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <? language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <? language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.86">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

	<?php if ( is_page_template('page-photography.php') ) : ?>
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
	<?php endif; ?>
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
    <a class="screen-reader-text" href="#pageContent">Jump to Page Content</a>
    
    <?php 
    if ( is_front_page() ) : 
      get_template_part('partials/header','home');
    else : 
      get_template_part('partials/header');
    endif;
    ?>

    <main id="pageContent">