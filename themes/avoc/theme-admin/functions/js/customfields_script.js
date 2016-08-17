jQuery(function(jQuery) {  
  	
	jQuery("#formatdiv input").click(function () {
          var format = jQuery(this).val();
		  
		  	jQuery('#meta_gallery').hide();
		  	jQuery('#meta_medias').hide();
			jQuery('#meta_video').hide();
			jQuery('#meta_audio').hide();
			jQuery('#meta_quote').hide();
			jQuery('#meta_link').hide();
		  
		  if (format == 'gallery') { jQuery('#meta_medias').show(); }
		  if (format == 'video') { jQuery('#meta_video').show(); }
		  if (format == 'audio') { jQuery('#meta_audio').show(); }
		  if (format == 'quote') { jQuery('#meta_quote').show(); }
		  if (format == 'link') { jQuery('#meta_link').show(); }
		  
        });
	
	jQuery("select#page_template option").click(function () {
	  	var format = jQuery(this).val();
		jQuery('#meta_portfoliocategories').hide();
	  
	  	if (format == 'template-portfolio.php') { jQuery('#meta_portfoliocategories').show(); }
		if (format == 'template-onepage.php') { jQuery('tr._sr_splitscreen td, tr._sr_splitscreen th').hide(); } else {
			jQuery('tr._sr_splitscreen td, tr._sr_splitscreen th').show();
		}
	});

  
}); 

jQuery(document).ready(function(jQuery) {  
  	
	jQuery('#meta_gallery').hide();
	jQuery('#meta_medias').hide();
	jQuery('#meta_video').hide();
	jQuery('#meta_audio').hide();
	jQuery('#meta_quote').hide();
	jQuery('#meta_link').hide();
	
	jQuery("#formatdiv input").each(function () { 
		var format = jQuery(this).val();
		var checked = jQuery(this).attr('checked');
		
		if (checked == 'checked') {
			 jQuery('#meta_'+format).show();
			 if (format == 'gallery') {
				 jQuery('#meta_medias').show();
				 }
		}
	});
	
	
	
	jQuery('#meta_portfoliocategories').hide();
	
	jQuery("select#page_template option").each(function () { 
		var format = jQuery(this).val();
		var checked = jQuery(this).attr('selected');
		
		if (checked == 'selected' && format == 'template-portfolio.php') {
			 jQuery('#meta_portfoliocategories').show();
		}
		
		if (checked == 'selected' && format == 'template-onepage.php') { 
			jQuery('tr._sr_splitscreen td, tr._sr_splitscreen th').hide(); 
		} 
	});
	
	
  
});