@extends('admin.layout.base')

@section('title','Dashboard')

@section('content')
 
 <!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> All Orders </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li class="btn-group"> <a href="" class="btn green dropdown-toggle"> <span style="color:#FFF"> Show Users  </span></a> </li>
      <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> All Orders </a> </li>
	  
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN ALERT MESSAGE --> 
<!-- END ALERT MESSAGE -->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> All Orders </a> </li>
      </ul>
      <div class="tab-content"> 
        
        <!--end tab-pane-->
        <div id="tab_1_5" >
          <!--<div class="row search-form-default">
           
            <div class="col-md-12">
              <form class="form-inline" action="" id="search">
                <div class="input-group">
                  <div class="input-cont">
                    <input type="text" placeholder="Search by Questions" class="form-control"  name="search"  value=""/>
                  </div>
                  <span class="input-group-btn">
                  <button type="button" class="btn green" onclick="document.getElementById('search').submit();"> Search &nbsp; <i class="m-icon-swapright m-icon-white"></i> </button>
                  </span> </div>
              </form>
            </div>
          </div>-->
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover">
              <thead>
                <tr>
                  <th> User Name </th>
                  <th> Phone Number </th>
                  <th> Pickup Location </th>
                  <th> Drop Location </th>
                  <th> Vehicle </th>
                  <th> Goods </th>
                  <th> Total Price </th>
                  <th> Date </th>
                  <th> Cancel Reason </th>
                  <th> Accept </th>
                  <th> Reject </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 
                </tr>
                @if(count($order) == 0)
                <tr class="scndrow">
                  <td colspan="7" align="center">No record found</td>
                </tr>
                @else
                  @foreach($order as $key => $orderdata)
                    <tr>
                      <td>{{$orderdata['user']->name}}</td>
                      <td>{{$orderdata['user']->phone_number}}</td>
                      <td>{{$orderdata['pickup_location']}}</td>
                      <td>{{$orderdata['drop_location']}}</td>
                      <td>{{$orderdata['vehicle']->vehicle_name}}</td>
                      @php 
                      $goodsid = explode(',',$orderdata['goods_id']);
                      $goods = App\Models\Good::whereIn('goods_id',$goodsid)->get();
                      $goodsarray = array();
                      @endphp
                      @foreach($goods as $goodskey => $goodsdata)
                          @php
                          array_push($goodsarray,$goodsdata['goods_name']);
                          @endphp
                      @endforeach
                      <td style="padding: 0px;">{{implode(',',$goodsarray);}}</td>
                      <td>${{$orderdata['price']}}</td>
                      <td>{{date('d-m-Y',$orderdata['date'])}}</td>
                      <td>{{$orderdata['cancel_reason']}}</td>
                      @if($orderdata['order_status'] == 0)
                      <td><a onclick="accept_order('{{route('accept_order',['order_id'=>base64_encode($orderdata['order_id'])])}}')" style="color:green" href="javascript:void(0);"><i class="fa fa-check"></i></a></td>
                      <td><a onclick="deny_order('{{route('deny_order',['order_id'=>base64_encode($orderdata['order_id'])])}}')" style="color:red" href="javascript:void(0);"><i class="fa fa-times"></i></a></td>
                      @else
                      <td>@if($orderdata['order_status']==2) Accepted @elseif($orderdata['order_status'] == 3) Cancelled @endif</td>
                      <td>@if($orderdata['order_status']==4) Denied @elseif($orderdata['order_status'] == 3) Cancelled @endif</td>
                      @endif
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <div class="margin-top-20">
            <ul class="pagination">
              {{ $order->links() }}
            </ul>
          </div>
        </div>
        <!--end tab-pane--> 
      </div>
    </div>
  </div>
  <!--end tabbable--> 
</div>
<!-- END PAGE CONTENT--> 
@endsection('content') 
<script type="text/javascript">
  function accept_order(url){
    if (confirm("Do you want to accept the order ?") == true) {
        window.location.href = url;
    }
  }
  function deny_order(url){
    if (confirm("Do you want to deny the order ?") == true) {
        window.location.href = url;
    }
  }
</script>