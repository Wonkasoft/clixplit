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
        var dbJsonString ='[';
        for (var i = 0; i < dbData.length; i++) {
          if (dbData[i].primaryurl != '' && dbData[i].globalopt == 'Y') {
            dbJsonString +='{"primaryurl":"'+dbData[i].primaryurl+'","keyword":"'+dbData[i].keyword+'","input_id":"'+dbData[i].input_id
            +'","pageopt":"'+dbData[i].pageopt+'","postopt":"'+dbData[i].postopt+'","totalclicks":"'
            +dbData[i].totalclicks+'"},';

          }else if (dbData[i].secondaryurl != '' && dbData[i].globalopt == 'Y') {
            dbJsonString +='{"secondary":"'+dbData[i].secondaryurl+'","keyword":"'+dbData[i].keyword+'","input_id":"'+dbData[i].input_id
            +'","pageopt":"'+dbData[i].pageopt+'","postopt":"'+dbData[i].postopt+'","totalclicks":"'
            +dbData[i].totalclicks+'"},';
          }
        }
        dbJsonString = dbJsonString.substring(0, dbJsonString.length - 1);
        dbJsonString +="]";
        var myDataJson = JSON.parse(dbJsonString);
        var keyword_check ="";
        var iKeyword ="";
        var iTotalclicks ="";
        var iSecTotalclicks ="";
        var iPrimary =[];
        var iSecondary =[];
        var cleanData ={};
        var cleanDataurl =[];
        var cleanTotalclicks =[];
        
        for (var i = 0; i < myDataJson.length; i++) {
          if (myDataJson[i].primaryurl !=null) {
            if (keyword_check == myDataJson[i].keyword) {
              iKeyword = myDataJson[i].keyword;
              iPrimary = myDataJson[i].primaryurl;
              iTotalclicks = myDataJson[i].totalclicks;
              cleanData[iKeyword].iPrimary += "'"+iPrimary+"'";
              cleanData[iKeyword].iTotalclicks += "'"+iTotalclicks+"'";
            } else {

              iKeyword = myDataJson[i].keyword;
              iPrimary = myDataJson[i].primaryurl;
              iTotalclicks = myDataJson[i].totalclicks;
              cleanData[iKeyword] = {iKeyword,iPrimary,iTotalclicks};
              keyword_check = myDataJson[i].keyword;
            }
          }
          if (myDataJson[i].secondary !=null && myDataJson[i].input_id !=null) {
            if (keyword_check == myDataJson[i].keyword && myDataJson[i].input_id !=null) {
              iKeyword = myDataJson[i].keyword;
              iSecondary = myDataJson[i].secondary;
              iSecTotalclicks = myDataJson[i].totalclicks;
              cleanData[iKeyword].iSecondary += "'"+iSecondary+"'";
              cleanData[iKeyword].iSecTotalclicks += "'"+iSecTotalclicks+"'";
              alert(myDataJson[i].primaryurl+" "+myDataJson[i].secondary);
            } 
          }
        }
          console.log(cleanData);
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
      // document.cookie = "urlclicked=url" + ";expires=" + expiredate.toUTCString();