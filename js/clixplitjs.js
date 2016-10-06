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
 		var r = confirm("Are you sure you would like to cancel this campaign?\nYour changes will be lost if you leave this page.");
 		if (r == true) {
 			$(".mymodal").css({"visibility":"hidden", "opacity": "0", "height": "0"});
 		}
 	})
 	$(".clixplit-save-btn").click(function () {
 		$(".mymodal").css({"visibility":"hidden", "opacity": "0", "height": "0"});
 	})
 	
 	$(document).on('click', '.btn-add', function(e) {
 		e.preventDefault();
 		$controlsSelect = $(this).parents('.controls').attr('id');
 		$controlsSelect = $('#' + $controlsSelect);
 		$controlsClone = $(this).parents('.entry:first');
 		$newInput = $controlsClone.clone().appendTo($controlsSelect);
 		$newInput.find('input').val('');
 		$controlsSelect.find('.entry:not(:last) .btn-add').removeClass('btn-add').addClass('btn-remove').html('<span class="glyphicon glyphicon-minus"></span>');
 	}).on('click', '.btn-remove', function(e) {
 		$(this).parents('.entry:first').remove();
 		e.preventDefault();
 		return false;
 	})

  // clixplit_meta_box styling
  $("#clixplit_meta_box > h2").css({"text-align":"center","background-color":"#f7f7f7"});

  alert($('#mouseover-url-label').next().next().text());
  $mouseoverSwitch = $($('#mouseover-url-label').next().next());
  $mouseoverSwitch.change(function () {
  	alert($('#mouseover-url-label').next().next().text());
  })
 })
 $(function() {
 	$('.clixplit-primary-switch-off').click(function(e) {
 		$controlid = $('#' + $(this).parent('div').prev().attr('id'));
 		if ($(this).hasClass('clixplit-primary-switch-off')) {
 			$(this).removeClass('clixplit-primary-switch-off').addClass('clixplit-primary-switch-on');
 			$(this).find('.clixplit-primary-switch-center-off').removeClass('clixplit-primary-switch-center-off').addClass('clixplit-primary-switch-center-on');
 			$(this).next('.clixplit-primary-switch-text-off').removeClass('clixplit-primary-switch-text-off').addClass('clixplit-primary-switch-text-on').text('on');
 			$(this).parent('div').prev().find('.clixplit-primary-add').attr('disabled',false);
 			
 		}
 		else {
 			var primarylinkopt = confirm("Are you sure you would like to disable link rotation?\nYour additional urls will be lost if you disable this option.");
 			if (primarylinkopt == true) {
 				$(this).removeClass('clixplit-primary-switch-on').addClass('clixplit-primary-switch-off');
 				$(this).find('.clixplit-primary-switch-center-on').removeClass('clixplit-primary-switch-center-on').addClass('clixplit-primary-switch-center-off');
 				$(this).next('.clixplit-primary-switch-text-on').removeClass('clixplit-primary-switch-text-on').addClass('clixplit-primary-switch-text-off').text('off');
 				$(this).parent('div').prev().find('.clixplit-primary-add').attr('disabled',true);
 				$controlid.find('.entry:not(:first)').remove();
 				$controlid.find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
 			}

 		}
 	})
 	$('.clixplit-secondary-switch-off').click(function(e) {
 		$controlid = $('#' + $(this).parents('div').prev().attr('id'));
 		if ($(this).hasClass('clixplit-secondary-switch-off')) {
 			$(this).removeClass('clixplit-secondary-switch-off').addClass('clixplit-secondary-switch-on');
 			$(this).find('.clixplit-secondary-switch-center-off').removeClass('clixplit-secondary-switch-center-off').addClass('clixplit-secondary-switch-center-on');
 			$(this).next('.clixplit-secondary-switch-text-off').removeClass('clixplit-secondary-switch-text-off').addClass('clixplit-secondary-switch-text-on').text('on');
 			$(this).parent('div').prev().find('.clixplit-secondary-add').attr('disabled',false);
 		}
 		else {
 			var secondarylinkopt = confirm("Are you sure you would like to disable link rotation?\nYour additional urls will be lost if you disable this option.");
 			if (secondarylinkopt == true) {
 				$(this).removeClass('clixplit-secondary-switch-on').addClass('clixplit-secondary-switch-off');
 				$(this).find('.clixplit-secondary-switch-center-on').removeClass('clixplit-secondary-switch-center-on').addClass('clixplit-secondary-switch-center-off');
 				$(this).next('.clixplit-secondary-switch-text-on').removeClass('clixplit-secondary-switch-text-on').addClass('clixplit-secondary-switch-text-off').text('off');
 				$(this).parent('div').prev().find('.clixplit-secondary-add').attr('disabled',true);
 				$controlid.find('.entry:not(:first)').remove();
 				$controlid.find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
 			}
 		}
 	})
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
