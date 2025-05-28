
tinymce.init({
	selector: 'textarea.TinyMCE',
	language: 'en',
	cmsms_tiny: cmsms_tiny = {
					linker_text : 'Link to content page',
			linker_title : 'Create a link to a content page',
			linker_image : 'http://localhost/cmsms/modules/TinyMCE/lib/images/cmsmslink.gif',
			linker_url : 'http://localhost/cmsms/admin/moduleinterface.php?mact=TinyMCE,m1_,linker,0&__c=2a3d638ec5d35eb8455&showtemplate=false',
			linker_autocomplete_url : 'http://localhost/cmsms/admin/moduleinterface.php?mact=TinyMCE,m1_,ajax_getpages,0&__c=2a3d638ec5d35eb8455&showtemplate=false',
			linker_href : 'Generated URL',
			prompt_page : 'Enter Page title',
			prompt_page_info : 'This is an auto complete field. Begin by typing a few characters of the desired page alias, menu text, or title. Any matching items will be displayed in a list.',
			prompt_alias : 'Selected Page alias',
			prompt_alias_info : 'This field is read only',
			prompt_text : 'Text to display',
			prompt_class : 'Class attribute',
			prompt_rel : 'Rel attribute',
			prompt_target : 'Target',
			tab_general : 'General',
			tab_advanced : 'Advanced',
			target_none : 'None',
			target_new_window : 'New window',
			loading_info : 'Loading...'
			},
			relative_urls: true,
		document_base_url: 'http://localhost/cmsms/',
	browser_spellcheck: true,

	
		plugins: 'autolink anchor code fullscreen image link media paste table visualblocks lists cmsms_linker  autoresize',

		
	contextmenu: " cmsms_linker link image imagetools | inserttable table",

							menubar: 'edit insert view format table tools',
			
				toolbar1: 'undo redo | cut copy paste | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | cmsms_linker link unlink responsivefilemanager image template | fullscreen code',
			
		
				resize: true,
	
	height: 20,
	autoresize_min_height: 10,
	autoresize_max_height: 600,
	autoresize_bottom_margin: 10,

		

		
		
		
		
				external_filemanager_path:"http://localhost/cmsms/modules/TinyMCE/responsive_filemanager/filemanager/",
	  	filemanager_title: "File manager",
		filemanager_access_key: "e79cd5bdd6c63b33dbc61a4c670519e8",
	
		

		external_plugins: {
					"cmsms_linker" : "http://localhost/cmsms/modules/TinyMCE/lib/js/tinymce_external_plugins/cmsms_linker/plugin.js",
							"filemanager" : "http://localhost/cmsms/modules/TinyMCE/responsive_filemanager/filemanager/plugin.min.js",
			"responsivefilemanager" : "http://localhost/cmsms/modules/TinyMCE/responsive_filemanager/tinymce_plugin/responsivefilemanager/plugin.min.js",
			},


		urlconverter_callback: function(url, elm, onsave, name) {
		var self = this;
		var settings = self.settings;

		if (!settings.convert_urls || ( elm && elm.nodeName == 'LINK' ) || url.indexOf('file:') === 0 || url.length === 0) {
			return url;
		}

		// fix entities in cms_selflink urls.
		if (url.indexOf('cms_selflink') != -1) {
			decodeURI(url);
			url = url.replace('%20', ' ');
			return url;
		}
		// Convert to relative
		if (settings.relative_urls) {
			return self.documentBaseURI.toRelative(url);
		}

		// Convert to absolute
		url = self.documentBaseURI.toAbsolute(url, settings.remove_script_host);
		return url;
	},


	setup: function(editor) {
		editor.on('change', function(e) {
			$(document).trigger('cmsms_formchange');
		});

				

				

				
	},

				paste_as_text: true,
image_caption: true
	

});
