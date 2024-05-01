<!DOCTYPE html>
<html lang="en" class="no-js">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>@yield('title')</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/css/style-metronic.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/css/style-responsive.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{asset('public/assets/css/pages/login-soft.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('public/assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<!--<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/img/favicon.ico')}}"/>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/plugins/select2/select2-metronic.css')}}"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
.has-error .help-inline, .has-error .help-block, .has-error .control-label {
    color: #f00;
}
	.btn.blue:hover, .btn.blue:focus, .btn.blue:active, .btn.blue.active, .btn.blue[disabled], .btn.blue.disabled {
    background-color: #F5AE6C !important;
    color: #fff !important;
    outline: none !important;
}
</style>
</head>
<div id="alert-wrapper"></div>
<body class="login">
<div class="logo" style="margin-top: 20px;"> <a href=""> <img src="{{asset('public/assets/img/logo.png')}}" alt="pic" width="240"/> </a> </div>
@yield('content')
<div class="copyright"> © Copyright .  All Rights Reserved. </div>
<div class="copyright"> <a href="https://zoptal.com/" style="color:#fff; font-weight:400" target="_blank">Developed By <em>Zoptal Solutions Pvt Ltd </em> </a></div>
<script src="{{asset('public/assets/plugins/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/jquery.blockui.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/jquery.cokie.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/uniform/jquery.uniform.min.js')}}"></script>
<script src="{{asset('public/assets/scripts/core/app.js')}}"></script>
<script src="{{asset('public/assets/scripts/custom/login-soft.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
	<script>
$(document).ready(function(){
	/*$('#login_button').click(function(){
		$('#login_button').attr('disabled','disabled');
		$('#login_button').addClass('disabled');
	});*/
	function login_check(){
		console.log('workinng now')
	}
});
$('#login_form').submit(function(event){
	event.preventDefault();
	$('#login_button').attr('disabled','disabled');
	$('#login_button').addClass('disabled');
	var username = $('input[name=username]').val();
	var password = $('input[name=password]').val();
	if(username.trim() == '' || password.trim() == ''){
		/*$.simplyToast('success','This is a success message!');*/
		Toastify({
			text: "All fields are required",
			className:"danger",
			duration: 5000,
			destination: "",
			newWindow: true,
			close: true,
			gravity: "top", // `top` or `bottom`
			position: "right", // `left`, `center` or `right`
			stopOnFocus: true, // Prevents dismissing of toast on hover
			style: {
				background: "linear-gradient(to right, #00b09b, #96c93d)",
			},
			onClick: function(){} // Callback after click
			}).showToast();
		$('#login_button').removeAttr('disabled');
		$('#login_button').removeClass('disabled');
	}
	else{
		var frmdata = new FormData();
		frmdata.append('email',username);
		frmdata.append('password',password);
		axios.post("<?= url('/'); ?>/login",frmdata).then(function(res){
			if(res.data.code == 200){
				Toastify({
					text: res.data.message,
					className:"danger",
					duration: 5000,
					destination: "",
					newWindow: true,
					close: true,
					gravity: "top", // `top` or `bottom`
					position: "right", // `left`, `center` or `right`
					stopOnFocus: true, // Prevents dismissing of toast on hover
					style: {
						background: "linear-gradient(to right, #00b09b, #96c93d)",
					},
					onClick: function(){} // Callback after click
				}).showToast();
				window.location.href = res.data.redirect_uri;
			}
			else{
				Toastify({
					text: res.data.message,
					className:"danger",
					duration: 5000,
					destination: "",
					newWindow: true,
					close: true,
					gravity: "top", // `top` or `bottom`
					position: "right", // `left`, `center` or `right`
					stopOnFocus: true, // Prevents dismissing of toast on hover
					style: {
						background: "linear-gradient(to right, #00b09b, #96c93d)",
					},
					onClick: function(){} // Callback after click
				}).showToast();
				$('#login_button').removeAttr('disabled');
				$('#login_button').removeClass('disabled');
			}
		});
	}
});

$('#forgot_password_form').submit(function(event){
	event.preventDefault();
	$('#forgot_password_button').attr('disabled','disabled');
	$('#forgot_password_button').addClass('disabled');
	var email = $('input[name=email]').val();
	if(email.trim() == ''){
		/*$.simplyToast('success','This is a success message!');*/
		Toastify({
			text: "All fields are required",
			className:"danger",
			duration: 5000,
			destination: "",
			newWindow: true,
			close: true,
			gravity: "top", // `top` or `bottom`
			position: "right", // `left`, `center` or `right`
			stopOnFocus: true, // Prevents dismissing of toast on hover
			style: {
				background: "linear-gradient(to right, #00b09b, #96c93d)",
			},
			onClick: function(){} // Callback after click
			}).showToast();
		$('#forgot_password_button').removeAttr('disabled');
		$('#forgot_password_button').removeClass('disabled');
	}
	else{
		var frmdata = new FormData();
		frmdata.append('email',email);
		axios.post("<?= url('/'); ?>/forgot_password",frmdata).then(function(res){
			if(res.data.code == 200){
				Toastify({
					text: res.data.message,
					className:"danger",
					duration: 5000,
					destination: "",
					newWindow: true,
					close: true,
					gravity: "top", // `top` or `bottom`
					position: "right", // `left`, `center` or `right`
					stopOnFocus: true, // Prevents dismissing of toast on hover
					style: {
						background: "linear-gradient(to right, #00b09b, #96c93d)",
					},
					onClick: function(){} // Callback after click
				}).showToast();
			}
			else{
				Toastify({
					text: res.data.message,
					className:"danger",
					duration: 5000,
					destination: "",
					newWindow: true,
					close: true,
					gravity: "top", // `top` or `bottom`
					position: "right", // `left`, `center` or `right`
					stopOnFocus: true, // Prevents dismissing of toast on hover
					style: {
						background: "linear-gradient(to right, #00b09b, #96c93d)",
					},
					onClick: function(){} // Callback after click
				}).showToast();
				$('#forgot_password_button').removeAttr('disabled');
				$('#forgot_password_button').removeClass('disabled');
			}
		});
	}
});
</script>

</body>
</html>