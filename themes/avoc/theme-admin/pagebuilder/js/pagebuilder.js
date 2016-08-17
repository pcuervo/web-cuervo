jQuery(function(jQuery) {  
  		
	// CHECK IF ACTIVE
	if (jQuery( "._sr_pagebuilder_active").val() == 'yes') {
		jQuery("#postdivrich").addClass("sr-hide");
	}
	jQuery("#sr-pagebuilder").on("click", '.sr-disable-pagebuilder', function() {
		jQuery("#postdivrich").removeClass("sr-hide");
		jQuery("#sr-pagebuilder").removeClass("active");
		jQuery("._sr_pagebuilder_active").val("");
       	tinymce.get("content").setContent("");
		return false;
	});
	jQuery("#sr-pagebuilder").on("click", '.sr-enable-pagebuilder', function() {
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) {
			jQuery(".switch-tmce").trigger("click"); 
		}
		
		jQuery("#postdivrich").addClass("sr-hide");
		jQuery("#sr-pagebuilder").addClass("active");
		jQuery("._sr_pagebuilder_active").val("yes");
		updatePageBuilder();	
	});
	
	
	
	/* Open Popup (General) */
	var addRowAfter = false;
	var addRowTo = false;
	jQuery( "#sr-pagebuilder").on("click", '.sr-open-popup', function() {
		var popup = jQuery(this).attr("href");
		jQuery(".sr-pagebuilder-popup").fadeOut(50);
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);
		jQuery(popup).fadeIn(200);
		
		// area where to add row
		if (jQuery(this).hasClass("sr-add-row")) { addRowAfter = jQuery(this).parent(".visualsection"); }
		else if (jQuery(this).hasClass("sr-add-first-row")) { if (jQuery(this).parent().hasClass("horizontal-inner")) { addRowTo = jQuery(this).parent(".horizontal-inner");  } else { addRowTo = false; } }
		
		// area where to add element or wolfitem
		if (jQuery(this).hasClass("sr-add-element") || jQuery(this).hasClass("sr-add-wolfitem")) {
			if( jQuery(this).parent().find(".visualsection:last").length > 0) { addRowAfter = jQuery(this).parent().find(".visualsection:last");
			} else { addRowTo = jQuery(this).parent(); }
		}
		
		// disable dependecies
		jQuery("#sr-pagebuilder-popup-row").find(".popup-add-row").show();
		if (jQuery(this).hasClass("sr-add-row") && jQuery(this).parents('.horizontal-inner').length > 0) {
			jQuery("#sr-pagebuilder-popup-row").find(".popup-add-row.horizontalsection").hide();
			jQuery("#sr-pagebuilder-popup-row").find(".popup-add-row.sr-googlemap").hide();
		}
		
		return false;
	});
	
	
	/* Close Popup (General) */
	jQuery( ".sr-pagebuilder-popup").on("click", '.close-popup', function() {
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) {
			var editorId = jQuery(this).parents(".sr-pagebuilder-popup").find(".wp-editor-wrap").attr("id");
			jQuery("#"+editorId+" .switch-tmce").trigger("click"); 
		}
		
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup").fadeOut(200);
		jQuery(".sr-builder-insert").removeClass("disable");
		jQuery('.sr-pagebuilder-popup .form-row.disable-on-edit').show();
		addRowAfter = false;
		addRowTo = false;
		return false;
	});
	
	
	/* Delete section */
	jQuery('#sr-pagebuilder-visual').on('click',".delete-section",function() {
		jQuery(this).parent(".action-bar").parent(".visualsection").remove();
		updatePageBuilder();
		return false;
	});
	
	
	
	/*	**********************************
	
		---------------------------------	
		OPEN EDIT SECTION
		---------------------------------	
		
	/*	**********************************/
	
	/* Edit section */
	jQuery('#sr-pagebuilder-visual').on('click',".edit-section",function() {
		var jsonContent = jQuery(this).parent(".action-bar").siblings("textarea.json-start").val();
		var popup = jQuery(this).attr("href");
		openEdit(popup,jsonContent,jQuery(this).parent(".action-bar").parent(".visualsection"));
		
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);
		jQuery(popup).fadeIn(200);
		
		return false;
	});
	
	
	var tmpSectionEdit = false;
	function openEdit(popup,json,element) {
		tmpSectionEdit = element;
		json = jQuery.parseJSON( json );
		
		jQuery.each(json.options, function(i,o) {
			
			if (jQuery('#'+json.shortcode+'-'+o.oName).hasClass("media-gallery")) {
				jQuery('#'+json.shortcode+'-'+o.oName).val(o.oVal).change();
				jQuery('#'+json.shortcode+'-'+o.oName).siblings("#sortable").html("");
				var items = o.oVal.split("|||");
				for (var a=0;a<items.length;a++) {
					var meta = 	items[a].split("~~");
					jQuery('#'+json.shortcode+'-'+o.oName).siblings("#sortable").append('<li class="ui-state-default" title="'+meta[0]+'"><img src="'+meta[2]+'" class="'+meta[1]+'"><div class="delete"><span></span></div></li>');
				}
			} else if (o.oName !== 'content') { 
				jQuery('#'+json.shortcode+'-'+o.oName).val(o.oVal).change();
			} else {
				var editorId = jQuery(popup).find(".wp-editor-wrap").attr("id");
				jQuery("#"+editorId+" .switch-tmce").trigger("click");
				tinymce.get(json.shortcode+'-'+o.oName).focus();
				tinymce.activeEditor.setContent(o.oVal);
			}
		});
		
		jQuery(popup).find(".sr-builder-insert").addClass("disable");
		
		jQuery('#sr-pagebuilder-popup-'+json.shortcode+' .form-row.disable-on-edit').hide();
	}
	
	jQuery('.sr-builder-edit').click(function() {
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) { 
			var editorId = jQuery(this).parents(".popup-inner").find(".wp-editor-wrap").attr("id");
			jQuery("#"+editorId+" .switch-tmce").trigger("click"); 
		}
		
		var builderElement = getBuilderElement(jQuery(this).attr('href'),true);
		jQuery(tmpSectionEdit).children("textarea.shortcode-start").val(builderElement[1]);
		jQuery(tmpSectionEdit).children("textarea.json-start").val(builderElement[2]);
		if (builderElement[3]) { jQuery(tmpSectionEdit).children("span").html(builderElement[3]); }
		
		// change class for columnsection
		if (builderElement[0] === 'columnsection' && builderElement[4]) { 
			jQuery(tmpSectionEdit).children(".columns").removeClass("wrapper"); 
			jQuery(tmpSectionEdit).children(".columns").removeClass("wrapper-small"); 
			jQuery(tmpSectionEdit).children(".columns").removeClass("wrapper-mini"); 
			jQuery(tmpSectionEdit).children(".columns").addClass(builderElement[4]); 
		}
		
		// change animation for columns
		if (builderElement[0] === 'columnsection') {
			var animation = builderElement[5];
			jQuery(tmpSectionEdit).children(".columns").find(".col").each(function(index) {
				var thisShortcode = jQuery(this).children("textarea.shortcode-start").val();
                var thisJson = jQuery(this).children("textarea.json-start").val();
				
				var delay = 'false';
				if (animation === 'true') { delay = 200; }
				else if (animation === 'delayed') { delay = index*200; }
				
				var newShortcode =  thisShortcode.replace('animation="false"','animation="'+delay+'"'); 
				newShortcode =  newShortcode.replace('animation="0"','animation="'+delay+'"'); 
				newShortcode =  newShortcode.replace('animation="200"','animation="'+delay+'"'); 
				newShortcode =  newShortcode.replace('animation="400"','animation="'+delay+'"'); 
				newShortcode =  newShortcode.replace('animation="600"','animation="'+delay+'"'); 
				newShortcode =  newShortcode.replace('animation="800"','animation="'+delay+'"'); 
				newShortcode =  newShortcode.replace('animation="1000"','animation="'+delay+'"');
				if (newShortcode.indexOf("animation=") < 0) { newShortcode = newShortcode.replace('"]','" animation="'+delay+'"]'); }
				
				var newJson =  thisJson.replace('"oName":"animation","oVal":"false"','"oName":"animation","oVal":"'+delay+'"'); 
				newJson =  newJson.replace('"oName":"animation","oVal":"0"','"oName":"animation","oVal":"'+delay+'"'); 
				newJson =  newJson.replace('"oName":"animation","oVal":"200"','"oName":"animation","oVal":"'+delay+'"'); 
				newJson =  newJson.replace('"oName":"animation","oVal":"400"','"oName":"animation","oVal":"'+delay+'"'); 
				newJson =  newJson.replace('"oName":"animation","oVal":"600"','"oName":"animation","oVal":"'+delay+'"'); 
				newJson =  newJson.replace('"oName":"animation","oVal":"800"','"oName":"animation","oVal":"'+delay+'"'); 
				newJson =  newJson.replace('"oName":"animation","oVal":"1000"','"oName":"animation","oVal":"'+delay+'"'); 
				if (newJson.indexOf('"oName":"animation"') < 0) { newJson = newJson.replace('}]}','},{"oName":"animation","oVal":"'+delay+'"}]}'); }
				
				jQuery(this).children("textarea.shortcode-start").val(newShortcode);
				jQuery(this).children("textarea.json-start").val(newJson);
            });
		}
		
		// change class for wolfsection
		if (builderElement[0] === 'wolf' && builderElement[4]) { 
			jQuery(tmpSectionEdit).children(".wolf-inner").removeClass("wrapper"); 
			jQuery(tmpSectionEdit).children(".wolf-inner").removeClass("wrapper-small"); 
			jQuery(tmpSectionEdit).children(".wolf-inner").removeClass("wrapper-full"); 
			jQuery(tmpSectionEdit).children(".wolf-inner").addClass(builderElement[4]); 
		}
		
		// change class for wolfitem
		else if (builderElement[0] === 'wolfitem' && builderElement[4]) { 
			jQuery(tmpSectionEdit).removeClass("whalf"); 
			jQuery(tmpSectionEdit).removeClass("wthird"); 
			jQuery(tmpSectionEdit).removeClass("wfull"); 
			jQuery(tmpSectionEdit).addClass(builderElement[4]); 
		}
		
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup").fadeOut(200);
		updatePageBuilder();
		tmpSectionEdit = false;
		jQuery(".sr-builder-insert").removeClass("disable");
		jQuery('#sr-pagebuilder-popup-'+jQuery(this).attr('href')+' .form-row.disable-on-edit').show();
		return false;
	});
	
	/*	**********************************
	
		---------------------------------	
		OPEN EDIT SECTION
		---------------------------------	
		
	/*	**********************************/
	
	
	
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		UPDATE PAGE BUILDER VAL
		---------------------------------	
		
	/*	**********************************/
	
		function updatePageBuilder() {
			
			/* Get Full Content*/
			var pbVal = '';
			var previousItem = '';
			jQuery("#sr-pagebuilder-visual textarea.shortcode").each(function() {
                var thisShortcode = jQuery(this).val();
				
				// some users had problems with empty/null wolfitems (see also php)
				var emtpyItem = false;
				if (thisShortcode.indexOf("[/wolfitem") >= 0 && previousItem.indexOf("[wolfitem") < 0) { emtpyItem = true; }
				if (!emtpyItem) {
					if (jQuery(this).siblings("textarea.content").length > 0) {
						var thisContent = jQuery(this).siblings("textarea.content").val();
						pbVal += thisShortcode.replace("***CONTENT***", thisContent); 
					} else { 
						pbVal += thisShortcode; 
					}
				}
				previousItem = jQuery(this).val();
            });
			jQuery("textarea#_sr_pagebuilder").val(pbVal);
			
			// BUG - if html is selected
			jQuery("#wp-content-wrap .switch-tmce").trigger("click");	
			setTimeout(function() { tinymce.get("content").setContent(pbVal); }, 200);
			
			/* Get Json*/
			var pbJson = '{"section":[';
			var previousItem = '';
			var previousIndex = 0;
			jQuery("#sr-pagebuilder-visual textarea.json").each(function(index) {
				var thisJson = jQuery(this).val();
				
				// some users had problems with empty/null wolfitems (see also php)
				var emtpyItem = false;
				if (thisJson.indexOf("/wolfitem") >= 0 && previousItem.indexOf("wolfitem") < 0) { emtpyItem = true; }
				
				if (!emtpyItem) {
					if (index > 0 && previousIndex == 0) { pbJson += ','; }
					if (jQuery(this).siblings("textarea.content").length > 0) {
						var thisContent = jQuery(this).siblings("textarea.content").val();
						thisContent = JSON.stringify(thisContent);		
						thisContent = thisContent.substring(1, thisContent.length-1);
						pbJson += thisJson.replace("***CONTENT***", thisContent);
					} else { 
						pbJson += thisJson; 
					}
					previousIndex = 0;	
				} else {
					previousIndex = 1;	
				}
				previousItem = thisJson;
            });
			pbJson += ']}';
			if (pbJson == '{"section":[]}') { pbJson = ''; }
			jQuery("textarea#_sr_pagebuilder_json").val(pbJson);
			
		}
	
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		CLICK INSERT PAGE BUILDER ELEMENT
		---------------------------------	
		
	/*	**********************************/
	
	jQuery('.sr-builder-insert').click(function() {	
		var builderElement = getBuilderElement(jQuery(this).attr('href'),false);
		
		if (addRowAfter) {
			jQuery(addRowAfter).after(builderElement);
		} else if(addRowTo) {
			jQuery(addRowTo).prepend(builderElement);
		} else {
			jQuery("#sr-pagebuilder-visual").prepend(builderElement);
		}
		
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup").fadeOut(200);
		updatePageBuilder();
		addRowAfter = false;
		addRowTo = false;
		return false;
	});
	
	
	// get visual element function
	function getBuilderElement(id,edit) {
						
		var shortcodeEl = '['+id+'';
		var jsonEl = '{"shortcode":"'+id+'","options":[';
		var spanEl = '';
		var classEl = '';
		var theContent = '';
		
		var visualOption = '';
		jQuery("#sr-pagebuilder-popup-"+id+" .send-val").each(function(index) {
			var oName =  jQuery(this).attr("id").replace(id+"-", "");
			var oVal =  jQuery(this).val();
			
			if (oName === 'content') {
				theContent = tinymce.get(id+"-content").getContent();
				jsonEl += '{"oName":"content","oVal":'+JSON.stringify(theContent)+'},';
			} else {
				shortcodeEl += ' '+oName+'="'+oVal+'"';
				jsonEl += '{"oName":"'+oName+'","oVal":"'+oVal+'"},';
			}
			
			if (index === 0) { visualOption = oVal; }
        });
		
		shortcodeEl += ']';
		if (theContent) { shortcodeEl += theContent; } 
		shortcodeEl = shortcodeEl.replace("[text]", "");
		
		jsonEl += ']}';
		jsonEl = jsonEl.replace(",]", "]");
		
		// create default visual section	
		var visualEl = '<div class="visualsection '+id+' sr-clearfix">';
		visualEl += '<div class="action-bar"><a href="#" class="delete-section"></a>';
		visualEl += '<a href="#sr-pagebuilder-popup-'+id+'" class="edit-section"></a>';
		visualEl += '</div>';
		visualEl += '<textarea class="shortcode shortcode-start">'+shortcodeEl+'</textarea>';
		visualEl += '<textarea class="json json-start">'+jsonEl+'</textarea>';
		
		
		
		
		/*	-----------------
			COLUMNS
			-----------------	*/
		var colAnim = false;
		if (id === 'columnsection') {
			
			// get wrapper
			var wrapperVal =  jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-wrapper").val();
			classEl = wrapperVal;
			
			// animation
			colAnim = jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-animation").val();
			
			// get column choice
			var colVal =  jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-layout").val();
			var cols = colVal.split(';');
			visualEl += '<div class="columns '+wrapperVal+' sr-clearfix">';
			for (var i=0;i<cols.length;i++) {
				var shortcodeOption = 'size="'+cols[i]+'"';
				var jsonOption = '{"oName":"size","oVal":"'+cols[i]+'"}';
				if (i+1 >= cols.length) { shortcodeOption += ' last="last-col"'; jsonOption += ',{"oName":"last","oVal":"last-col"}'; }
				
				var delay = 'false';
				if (colAnim === 'true') { delay = 200; }
				else if (colAnim === 'delayed') { delay = i*200; }
				shortcodeOption += ' animation="'+delay+'"';
				jsonOption += ',{"oName":"animation","oVal":"'+delay+'"}';
				
				visualEl += '<div class="col '+cols[i]+'"><textarea class="shortcode shortcode-start">[col '+shortcodeOption+']</textarea><textarea class="json json-start">{"shortcode":"col","options":['+jsonOption+']}</textarea><div class="element-container col-inner"><a class="sr-add-element sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-element">Insert Element</a></div><textarea class="shortcode">[/col]</textarea><textarea class="json">{"shortcode":"/col"}</textarea></div>';
			}
			visualEl += '</div>';
			
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
						
		}
		
		
		
		/*	-----------------
			HORIZONTALSECTION
			-----------------	*/
		if (id === 'horizontalsection') { 			
			// horizontal-inner
			visualEl += '<div class="horizontal-inner sortable-container-inner"><a class="sr-add-first-row sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-row">Add Row</a></div>';
			
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		
		/*	-----------------
			WOLF
			-----------------	*/
		if (id === 'wolf') { 
			
			// get wrapper
			var wrapperVal =  jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-wrapper").val();
			classEl = wrapperVal;
					
			// horizontal-inner
			visualEl += '<div class="wolf-inner '+wrapperVal+' sr-clearfix"><a class="sr-add-wolfitem sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-wolfitem">Insert Wolf Item</a></div>';
			
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		
		/*	-----------------
			WOLFITEM
			-----------------	*/
		if (id === 'wolfitem') {
			
			var size =  jQuery("#sr-pagebuilder-popup-"+id+" #wolfitem-size").val();
			classEl = size;
			visualEl = visualEl.replace('<div class="visualsection ', '<div class="visualsection '+size+' ');
			 			
			// horizontal-inner
			visualEl += '<span>Wolf Item</span>';
			
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		
		/*	-----------------
			SPACER
			-----------------	*/
		if (id === 'spacer') { 			
			visualEl += '<span>Spacer ('+visualOption+')</span>';
			spanEl += 'Spacer ('+visualOption+')';
		}
		
		
		
		/*	-----------------
			TEXT / EDITOR
			-----------------	*/
		if (id === 'text') {
			visualEl += '<span>Text / Editor</span>';
		}
		
		
		/*	-----------------
			SLIDER
			-----------------	*/
		if (id === 'sr-slider') {
			visualEl += '<span>Slider</span>';
		}
		
		
		/*	-----------------
			GALLERY
			-----------------	*/
		if (id === 'sr-gallery') {
			visualEl += '<span>Gallery</span>';
			colAnim = jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-animation").val();
		}
		
		
		/*	-----------------
			TEAM MEMBER
			-----------------	*/
		if (id === 'sr-teammember') {
			visualEl += '<span>Team Member</span>';
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		/*	-----------------
			GOOGLE MAP
			-----------------	*/
		if (id === 'sr-googlemap') {
			visualEl += '<span>Google Map</span>';
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
			
		if (id !== 'wolfitem' && id !== 'text' && id !== 'sr-slider') {
			visualEl += '<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>';
		}
		
		
		resetValues(id);
		
		
		visualEl += '</div>';
		if (edit) {
			var editVal = [id,shortcodeEl,jsonEl,spanEl,classEl,colAnim];
			return editVal;
		} else {	
			return visualEl;
		}
	
	}
	
	
	/*	**********************************
		RESET FIELDS
	/*	**********************************/
	function resetValues(id) {
		jQuery("#sr-pagebuilder-popup-"+id+" .send-val").each(function(index) {
			var oName =  jQuery(this).attr("id").replace(id+"-", "");
			var oVal =  jQuery(this).val();
			var oDefault =  jQuery(this).data("default");
			if (!oDefault) { oDefault = ''; }
			
			if (oName === 'content') {
				theContent = tinymce.get(id+"-content").setContent("");
			} else {
				jQuery(this).val(oDefault);
			}
			
			if (jQuery(this).hasClass("media-gallery")) {
				jQuery(this).siblings(".media-elements").html('');
			}
			
        });
	}
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		SORTABLE FEATURES
		---------------------------------	
		
	/*	**********************************/
	jQuery( ".sortable-container" ).sortable({
		revert: true,
		connectWith: ".sortable-container-inner",
		cancel: ".disable-sortable",
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
			ui.item.find(".sr-add-row").hide();
		},
		stop: function(e,ui) {  
			updatePageBuilder();	
			ui.item.find(".sr-add-row").show();
		}
	});
	
	jQuery( ".sortable-container-inner" ).sortable({
		revert: true,
		connectWith: ".sortable-container",
		cancel: ".disable-sortable",
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
			ui.item.find(".sr-add-row").hide();
		},
		stop: function(e,ui) {  
			updatePageBuilder();	
			ui.item.find(".sr-add-row").show();
		}
	});
	
	jQuery( ".col-inner" ).sortable({
		revert: true,
		connectWith: ".col-inner",
		cancel: ".disable-sortable",
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
		},
		stop: function() {  
			updatePageBuilder();	
		}
	});
	
	jQuery( ".wolf-inner" ).sortable({
		revert: true,
		cancel: ".disable-sortable",
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
		},
		stop: function() {  
			updatePageBuilder();	
		}
	});
	
	
	
	/*	**********************************
	
		---------------------------------	
		MISC
		---------------------------------	
		
	/*	**********************************/
	
	// custom select
	jQuery('.custom-select > ul > li').click(function() {	
		var rel = jQuery(this).data('rel');
		jQuery(this).siblings('li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery(this).parent("ul").siblings("select").val(rel);
		return false;
	});
	
	
	
	
	/*	---------------------------------	
		RESTORE BUTTON
		--------------------------------- */
		jQuery("#sr-pagebuilder").on("click", '#restore-pagebuilder', function() {
			//alert("hello");
			jQuery('input[name="sr-pagebuilder-restore"]').val("true");
			jQuery('#publish').click();
			return false;
		});	
	/*	---------------------------------	
		RESTORE BUTTON
		--------------------------------- */
	
		
});