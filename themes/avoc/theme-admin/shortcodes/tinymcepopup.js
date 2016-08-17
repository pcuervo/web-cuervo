(function() {
	tinymce.create('tinymce.plugins.popup', {
		init : function(ed, url) {
			// Register commands
			 ed.addCommand('mcepopup', function() {
					tb_show("Shortcodes", url + '/shortcode-popup.php?&width=800&height=600');
			 });
			// Register buttons
			ed.addButton('popup', {	title : 'Shortcodes', cmd : 'mcepopup', image : url + '/images/sc-button.png' });
			}
		});
	
    // Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('popupbutton', tinymce.plugins.popup);
})();