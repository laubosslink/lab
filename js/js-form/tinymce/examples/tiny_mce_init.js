	tinyMCE.init({
		mode : "exact",
		elements : "elm",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "black",
		language : "fr",
		plugins : "autolink,lists,pagebreak,style,table,advhr,advimage,advlink,preview,media,searchreplace,paste,directionality,fullscreen,ibrowser",

		relative_urls : false,
		remove_script_host : false,
		document_base_url : "http://simpleproject.society-lbl.com/upload/",
		
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,separator,forecolor,separator,justifyleft,justifycenter,justifyright,separator,fontsizeselect,separator,undo,redo,separator,search,replace,separator,bullist,numlist,separator,outdent,indent",
		theme_advanced_buttons2 : "link,unlink,image,separator,fullscreen,code",
		theme_advanced_buttons3 : "ibrowser",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		height:"350px",
		width:"600px"
	});

