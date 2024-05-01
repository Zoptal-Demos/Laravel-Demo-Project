@extends('admin.layout.base')

@section('title','Faq Management')

@section('content')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Faq Management </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li class="btn-group"> <a href="" class="btn green dropdown-toggle"> <span style="color:#FFF"> Show Faq </span></a> </li>
      <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Show Faq </a> </li>
	  
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
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Show Faq </a> </li>
      </ul>
      <div class="tab-content"> 
        
        <!--end tab-pane-->
        <div id="tab_1_5" >
          <div class="row search-form-default">
           
            <!--<div class="col-md-12">
              <form class="form-inline" action="" id="search">
                <div class="input-group">
                  <div class="input-cont">
                    <input type="text" placeholder="Search by Questions" class="form-control"  name="search"  value=""/>
                  </div>
                  <span class="input-group-btn">
                  <button type="button" class="btn green" onclick="document.getElementById('search').submit();"> Search &nbsp; <i class="m-icon-swapright m-icon-white"></i> </button>
                  </span> </div>
              </form>
            </div>-->
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover" id="myTable">
              <thead>
                <tr>
                <th>Faq id </th>
                <th> Question </th>
  		          <th> Answer </th>
                <th> Edit </th>
                <th> Delete </th>
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
         ajax: "{{route('show_faq_api')}}",
         columns: [
            { data: 'faq_id',orderable:false},
            { data: 'question',orderable:false },
            { data: 'answer',orderable:false },
            { data: 'edit',orderable:false},
            { data: 'delete',orderable:false}
          ]
        });

  });
  function delete_faq(url){
    if (confirm("Do you want to delete this faq ?") == true) {
        window.location.href = url;
    }
  }
</script>
@endsection('content') 

