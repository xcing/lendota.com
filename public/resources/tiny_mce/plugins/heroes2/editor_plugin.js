(function(a){a.create("tinymce.plugins.Heroes2Plugin",{init:function(b,c){b.addCommand("mceHero2",function(){b.windowManager.open({file:c+"/heroes2.htm",width:500+parseInt(b.getLang("heroes2.delta_width",0)),height:449+parseInt(b.getLang("heroes2.delta_height",0)),inline:1},{plugin_url:c})});b.addButton("heroes2",{title:"heroes2.heroes2_desc",cmd:"mceHero2"})},getInfo:function(){return{longname:"Heroes2",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/emotions",version:a.majorVersion+"."+a.minorVersion}}});a.PluginManager.add("heroes2",a.plugins.Heroes2Plugin)})(tinymce);