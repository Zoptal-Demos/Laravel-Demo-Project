@extends('admin.layout.base')

@section('title','Dashboard')

@section('content')

<div class="row">
 <div class="col-md-12"> 
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">@if(isset($goods)) Edit @else Add @endif Goods</h3>
   <ul class="page-breadcrumb breadcrumb">
     <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
    @if(isset($goods))
    <li> <a href="#"> Edit Goods</a> </li>
    @else 
    <li> <a href="#"> Add Goods</a> </li>
    @endif
   </ul>
   <!-- END PAGE TITLE & BREADCRUMB--> 
 </div>
</div>

<div class="row profile">
 <div class="col-md-12"> 
   <!--BEGIN TABS-->
   <div class="tabbable tabbable-custom tabbable-full-width">
     <ul class="nav nav-tabs">
       <li class="active"> <a href="#tab_1_1" data-toggle="tab">
         @if(isset($goods)) Edit @else Add @endif Goods</a> </li>
     </ul>
     <div class="tab-content">
       <div class="tab-pane active" id="tab_1_1">
         <div class="row">
           <div class="col-md-12">
             <div class="row"> 
               <!--end col-md-8--> 
               <!--end col-md-4--> 
             </div>
             <!--end row-->
             <div class="tab-pane active" id="tab1">
               <form name="frm" id="add_goods_form" action="" method="post" enctype="multipart/form-data">
                
                 <div class="form-group">
                   <label class="control-label col-md-3">Goods Name: <span class="required"> * </span></label>
                   <div class="col-md-7">
                    @if(isset($goods))
                     <input type="text" class="form-control" id="goods_name" name="goods_name" value="{{$goods->goods_name}}">
                     <input type="hidden" name="goods_id" value="{{$goods->goods_id}}">
                    @else
                    <input type="text" class="form-control" id="goods_name" name="goods_name">
                    @endif
                     <span class="help-block" id="title_error"> </span> </div>
                 </div>
                  <div class="form-group">
                   <label class="control-label col-md-3">&nbsp; </label>
                   <div class="col-md-9">
                     @if(isset($goods))
                     <input type="submit" value="Update" class="btn theme-btn green pull-left" id="add_goods_form_btn">
                     @else
                     <input type="submit" value="Save" class="btn theme-btn green pull-left" id="add_goods_form_btn">
                     @endif
                     <a href=""  class="btn theme-btn grey pull-left margd">Cancel</a> </div>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!--tab_1_2--> 
   </div>
 </div>
 <!--END TABS--> 
</div>

@endsection('content') 