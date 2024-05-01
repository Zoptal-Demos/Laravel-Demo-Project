@extends('admin.layout.auth')
@section('content')
<!-- BEGIN LOGIN -->
<div class="content"> 
	  <div class="row">
     <div class="col-md-12">

           <div class="alert alert-success" style="display:none">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
              <strong>Success!</strong> Message here 
           </div>
           <div class="alert alert-danger" style="display:none">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
              <strong>Error!</strong> Message here
           </div>
     </div>
  </div>
  <!-- BEGIN LOGIN FORM -->
  <form name="login" id="login_form" class="login-form" >
    <h3 class="form-title">Admin Login</h3>
    <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>Enter username and password.</span> </div>
    <div class="form-group"> 
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="input-icon"> <i class="fa fa-user"></i>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="input-icon"> <i class="fa fa-lock"></i>
        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
      </div>
    </div>
    <div class="form-actions">
      <label class="checkbox">
       <!-- <input type="checkbox" value="1" name="type"/>
        Login As Adminstrator--> </label>
      <button type="submit" id="login_button" class="btn blue pull-right" style="background-color: #F5AE6C"> Login <i class="m-icon-swapright m-icon-white"></i> </button>

    </div>
    <a href="{{route('forgot_password')}}"><p style="text-align:right">Forgot password ?</p></a>
   
  </form>
  <!-- END LOGIN FORM --> 
   
</div>
<!-- END LOGIN --> 
@endsection('content')