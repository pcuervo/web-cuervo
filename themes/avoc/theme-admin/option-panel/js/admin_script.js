jQuery(document).ready(function(){
	
	
	/*
	*	Option Panel Tabs
	*/
	jQuery('.section-content').first().show();
	jQuery('#section-list li').first().find('a').addClass('active');
	
	jQuery('#section-list li a').click(function() {
		var openid = jQuery(this).attr('href');
		
		if (jQuery(this).is('.active')) {

		} else {
			jQuery('#section-list li a').removeClass('active');
			jQuery(this).addClass('active');
			
			jQuery('.section-content').fadeOut(350);
			jQuery('#'+openid).delay(350).fadeIn(350);	
		}
		
		return false;
	});
	
	
	/*
	*	Option Group Toggle
	*/
	jQuery('.optiongroup-title').click(function() {
		jQuery(this).siblings('.optiongroup-content').toggle(0);
		jQuery(this).toggleClass('active');
		return false;
	});
	
	
	
	/*
	* 	IMAGE UPLOAD
	*/
  	jQuery(".upload_image_button").on("click", function() {  
		var formfield = jQuery(this).siblings('input[type="text"]');
        var preview = jQuery(this).siblings('.preview_image');  
		
		var mediaframe = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			button: { text: 'Select Image' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				jQuery(preview).find('img').attr('src',imagesrc);
            	formfield.val(imagesrc);  				
		});
	    mediaframe.open();
		
       return false;  
    });
	
	
	jQuery('.upload_image').change(function() {
		newval = jQuery(this).val();
		preview = jQuery(this).siblings('.preview_image');  
        preview = jQuery(preview).find('img');
		preview.attr('src', newval);  
	});
	
	
	
	/*
	* 	Custom radio
	*/
	jQuery('.customradio').click(function() { 
		
		value = jQuery(this).attr('href');
		parent = jQuery(this).parent();
		
		jQuery(parent).find(".customradio").removeClass('active');
		jQuery(this).addClass('active');
		
		jQuery(parent).find("input").removeAttr("checked");
		jQuery(parent).find("#"+value).attr("checked", "checked");
		
		return false;
	
	});
	
	/*
	* 	Checkbox
	*/
	jQuery('.checkbox-status').live("click", function() { 
		checkbox = jQuery(this).attr('title');
		jQuery(this).removeClass('checkbox-status');
		jQuery(this).addClass('checkbox-status-active');
		jQuery(this).siblings("#"+checkbox).attr("checked", "checked");
		return false;
	});
	
	jQuery('.checkbox-status-active').live("click", function() { 
		checkbox = jQuery(this).attr('title');
		jQuery(this).addClass('checkbox-status');
		jQuery(this).removeClass('checkbox-status-active');
		jQuery(this).siblings("#"+checkbox).removeAttr("checked");
		return false;
	});
	
	
	/*
	ADD MEDIA-IMAGE
	*/
	jQuery('.add_image_button').click(function() {

		valuefield = jQuery(this).siblings('.groupvalue');  
        currentvalue = jQuery(this).siblings('.groupvalue').val();
        preview = jQuery(this).siblings('.preview');
		
		items = jQuery(preview).find('li').size();
		
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) {
			
			imgurl = jQuery('img',html).attr('src');  
            classes = jQuery('img', html).attr('class');  
            id = classes.replace(/(.*?)wp-image-/, '');
			
			jQuery(preview).append('<li><a id="image-remove"  class="image-remove button" href="#" rel="'+id+'">-</a><span class="image"><img src=""></span><textarea id="caption">*caption</textarea><a id="image-moveup"  class="button" href="#">&uarr;</a><a id="image-movedown"  class="button" href="#">&darr;</a></li>');
			currentpreview = jQuery(preview).find('li:last');
						
			jQuery('span', currentpreview).html('<img src="'+imgurl+'">');
			//jQuery('a', currentpreview).attr('rel', '-'+id+',');
			jQuery(currentpreview).append('<textarea id="hidden-value" style="display:none;">~~~'+id+'|~|*caption</textarea>');
			
			newvalue = currentvalue+'~~~'+id+'|~|*caption';
            valuefield.val(newvalue);  
            tb_remove();  
		}
		
	    return false;  
	});
	
	jQuery(".preview").on("change", 'textarea#caption', function() {
		infos = jQuery(this).siblings('a');
		id = jQuery(infos).attr('rel');
		oldvalue = jQuery(this).siblings('textarea#hidden-value').val();
		
		// save new value
		newvalue = '~~~'+id+'|~|'+jQuery(this).val();
		jQuery(this).siblings('textarea#hidden-value').val(newvalue);
		
		fullval = jQuery(this).parent('li');
		fullval = jQuery(fullval).parent('ul');
		valuefield = jQuery(fullval).siblings('.groupvalue');
		fullval = jQuery(fullval).siblings('.groupvalue').val();
		
		
		replacevalue = fullval.replace(oldvalue, newvalue);
		jQuery(valuefield).val(replacevalue);
	});
	
	
	jQuery(".preview").on("click", '.image-remove', function() {  
        deletevalue = jQuery(this).siblings('textarea#hidden-value').val();
				
		li = jQuery(this).parent('li');
		ul = jQuery(li).parent('ul');
		valuefield = jQuery(ul).siblings('.groupvalue');
		fullval = jQuery(valuefield).val();
		
		replacevalue = fullval.replace(deletevalue, '');
		jQuery(valuefield).val(replacevalue);
		
		jQuery(li).remove();
		
        return false;  
    });
	
	
	jQuery(".preview").on("click", '#image-moveup', function() {  				
		li = jQuery(this).parent('li');
		ul = jQuery(li).parent('ul');
		valuefield = jQuery(ul).siblings('.groupvalue');
		
		li.prev().before(li);
		
		newvalue = '';
		ul.find('li').each(function(){
			newvalue = newvalue+jQuery(this).find('textarea#hidden-value').val();							
		});
				
		jQuery(valuefield).val(newvalue);
		
		
        return false;  
    });
	
	jQuery(".preview").on("click", '#image-movedown', function() {  				
		li = jQuery(this).parent('li');
		ul = jQuery(li).parent('ul');
		valuefield = jQuery(ul).siblings('.groupvalue');
		
		li.next().after(li);
		
		newvalue = '';
		ul.find('li').each(function(){
			newvalue = newvalue+jQuery(this).find('textarea#hidden-value').val();							
		});
				
		jQuery(valuefield).val(newvalue);
		
		
        return false;  
    });
	
	
	
	
	/*
	Organize
	*/
	jQuery( ".option #sortable" ).sortable({
			revert: true,
			stop: function(event, ui) {  
				sortupdate();				   
			}
		});
	
	jQuery( ".organize-list li a" ).live("click",function(){
		jQuery(this).siblings('input').attr("checked", "checked");
		jQuery(this).parent('li').addClass('active');
		sortupdate();
		return false;
	});
	
	jQuery( ".organize-list li.active a" ).live("click",function(){
		jQuery(this).siblings('input').attr("checked", false);
		jQuery(this).parent('li').removeClass('active');
		sortupdate();
		return false;
	});
	
	function sortupdate() {
		var output = '';
		jQuery( ".option #sortable" ).find('li').each(function(index){
			var classname = jQuery(this).attr('class');
			if (classname.indexOf("active") != -1) {  
				output = output+jQuery(this).find('a').attr('title')+'|'+jQuery(this).find('input').attr('name')+'|active|||';
			} else {					   
				output = output+jQuery(this).find('a').attr('title')+'|'+jQuery(this).find('input').attr('name')+'|nonactive|||';				   
			}
		});
		jQuery( ".option  #sortable" ).siblings('textarea').val(output);	
	};
	
	
	
	
	
	/*
	Hiding
	*/
	jQuery('#hiding select').change(function() {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	jQuery('#hiding select').each(function(index) {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	
	
	/*
	*	Google Font Weight option
	*/
	jQuery('.font-change-weight').change(function() {
		var val = jQuery(this).val();
		var weights = jQuery(this).find(':selected').data('weights');
		var weights = weights.toString();
		if (weights.indexOf(";") != -1) { 
			var weightarray = weights.split(';'); 
			var newoptions = '';
			jQuery.each( weightarray, function(index,value) {
				newoptions += '<option value="'+value+'">'+value+'</option>';
			});
		} else {
			var newoptions = '<option value="'+weights+'">'+weights+'</option>';
		}
		jQuery(this).parent('.value_half').siblings('.value_weight').find('.weight').html(newoptions);
	});
	
	
	
	/*
	*	Import Loader
	*/
	jQuery('.sr-demo').click(function() {
			
		jQuery('.sr-import-loader	').fadeIn(200);
		
		return true;
	});
	
	
	
	/*
	*	Enable color picker
	*/
    jQuery('.sr-color-field').wpColorPicker();
	
	
});