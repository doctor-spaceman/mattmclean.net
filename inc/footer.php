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