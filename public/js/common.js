$(document).ready(function(){
    $('.modal').hide();
    $('.modal-btn').click(function(){
        if  ($('.modal').is(':visible')) {
            $('.modal').hide();
        } else {
            $('.modal').show();
        }
    });
    $('.close-modal').click(function(){
        $('.modal').hide();
    });
    $('.slider').slick({
        autoplay: true,
        autoplaySpeed: 2500,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        dots: true,
        arrows: false,
        responsive: true
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        arrows: true,
        dots: false,
        focusOnSelect: true,
        infinite: false,
        centerMode: false,
        variableWidth: true,
        responsive: true
    });
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
        infinite: false,
        responsive: true,
        dots: false
    });
    $('.phones').click(function(){
        $(this).toggleClass('phones-vis');
    });
    $('a[href^="#"]').bind('click.smoothscroll',function (e) {
		 e.preventDefault();

		var target = this.hash,
		 $target = $(target);

		$('html, body').stop().animate({
		 'scrollTop': $target.offset().top
        }, 800, 'swing', function () {
		 window.location.hash = target;
		 });
	 });
     $('.fancy').fancybox({wrapCSS: 'fancybox-1'})
});
