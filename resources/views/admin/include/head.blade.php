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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script>
function auto_posts(itemname){
	if(confirm("Are you sure you want to make all users future posts approval to automatic")){
		return true;
	}
	else{
		return false;
	}
}
function man_posts(itemname){
	if(confirm("Are you sure you want to make all users future posts approval to manual")){
		return true;
	}
	else{
		return false;
	}
}
function dis_fun(itemname){
	if(confirm("Are you sure you want to disable this "+itemname)){
		return true;
	}
	else{
		return false;	
	}	
}

function enb_fun(itemname){
	if(confirm("Are you sure you want to enable this "+itemname)){
		return true;
	}
	else{
		return false;	
	}	
}
function archive_fun(itemname)
{
	if(confirm("Are you sure you want to archive this "+itemname))
	{
		return true;
	}
	else
	{
		return false;	
	}		
}
function enab_refund(itemname){
	if(confirm("Are you sure you want to raise refund for ")){
		return true;
	}
	else{
		return false;	
	}
}
function disable_refund(itemname){
	if(confirm("Are you sure you want to disable refund request ")){
		return true;
	}
	else{
		return false;	
	}
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
