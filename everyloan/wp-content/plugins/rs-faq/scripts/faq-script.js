$(function() {
	
	// Toggle the FAQ
	var $last_open = false;

	$('.faq-title a').click(function() {
		
		var $this = $(this),
			$parent = $this.parent();
		
		// Hide any other questions that are open, so only one question is visible at a time
		if ($last_open && $last_open.parent().parent().attr('id') != $parent.parent().attr('id'))
			$last_open.parent().next().slideToggle();
		

		$this.find('span').toggle();
		$parent.next().slideToggle();
		$last_open = $this;

		return false;
	
	});
});