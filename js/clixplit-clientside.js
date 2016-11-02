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
  });

/*  $(function get_links() {
    var links;
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.cliXplit_ajax + "ajax-getlinks.php",
      datatype: 'json',
      async: false,
      data: {
        "getlinks":1
      },
      success: function(links) {
        var dat = JSON.parse(links);
        set_links(dat);
      }
    });
  });


function clixplit_clicks_update(link,keyword) {
  var checkcookie = document.cookie;
  var uniqueclick ="N";
  if (!checkcookie.includes(link)) {
    var expiredate = new Date();
    expiredate.setDate(expiredate.getDate() + 45);
    document.cookie = link+"=" + link + ";expires=" + expiredate.toUTCString();
    uniqueclick ="Y";
  }
  $(function get_links() {
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.cliXplit_ajax + "ajax-clickupdate.php",
      datatype: 'String',
      async: false,
      data: {
        "url": link.toString(),
        "keyword":keyword.toString(),
        'uniqueclick':uniqueclick
      },
      success: function(response) {
      }
    });
  });
}

function set_links(links) {
  var dat = links;
  var keyword ="";
  var primaryurl ="";
  var priTotalclicks ="";
  var secondaryurl ="";
  var secTotalclicks ="";
  var winner ="";
  var winnerKeyword ="";
  var winner2 ="";
  var winner2Keyword ="";

  for (var i = 0; i < dat.length; i++) {
    if ((dat[i].primaryurl != "") && (dat[i].globalopt == "Y")) {
      keyword += dat[i].keyword+",";
      primaryurl += dat[i].primaryurl+",";
      priTotalclicks += dat[i].totalclicks+",";   
    }

    if ((dat[i].secondaryurl != "") && (dat[i].globalopt == "Y")) {
      secondaryurl += dat[i].secondaryurl+",";
      secTotalclicks += dat[i].totalclicks+",";   
    }
  }

  primaryurl = primaryurl.substring(0,primaryurl.length - 1);
  secondaryurl = secondaryurl.substring(0,secondaryurl.length - 1);
  priTotalclicks = priTotalclicks.substring(0,priTotalclicks.length - 1);
  secTotalclicks = secTotalclicks.substring(0,secTotalclicks.length - 1);
  keyword = keyword.substring(0,keyword.length - 1);
  var keywordArr = keyword.split(",");
  var primaryurlArr = primaryurl.split(",");
  var secondaryArr = secondaryurl.split(",");
  var priTotalclicksArr = priTotalclicks.split(",");
  var secTotalclicksArr = secTotalclicks.split(",");
  var minTotalclicks = Math.min.apply(Math,priTotalclicksArr);
  var secminTotalclicks = Math.min.apply(Math,secTotalclicksArr);

  for (i = 0; i < primaryurlArr.length; i++) {
    if (priTotalclicksArr[i] == minTotalclicks) {
      winner = primaryurlArr[i];
      winnerKeyword = keywordArr[i];
    }
  }

  for (i = 0; i < secondaryArr.length; i++) {
    if (secTotalclicksArr[i] == secminTotalclicks) {
      winner2 = secondaryArr[i];
      winner2Keyword = keywordArr[i];
    }
  }
  if (winner.includes("http://") || winner.includes("https://")) {
  } else {
    winner = "http://"+winner;
  }
  if (winner2.includes("http://") || winner2.includes("https://")) {
  } else {
    winner2 = "http://"+winner2;
  }
  var thePage = $("body");
  var link = '<a href="'+winner+'" target="_self" onclick="clixplit_clicks_update(this,this.text)">'+winnerKeyword+'</a>';
  var newconditions = new RegExp(winnerKeyword,'ig');
   // Script for secondary url
   window.addEventListener("beforeunload", secondaryLink);
   window.addEventListener("unload", clixplit_clicks_update(winner2,winner2Keyword));


   function secondaryLink() {
    var secId = winner2;
    window.open(secId,'_blank');
  }

}*/

});
