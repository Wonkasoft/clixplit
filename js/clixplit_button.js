(function() {     
  tinymce.create( 'tinymce.plugins.clixplit', {   
    init: function( ed, url ) {   
      ed.addButton( 'clixplit', {           
        title: 'clixplit',            
        cmd:   'clixplit',            
        image:  '../wp-content/plugins/clixplit/img/clixplit-logo-icon.png'                      
      });   

      ed.addCommand('clixplit', function() {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        $mouse_over_url = $('[name="mouse-over-url"]').val();
        alert($mouse_over_url);
        return_text = '<a href="' + $mouse_over_url + '">' + selected_text + '</a>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });
    },
    getInfo : function() {
            return {
                longname : 'Clixplit Buttons',
                author : 'Wonkasoft',
                authorurl : 'http://wonkasoft.com',
                infourl : 'http://wonkasoft.com',
                version : "1.0"
            };
        }

  });
  
  tinymce.PluginManager.add( 'clixplit', tinymce.plugins.clixplit );    

})();