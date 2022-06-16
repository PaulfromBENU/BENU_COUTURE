$(function() {
	Livewire.on('articleLoaded', function() {
		$('.article-sidebar__img-container__scroller').css('opacity', Math.max(0, 1 - $('.article-sidebar__img-container').scrollTop() / 100));
		$('.article-sidebar__img-container').scroll(function() {
			$('.article-sidebar__img-container__scroller').css('opacity', Math.max(0, 1 - $(this).scrollTop() / 100));
		});
	});
	Livewire.on('sidebarChange', function() {
		$('.article-sidebar__img-container__scroller').css('opacity', Math.max(0, 1 - $('.article-sidebar__img-container').scrollTop() / 100));
	});
});