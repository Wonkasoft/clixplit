/*!
 * cliXplit v1.0.0 (http://wonkasoft.com)
 * Copyright 2016 Wonkasoft.com & EpicWin.
 */

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
          
        })
$(function() {
				
					$( document ).on('click', '.btn-add', function(e) {
						if ($('div', '.controls form').length <= 5) {
			         	e.preventDefault();
			         	$controlForm = $('.controls form:first'), $currentEntry = $(this).parents('.entry:first'), $newEntry = $($currentEntry.clone()).appendTo($controlForm);
			         	$newEntry.find('input').val('');
			         	$controlForm.find('.entry:not(:last) .btn-add').removeClass('btn-add').addClass('btn-remove').removeClass('btn-success').addClass('btn-danger').html('<span class="glyphicon glyphicon-minus"></span>');
				        } 
				        else {
				        	alert("6 imput fields is the max that you can make.");
				        }
			         }).on('click', '.btn-remove',function(e) {
			         	$(this).parents('.entry:first').remove();
			         	e.preventDefault();
			         	return false;
		         }) 
})