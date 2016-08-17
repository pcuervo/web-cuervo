jQuery(document).ready(function($){
   
    //init Thickbox
    
    ////stop the flash from happening
	$('#TB_window').css('opacity',0);
	
	function calcTB_Pos() {
		$('#TB_window').css({
	   	   'height': ($('#TB_ajaxContent').outerHeight() + 30) + 'px',
	   	   'top' : (($(window).height() + $(window).scrollTop())/2 - (($('#TB_ajaxContent').outerHeight()-$(window).scrollTop()) + 30)/2) + 'px',
	   	   'opacity' : 1
		});
	}
	
	setTimeout(calcTB_Pos,10);
	
	//just incase..
	setTimeout(calcTB_Pos,100);
	
	$(window).resize(calcTB_Pos);
	
	
	
	/*	**********************************
		SHOW FIRST SHORTCODE
	/*	**********************************/
	$('.sc_list li:first-child a').addClass('active');
	
	$('.sc_list li a').click(function() {
		$('.sc_list li a').removeClass('active');
		$(this).addClass('active');
		var showoption = $(this).attr('href');
		$('.sc_option .sc-option-content').hide();
		$('.sc_option #'+showoption).show();
		return (false);
	});
	
	
	
	/*	**********************************
		ICON CLICK
	/*	**********************************/
	$("select#icon-type option").each(function () { 
		var type = jQuery(this).val();
		var checked = jQuery(this).attr('selected');
		if (checked == 'selected') {
			$("select#icon-type").siblings('.iconfonts').hide();
			$("select#icon-type").siblings('.'+type).show();
		}
	});
	
	$("select#icon-type").click(function () {
	  	var type = $(this).val();
		$(this).siblings('.iconfonts').hide();
		$(this).siblings('.'+type).show();
	});
	
	$('.iconcheck').click(function() { 
		value = $(this).siblings('input').val();
		parent = $(this).parent();
		
		$(parent).siblings('li').removeClass('iconactive');
		$(parent).addClass('iconactive');
		
		$(parent).siblings('li').find("input").removeAttr("checked");
		$(this).siblings('input').attr("checked", "checked");
		
		var form = $(parent).parents('form').attr('id');
	});	
	
	
	
	/*	**********************************
		ADD SINGLE IMAGE
	/*	**********************************/
  	$('.upload-sc-image').on('click',function( event ) {	 
		
		var preview = jQuery(this).siblings('.preview-image').find('img');
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-image');
		
		var mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			button: { text: 'Select Image' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(preview).attr('src',imagesrc);
				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove Image */
  	$('.remove-sc-image').on('click',function( event ) {	 
		
		var preview = jQuery(this).siblings('.preview-image').find('img');
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-image');
				
		$(preview).attr('src','');
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	
	/*	**********************************
		ADD SINGLE Video
	/*	**********************************/
  	$('.upload-sc-video').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-video');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Video',
			library: { type: 'video' },
			button: { text: 'Select Video' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove video */
  	$('.remove-sc-video').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-video');
				
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	
	/*	**********************************
		ADD SINGLE Video
	/*	**********************************/
  	$('.upload-sc-audio').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-audio');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Audio',
			library: { type: 'audio' },
			button: { text: 'Select Audio' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove video */
  	$('.remove-sc-audio').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-audio');
				
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	/*	**********************************
		ADD IMAGE FOR MEDIAS
	/*	**********************************/
	jQuery('.sortable-medias-shortcode .add_image').click(function() {
		
		var area = jQuery(this).parent('.sortable-medias-shortcode').attr('id');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			multiple: true,
			button: { text: 'Insert selected Images' }
		});
		mediaframe.on( "select", function() {
			
			// Grab the selected attachments.
			var selection = mediaframe.state().get("selection");
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				var imageId = attachment.id;
				if (attachment.sizes.full.height < 150 || attachment.sizes.full.width < 150) {
					var imageThumb = attachment.sizes.full.url;
				} else {
					var imageThumb = attachment.sizes.thumbnail.url;
				}
				jQuery('#'+area).find("#sortable").append('<li class="ui-state-default" title="image"><img src="'+imageThumb+'" class="'+imageId+'"><div class="delete"><span></span></div></li>');
				// http://stackoverflow.com/questions/20101909/wordpress-media-uploader-with-size-select
			}); 
			mediaupdate();
		});
	    mediaframe.open();
	    return false;
	});
	
	jQuery( ".sortable-medias-shortcode #sortable").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		mediaupdate();
	});
	
	function mediaupdate() {
				
		jQuery( ".sortable-medias-shortcode" ).each(function(index){
			var area = jQuery(this);
			output ='';
			jQuery(this).find("#sortable li").each(function(index){
				output = output+'[sr_gitem id="'+jQuery(this).find('img').attr('class')+'"]';
			});
			area.find("#sortable").siblings('textarea').val(output);
		});
		
	}
	
	// sortable
	jQuery( ".sortable-medias-shortcode #sortable" ).sortable({
		revert: true,
		stop: function(event, ui) {  
			mediaupdate();	   
		}
	});
	
  
  
  	$('.sr-color-field').wpColorPicker();
  
  	
	
	/*	**********************************
		DUPLICATE GROUP
	/*	**********************************/
	$('.groupduplicater').click(function() {
		
		var group = $(this).attr('href');
		var parent = $(this).parent('form');
		var groupcontent = $(this).parent('form').find('.group:first').html();
		
		$(this).before('<div id="'+group+'" class="group">'+groupcontent+'</div>');
		
		return false;
	});
	
	
	
	/*	**********************************
		SELECT HIDING
	/*	**********************************/
	jQuery('.select-hiding select').change(function() {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		//alert(name);
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	jQuery('.select-hiding select').each(function(index) {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	
	
	/*	**********************************
		CLICK INSERT SHORTCODE
	/*	**********************************/
	$('.submit').click(function() {
		var check = true;
					
		// ---------------------- CONTROL CONTACT
		if ($(this).attr('id') == 'insert_contact') {
			var mail = $(this).parent('form').find('input#sc_contactsendto').val();
			if (mail) {   } else { alert('Please enter a recipient email'); check = false; } 
		}
		// ---------------------- CONTROL CONTACT
		
		
		var theShortcode = getshortcode($(this).attr('id'));
		var ed = tinyMCE.activeEditor;
		ed.selection.setContent(theShortcode);
		tb_remove();
		
		return false;
	});
	
	
	
	
	/*	**********************************
		FUNCTION TO GET THE RIGHT SHORTCODE
	/*	**********************************/
	function getshortcode(id) {
		
		var outputbefore = ''; 
		var output = ''; 
		
		
		
		// ---------------------- SKILLS
		if (id == 'insert_skills') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var skill_percent = jQuery(this).find('input#sc_skillpercent').val();
					var skill_name = jQuery(this).find('input#sc_skillname').val();
					var skill_color = jQuery(this).find('input#sc_skillcolor').val();
					output += '[skill amount="'+skill_percent+'" name="'+skill_name+'" color="'+skill_color+'"]';
			});
			
		}
		// ---------------------- SKILLS
		
						
		
		// ---------------------- CONTACT
		if (id == 'insert_contact') {
			
			var fields = '';
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					
					var fieldtype = $(this).find('select#sc_contacttype').val();
					var fieldname = $(this).find('input#sc_contactname').val();
					var slugname = $(this).find('input#sc_contactslug').val();
					if (slugname == '') { slugname = fieldname.toLowerCase(); slugname = slugname.replace(' ',''); } 
					var required = $(this).find('select#sc_contactreq').val();
					
					output += '[field type='+fieldtype+' name="'+fieldname+'" slug='+slugname+' required='+required+']';
					if (fieldtype !== 'submitbutton') { fields += slugname+','; }
					
			});
			
			var email =  $('#'+id).parent('form').find('input#sc_contactsendto').val();
			var subject =  $('#'+id).parent('form').find('input#sc_contactsubject').val();
			var submitname = $('#'+id).parent('form').find('input#sc_contactsubmit').val();
			
			output = '[contactgroup fields='+fields+' email='+email+' subject="'+subject+'" submit="'+submitname+'"]'+output+'[/contactgroup]';
		}
		// ---------------------- CONTACT
		
		
		
		// ---------------------- BUTTONS
		if (id == 'insert_buttons') {
			
			var color = $('#'+id).parent('form').find('select#sc_buttoncolor').val();
			var size = $('#'+id).parent('form').find('select#sc_buttonsize').val();
			var text = $('#'+id).parent('form').find('input#sc_buttontext').val();
						
			var goto = $('#'+id).parent('form').find('select#sc_buttongoto').val();
			if (goto == 'url') {
				var url = $('#'+id).parent('form').find('input#sc_button_url_url').val();
				var target = $('#'+id).parent('form').find('select#sc_button_url_target').val();
				var sc_options = 'url="'+url+'" target="'+target+'"';
			} else if (goto == 'page') {
				var page = $('#'+id).parent('form').find('select#sc_button_page').val();
				var sc_options = 'page="'+page+'"';
			} else if (goto == 'portfolio') {
				var portfolio = $('#'+id).parent('form').find('select#sc_button_portfolio').val();
				var sc_options = 'portfolio="'+portfolio+'"';
			} else if (goto == 'image') {
				var image = $('#'+id).parent('form').find('input#sc_button_video_image').val();
				var sc_options = 'image="'+image+'"';
			} else if (goto == 'video') {
				var video = $('#'+id).parent('form').find('input#sc_button_video_video').val();
				var sc_options = 'video="'+video+'"';
			} else if (goto == 'selfhosted') {
				var selfhosted = $('#'+id).parent('form').find('input#sc_button_video_selfhosted').val();
				var sc_options = 'selfhosted="'+selfhosted+'"';
			}
			
			output = '[button color='+color+' size="'+size+'" '+sc_options+']'+text+'[/button]';
			
		}
		// ---------------------- BUTTONS
		
		
		
		
		// ---------------------- ICONS
		if (id == 'insert_icon') {
			
			var type = $('#'+id).parent('form').find('input[name="sc_iconfont"]:checked').val();
			var size = $('#'+id).parent('form').find('select#sc_iconsize').val();
			var color = $('#'+id).parent('form').find('input#sc_iconcolor').val();
			
			output = '[iconfont type="'+type+'" size="'+size+'" color="'+color+'"]';
			
		}
		// ---------------------- ICONS
		
		
		
		
		// ---------------------- TOGGLE
		if (id == 'insert_toggle') {
			
			var title = $('#'+id).parent('form').find('input#sc_toggletitle').val();
			var aopen = $('#'+id).parent('form').find('select#sc_toggleopen').val();
			var text = $('#'+id).parent('form').find('textarea#sc_toggletext').val();
			output = '[toggle title="'+title+'" open='+aopen+']'+text+'[/toggle]';
			
		}
		// ---------------------- TOGGLE
		
		
		
		// ---------------------- COUNTER
		if (id == 'insert_counter') {
			
			var from = $('#'+id).parent('form').find('input#sc_countfrom').val();
			var to = $('#'+id).parent('form').find('input#sc_countto').val();
			var speed = $('#'+id).parent('form').find('input#sc_countspeed').val();
			var name = $('#'+id).parent('form').find('input#sc_countsub').val();
			output = '[counter from="'+from+'" to='+to+' speed='+speed+' sub="'+name+'"]';
			
		}
		// ---------------------- COUNTER
		
		
		
		// ---------------------- TABS
		if (id == 'insert_tab') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var tab_name = jQuery(this).find('input#sc_tabname').val();
					var tab_text = jQuery(this).find('textarea#sc_tabtext').val();
					outputbefore += tab_name+',';
					output += '[tab id="'+(index+1)+'"]'+tab_text+'[/tab]';
			});
			
			output = '[tabs title="'+outputbefore+'"]'+output+'[/tabs]';
		}
		// ---------------------- TABS
		
		
		
		// ---------------------- ACCORDION
		if (id == 'insert_accordion') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var accordion_open = jQuery(this).find('select#sc_accordionopen').val();
					var accordion_name = jQuery(this).find('input#sc_accordiontitle').val();
					var accordion_text = jQuery(this).find('textarea#sc_accordiontext').val();
					output += '[accordion title="'+accordion_name+'" open="'+accordion_open+'"]'+accordion_text+'[/accordion]';
			});
			
			output = '[accordiongroup]'+output+'[/accordiongroup]';
		}
		// ---------------------- ACCORDION
		
		
		
		// ---------------------- SPACER
		if (id == 'insert_spacer') {
			
			var size = $('#'+id).parent('form').find('select#sc_spacersize').val();
			
			output = '[spacer size="'+size+'"]';
			
		}
		// ---------------------- SPACER
		
					
		
		// ---------------------- SUBTITLE
		if (id == 'insert_titlesub') {
			
			var name = $('#'+id).parent('form').find('input#sc_subtitle_name').val();
			var size = $('#'+id).parent('form').find('select#sc_subtitle_size').val();
			var alignment = $('#'+id).parent('form').find('select#sc_subtitle_alignment').val();

			output = '[sr-subtitle size="'+size+'" alignment="'+alignment+'"]'+name+'[/sr-subtitle]';
			
		}
		// ---------------------- SUBTITLE
		
		
		
		// ---------------------- VIDEO
		if (id == 'insert_video') {
			
			var type = $('#'+id).parent('form').find('select#sc_videotype').val();
			
			var sc_options = '';			
			if (type == 'inline') {
				var image = $('#'+id).parent('form').find('input#sc_video_inline_image').val();
				var video = $('#'+id).parent('form').find('select#sc_video_inline_type').val();
				var vid = $('#'+id).parent('form').find('input#sc_video_inline_id').val();
				var button = $('#'+id).parent('form').find('input#sc_video_inline_button').val();
				sc_options = 'image="'+image+'" video="'+video+'" id="'+vid+'" text="'+button+'"';
			} 
			
			output = '[sr-video type='+type+' '+sc_options+']';
			
		}
		// ---------------------- VIDEO
		
		
		
		// ---------------------- SOCIAL
		if (id == 'insert_social') {
			
			var fb = $('#'+id).parent('form').find('input#sc_social_facebook').val();
			var tw = $('#'+id).parent('form').find('input#sc_social_twitter').val();
			var be = $('#'+id).parent('form').find('input#sc_social_behance').val();
			var dr = $('#'+id).parent('form').find('input#sc_social_dribbble').val();
			var google = $('#'+id).parent('form').find('input#sc_social_google').val();
			var inst = $('#'+id).parent('form').find('input#sc_social_instagram').val();
			var tum = $('#'+id).parent('form').find('input#sc_social_tumblr').val();
			var linked = $('#'+id).parent('form').find('input#sc_social_linkedin').val();
			var vk = $('#'+id).parent('form').find('input#sc_social_vk').val();
			var sc = $('#'+id).parent('form').find('input#sc_social_soundcloud').val();
			var web = $('#'+id).parent('form').find('input#sc_social_website').val();
			var mail = $('#'+id).parent('form').find('input#sc_social_mail').val();
			var so_alignment = $('#'+id).parent('form').find('select#sc_social_alignment').val();
			
			output = '[sr-social fb="'+fb+'" tw="'+tw+'" be="'+be+'" dr="'+dr+'" google="'+google+'" inst="'+google+'" tum="'+tum+'" linked="'+linked+'" vk="'+vk+'" sc="'+sc+'" web="'+web+'" mail="'+mail+'" alignment="'+so_alignment+'"]';
			
		}
		// ---------------------- SOCIAL
		
		
		
		// ---------------------- selfhostedT AUDIO
		if (id == 'insert_selfhostedaudio') {
			
			var mp3 = $('#'+id).parent('form').find('input#sc_selfhostedaudiomp3').val();
			var oga = $('#'+id).parent('form').find('input#sc_selfhostedaudiooga').val();
			var pic = $('#'+id).parent('form').find('input#sc_selfhostedaudiopic').val();
			var id = $('#'+id).parent('form').find('input#sc_selfhostedaudioid').val();
			output += '[selfhostedtaudio mp3="'+mp3+'" oga="'+oga+'" pic="'+pic+'" id="'+id+'"]';
	
		}
		// ---------------------- selfhostedT AUDIO
		
		
		
		// ---------------------- selfhostedT VIDEO
		if (id == 'insert_selfhostedvideo') {
			
			var m4v = $('#'+id).parent('form').find('input#sc_selfhostedvideom4v').val();
			var oga = $('#'+id).parent('form').find('input#sc_selfhostedvideooga').val();
			var webmv = $('#'+id).parent('form').find('input#sc_selfhostedvideowebmv').val();
			var pic = $('#'+id).parent('form').find('input#sc_selfhostedvideopic').val();
			var id = $('#'+id).parent('form').find('input#sc_selfhostedvideoid').val();
			output += '[selfhostedtvideo m4v="'+m4v+'" oga="'+oga+'" webmv="'+webmv+'" pic="'+pic+'" id="'+id+'"]';
	
		}
		// ---------------------- selfhostedT VIDEO
		
		
		
				
		return output;
		
	}
	
    
});


