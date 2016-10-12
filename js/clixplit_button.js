$(function() {     
  tinymce.create( 'tinymce.plugins.clixplit', {   
    init: function( ed, url ) {   
      ed.addButton( 'clixplit', {           
        title: 'clixplit',            
        cmd:   'clixplit',            
        image:  '../wp-content/plugins/clixplit/img/clixplit-icon-color25px.svg'                      
      });   
      

      ed.addCommand('clixplit', function() {
        $(".mymodal").css({"visibility": "inherit", "opacity": "1", "height": "inherit"});
        $selected_text = ed.selection.getContent();
        $return_text = '';
        $('.clixplit-save-btn').unbind().click(function() {
          $('[name="selected-text"]').val($selected_text);
          $globalswitch = $('#campaign-add-switch').next().next().text();
          if ($globalswitch == "on") {
            $globalswitch = "Y";
          }
          else {
            $globalswitch = "N";
          }
          $('[name="globalopt"]').val($globalswitch);
          $mobileswitch = $('#mobile-switch').next().next().text();
          $('[name="mobileopt"]').val($mobileswitch);
          $primary_url = $('[name="primary[]"]').val();
          alert($return_text);
          $return_text = '<a href="' + $primary_url + '">' + $selected_text + '</a>';
          alert($return_text);
          ed.execCommand('mceInsertContent', 0, $return_text);
          $(".mymodal").css({"visibility":"hidden", "opacity": "0", "height": "0"});
        });
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

});