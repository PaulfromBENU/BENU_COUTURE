$(function() {
	$('.article-sidebar').hide();
	Livewire.on('displayArticle', article_id => {
		$('.modal-opacifier').fadeIn();
		$('#general-side-modal').fadeIn(500, function() {
			Livewire.emit('ArticleModalReady', article_id);
		});
		$('#general-side-modal').css('right', '0');
	});

	Livewire.on('articleLoaded', function() {
		$('.article-sidebar').hide();
		$('.article-sidebar').fadeIn();
	});

	$('.modal-opacifier').on('click', function() {
		$('#general-side-modal').css('right', '-60vw');
		$('#general-side-modal').fadeOut(400, function() {
			$('.article-sidebar').hide();
		});
		Livewire.emit('ArticleModalReady', 0);
	});

	Livewire.on('closeSideBar', function() {
		$('.modal-opacifier').fadeOut();
		$('#general-side-modal').css('right', '-60vw');
		$('#general-side-modal').fadeOut(400, function() {
			$('.article-sidebar').hide();
		});
		Livewire.emit('ArticleModalReady', 0);
	});
});