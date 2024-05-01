<div class="header navbar navbar-fixed-top"> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="header-inner"> 
    <!-- BEGIN LOGO --> 
    <a style="margin-top:0px; padding: 10px 15px;" class="navbar-brand" href="{{  url('admin') }}"><img src="{{asset('public/assets/img/logo.png')}}" alt="pic" width="70%"/></a> 
    <!-- END LOGO --> 
    <!-- BEGIN HORIZANTAL MENU -->
     <!--<div class="hor-menu hidden-sm hidden-xs">
      <ul class="nav navbar-nav">
        <li class="classic-menu-dropdown active"> <a href=""> Dashboard <span class="selected"> </span> </a> </li>
       </ul>
    </div>-->
     <!-- END HORIZANTAL MENU --> 
    <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <img src="{{asset('public/assets/img/menu-toggler.png')}}" alt=""/> </a> 
    <!-- END RESPONSIVE MENU TOGGLER --> 
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav navbar-nav pull-right">
      <li class="dropdown user"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <span class="username">  {{Auth::user()->name}}  </span> <i class="fa fa-angle-down"></i> </a>
        <ul class="dropdown-menu">
          <!--<li> <a href="extra_profile.html"> <i class="fa fa-user"></i> My Profile </a> </li>-->
          <!--<li> <a href=""> <i class="fa fa-cloud-upload" style="margin-right:5px;"></i>Update Profile </a> </li>-->
         <!-- <li> <a href="#"> <i class="fa fa-envelope"></i> Change Password </a> </li>-->
          <!--<li><a href="#"><i class="fa fa-tasks"></i> My Tasks<span class="badge badge-success">7</span></a></li>-->
          <li class="divider"> </li>
          <!--<li> <a href="javascript:;" id="trigger_fullscreen"> <i class="fa fa-arrows"></i> Full Screen </a> </li>-->
           <li> <a href="{{route('logout')}}"> <i class="fa fa-key"></i> Log Out </a> </li>
        </ul>
      </li>
      <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU --> 
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
