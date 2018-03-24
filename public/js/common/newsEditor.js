tinyMCE.init({
	mode : "textareas",
	editor_selector : "mceEditor",
	theme : "advanced",
	plugins : "media,autolink,lists,style,table,save,emotions,iespell,inlinepopups,contextmenu,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,autosave,heroes,animationHeroes,items,heroesSmall,heroes2,items2,heroesCartoon,preview",
	width: "710",
	height: "750",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontsizeselect,bullist,numlist,|,link,unlink,|,image,media,|,forecolor,backcolor",
	theme_advanced_buttons2 : "tablecontrols,|,emotions,|,heroes,animationHeroes,items,heroesSmall,heroes2,items2,heroesCartoon",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	plugin_preview_width : "622",
	plugin_preview_height : "300",
	convert_urls: false,
	theme_advanced_default_foreground_color : "#363636",
	setup: function(ed) {
        ed.onPostProcess.add(function(ed, o) {
        	o.content = o.content.replace(/background-color:[^\;]*;/gi, '');
        });
    }
});