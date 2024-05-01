<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
      <li class="sidebar-toggler-wrapper">
        <div class="sidebar-toggler hidden-phone"> </div>
      </li>
      <li class="sidebar-search-wrapper"><br />
      </li>
      <li class="start {{ (request()->segment(2) == '') ? 'active' : '' }}"> <a href="{{route('adminindex')}}"> <i class="fa fa-home"></i> <span class="title"> Dashboard </span> </a> </li>
     
      <li class="{{ (request()->segment(2) == 'add_vehicle' || request()->segment(2) == 'show_vehicle') ? 'active' : '' }}"> <a href="javascript:void(0);" class="menu_n" > <i class="fa fa-car" aria-hidden="true"></i> <span class="title">Vehicles Type </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
            <li class="{{ (request()->segment(2) == 'add_vehicle') ? 'active' : ''}}"> <a href="{{route('add_vehicle')}}"> <i class="fa fa-user-circle-o"></i> Add Vehicle Type </a> </li>
            <li class="{{ (request()->segment(2) == 'show_vehicle') ? 'active' : ''}}"> <a href="{{route('show_vehicle')}}"> <i class="fa fa-user-circle"></i> Show Vehicle Types </a> </li>
          </ul>
      </li>

      <li class="{{ (request()->segment(2) == 'add_goods' || request()->segment(2) == 'show_goods') ? 'active' : '' }}"> <a href="javascript:void(0);" class="menu_n"> <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="title">Goods Management </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
            <li class="{{ (request()->segment(2) == 'add_goods') ? 'active' : '' }}"> <a href="{{route('add_goods')}}"> <i class="fa fa-user-circle-o"></i> Add Goods </a> </li>
            <li class="{{ (request()->segment(2) == 'show_goods') ? 'active' : '' }}"> <a href="{{route('show_goods')}}"> <i class="fa fa-user-circle"></i> Show Goods </a> </li>
          </ul>
      </li>

      <li class="{{ (request()->segment(2) == 'show_users') ? 'active' : '' }}"> <a href="javascript:void(0);" class="menu_n"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Users Management </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
             <li class="{{ (request()->segment(2) == 'show_users') ? 'active' : '' }}"> <a href="{{route('show_users')}}"> <i class="fa fa-user-circle"></i> Show Users </a> </li>
          </ul>
      </li>

      <!--<li class="{{ (request()->segment(2) == 'show_agents') ? 'active' : '' }}"> <a href="javascript:void(0);" class="menu_n"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Agency Management </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
            <li class="{{ (request()->segment(2) == 'show_agents') ? 'active' : '' }}"> <a href="{{route('show_agents')}}"> <i class="fa fa-user-circle"></i> Show Agencies </a> </li>
          </ul>
      </li>-->

      <li class="{{ (request()->segment(2) == 'all_orders' || request()->segment(2) == 'pending_orders' || request()->segment(2) == 'accepted_orders') || request()->segment(2) == 'denied_orders' || request()->segment(2) == 'cancelled_orders' || request()->segment(2) == 'completed_orders' ? 'active' : '' }}"> <a href="javascript:void(0);" class="menu_n"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Orders Management </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
            <li class="{{ (request()->segment(2) == 'all_orders' ) ? 'active' : '' }}"> <a href="{{route('all_orders')}}"> <i class="fa fa-user-circle"></i> All Orders </a> </li>
            <li class="{{ (request()->segment(2) == 'pending_orders' ) ? 'active' : '' }}"> <a href="{{route('pending_orders')}}"> <i class="fa fa-user-circle"></i> Pending Orders </a> </li>
            <li class="{{ (request()->segment(2) == 'accepted_orders' ) ? 'active' : '' }}"> <a href="{{route('accepted_orders')}}"> <i class="fa fa-user-circle"></i> Accepted Orders </a> </li>
            <li class="{{ (request()->segment(2) == 'denied_orders' ) ? 'active' : '' }}"> <a href="{{route('denied_orders')}}"> <i class="fa fa-user-circle"></i> Denied Orders </a> </li>
            <li class="{{ (request()->segment(2) == 'cancelled_orders' ) ? 'active' : '' }}"> <a href="{{route('cancelled_orders')}}"> <i class="fa fa-user-circle"></i> Cancelled Orders </a> </li>
            <li class="{{ (request()->segment(2) == 'completed_orders') ? 'active' : '' }}"> <a href="{{route('completed_orders')}}"> <i class="fa fa-user-circle"></i> Completed Orders </a> </li>
          </ul>
      </li>

      <!-- Content Management -->
      <li class="{{ (request()->segment(2) == 'privacy_policy' || request()->segment(2) == 'terms') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu_n"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Content Management </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
            <li class="{{ (request()->segment(2) == 'privacy_policy') ? 'active' : '' }}"> <a href="{{route('privacy_policy')}}"> <i class="fa fa-user-secret"></i> Privacy Policy </a> </li>
            <li class="{{ (request()->segment(2) == 'terms') ? 'active' : '' }}"> <a href="{{route('terms_condition')}}"> <i class="fa fa-user-circle"></i> Terms & Conditions </a> </li>
          </ul>
      </li>

       <!-- Faq Management -->
      <li class="{{ (request()->segment(2) == 'add_faq' ) ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu_n"> <i class="fa fa-users" aria-hidden="true"></i> <span class="title">Faq Management </span> <span class="arrow"> </span> </a>
            <ul class="sub-menu">
            <li class="{{ (request()->segment(2) == 'add_faq') ? 'active' : '' }}"> <a href="{{route('add_faq')}}"> <i class="fa fa-user-secret"></i> Add Faq </a> </li>
            <li class="{{ (request()->segment(2) == 'show_faq') ? 'active' : '' }}"> <a href="{{route('show_faq')}}"> <i class="fa fa-user-secret"></i> Show Faq </a> </li>
          </ul>
      </li>

      <!-- Agency Profile Management -->
      <li class="{{ (request()->segment(2) == 'agency_profile') ? 'active' : '' }}">
        <a href="{{ route('agency_profile') }}"> <i class="fa fa-users" ></i> <span class="title">Agency Profile </span> </a>
      </li>

      <li class="start"> <a href="{{route('logout')}}"> <i class="fa fa-home"></i> <span class="title"> Logout </span> </a> </li>
    </ul>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
  $('.menu_n').on("click", function(e){
    $(this).next('ul').toggle();
    $(this).find('.arrow').toggleClass("open");
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
<script type="text/javascript">
  $(".sidebar-toggler").click(function(){
    $("body").toggleClass("page-sidebar-closed");
  });
</script>