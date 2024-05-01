@extends('admin.layout.base')

@section('title','Dashboard')

@section('content')
 
 <!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Goods Management </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li class="btn-group"> <a href="" class="btn green dropdown-toggle"> <span style="color:#FFF"> Show Goods </span></a> </li>
      <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Goods Management </a> </li>
	  
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
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Goods Management </a> </li>
      </ul>
      <div class="tab-content"> 
        
        <!--end tab-pane-->
        <div id="tab_1_5" >
          <div class="row search-form-default">
           
           <div class="col-md-12">
              <form class="form-inline" action="{{route('show_goods')}}" id="search">
                <div class="input-group">
                  <div class="input-cont">
                    <input type="text" placeholder="Search" class="form-control"  name="search"  value="{{ app('request')->input('search') }}" />
                  </div>
                  <span class="input-group-btn">
                  <button type="submit" class="btn green"> Search &nbsp; <i class="m-icon-swapright m-icon-white"></i> </button>
                  </span>
                <a href="{{route('show_goods')}}" class="btn theme-btn grey pull-left margd">Clear Search</a>
                   </div>
              </form>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover">
              <thead>
                <tr>
                  <th> Goods Name </th>
  		          <th> Edit </th>
                <th> Delete </th>
                </tr>
              </thead>
              <tbody>
                @if(count($goods) > 0)
                  @foreach($goods as $key => $goodsdata)
                    <tr>
                        <td>{{$goodsdata->goods_name}}</td>
                        <td><a href="{{route('edit_goods',['goods_id'=>base64_encode($goodsdata->goods_id)])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        <td><a onclick="delete_goods('{{route('delete_goods',['goods_id'=>base64_encode($goodsdata['goods_id'])])}}')" style="color:red" href="javascript:void(0);"><i class="fa fa-times"></i></a></td>
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
                {{ $goods->links() }}
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
  function delete_goods(url){
    if (confirm("Do you want to delete this good ?") == true) {
        window.location.href = url;
    }
  }
</script>