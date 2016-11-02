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
    // console.log(cookieObj);
  });

  $(function get_links() {
    var links;
    $.ajax({
      type:'POST',
      url:CLIXPLIT_AJAX.cliXplit_ajax + "ajax-getlinks.php",
      datatype: 'json',
      data: {
        "getlinks":1
      },
      success: function(links) {
        var dat = JSON.parse(links);
        set_links(dat);
      }
    });
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
      data: {
        "url":link.toString(),
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
  var link = winner;
  $(".global-links").attr("href",link);
  var closecookie = document.cookie;
  var ccdate = new Date();
  ccdate.setTime(ccdate.getTime() + (1 * 60 * 1000));
  if (closecookie.includes("before")) {

  }else {
   window.addEventListener("beforeunload", reload);
    document.cookie = "before=yes;expires="+ccdate.toUTCString();
  }

   function reload() {
    clixplit_clicks_update(winner);
    window.open(winner2,"_blank");
   }

  function page_post(securl) {
   if (winner2 !=null && securl !=null){
      window.open(securl,"_blank");
   }
   if (winner2 !=null && securl ==null) {
      window.open(winner2,"_blank");
      clixplit_clicks_update(winner2);
   }
   if (winner2 ==null && securl !=null) {
      window.open(securl,"_blank");
   } else if (winner2 ==null & securl ==null){

   }
  }
}

  function exit_pop() {
    var exit_cookie = document.cookie;
    var edate = new Date();
    edate.setTime(edate.getTime() + (1 * 60 * 1000));
    if (exit_cookie.includes("exitpop")) {

    }else {
    document.cookie = "exitpop=yes;expires="+edate.toUTCString();
    $('#dialogbox').css({"display":"block"});
    }
  }

  function exit_pop_click(exiturl) {
    window.open(exiturl,"_blank"); 
  }

   function exit_pop_click_yes() {
    $('#dialogbox').css({"display":"none"});
  }

  function mouseover (url) {
    var mouseover_cookie = document.cookie;
    var mdate = new Date();
    mdate.setTime(mdate.getTime() + (1 * 60 * 1000));
    if (mouseover_cookie.includes("mouseover")) {

    }else {
      document.cookie = "mouseover=yes;expires="+mdate.toUTCString();
      window.open(url,"_blank");
    }
  }