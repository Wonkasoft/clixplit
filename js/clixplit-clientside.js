$(document).ready(function() {

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
    console.log(cookieObj);
  });

  $(function get_links() {
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.cliXplit_ajax + "ajax-getlinks.php",
      datatype: 'json',
      data: {
        "getlinks":1
      },
      success: function(links) {
        var dbData = JSON.parse(links);
        
      }
    });
  });
});
    // var thePage = $("body");
      // for (var i = 0; i < primaryCounter; i++) {
        // var conditions = new RegExp(keyword[i],'ig');
        // keywordOnPage = (thePage.html().match(conditions));
        // console.log(keywordOnPage);
      // }
      // for (var i = 0; i < keywordOnPage.length; i++) {
      //   var newconditions = new RegExp(keywordOnPage,'ig');
      //   thePage.html(thePage.html().replace(newconditions, '<a href="http://'+ primaryArr[0] +'" target="_self">'+keywordOnPage+'</a>'));  
      // }
      // 
      // Script for secondary url
      // window.addEventListener("beforeunload", secondaryLink);
      
      // function secondaryLink() {
      //   window.open(secondaryArr[0],'_blank');
      // }
      // how to delete a property in the cookie;
      // document.cookie = "=;expires=(-1)";
      // document.cookie = "uniqueid=;expires=(-1)";
      // how to set the url checked