$(function() {
	var login_form = $('.kt-login__signin'),
		register_form = $('.kt-login__signup'),
		forgot_form = $('.kt-login__forgot');

	$('.kt_login_singin').click(function() {
		login_form.fadeIn();
		register_form.hide(); forgot_form.hide();
	})

	$('.kt_login_forgot').click(function() {
		forgot_form.fadeIn();
		login_form.hide(); register_form.hide();
	})

	$('#kt_login_signin_submit').click(function() {
		var username = $('.signin-username').val().trim(),
			password = $('.signin-password').val().trim();

		$('.alert').hide();
		c.ajax('account', 'signin', {
			username: username,
			password: password
		}, function(data) {
			if (data.error) {
				c.alert('.alert-error-signin', data.error);
			} else {
				c.alert('.alert-success-signin', data.success);
				setTimeout(function() { window.location = data.rd }, 1000)
			}
		})
	})
})