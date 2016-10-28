$(document).ready(function() {
  
  $(function set_cookie() {
    $.ajax({
      type:'POST',
      datatype: 'json',
      url:CLIXPLIT_AJAX.cliXplit_ajax + "ajax-getip.php",
      success: function($response) {
        var expiredate = new Date();
        expiredate.setDate(expiredate.getDate() + 45);
        var uniqueid = Math.floor((Math.random() * 165463) + 1)+"-"+Math.floor((Math.random() * 165463) + 1)+"-"+Math.floor((Math.random() * 165463) + 1);
        document.cookie = "userip=" + $response + ";expires=" + expiredate.toUTCString();
        document.cookie = "uniqueid=" + uniqueid + ";expires=" + expiredate.toUTCString();
        document.cookie = "urlclicked=url" + ";expires=" + expiredate.toUTCString();
      }
    });
  });

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
          var dbArr = "[";
          var dbObj = "";
          var keyword = "";
          var primaryCounter = 0;
          var secondaryCounter = 0;
          for (var i = 0; i < dbData.length; i++) {
            if (dbData[i].primaryurl != '' && dbData[i].globalopt == 'Y') {
              dbArr += [dbData[i].keyword]+'{"primaryurl":"'+dbData[i].primaryurl+'","totalclicks":"'+dbData[i].totalclicks+'"},';
              
            }else if (dbData[i].secondaryurl != '' && dbData[i].globalopt == 'Y') {
              dbArr += [dbData[i].keyword]+'{"secondaryurl":"'+dbData[i].secondaryurl+'","totalclicks":"'+dbData[i].totalclicks+'"},';
              
            }
          }
          dbArr = dbArr.substring(0,dbArr.length -1);
          dbArr += "]";

          var ArrJson = JSON.parse(dbArr);
          /*console.log(links);*/
          console.log(ArrJson);
        } 
      });
    });
});