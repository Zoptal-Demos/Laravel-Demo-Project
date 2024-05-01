@extends('admin.layout.base')

@section('title','Agency Profile')

@section('content')

<div class="row">
 <div class="col-md-12"> 
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">Agency Profile</h3>
   <ul class="page-breadcrumb breadcrumb">
     <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
    <li> <a href="#"> Agency Profile</a> </li>
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
         Agency Profile</a> </li>
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
               <form name="frm" id="agency_profile_form" action="" method="post" enctype="multipart/form-data">
                
                 <div class="form-group">
                   <label class="control-label col-md-3">Agency Name: <span class="required"> * </span></label>
                   <div class="col-md-7">
                     <input type="text" class="form-control" id="name" name="name" value="{{$agency->name}}">
                     <span class="help-block" id="title_error"> </span> </div>
                 </div>
                 
                 <div class="form-group">
                   <label class="control-label col-md-3">Phone Number: <span class="required"> * </span></label>
                   <div class="col-md-7">
                     <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$agency->phone_number}}">
                     <span class="help-block" id="title_error"> </span> </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-md-3">Email: <span class="required"> * </span></label>
                   <div class="col-md-7">
                     <input type="text" class="form-control" id="email" name="email" value="{{$agency->email}}">
                     <span class="help-block" id="title_error"> </span> </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-md-3">Password: <span class="required"> * </span></label>
                   <div class="col-md-7">
                     <input type="text" class="form-control" id="password" name="password" value="{{$agency->password}}">
                     <span class="help-block" id="title_error"> </span> </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-md-3">&nbsp; </label>
                   <div class="col-md-9">
                     <input type="submit" value="Update" class="btn theme-btn green pull-left" id="agency_profile_form_btn">
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