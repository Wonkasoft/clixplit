$(document).ready(function() {

  $(function set_cookie() {
    $.ajax({
      type:'POST',
      datatype: 'json',
      url:CLIXPLIT_AJAX.cliXplit_ajax + "ajax-getip.php",
      success: function($response) {
        var expiredate = new Date();
        expiredate.setDate(expiredate.getDate() + 45);
        document.cookie = "userip=" + $response + ";expires=" + expiredate.toUTCString();
      }
    });
  });
});