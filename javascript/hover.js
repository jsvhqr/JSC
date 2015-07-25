/**
 * 
 */

$(document).ready(function(){
	$('#register').on('mouseover', function () {
		$('#registerForm', this).show();
	}).on('mouseout', function (e) {
		if (!$(e.target).is('input')) {
			$('#registerForm', this).hide();
		}
	});
	
	$('#login').on('mouseover', function () {
		$('#loginForm', this).show();
	}).on('mouseout', function (e) {
		if (!$(e.target).is('input')) {
			$('#loginForm', this).hide();
		}
	});
	
	
});
