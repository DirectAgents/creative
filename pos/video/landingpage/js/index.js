$("a[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
	$(".hamburger").removeClass("is-active");
    $(".nav--mobile").removeClass("is-active");
    $(".page-template").removeClass("u-prevent-scroll");
    $(".page-template").removeClass("has-nav");
});