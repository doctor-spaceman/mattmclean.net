<div class ="attribution wrapper">
    <div>
        <ul id="footerSocial" class="social">
        <?php 
            if ( is_page_template('page-photography.php') ) : dynamic_sidebar('footer-social-photo');
            else : dynamic_sidebar('footer-social');
            endif;
        ?>
        </ul>
    </div>
    <div id="footerAttribution">
        <?php dynamic_sidebar('footer-attribution'); ?>
    </div>
</div>
<?php
global $tracking_notice_enable;

if ( $tracking_notice_enable ) : 
?>
<div id="cookieNotice" class="banner">
    <div class="wrapper">
        <div class="banner__copy">
            <?php echo get_field('tracking_notice_msg','option'); ?>
        </div>
        <div class="banner__options">
            <span class="cta close button" data-track="opt-out" aria-label="Opt Out">Opt Out</span>
            <span class="cta close button" data-track="opt-in" aria-label="Opt In">Opt In</span>
        </div>
    </div>
</div>
<?php endif; ?>