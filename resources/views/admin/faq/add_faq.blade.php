@extends('admin.layout.base')

@if(isset($faq))
@section('title','Edit Faq')
@else
@section('title','Add Faq')
@endif

@section('content')

<div class="row">
 <div class="col-md-12"> 
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">Faq Management</h3>
   <ul class="page-breadcrumb breadcrumb">
     <li> <i class="fa fa-home"></i> <a href="{{route('adminindex')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
    <li> <a href="#"> @if(isset($faq)) Edit @else Add @endif Faq </a> </li>
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
         @if(isset($faq)) Edit @else Add @endif Faq </a> </li>
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
               <form name="frm" id="addfaq_form" action="" method="post" enctype="multipart/form-data">
                
                 <div class="form-group">
                   <label class="control-label col-md-3">Question: <span class="required"> * </span></label>
                   <div class="col-md-7">
                     @if(isset($faq))
                     <input type="text" name="question" id="question" class="form-control" value="{{$faq->question}}">
                     <input type="hidden" name="faq_id" id="faq_id" value="{{$faq->faq_id}}">
                     @else
                     <input type="text" name="question" id="question" class="form-control">
                     @endif
                     <span class="help-block" id="title_error"> </span> 
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-md-3">Answer: <span class="required"> * </span></label>
                   <div class="col-md-7">
                    @if(isset($faq))
                     <textarea name="answer" id="answer"  class="form-control" value="{{$faq->answer}}">{{$faq->answer}}</textarea>
                    @else
                     <textarea name="answer" id="answer" rows="6"  class="form-control"></textarea>
                    @endif
                     <span class="help-block" id="title_error"> </span> 
                   </div>
                 </div>
                  <div class="form-group">
                   <label class="control-label col-md-3">&nbsp; </label>
                   <div class="col-md-9">
                    @if(isset($faq))
                      <input type="submit" value="Update" class="btn theme-btn green pull-left" id="addfaq_form_btn">
                    @else
                     <input type="submit" value="Save" class="btn theme-btn green pull-left" id="addfaq_form_btn">
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