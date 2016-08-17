<?php
global $sr_prefix;

//get template header
get_header();

?>

        <!-- 404  -->
        <section id="hero" class="hero-auto">
            <div class="page-title">
                <h2 class="alttitle">404</h2>
                <h1><strong><?php _e("Page not found","sr_avoc_theme"); ?></strong></h1>
                <h4 class="alttitle"><?php _e("We can't seem to find what you're looking for","sr_avoc_theme"); ?></h4>
                <div class="spacer spacer-small"></div>
                <p><a href="<?php echo esc_url(home_url()); ?>" class="sr-button sr-button2"><?php _e("Back to Home","sr_avoc_theme"); ?></a></p>
            </div>
        </section>
        <!-- 404 --> 
        
<?php get_footer(); ?>
