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
      // console.log(cookieObj);
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
          var dbArr = [];
          var dbJsonString ='[';
          var secondaryArr = [];
          var keyword = [];
          for (var i = 0; i < dbData.length; i++) {
            if (dbData[i].primaryurl != '' && dbData[i].globalopt == 'Y') {
              dbJsonString +='{"primaryurl":"'+dbData[i].primaryurl+'","keyword":"'+dbData[i].keyword+'","pageopt":"'+dbData[i].pageopt+'","postopt":"'+dbData[i].postopt+'","totalclicks":"'+dbData[i].totalclicks+'"},';
            }else if (dbData[i].secondaryurl != '' && dbData[i].globalopt == 'Y') {
              // dbArr[dbData[i].secondaryurl] = "{secondary: "+"'yes' keyword: "+ "'"+dbData[i].keyword+"', "+"pageopt: "+ "'"+dbData[i].pageopt+"', "+"postopt: "+ "'"+dbData[i].postopt+"', "+"totalclicks: "+ "'"+dbData[i].totalclicks+"', "+"globalopt: "+ "'"+dbData[i].globalopt+"'}";
              // secondaryCounter++;
            }

          }
          dbJsonString = dbJsonString.substring(0, dbJsonString.length - 1);
          dbJsonString +="]";



          var testdata = JSON.parse(dbJsonString);
          // var parsedata = {};
          // for (var i = 0; i < dbArr.length; i++) {
          //   parsedata[dbArr[0]] = dbArr[1];
          // }

          // parsedata = dbArr.split("}");

            console.log(testdata);
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

              // window.addEventListener("beforeunload", secondaryLink);
    
              // function secondaryLink() {
              //   window.open(secondaryArr[0],'_blank');
              // }
        // } 
      }
    });
  });
});