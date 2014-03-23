$(function() {
	
	// Toggle the FAQ
	$('.faq-title a').click(function() {
		
		$(this).find('span').toggle();
		$(this).parent().next().slideToggle();
		return false;
	
	});
});