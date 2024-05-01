@extends('admin.layout.base')

@section('title','Privacy Policy')

@section('content')

<div class="row">
 <div class="col-md-12"> 
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">Privacy Policy</h3>
   <ul class="page-breadcrumb breadcrumb">
     <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
    <li> <a href="#"> Privacy Policy</a> </li>
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
         Privacy Policy</a> </li>
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
               <form name="frm" id="privacy_policy_form" action="" method="post" enctype="multipart/form-data">
                
                 <div class="form-group">
                   <label class="control-label col-md-3">Content: <span class="required"> * </span></label>
                   <div class="col-md-7">
                     <textarea class="form-control ckeditor" rows = "6" name="page_content" id="page_content">{{$data->privacy_policy}}</textarea> 
                     <span class="help-block" id="title_error"> </span> 
                   </div>
                 </div>
                  <div class="form-group">
                   <label class="control-label col-md-3">&nbsp; </label>
                   <div class="col-md-9">
                     <input type="submit" value="Save" class="btn theme-btn green pull-left" id="privacy_policy_form_btn">
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

<script type="text/javascript" src="{{asset('public/js/ckeditor/ckeditor.js')}}"></script>
<!--<script>
    CKEDITOR.replace( 'page_content' );
</script>-->
@endsection('content') 