(function(a){a.create("tinymce.plugins.AnimationHeroesPlugin",{init:function(b,c){b.addCommand("mceAnimationHero",function(){b.windowManager.open({file:c+"/animationHeroes.htm",width:500+parseInt(b.getLang("animationHeroes.delta_width",0)),height:449+parseInt(b.getLang("animationHeroes.delta_height",0)),inline:1},{plugin_url:c})});b.addButton("animationHeroes",{title:"animationHeroes.animationHeroes_desc",cmd:"mceAnimationHero"})},getInfo:function(){return{longname:"AnimationHeroes",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/emotions",version:a.majorVersion+"."+a.minorVersion}}});a.PluginManager.add("animationHeroes",a.plugins.AnimationHeroesPlugin)})(tinymce);