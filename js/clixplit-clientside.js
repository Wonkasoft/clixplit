jQuery(document).ready(function($) {

  $(function check_cookie() {
    var cookie = document.cookie;
    var cookieArr = cookie.split(";");
    var cookieObj = {};
    for (var i = 0; i < cookieArr.length; i++) {
      var cookieKeyValue = cookieArr[i];
      cookieKeyValue = cookieKeyValue.trim();
      var cookieKeyValueArr = cookieKeyValue.split("=");
      cookieObj[cookieKeyValueArr[0]] = cookieKeyValueArr[1];
    }

    if (!cookieObj.uniqeid) {
      var expiredate = new Date();
      expiredate.setDate(expiredate.getDate() + 45);
      var uniqueid = Math.floor((Math.random() * 165463) + 1)+"-"+Math.floor((Math.random() * 165463) + 1)
      +"-"+Math.floor((Math.random() * 165463) + 1);
      document.cookie = "uniqueid=" + uniqueid + ";expires=" + expiredate.toUTCString();
    }
    // console.log(cookieObj);
  });

  $(function get_global_links() {
    $keywords = [];
    $('.global-links').each(function(){
      $keywords.push($(this).text());  
    });
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.ajaxdir + "ajax-getlinks.php",
      data: {
        "keywords":$keywords
      },
      success: function(global_links) {
        console.log(global_links);
        global_links = JSON.parse(global_links);
        console.log(global_links);
        $priurl = '';
        $('.global-links').each(function(){
          for (var i = 0; i < global_links[0].length; i++) {
            if (global_links[0][i] == $(this).text()) {
              $priurl = global_links[0][i+1];
              $(this).attr('href', $priurl);
            }
        }
        });
        // console.log($keywords);
        $sec_url = global_links[1];
      }
    });
  });

   $(function get_redirect_links() {
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.ajaxdir + "ajax-getlinks.php",
      data: {
        "get_redirect_links":1
      },
      success: function(mouse,sec) {
        

      }
    });
  });
}); // End of document ready


function clixplit_clicks_update(link,keyword) {
  console.log(keyword);
  var checkcookie = document.cookie;
  var uniqueclick ="N";
  if (!checkcookie.includes(link)) {
    var expiredate = new Date();
    expiredate.setDate(expiredate.getDate() + 45);
    document.cookie = link+"=" + link + ";expires=" + expiredate.toUTCString();
    uniqueclick ="Y";
  }
  jQuery(function click_update($) {
    $.ajax({
        type:'POST',
        url:CLIXPLIT_AJAX.ajaxdir + "ajax-clickupdate.php",
        datatype:'String',
        async: false,
        data: {
          "url":link.toString(),
          "keyword":keyword,
          "uniqueclick":uniqueclick
        },
        success: function($refresh) {
          console.log($refresh);
          $refresh = JSON.parse($refresh);
          console.log($refresh[0][1]);
          //For the page refresh secondaryurl
          location.href=$refresh[0][1];
          
        }
    });
  });
}

function clixplit_clicks_update_redirects(url, type) {
  $(function get_links() {
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.ajaxdir + "ajax-clickupdate.php",
      data: {
        "redirecturl":url.toString(),
        "type":type,
        "post_id":CLIXPLIT_AJAX.postid
      },
      success: function(response) {
        
      }
    });
  });
}