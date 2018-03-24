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
	tinymce.create('tinymce.plugins.HeroesSmallPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceHeroSmall', function() {
				ed.windowManager.open({
					file : url + '/heroesSmall.htm',
					width : 500 + parseInt(ed.getLang('heroesSmall.delta_width', 0)),
					height : 449 + parseInt(ed.getLang('heroesSmall.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('heroesSmall', {title : 'heroesSmall.heroesSmall_desc', cmd : 'mceHeroSmall'});
		},

		getInfo : function() {
			return {
				longname : 'HeroesSmall',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/emotions',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('heroesSmall', tinymce.plugins.HeroesSmallPlugin);
})(tinymce);