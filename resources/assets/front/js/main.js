jQuery(document).ready(function ($) {
	$('.main-slides').slick({
		dots: true,
		prevArrow: $('.main-arrow__left'),
		nextArrow: $('.main-arrow__right')
	});

	// Выпадающие меню

	$('#menu-click').click(function () {
		$('.overlay').show();
		$('.header-menus').css('transform', 'translate(0, 0)');
	})

	$('.menu-close').click(function () {
		$('.overlay').hide();
		$('.header-menus').css('transform', 'translate(-420px, 0)')
	})

	//Всплывающие окно - звонок

	$('.header-call__back').click(function () {
		$('.overlay').show();
		$('.call-form').show();
	})

	$('.call-form__close').click(function () {
		$('.overlay').hide();
		$('.call-form').hide();
	})


	$(document).mouseup(function (e) {
		var modal = $('.header-menus');
		var phone = $('.call-form');
		var filter = $('.category-filter');
		var overlay = $('.overlay');
		if (overlay.is(':visible')) {
			if (!modal.is(e.target) && modal.has(e.target).length === 0 && !phone.is(e.target) && phone.has(e.target).length === 0 && !filter.is(e.target) && filter.has(e.target).length === 0) {
				modal.css('transform', 'translate(-460px, 0)');
				filter.css('transform', 'translate(-380px, 0)');
				phone.hide();
				overlay.hide();
			}
		}
	});

	// Действия с поиском - шапка

	$('.button-search').click(function () {
		if ($('.header-search').is(':hidden')) {
			$('.header-search').show(300);
		} else {
			$('.header-search').hide(300);
		}
	});

	// Табы

	(function ($) {
		$(function () {

			$('ul.tabs__caption').on('click', 'li:not(.active)', function () {
				$(this)
					.addClass('active').siblings().removeClass('active')
					.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
			});

		});
	})(jQuery);

	// Моб - фильтер

	$('.filter-mob').click(function () {
		$('.overlay').show();
		$('.category-filter').css('transform', 'translate(0, 0)');
	})

	$('.category-filter__close').click(function () {
		$('.overlay').hide();
		$('.category-filter').css('transform', 'translate(-380px, 0)');
	})
});