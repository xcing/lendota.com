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
	tinymce.create('tinymce.plugins.AnimationHeroesPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceAnimationHero', function() {
				ed.windowManager.open({
					file : url + '/animationHeroes.htm',
					width : 500 + parseInt(ed.getLang('animationHeroes.delta_width', 0)),
					height : 449 + parseInt(ed.getLang('animationHeroes.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('animationHeroes', {title : 'animationHeroes.animationHeroes_desc', cmd : 'mceAnimationHero'});
		},

		getInfo : function() {
			return {
				longname : 'AnimationHeroes',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/emotions',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('AnimationHeroes', tinymce.plugins.AnimationHeroesPlugin);
})(tinymce);