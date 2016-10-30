/*!
 * cliXplit v1.0.0 (http://wonkasoft.com)
 * Copyright 2016 Wonkasoft.com & EpicWin.
 */
 function fetch_data() {
 	$table_dir = $('[name="directory"]').val();
 	$data = $('[name="activepost"]').serialize();

   $.ajax({
    url: $table_dir,
    method: 'POST',
    datatype: 'text',
    data: $data,
    success: function($response) {
     if ($('#global-table').length) {
      $('#global-table').html($response);
    }
    if ($('#page-table').length) {
      $('#page-table').html($response);
    }
    $('#clixplit-check-all').delay(3000).attr('checked',false);
  }
});
 }

 $( document ).ready(function() {
 	fetch_data();
 	$('[name="add-campaign"]').click(function() {
 		$(".mymodal").css({"visibility": "inherit", "opacity": "1", "height": "inherit"});
 		$('#modal-form-campaigns').unbind().keypress(function (e) {
 			var key = e.which;
 			if(key == 13)
 			{
 				$('input[name = "global"]').click();
 				return false;  
 			}
 		});
 		$('[name="add-campaign"]').mouseleave(function(){
 			$('#keyword-input').focus();
 		});

 		$('[name="add-campaign"]').blur(function(){
 			$('#keyword-input').focus();
 		});
 	});


 	$(".clixplit-cancel-btn").click(function () {
 		$r = confirm("Are you sure you would like to cancel this campaign?\nYour changes will be lost if you leave this page.");
 		if ($r) {
 			$(".mymodal").css({"visibility":"hidden", "opacity": "0", "height": "0"});
 		}
 	});

 	
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
 	});

 	// Global Campaigns Editor
 	$post_value = $('#post-switch').text();
 	$('[name="post-value"]').val($post_value);
 	$page_value = $('#page-switch').text();
 	$('[name="page-value"]').val($page_value);

  $('[name="global"]').unbind().click(function () {
  	$(".mymodal").css({"visibility":"hidden", "opacity": "0", "height": "0"});
   $('#global-submission').text('Processing...').fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeIn(500);
   $form = $('#modal-form-campaigns');
   $url = $form.attr('action');
   $method = $form.attr('method');
   $data = $('#modal-form-campaigns').serialize();
   $data += "&globalopt=Y";
   console.log($data);
   $.ajax( {
   	url: $url,
    type: $method,
    data: $data,
    success: function($response) {
    	console.log($response);
     fetch_data();
     $form.trigger("reset");
     $('.clixplit-primary-switch-on').removeClass('clixplit-primary-switch-on').addClass('clixplit-primary-switch-off');
     $('.clixplit-primary-switch-off').find('.clixplit-primary-switch-center-on').removeClass('clixplit-primary-switch-center-on').addClass('clixplit-primary-switch-center-off');
     $('.clixplit-primary-switch-off').next('.clixplit-primary-switch-text-on').removeClass('clixplit-primary-switch-text-on').addClass('clixplit-primary-switch-text-off').text('off');
     $('.clixplit-primary-switch-off').parent('div').prev().find('.clixplit-primary-add').attr('disabled',true);
     $('#modal-primary-url-controls').find('.entry:not(:first)').remove();
     $('#modal-primary-url-controls').find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
     
     $('.clixplit-secondary-switch-on').removeClass('clixplit-secondary-switch-on').addClass('clixplit-secondary-switch-off');
     $('.clixplit-secondary-switch-off').find('.clixplit-secondary-switch-center-on').removeClass('clixplit-secondary-switch-center-on').addClass('clixplit-secondary-switch-center-off');
     $('.clixplit-secondary-switch-off').next('.clixplit-secondary-switch-text-on').removeClass('clixplit-secondary-switch-text-on').addClass('clixplit-secondary-switch-text-off').text('off');
     $('.clixplit-secondary-switch-off').parent('div').prev().find('.clixplit-secondary-add').attr('disabled',true);
     $('#modal-secondary-url-controls').find('.entry:not(:first)').remove();
     $('#modal-secondary-url-controls').find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
     $("#global-submission").text('Data submitted successfully').fadeToggle(500).fadeToggle(1000).fadeOut(700);
   }
 });
 });

  // cliXplit_meta_box styling
  $("#clixplit_meta_box > h2").css({"text-align":"center","background-color":"#f7f7f7"});

  
  //cliXplit_meta_box
  $('[name="clixplit-redirect-save"]').on('click', function () {
  	$('#submission').text('Processing...').fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeIn(500);
  	$redirect_exit = $('#exit-redirect-switch').next().next().text();
  	$('[name="exit-redirectopt"]').val($redirect_exit);
  	$mouseover_redirect_label = $('#mouseover-url-label').next().next().text();
  	$('[name="mouseover-redirectopt"]').val($mouseover_redirect_label);
  	$secondary_redirect_label = $('#secondary-url-label').next().next().text();
  	$('[name="secondary-redirectopt"]').val($secondary_redirect_label);
  	$form = $('#form-meta-box');
  	$url = $form.attr('action');
  	$method = $form.attr('method');
  	$data = $('#form-meta-box').serialize();
  	$.ajax( {
  		url: $url,
  		type: $method,
  		data: $data,
  		success: function($response) {  			
  			$('#submission').text('Data submitted successfully').fadeToggle(500).fadeOut(700);
  			$('.wp-editor-container textarea.wp-editor-area').append('<p>Hello, I am here</p>');
  		}
  	});
  	return false;
  });

  // cliXplit_meta_box modal form
  $('[name="clixplit-modal-save"]').click(function(){
  	$('#modal-submission').text('Processing...').fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeIn(500);
  });
  $('#modal-form-meta-box').on('submit', function () {
  	$form = $(this);
  	$url = $form.attr('action');
  	$method = $form.attr('method');
  	$data = $('#modal-form-meta-box').serialize();
  	$.ajax( {
  		url: $url,
  		type: $method,
  		data: $data,
  		success: function($response) {
  			fetch_data();
  			$form.trigger("reset");
  			$('#modal-submission').text('Data submitted successfully').fadeToggle(500).fadeOut(700);
  		}
  	});
  	return false;
  });
});

