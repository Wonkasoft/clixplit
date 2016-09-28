(function() {     
  tinymce.create( 'tinymce.plugins.clixplit', {   
    init: function( ed, url ) {   
      ed.addButton( 'clixplit', {           
        title: 'clixplit',            
        cmd:   'clixplit',            
        image:  '../wp-content/plugins/clixplit/img/clixplit-icon-color25px.svg'                      
      });   

      ed.addCommand('clixplit', function() {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<a href="http://wonkasoft.com">' + selected_text + '</a>';
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