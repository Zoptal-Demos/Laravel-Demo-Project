@extends('admin.layout.base')

@section('title','Dashboard')

@section('content')
 
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Users Management </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li class="btn-group"> <a href="" class="btn green dropdown-toggle"> <span style="color:#FFF"> Show Users  </span></a> </li>
      <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Users Management </a> </li>
	  
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
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Users Management </a> </li>
      </ul>
      <div class="tab-content"> 
        
        <!--end tab-pane-->
        <div id="tab_1_5" >
         
          <br />
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover" id="myTable">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Phone no </th>
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
         ajax: "{{route('show_users_api')}}",
         columns: [
            { data: 'name',orderable:false },
            { data: 'phone_number',orderable:false },
         ]
        });

  });
</script>
<script type="text/javascript">

  $(document).ready(function(){

  $('.delete_entry').click(function(){
  console.log('callled');
  if (confirm("Do you want to delete this good ?") == true) {
     var url = $(this).attr('data-url');
     window.location.href = url;
  }

  });
});

</script> 
@endsection('content') 