$(function() {
	$('.clixplit-switch-off').click(function(e) {
		$switchID = $(this).prev().attr('id');
		if ($(this).hasClass('clixplit-switch-off')) {
			$(this).removeClass('clixplit-switch-off').addClass('clixplit-switch-on');
			$(this).find('.clixplit-switch-center-off').removeClass('clixplit-switch-center-off').addClass('clixplit-switch-center-on');
			$(this).next('.clixplit-switch-text-off').removeClass('clixplit-switch-text-off').addClass('clixplit-switch-text-on').text('on');
			if ($switchID == 'posts-switch') {
				$post_value = $('#post-switch').text();
				$('[name="post-value"]').val($post_value);
			}
			if ($switchID == 'pages-switch') {
				$page_value = $('#page-switch').text();
				$('[name="page-value"]').val($page_value);
			}
			if ($switchID == 'exit-redirect-switch') {
				$redirect_exit = $('#exit-redirect-switch').next().next().text();
				$('[name="exit-redirectopt"]').val($redirect_exit);
				$(this).parent().parent().find('input[name="exit-pop"]').attr('disabled', false);
				$(this).parent().parent().find('textarea[name="exit-message"]').attr('disabled', false);
			}
			if ($switchID == 'mouseover-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', false);
				$mouseover_redirect_label = $('#mouseover-url-label').next().next().text();
				$('[name="mouseover-redirectopt"]').val($mouseover_redirect_label);
			}
			if ($switchID == 'secondary-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', false);
				$secondary_redirect_label = $('#secondary-url-label').next().next().text();
				$('[name="secondary-redirectopt"]').val($secondary_redirect_label);
			}
		}
		else {
			$(this).removeClass('clixplit-switch-on').addClass('clixplit-switch-off');
			$(this).find('.clixplit-switch-center-on').removeClass('clixplit-switch-center-on').addClass('clixplit-switch-center-off');
			$(this).next('.clixplit-switch-text-on').removeClass('clixplit-switch-text-on').addClass('clixplit-switch-text-off').text('off');
			if ($switchID == 'posts-switch') {
				$post_value = $('#post-switch').text();
				$('[name="post-value"]').val($post_value);
			}
			if ($switchID == 'pages-switch') {
				$page_value = $('#page-switch').text();
				$('[name="page-value"]').val($page_value);
			}
			if ($switchID == 'exit-redirect-switch') {
				$redirect_exit = $('#exit-redirect-switch').next().next().text();
				$('[name="exit-redirectopt"]').val($redirect_exit);
				$(this).parent().parent().find('input[name="exit-pop"]').attr('disabled', true);
				$(this).parent().parent().find('textarea[name="exit-message"]').attr('disabled', true);
			}
			if ($switchID == 'mouseover-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', true);
				$mouseover_redirect_label = $('#mouseover-url-label').next().next().text();
				$('[name="mouseover-redirectopt"]').val($mouseover_redirect_label);
			}
			if ($switchID == 'secondary-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', true);
				$secondary_redirect_label = $('#secondary-url-label').next().next().text();
				$('[name="secondary-redirectopt"]').val($secondary_redirect_label);
			}
		}
	});
	$('.clixplit-switch-on').click(function(e) {
		$switchID = $(this).prev().attr('id');
		if ($(this).hasClass('clixplit-switch-on')) {
			$(this).removeClass('clixplit-switch-on').addClass('clixplit-switch-off');
			$(this).find('.clixplit-switch-center-on').removeClass('clixplit-switch-center-on').addClass('clixplit-switch-center-off');
			$(this).next('.clixplit-switch-text-on').removeClass('clixplit-switch-text-on').addClass('clixplit-switch-text-off').text('off');
			if ($switchID == 'posts-switch') {
				$post_value = $('#post-switch').text();
				$('[name="post-value"]').val($post_value);
			}
			if ($switchID == 'pages-switch') {
				$page_value = $('#page-switch').text();
				$('[name="page-value"]').val($page_value);
			}
			if ($switchID == 'exit-redirect-switch') {
				$redirect_exit = $('#exit-redirect-switch').next().next().text();
				$('[name="exit-redirectopt"]').val($redirect_exit);
				$(this).parent().parent().find('input[name="exit-pop"]').attr('disabled', true);
				$(this).parent().parent().find('textarea[name="exit-message"]').attr('disabled', true);

			}
			if ($switchID == 'mouseover-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', true);
				$mouseover_redirect_label = $('#mouseover-url-label').next().next().text();
				$('[name="mouseover-redirectopt"]').val($mouseover_redirect_label);
			}
			if ($switchID == 'secondary-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', true);
				$secondary_redirect_label = $('#secondary-url-label').next().next().text();
				$('[name="secondary-redirectopt"]').val($secondary_redirect_label);
			}
		}
		else {
			$(this).removeClass('clixplit-switch-off').addClass('clixplit-switch-on');
			$(this).find('.clixplit-switch-center-off').removeClass('clixplit-switch-center-off').addClass('clixplit-switch-center-on');
			$(this).next('.clixplit-switch-text-off').removeClass('clixplit-switch-text-off').addClass('clixplit-switch-text-on').text('on');
			if ($switchID == 'posts-switch') {
				$post_value = $('#post-switch').text();
				$('[name="post-value"]').val($post_value);
			}
			if ($switchID == 'pages-switch') {
				$page_value = $('#page-switch').text();
				$('[name="page-value"]').val($page_value);
			}
			if ($switchID == 'exit-redirect-switch') {
				$redirect_exit = $('#exit-redirect-switch').next().next().text();
				$('[name="exit-redirectopt"]').val($redirect_exit);
				$(this).parent().parent().find('input[name="exit-pop"]').attr('disabled', false);
				$(this).parent().parent().find('textarea[name="exit-message"]').attr('disabled', false);
			}
			if ($switchID == 'mouseover-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', false);
				$mouseover_redirect_label = $('#mouseover-url-label').next().next().text();
				$('[name="mouseover-redirectopt"]').val($mouseover_redirect_label);
			}
			if ($switchID == 'secondary-url-label') {
				$(this).parent().parent().find('.entry input').attr('disabled', false);
				$secondary_redirect_label = $('#secondary-url-label').next().next().text();
				$('[name="secondary-redirectopt"]').val($secondary_redirect_label);
			}
		}
	});
  // Link rotation switches Primary
  $('.clixplit-primary-switch-off').click(function(e) {
  	$controlid = $('#' + $(this).parent('div').parent('div').attr('id'));
  	$switchID = $controlid.find('label:first').next().next().text();
  	if (($switchID == '') || ($switchID == 'on')) {
  		if ($(this).hasClass('clixplit-primary-switch-off')) {
  			$(this).removeClass('clixplit-primary-switch-off').addClass('clixplit-primary-switch-on');
  			$(this).find('.clixplit-primary-switch-center-off').removeClass('clixplit-primary-switch-center-off').addClass('clixplit-primary-switch-center-on');
  			$(this).next('.clixplit-primary-switch-text-off').removeClass('clixplit-primary-switch-text-off').addClass('clixplit-primary-switch-text-on').text('on');
  			$(this).parent('div').prev().find('.clixplit-primary-add').attr('disabled',false);
  		}
  		else {
  			var primarylinkopt = confirm("Are you sure you would like to disable link rotation?\nYour additional urls will be lost if you disable this option.");
  			if (primarylinkopt) {
  				$(this).removeClass('clixplit-primary-switch-on').addClass('clixplit-primary-switch-off');
  				$(this).find('.clixplit-primary-switch-center-on').removeClass('clixplit-primary-switch-center-on').addClass('clixplit-primary-switch-center-off');
  				$(this).next('.clixplit-primary-switch-text-on').removeClass('clixplit-primary-switch-text-on').addClass('clixplit-primary-switch-text-off').text('off');
  				$(this).parent('div').prev().find('.clixplit-primary-add').attr('disabled',true);
  				$controlid.find('.entry:not(:first)').remove();
  				$controlid.find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
  			}
  		}
  	}
  });

  $('.clixplit-primary-switch-on').click(function(e) {
  	$controlid = $('#' + $(this).parent('div').parent('div').attr('id'));
  	$switchID = $controlid.find('label:first').next().next().text();
  	if (($switchID == '') || ($switchID == 'on')) {
  		var primarylinkopt = confirm("Are you sure you would like to disable link rotation?\nYour additional urls will be lost if you disable this option.");
  		if (primarylinkopt) {
  			if ($(this).hasClass('clixplit-primary-switch-on')) {
  				$(this).removeClass('clixplit-primary-switch-on').addClass('clixplit-primary-switch-off');
  				$(this).find('.clixplit-primary-switch-center-on').removeClass('clixplit-primary-switch-center-on').addClass('clixplit-primary-switch-center-off');
  				$(this).next('.clixplit-primary-switch-text-on').removeClass('clixplit-primary-switch-text-on').addClass('clixplit-primary-switch-text-off').text('off');
  				$(this).parent('div').prev().find('.clixplit-primary-add').attr('disabled',false);
  			}
  		}
  		else {
  			$(this).removeClass('clixplit-primary-switch-off').addClass('clixplit-primary-switch-on');
  			$(this).find('.clixplit-primary-switch-center-off').removeClass('clixplit-primary-switch-center-off').addClass('clixplit-primary-switch-center-on');
  			$(this).next('.clixplit-primary-switch-text-off').removeClass('clixplit-primary-switch-text-off').addClass('clixplit-primary-switch-text-on').text('on');
  			$(this).parent('div').prev().find('.clixplit-primary-add').attr('disabled',true);
  			$controlid.find('.entry:not(:first)').remove();
  			$controlid.find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
  		}
  	}
  });

 	// Link rotation switches Secondary
 	$('.clixplit-secondary-switch-off').click(function(e) {
 		$controlid = $('#' + $(this).parent('div').parent('div').attr('id'));
 		$switchID = $controlid.find('label:first').next().next().text();
 		if (($switchID == '') || ($switchID == 'on')) {
 			if ($(this).hasClass('clixplit-secondary-switch-off')) {
 				$(this).removeClass('clixplit-secondary-switch-off').addClass('clixplit-secondary-switch-on');
 				$(this).find('.clixplit-secondary-switch-center-off').removeClass('clixplit-secondary-switch-center-off').addClass('clixplit-secondary-switch-center-on');
 				$(this).next('.clixplit-secondary-switch-text-off').removeClass('clixplit-secondary-switch-text-off').addClass('clixplit-secondary-switch-text-on').text('on');
 				$(this).parent('div').prev().find('.clixplit-secondary-add').attr('disabled',false);
 			}
 			else {
 				var secondarylinkopt = confirm("Are you sure you would like to disable link rotation?\nYour additional urls will be lost if you disable this option.");
 				if (secondarylinkopt) {
 					$(this).removeClass('clixplit-secondary-switch-on').addClass('clixplit-secondary-switch-off');
 					$(this).find('.clixplit-secondary-switch-center-on').removeClass('clixplit-secondary-switch-center-on').addClass('clixplit-secondary-switch-center-off');
 					$(this).next('.clixplit-secondary-switch-text-on').removeClass('clixplit-secondary-switch-text-on').addClass('clixplit-secondary-switch-text-off').text('off');
 					$(this).parent('div').prev().find('.clixplit-secondary-add').attr('disabled',true);
 					$controlid.find('.entry:not(:first)').remove();
 					$controlid.find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
 				}
 			}
 		}
 	});

 	$('.clixplit-secondary-switch-on').click(function(e) {
 		$controlid = $('#' + $(this).parent('div').parent('div').attr('id'));
 		$switchID = $controlid.find('label:first').next().next().text();
 		if (($switchID == '') || ($switchID == 'on')) {
 			var secondarylinkopt = confirm("Are you sure you would like to disable link rotation?\nYour additional urls will be lost if you disable this option.");
 			if (secondarylinkopt) {
 				if ($(this).hasClass('clixplit-secondary-switch-on')) {
 					$(this).removeClass('clixplit-secondary-switch-on').addClass('clixplit-secondary-switch-off');
 					$(this).find('.clixplit-secondary-switch-center-on').removeClass('clixplit-secondary-switch-center-on').addClass('clixplit-secondary-switch-center-off');
 					$(this).next('.clixplit-secondary-switch-text-on').removeClass('clixplit-secondary-switch-text-on').addClass('clixplit-secondary-switch-text-off').text('off');
 					$(this).parent('div').prev().find('.clixplit-secondary-add').attr('disabled',false);
 				}
 			}
 			else {
 				$(this).removeClass('clixplit-secondary-switch-off').addClass('clixplit-secondary-switch-on');
 				$(this).find('.clixplit-secondary-switch-center-off').removeClass('clixplit-secondary-switch-center-off').addClass('clixplit-secondary-switch-center-on');
 				$(this).next('.clixplit-secondary-switch-text-off').removeClass('clixplit-secondary-switch-text-off').addClass('clixplit-secondary-switch-text-on').text('on');
 				$(this).parent('div').prev().find('.clixplit-secondary-add').attr('disabled',true);
 				$controlid.find('.entry:not(:first)').remove();
 				$controlid.find('.entry .btn-remove').removeClass('btn-remove').addClass('btn-add').html('<span class="glyphicon glyphicon-plus"></span>');
 			}
 		}
 	});

 	// Global table checkboxes
 	$('#clixplit-check-all').change(function() {
 		if($(this).prop('checked')){
 			$('tbody tr td input[type="checkbox"]').each(function(){
 				$(this).prop('checked', true);
 			});
 		}
 		else {
 			$('tbody tr td input[type="checkbox"]').each(function(){
 				$(this).prop('checked', false);
 			});
 		}
 	});
  
  $('[name="end-campaign"]').click(function() {
    $('#global-submission').text('Processing...').fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeToggle(500).fadeIn(500);
    $checked_keywords = [];
    $('tbody tr td input[type="checkbox"]:checked').each(function(){
      $checked_keywords.push(this.name); 
    });
    $.ajax( {
      url: "../wp-content/plugins/clixplit/ajax/ajax-form.php",
      datatype: 'text',
      type: 'POST',
      data: {
        "enddata": $checked_keywords
      },
      success: function($response) {
        fetch_data();
        $('#global-submission').text('Data removed successfully').fadeToggle(500).fadeToggle(1000).fadeOut(700);
      }
    });
  });
});
