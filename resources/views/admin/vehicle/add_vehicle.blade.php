@extends('admin.layout.base')

 @section('title','Add Vehicle Type')

 @section('content')

 <div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">@if(isset($vehicle)) Edit @else Add @endif Vehicle Type</h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="#"> @if(isset($vehicle)) Edit @else Add @endif Vehicle Type</a> </li>
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
          @if(isset($vehicle)) Edit @else Add @endif Vehicle Type</a> </li>
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
                <form name="frm" id="add_vehicle_form" enctype="multipart/form-data">
                 
                  <div class="form-group">
                    <label class="control-label col-md-3">Vehicle Type Name: <span class="required"> * </span></label>
                    <div class="col-md-7">
                      @if(isset($vehicle))
                      <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="{{$vehicle->vehicle_name}}">
                      <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicle->vehicle_id}}">
                      <input type="hidden" name="vehicle_old_image" id="vehicle_old_image" value="{{$vehicle->vehicle_image}}">
                      @else
                      <input type="text" class="form-control" id="vehicle_name" name="vehicle_name">
                      @endif
                      <span class="help-block" id="title_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Vehicle Type Image: <span class="required"> * </span></label>
                    <div class="col-md-7">
                      <input type="file" class="form-control" id="vehicle_image" name="vehicle_image">
                      <span class="help-block" id="title_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Vehicle Type Rate ( Per Km ) <span class="required"> * </span></label>
                    <div class="col-md-7">
                      @if(isset($vehicle))
                      <input type="text" class="form-control" id="vehicle_rate" name="vehicle_rate" value="{{$vehicle->vehicle_rate}}">
                      @else
                      <input type="text" class="form-control" id="vehicle_rate" name="vehicle_rate">
                      @endif
                      <span class="help-block" id="title_error"> </span> </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-3">&nbsp; </label>
                    <div class="col-md-9">
                      <input type="submit" @if(isset($vehicle)) value="Update" @else value="Save" @endif class="btn theme-btn green pull-left" id="add_vehicle_form_btn">
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