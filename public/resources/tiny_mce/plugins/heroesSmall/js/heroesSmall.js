tinyMCEPopup.requireLangPack();

var HeroesDialog = {
	init : function(ed) {
		tinyMCEPopup.resizeToInnerSize();
	},

	insert : function(file, title) {
		var ed = tinyMCEPopup.editor, dom = ed.dom;
		
		tinyMCEPopup.execCommand('mceInsertContent', false, dom.createHTML('img', {
			src : file,
			alt : ed.getLang(title),
			title : ed.getLang(title),
			border : 0,
			width : 28,
			height : 14
		}));
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(HeroesDialog.init, HeroesDialog);