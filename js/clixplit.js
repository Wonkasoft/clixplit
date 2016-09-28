$("#toplevel_page_clixplit-clixplit-home a.wp-first-item").html("Home");


$( document ).ready(function() {
  $("a.nav-campaign-buttons").click(function() {
    $(".mymodal").css({"visibility": "inherit", "opacity": "1"});
  })
$(".btn-default").click(function () {
    var r = confirm("Are you sure you would like to cancel this campaign?\nYour changes will not be saved.");
    if (r == true) {
      $(".mymodal").css({"visibility":"hidden", "opacity": "0"});
    }
  })

  $('#clixplit_meta_box>h2').css({'text-align':'center'});
})
