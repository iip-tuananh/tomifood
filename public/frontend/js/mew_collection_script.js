$('.open-filters').on('click', function(e){
	e.stopPropagation();
	$('.sidebar_mobi').toggleClass('openf');
	if ($('.sidebar_mobi').hasClass('openf')){
		$('#body_overlay').removeClass('d-none');
		colLeft.classList.remove("active");
		menuButton.classList.remove("active");
		$('body').addClass('modal-open');
	}else {
		$('#body_overlay').addClass('d-none');
		$('body').removeClass('modal-open');
	}
});
$('.view_mores').on('click', 'a', function() {
	if( $(this).hasClass('one') ){
		$(this).addClass('d-none');
		$('.view_mores .two').removeClass('d-none');
	} else {
		$(this).addClass('d-none');
		$('.view_mores .one').removeClass('d-none');
	}
	$('.content_coll').toggleClass('active');
	$('.bg_cl').toggleClass('d-none');
});