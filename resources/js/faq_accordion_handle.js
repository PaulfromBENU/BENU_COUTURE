$(function() {
	$('.faq__accordion__header').on('click', function() {
		$('.faq__accordion__header__chevron').removeClass('.faq__accordion__header__chevron--active');
		$('.faq__accordion__header__chevron', this).addClass('.faq__accordion__header__chevron--active');
		let status = $(this).parent().children('.faq__accordion__answer').css('display');
		$('.faq__accordion__answer').hide();
		if (status == 'none') {
			$(this).parent().children('.faq__accordion__answer').fadeIn('slow');
		}
	});

	$('.faq__accordion__answer__header').on('click', function() {
		$('.faq__accordion__answer__header').removeClass('faq__accordion__answer__header--active');
		$(this).addClass('faq__accordion__answer__header--active');

		let answerStatus = $(this).parent().children('.faq__accordion__answer__subanswer').css('display');

		$('.faq__accordion__answer__subanswer').hide();
		if (answerStatus == 'none') {
			$('.faq__accordion__answer__header__minus').hide();
			$('.faq__accordion__answer__header__plus').show();
			$('.faq__accordion__answer__header__plus', this).hide();
			$('.faq__accordion__answer__header__minus', this).show();
			$(this).parent().children('.faq__accordion__answer__subanswer').show();
		} else {
			$(this).removeClass('faq__accordion__answer__header--active');
			$('.faq__accordion__answer__header__plus').show();
			$('.faq__accordion__answer__header__minus').hide();
		}
	});
});