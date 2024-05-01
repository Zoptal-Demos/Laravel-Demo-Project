 @extends('admin.layout.base')

 @section('title','Dashboard')

 @section('content')

 <div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat blue">
      <div class="visual"><i class="fa fa-user-circle-o" aria-hidden="true"></i> </div>
      <div class="details">
        <div class="number">
          {{$data['total_users']}}
        </div>
        <div class="desc"> Total Users </div>
      </div>   
      <a class="more" href="{{route('show_users')}}"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat green">
      <div class="visual"> <i class="fa fa-car" aria-hidden="true"></i> </div>
      <div class="details">
        <div class="number">
          {{$data['total_vehicles']}}
        </div>
        <div class="desc"> Total Vehicle Types </div>
      </div>
      <a class="more" href="{{route('show_vehicle')}}"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>	 
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple">
      <div class="visual"> <i class="fa fa-briefcase" aria-hidden="true"></i> </div>
      <div class="details">
        <div class="number">
           {{$data['total_goods']}}
        </div>
        <div class="desc"> Total Goods </div>
      </div>
      <a class="more" href="{{route('show_goods')}}"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple">
      <div class="visual"><i class="fa fa-usd" aria-hidden="true"></i> </div>
      <div class="details">
        <div class="number">
          {{$data['total_orders']}}
        </div>
        <div class="desc"> Total Orders </div>
      </div>   
      <a class="more" href="{{route('all_orders')}}"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>

 @endsection('content')