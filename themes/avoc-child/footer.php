<?php 

global $sr_prefix;
$theId = sr_getId();

?>
	<?php if ( !is_404() ) { ?>
    
    	
	</div> <!-- END #page-body -->
	<!-- PAGEBODY -->
	
    <!-- FOOTER --> 
 	<footer<?php if(get_option($sr_prefix.'_footercolor') == 'dark') { ?> class="footer-dark text-light"<?php } ?>>
       <div class="footer-inner <?php if(get_option($sr_prefix.'_footerlayout') !== 'column') { ?>align-center<?php } ?> wrapper">
            <?php if(get_option($sr_prefix.'_footerlayout') !== 'column') { ?>
            <?php if ( is_active_sidebar( 'footer-left' ) ) { dynamic_sidebar('Footer'); } ?>
            <?php } else { ?>
            <div class="column-section clearfix">
            	<div class="column one-half">
                <?php if ( is_active_sidebar( 'footer-left' ) ) { dynamic_sidebar('Footer'); } ?>
              	</div>
              	<div class="column one-half align-right last-col">
                <?php if ( is_active_sidebar( 'footer-right' ) ) { dynamic_sidebar('Footer (right)'); } ?>
              	</div>
            </div>
            <?php } ?>

<div id="map"></div>
            <?php if (!get_option($sr_prefix.'_disablebacktotop')) { ?>
            <a id="backtotop" href="#"><?php _e( 'Back To Top', 'sr_avoc_theme' ) ?></a>
            <?php } ?>
        </div>
    </footer>
    <!-- FOOTER --> 
	
    <?php } ?>
    
</div> <!-- END #page-content -->
<!-- PAGE CONTENT -->

<?php wp_footer(); ?>

</body>
</html>