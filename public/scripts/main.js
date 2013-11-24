$(document).ready(function(){

	$('#clearStorage').tooltip('show');

	$('.main-nav li').click(function(e){
		$('.main-nav li').removeClass('active');
	});

	$('#site_login_submit').click(function(e){
		e.preventDefault();
		$('#login_form').submit();
	});
});
