/**
 * editor_plugin_src.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function(tinymce) {
	tinymce.create('tinymce.plugins.Heroes2Plugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceHero', function() {
				ed.windowManager.open({
					file : url + '/heroes2.htm',
					width : 500 + parseInt(ed.getLang('heroes2.delta_width', 0)),
					height : 449 + parseInt(ed.getLang('heroes2.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('heroes2', {title : 'heroes2.heroes2_desc', cmd : 'mceHero'});
		},

		getInfo : function() {
			return {
				longname : 'Heroes2',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/emotions',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('heroes2', tinymce.plugins.Heroes2Plugin);
})(tinymce);