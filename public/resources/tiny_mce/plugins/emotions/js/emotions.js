tinyMCEPopup.requireLangPack();

var EmotionsDialog = {
	init : function(ed) {
		tinyMCEPopup.resizeToInnerSize();
	},

	insert : function(file, title) {
		var ed = tinyMCEPopup.editor, dom = ed.dom;

		tinyMCEPopup.execCommand('mceInsertContent', false, dom.createHTML('img', {
			src : tinyMCEPopup.getWindowArg('plugin_url') + '/img/' + file,
			border : 0,
			width : 26,
			height : 26
		}));
		
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(EmotionsDialog.init, EmotionsDialog);
