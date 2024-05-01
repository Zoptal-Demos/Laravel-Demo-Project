 @extends('admin.layout.base')

@section('title','Dashboard')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 
 <!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Orders Management </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li class="btn-group"> <a href="" class="btn green dropdown-toggle"> <span style="color:#FFF"> Pending Orders  </span></a> </li>
      <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Pending Orders </a> </li>
	  
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
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Pending Orders </a> </li>
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
            <table class="table table-striped table-bordered table-advance table-hover" id="myTable">
              <thead>
                <tr>
                  <th> Order id </th>
                  <th> User Name </th>
  		          <th> Phone Number </th>
                  <th> Pickup Location </th>
                  <th> Drop Location </th>
                  <th> Vehicle </th>
                  <th> Goods </th>
                  <th> Total Price </th>
                  <th> Date </th>
            	  <th> Accept </th>
            	  <th> Reject </th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="margin-top-20">
            <ul class="pagination">
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
<script type="text/javascript">
  $(document).ready(function(){

      $('#myTable').DataTable({
        processing: true,
         serverSide: true,
         ajax: "{{route('pending_orders_api')}}",
         columns: [
            { data: 'order_id',orderable:false },
            { data: 'user_name',orderable:false },
            { data: 'phone_number',orderable:false},
            { data: 'pickup_location',orderable:false},
            { data: 'drop_location' , orderable:false},
            { data: 'vehicle_name' , orderable:false},
            { data: 'goods_name' , orderable:false},
            { data: 'total_price',orderable:false},
            { data: 'date',orderable:false},
            { data: 'accept' , orderable:false},
            { data: 'reject' , orderable:false}
         ]
        });

  });
  function accept_order(url){
    if (confirm("Do you want to accept the order ?") == true) {
        window.location.href = $(url).attr('data-url');
    }
  }
  function deny_order(url){
    if (confirm("Do you want to deny the order ?") == true) {
        window.location.href = $(url).attr('data-url');
    }
  }
</script>
@endsection('content') 