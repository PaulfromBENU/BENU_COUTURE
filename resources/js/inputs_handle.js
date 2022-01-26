$(function() {
	let labelColorSearch = $('.search-modal label').css('color');

	// On page load, reduce labels size if input is not empty
	if ($('.connect-modal input[type=password]').val() != '') {
		$(".connect-modal label[for='" + $('.connect-modal input[type=password]').attr('id') + "']").css('top', '-10px').css('transform', 'scale(0.75)').css('color', 'grey');
	}
	if ($('.connect-modal input[type=text]').val() != '') {
		$(".connect-modal label[for='" + $('.connect-modal input[type=text]').attr('id') + "']").css('top', '-10px').css('transform', 'scale(0.75)').css('color', 'grey');
	}
	if ($('.search-modal input[type=text]').val() != '') {
		$('.search-modal label').css('top', '60px').css('transform', 'scale(1)').css('color', labelColorSearch);
	}

	// Handle search label behaviour depending on input status
	$('.search-modal input[type=text]').on('focus', function() {
		$('.search-modal label').css('top', '30px').css('transform', 'scale(0.75)').css('color', 'grey');
	})
	$('.search-modal input[type=text]').on('blur', function() {
		if ($(this).val() == '') {
			$('.search-modal label').css('top', '60px').css('transform', 'scale(1)').css('color', labelColorSearch);
		}
	});

	// Handle connect label behaviour depending on input status
	$('.connect-modal input[type=text]').on('focus', function() {
		$(".connect-modal label[for='" + $(this).attr('id') + "']").css('top', '-10px').css('transform', 'scale(0.75)').css('color', 'grey');
	})
	$('.connect-modal input[type=text]').on('blur', function() {
		if ($(this).val() == '' && $('.connect-modal input[type=password]').val() == '') {
			$(".connect-modal label").css('top', '3px').css('transform', 'scale(1)').css('color', labelColorSearch);
		}
	});

	$('.connect-modal input[type=password]').on('focus', function() {
		$(".connect-modal label[for='" + $(this).attr('id') + "']").css('top', '-10px').css('transform', 'scale(0.75)').css('color', 'grey');
	})
	$('.connect-modal input[type=password]').on('change', function() {
		$(".connect-modal label[for='" + $(this).attr('id') + "']").css('top', '-10px').css('transform', 'scale(0.75)').css('color', 'grey');
	})
	$('.connect-modal input[type=password]').on('blur', function() {
		if ($(this).val() == '') {
			$(".connect-modal label[for='" + $(this).attr('id') + "']").css('top', '3px').css('transform', 'scale(1)').css('color', labelColorSearch);
		}
	});

});