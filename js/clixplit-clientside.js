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

    if ((!cookieObj.userip) && (!cookieObj.uniqeid)) {
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
        var dbJsonString ='[';
        for (var i = 0; i < dbData.length; i++) {
          if (dbData[i].primaryurl != '' && dbData[i].globalopt == 'Y') {
            dbJsonString +='{"primaryurl":"'+dbData[i].primaryurl+'","keyword":"'
            +dbData[i].keyword+'","pageopt":"'+dbData[i].pageopt+'","postopt":"'
            +dbData[i].postopt+'","totalclicks":"'+dbData[i].totalclicks+'"},';

          }else if (dbData[i].secondaryurl != '' && dbData[i].globalopt == 'Y') {
            dbJsonString +='{"secondary":"'+dbData[i].secondaryurl+'","keyword":"'
            +dbData[i].keyword+'","pageopt":"'+dbData[i].pageopt+'","postopt":"'
            +dbData[i].postopt+'","totalclicks":"'+dbData[i].totalclicks+'"},';
          }

        }
        dbJsonString = dbJsonString.substring(0, dbJsonString.length - 1);
        dbJsonString +="]";
        var outputObj = JSON.parse(dbJsonString);
        var keyword_check ="";
        var priIndex =0;
        var priArr =[];
        var priCounter = 0;
        var newIndex =0;
          for (var i = 0; i < outputObj.length; i++) {
            if (outputObj[i].primaryurl !="") {
              if (keyword_check == outputObj[i].keyword) {
                newIndex = i + 1;
                priIndex = outputObj[i].keyword;
                priArr[priIndex] += outputObj[i].primaryurl +" : "+ outputObj[i].totalclicks+", ";
                newIndex=0;
              } else {
                priIndex = outputObj[i].keyword;
                priArr[priIndex] = outputObj[i].primaryurl +" : "+ outputObj[i].totalclicks+", ";
                keyword_check = outputObj[i].keyword;
              }
            }
          }
          console.log(priArr);
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
        // } 
      }
    });
  });
});
      // how to delete a property in the cookie;
      // document.cookie = "=;expires=(-1)";
      // document.cookie = "uniqueid=;expires=(-1)";
      // how to set the url checked
      // document.cookie = "urlclicked=url" + ";expires=" + expiredate.toUTCString();