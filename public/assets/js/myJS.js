$(document).ready(function(){
	var leftNav = 0;
	var titleName = $('.top_nav_mnu_center').text();
	$('.left-nav-open').on('click',function(){
		if (leftNav == 0) {
			leftNav++;
			$('html,body').css('overflow','hidden');
			$('.left-nav').animate({
				left: '0%'
			});
			$('.container-fluid').animate({
				left: '50%'
			});
			$('#registerModal,#loginModal').animate({
				left: '48.5%'
			});
			$('.col-md-6.col-xs-5.profile_col').hide();
			$('.cart').hide();
		} else {
			leftNav--;
			$('html,body').css('overflow','auto');
			$('.left-nav').animate({
				left: '-50%'
			});
			$('.container-fluid').animate({
				left: '0%'
			});
			$('#registerModal,#loginModal').animate({
				left: '0%'
			});
			$('.col-md-6.col-xs-5.profile_col').show();
			$('.cart').show();
		}
	});
	$('#button-register').on('click',function(){
		$('.top_nav_mnu_center').html('Dating | Register');
	});
	$('#button-login').on('click',function(){
		$('.top_nav_mnu_center').html('Dating | Login');
	});
	$('button.close').on('click',function(){
		$('.top_nav_mnu_center').text(titleName);
	});

});