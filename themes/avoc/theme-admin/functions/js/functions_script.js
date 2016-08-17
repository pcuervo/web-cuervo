jQuery(function(jQuery) {  
  	
	
	/*
	ADD IMAGE
	*/
    jQuery(".single-image").on("click", '.add_singleimage', function() {  
		formfield = jQuery(this).siblings('input[type="text"]');
        preview = jQuery(this).siblings('.preview_image');  
      
		var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
		
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		_custom_media = true;	
		
		wp.media.editor.send.attachment = function(props, attachment){
		  if ( _custom_media ) {
			//console.log( attachment);
			var newimgurl = attachment.url;
			if (attachment.sizes[props.size]) { newimgurl = attachment.sizes[props.size].url; }
		   	formfield.val(newimgurl);  
			jQuery(preview).find('img').attr('src', newimgurl);
		  } else {
			return _orig_send_attachment.apply( this, [props, attachment] );
		  };
		}
		wp.media.editor.open(button);
       return false;  
    });
	
	
	jQuery("#sortable-elements").on("click", '.add_singleimage', function() {  
		formfield = jQuery(this).siblings('input[type="text"]');
        preview = jQuery(this).siblings('.preview_image');  
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) { 
            html = '<div>'+html+'</div>';
			imgurl = jQuery('img',html).attr('src');
            classes = jQuery('img', html).attr('class');  
            id = classes.replace(/(.*?)wp-image-/, '');
            formfield.val(imgurl);  
            if (preview) { preview.attr('src', imgurl);  }
            tb_remove(); 
			elementsupdate();
        }  
        return false;  
    }); 
	
	
	/*
	* 	VIDEO UPLOAD
	*/
    jQuery(".single-video").on("click", '.add_singlevideo', function() {  
		var formfield = jQuery(this).siblings('input[type="text"]');
		
		var mediaframe = wp.media({
			title: 'Choose Video',
			library: { type: 'video' },
			button: { text: 'Select Video' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

            	formfield.val(imagesrc);  				
		});
	    mediaframe.open();
		
       return false;  
    }); 
		
	
	/*
	Sortable emelents
	*/
	
	jQuery( "#sortable-elements #sortable" ).sortable({
			revert: true,
			stop: function(event, ui) {  
				elementsupdate();				   
			}
		});
	
	jQuery(".add-element").click(function() {
		var name = 	jQuery(this).attr('name');	
		var feature = jQuery(this).siblings(".element-sortable").val();
		var content = jQuery("#hiddenelements ."+feature).html();
		jQuery(this).siblings(".visual-elements").append(content);
		elementsupdate();
		return false;  
    });
	
	jQuery(".visual-elements").on("click", '.edit', function() {
		jQuery(this).siblings('.editcontent').slideToggle(300);	
		elementsupdate();
	});
	
	jQuery(".visual-elements").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		elementsupdate();
	});
	
	jQuery(".visual-elements").on("change", 'input, select, textarea', function() {
		elementsupdate();
	});
	
	
	function elementsupdate() {
		var output = '';
		jQuery( "#sortable-elements #sortable" ).find('li').each(function(index){
			var feature = jQuery(this).attr('title');
			valueoutput = '';
			jQuery(this).find('.row').each(function(index){
				var value = jQuery(this).find('label').attr('for');
				value = jQuery(this).find('.'+value).val();
				valueoutput = valueoutput+value+'~~';
			});
			valueoutput = valueoutput.slice(0, -2)
			output = output+feature+'|'+valueoutput+'|||';
		});
		output = output.slice(0, -3);
		jQuery( "#sortable-elements #sortable" ).siblings('textarea').val(output);
	
	}
	
	
	
	
	
	/*
	Medias
	*/
	jQuery( ".sortable-medias #sortable" ).sortable({
			revert: true,
			stop: function(event, ui) {  
				mediaupdate();				   
			}
		});
	
	jQuery('.sortable-medias .add_image').click(function() {
		var area = jQuery(this).parent('.sortable-medias');
		
		var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
		
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		//var id = button.attr('id').replace('_button', '');
		_custom_media = true;	
		
		wp.media.editor.send.attachment = function(props, attachment){
		  if ( _custom_media ) {
			var thumbnail = [attachment.url.slice(0, -4), '-150x150', attachment.url.slice(-4)].join('');
			jQuery(area).find("#sortable").append('<li class="ui-state-default" title="image"><img src="'+thumbnail+'" class="'+attachment.id+'"><div class="delete"><span></span></div></li>');
		  } else {
			return _orig_send_attachment.apply( this, [props, attachment] );
		  };
		  mediaupdate();
		}
		
		wp.media.editor.open(button);
    	return false;

	});
	
	
	jQuery('.sortable-medias .add_video').click(function() {
		var area = jQuery(this).parent('.sortable-medias').attr('id');
		jQuery('#'+area).find("#sortable").append('<li class="ui-state-default" title="video"><div class="move">move</div><textarea name="videovalue"></textarea><div class="delete"><span></span></div></li>');
	    mediaupdate();
		return false;  
	});
	
	jQuery( ".sortable-medias #sortable").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		mediaupdate();
	});
	
	jQuery( ".sortable-medias #sortable").on("change", 'textarea', function() {
		mediaupdate();
	});
	
  	function mediaupdate() {
		var area = '';
			
		jQuery( ".sortable-medias" ).each(function(index){
			var area = jQuery(this).attr('id');
			var output = '';
			jQuery(this).find("#sortable li").each(function(index){
				var feature = jQuery(this).attr('title');
				if (feature == 'image') {
					output = output+feature+'~~'+jQuery(this).find('img').attr('class')+'~~'+jQuery(this).find('img').attr('src')+'|||';
				} else if (feature == 'video') {
					output = output+feature+'~~'+jQuery(this).find('textarea').val()+'|||';
				}
			});
			
			output = output.slice(0, -3);
			jQuery(this).find("#sortable").siblings('textarea').val(output);
		});
		
	}
	
	
	
	
	/*
	ADD SLIDE
	*/
	jQuery( ".sortable-slides #sortable" ).sortable({
			revert: true,
			stop: function(event, ui) {  
				slideupdate();				   
			}
		});
	
	jQuery('.sortable-slides .add_slide').click(function() {
		var area = jQuery(this).parent('.sortable-slides').attr('id');
		
		var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
		
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		//var id = button.attr('id').replace('_button', '');
		_custom_media = true;	
		
		wp.media.editor.send.attachment = function(props, attachment){
		  if ( _custom_media ) {
			var thumbnail = [attachment.url.slice(0, -4), '-150x150', attachment.url.slice(-4)].join('');
			
			jQuery('#'+area).find("#sortable").append('<li><img src="'+thumbnail+'" data-id="'+attachment.id+'" /><div class="slide-titles"><input name="maintitle" type="text" placeholder="Main title"><select name="maintitle-size"><option value="h1">H1</option><option value="h2">H2</option><option value="h3">H3</option><option value="h4">H4</option><option value="h5">H5</option><option value="h6">H6</option></select><br><input name="subtitle" type="text" placeholder="Subtitle"><select name="subtitle-size"><option value="h1">H1</option><option value="h2">H2</option><option value="h3">H3</option><option value="h4">H4</option><option value="h5">H5</option><option value="h6">H6</option></select><br><br><label>Text color: </label><select name="text-color"><option value="text-dark">Dark</option><option value="text-light">Light</option></select></div><a href="#" class="delete">Delete</a></li>');
		  } else {
			return _orig_send_attachment.apply( this, [props, attachment] );
		  };
		  slideupdate();
		}
		
		wp.media.editor.open(button);
    	return false;

	});
	
	
	jQuery( ".sortable-slides #sortable").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		slideupdate();
		return false;
	});
	
	jQuery( ".sortable-slides #sortable").on("change", 'input', function() { slideupdate(); });
	jQuery( ".sortable-slides #sortable").on("change", 'select', function() { slideupdate(); });
	
  	function slideupdate() {
		var area = '';
		jQuery( ".sortable-slides #sortable" ).each(function(index){
			var area = jQuery(this);
			var output = '';
			jQuery(this).find("li").each(function(index){
				var imageId = jQuery(this).find('img').data('id');
				var thumbnail = jQuery(this).find('img').attr('src');
				var maintitle = jQuery(this).find('input[name=maintitle]').val();
				var maintitleSize = jQuery(this).find('select[name=maintitle-size]').val();
				var subtitle = jQuery(this).find('input[name=subtitle]').val();
				var subtitleSize = jQuery(this).find('select[name=subtitle-size]').val();
				var color = jQuery(this).find('select[name=text-color]').val();
				output += imageId+'~~'+thumbnail+'~~'+maintitle+'~~'+maintitleSize+'~~'+subtitle+'~~'+subtitleSize+'~~'+color+'||';
			});
			output = output.slice(0, -2);
			jQuery(area).siblings('textarea').val(output);
		});
	}
	
	
	
	/*
	Select Hiding
	*/
	jQuery('.select-hiding select').change(function() {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	jQuery('.select-hiding select').each(function(index) {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
		
}); 


jQuery(document).ready(function($){
    $('.sr-color-field').wpColorPicker();
});