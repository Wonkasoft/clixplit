/*!
 * cliXplit v1.0.0 (http://wonkasoft.com)
 * Copyright 2016 Wonkasoft.com & EpicWin.
 */

 $("#toplevel_page_clixplit-clixplit-home a.wp-first-item").html("Home");

 $( document ).ready(function() {
 	$("a.nav-campaign-buttons").click(function() {
 		$(".mymodal").css({"visibility": "inherit", "opacity": "1", "height": "inherit"});
 	})
 	$(".clixplit-cancel-btn").click(function () {
 		var r = confirm("Are you sure you would like to cancel this campaign?\nYour changes will not be saved.");
 		if (r == true) {
 			$(".mymodal").css({"visibility":"hidden", "opacity": "0", "height": "0"});
 		}
 	})
 	
 	$(document).on('click', '.btn-add', function(e) {
		e.preventDefault();
 		$maxInputs = 5;
 		$controlsSelect = $(this).parents('.controls').attr('id');
 		if ($('div', $(this).parents('.controls:first')).length < $maxInputs) {
	 		$controlsSelect = $('#' + $controlsSelect);
	 		$controlsClone = $(this).parents('.entry:first');
 			$newInput = $controlsClone.clone().appendTo($controlsSelect);
 			$newInput.find('input').val('');
 			$controlsSelect.find('.entry:not(:last) .btn-add').removeClass('btn-add').addClass('btn-remove').removeClass('btn-success').addClass('btn-danger').html('<span class="glyphicon glyphicon-minus"></span>');
 		}
 		else {
 			alert("5 imput fields is the max that you can make.");
 		}
 	}).on('click', '.btn-remove', function(e) {
 		$(this).parents('.entry:first').remove();
 		e.preventDefault();
 		return false;
 	})

 })
 $(function() {
 	$('.clixplit-switch-off').click(function(e) {
 		if ($(this).hasClass('clixplit-switch-off')) {
 			$(this).removeClass('clixplit-switch-off').addClass('clixplit-switch-on');
 			$(this).find('.clixplit-switch-center-off').removeClass('clixplit-switch-center-off').addClass('clixplit-switch-center-on');
 			$(this).next('.clixplit-switch-text-off').removeClass('clixplit-switch-text-off').addClass('clixplit-switch-text-on').text('on');
 			
 		}
 		else {
 			$(this).removeClass('clixplit-switch-on').addClass('clixplit-switch-off');
 			$(this).find('.clixplit-switch-center-on').removeClass('clixplit-switch-center-on').addClass('clixplit-switch-center-off');
 			$(this).next('.clixplit-switch-text-on').removeClass('clixplit-switch-text-on').addClass('clixplit-switch-text-off').text('off');
 		}
 	})
 	$('#clixplit-check-all').change(function(){
 		if($(this).prop('checked')){
 			$('tbody tr td input[type="checkbox"]').each(function(){
 				$(this).prop('checked', true);
 			})
 		}else{
 			$('tbody tr td input[type="checkbox"]').each(function(){
 				$(this).prop('checked', false);
 			})
 		}
 	})
 })
