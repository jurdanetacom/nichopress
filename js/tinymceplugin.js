(function() {
    tinymce.create("tinymce.plugins.incrustor_button_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button     
            ed.addButton("incrustor", {
                title : "Incrustor de Posts",
                cmd : "incrustor_command",
                image : "https://cdn3.iconfinder.com/data/icons/awesome-lineca-vol-3/17/shortcode-128.png"
            });

            //button functionality.
            ed.addCommand("incrustor_command", function() {
                var selected_text = ed.selection.getContent();
                var return_text = '[facilius_incrustor categoria="slug-de-categoria" mostrar="n"]';
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Extra Buttons",
                author : "José Urdaneta",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("incrustor_button_plugin", tinymce.plugins.incrustor_button_plugin);
})();