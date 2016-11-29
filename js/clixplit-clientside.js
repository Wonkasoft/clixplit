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
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.ajaxdir + "ajax-getlinks.php",
      data: {
        "get_global_links":1
      },
      success: function(primary) {
        console.log(primary);
        primary = JSON.parse(primary);
        console.log(primary.pk + ' ' + primary.p + ' | ' + primary.sk + ' ' + primary.s);

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
  // console.log(keyword);
  var checkcookie = document.cookie;
  var uniqueclick ="N";
  if (!checkcookie.includes(link)) {
    var expiredate = new Date();
    expiredate.setDate(expiredate.getDate() + 45);
    document.cookie = link+"=" + link + ";expires=" + expiredate.toUTCString();
    uniqueclick ="Y";
  }
}

function clixplit_clicks_update_redirects(url, type) {
  $(function get_links() {
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.ajaxdir + "ajax-clickupdate.php",
      data: {
        "url":url.toString(),
        "type":type,
        "post_id":CLIXPLIT_AJAX.postid
      },
      success: function(response) {
      }
    });
  });
}