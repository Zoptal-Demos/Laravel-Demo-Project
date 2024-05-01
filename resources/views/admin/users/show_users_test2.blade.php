@extends('admin.layout.base')

@section('title','Dashboard')

@section('content')
 
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
          <div class="row search-form-default">
           
            <div class="col-md-12">
              <form class="form-inline" action="{{url('admin/show_users')}}" id="search">
                <div class="input-group">
                  <div class="input-cont">
                    @if($search != '')
                    <input type="text" placeholder="Search by name" class="form-control"  name="search"  value="{{ $search }}" />
                    @else
                    <input type="text" placeholder="Search by name" class="form-control"  name="search"  value="{{ app('request')->input('search') }}" />
                    @endif
                  </div>
                  <span class="input-group-btn">
                  <button type="submit" class="btn green"> Search &nbsp; <i class="m-icon-swapright m-icon-white"></i> </button>
                  </span>
                <a href="{{url('admin/show_users')}}" class="btn theme-btn grey pull-left margd">Clear Search</a>
                   </div>
              </form>
            </div>
          </div>
          <br />
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover">
              <thead>
                <tr>
                  <th> Name </th>
  		          <th> Phone No </th>
                  <!--<th> Actions </th>-->
                </tr>
              </thead>
              <tbody>
                <tr>
                 
                </tr>
                @if(count($user) > 0)
                @foreach($user as $key => $data)
                <tr>
                  <td>{{$data['name']}}</td>
                  <td>{{$data['phone_number']}}</td>
                  <!--<td></td>-->
                </tr>
                @endforeach
                @else
                <tr class="scndrow">
                  <td colspan="7" align="center">No record found</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
          <div class="margin-top-20">
            <ul class="pagination">
              {{$user->links()}}
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