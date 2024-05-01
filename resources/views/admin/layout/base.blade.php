<?php 
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
header("Cache-Control: no-store, no-cache, must-revalidate"); //HTTP/1.1
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
@include('admin.include.head')
</head>
<body class="page-header-fixed"  onload="initMap()">
@include('admin.include.top_area')
<!-- END HEADER -->
    <div class="clearfix"> </div>
<!-- BEGIN CONTAINER -->
    <div class="page-container"> 
  <!-- BEGIN SIDEBAR -->
@include('admin.include.menu_bar_admin')
  <!-- END SIDEBAR --> 
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content"> 
    	  @yield('content')
    </div>
    
<script src="{{asset('public/assets/plugins/jquery-1.10.2.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script> 
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip --> 
<script src="{{asset('public/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 

<script src="{{asset('public/assets/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/bootstrap-daterangepicker/moment.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script> 

<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support --> 
<script src="{{asset('public/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script> 

<!-- END PAGE LEVEL PLUGINS --> 
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="{{asset('public/assets/scripts/core/app.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/scripts/custom/index.js')}}" type="text/javascript"></script> 
<script src="{{asset('public/assets/scripts/custom/tasks.js')}}" type="text/javascript"></script> 
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


<script>

$('#add_vehicle_form').submit(function(event){
    $('#add_vehicle_form_btn').attr('disabled','disabled');
    $('#add_vehicle_form_btn').addClass('disabled');
    event.preventDefault();
    var vehicle_name = $('input[name=vehicle_name]').val();
    var vehicle_image = $('input[name=vehicle_image]')[0].files[0];
    var vehicle_rate = $('input[name=vehicle_rate]').val();
    /*if(vehicle_name.trim() == '' || vehicle_image == '' || vehicle_rate.trim() == ''){

        Toastify({
        text: "All fields are required",
        className:"danger",
        duration: 5000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
      $('#add_vehicle_form_btn').removeAttr('disabled');
      $('#add_vehicle_form_btn').removeClass('disabled');

    }*/
    /*else{*/
      var frmdata = new FormData();
      frmdata.append('vehicle_name',vehicle_name);
      frmdata.append('vehicle_image',vehicle_image);
      frmdata.append('vehicle_rate',vehicle_rate);
      if($('input[name=vehicle_id]').length > 0){
        frmdata.append('vehicle_id',$('input[name=vehicle_id]').val());
        frmdata.append('vehicle_old_image',$('input[name=vehicle_old_image]').val());
      }
      /*axios.post("<?= url(''); ?>"*/
      axios.post("<?= url('admin/add_vehicle'); ?>",frmdata).then(function(res){
          if(res.data.code == 200){
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
              window.location.href = res.data.redirect_uri;
            /*$('#add_vehicle_form_btn').removeAttr('disabled');
            $('#add_vehicle_form_btn').removeClass('disabled');*/
          }
          else{
            var error = '';
            if(res.data.message.hasOwnProperty('vehicle_name')){
              error += res.data.message.vehicle_name;
            }
            else if(res.data.message.hasOwnProperty('vehicle_rate')){
              error += res.data.message.vehicle_rate;
            }
            else if(res.data.message.hasOwnProperty('vehicle_image')){
              error += res.data.message.vehicle_image;
            }
            console.log(res.data.message);
            Toastify({
              text: error,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
          $('#add_vehicle_form_btn').removeAttr('disabled');
          $('#add_vehicle_form_btn').removeClass('disabled');
          }
      });
    /*}*/
    console.log('vehicle image is ',vehicle_image)
    
});
$('#add_goods_form').submit(function(event){
$('#add_goods_form_btn').attr('disabled','disabled');
    $('#add_goods_form_btn').addClass('disabled');
    event.preventDefault();
    var goods_name = $('input[name=goods_name]').val();
    /*if(goods_name.trim() == ''){

        Toastify({
        text: "All fields are required",
        className:"danger",
        duration: 5000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
      $('#add_goods_form_btn').removeAttr('disabled');
      $('#add_goods_form_btn').removeClass('disabled');

    }*/
   /* else{*/
      var frmdata = new FormData();
      frmdata.append('goods_name',goods_name);
      if($('input[name=goods_id]').length > 0){
        frmdata.append('goods_id',$('input[name=goods_id]').val());
      }
      /*axios.post("<?= url(''); ?>"*/
      axios.post("<?= url('admin/add_goods'); ?>",frmdata).then(function(res){
          if(res.data.code == 200){
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
              window.location.href = res.data.redirect_uri;
          /*$('#add_goods_form_btn').removeAttr('disabled');
          $('#add_goods_form_btn').removeClass('disabled');*/
          }
          else{
            var error = '';
            if(res.data.message.hasOwnProperty('goods_name')){
              error = res.data.message.goods_name;
            }
            Toastify({
              text: error,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
          $('#add_goods_form_btn').removeAttr('disabled');
          $('#add_goods_form_btn').removeClass('disabled');
          }
      });
    /*}*/
});

$('#privacy_policy_form').submit(function(event){
$('#privacy_policy_form_btn').attr('disabled','disabled');
    $('#privacy_policy_form_btn').addClass('disabled');
    event.preventDefault();
    var privacy_policy = $('textarea[name=page_content]').val();
    console.log('privacy policy content ',privacy_policy)
    if(privacy_policy.trim() == ''){

        Toastify({
        text: "Privacy policy field is required",
        className:"danger",
        duration: 5000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
        setTimeout(function(){
                $('#privacy_policy_form_btn').removeAttr('disabled');
                $('#privacy_policy_form_btn').removeClass('disabled');
        },2000);


    }
    else{
      var frmdata = new FormData();
      frmdata.append('privacy_policy',privacy_policy);
      axios.post("<?= url('admin/privacy_policy'); ?>",frmdata).then(function(res){
          if(res.data.code == 200){
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
              /*window.location.href = res.data.redirect_uri;*/
          setTimeout(function(){
                $('#privacy_policy_form_btn').removeAttr('disabled');
                $('#privacy_policy_form_btn').removeClass('disabled');
        },2000);
          }
          else{
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
          setTimeout(function(){
                $('#privacy_policy_form_btn').removeAttr('disabled');
                $('#privacy_policy_form_btn').removeClass('disabled');
        },2000);
          }
      });
    }
});

$('#terms_form').submit(function(event){
$('#terms_form_btn').attr('disabled','disabled');
    $('#terms_form_btn').addClass('disabled');
    event.preventDefault();
    var terms = $('textarea[name=page_content]').val();
    if(terms.trim() == ''){

        Toastify({
        text: "All fields are required",
        className:"danger",
        duration: 5000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
        setTimeout(function(){
          $('#terms_form_btn').removeAttr('disabled');
          $('#terms_form_btn').removeClass('disabled');
        },2000);
      

    }
    else{
      var frmdata = new FormData();
      frmdata.append('terms',terms);
      axios.post("<?= url('admin/terms'); ?>",frmdata).then(function(res){
          if(res.data.code == 200){
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
              /*window.location.href = res.data.redirect_uri;*/
                  setTimeout(function(){
                    $('#terms_form_btn').removeAttr('disabled');
                    $('#terms_form_btn').removeClass('disabled');
                  },2000);
          }
          else{
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
                  setTimeout(function(){
                    $('#terms_form_btn').removeAttr('disabled');
                    $('#terms_form_btn').removeClass('disabled');
                  },2000);
          }
      });
    }
})

$('#agency_profile_form').submit(function(event){
$('#agency_profile_form_btn').attr('disabled','disabled');
    $('#agency_profile_form_btn').addClass('disabled');
    event.preventDefault();
    var name = $('input[name=name]').val();
    var phone_number = $('input[name=phone_number]').val();
    var email = $('input[name=email]').val();
    var password = $('input[name=password]').val();

    if(name.trim() == '' || phone_number.trim() == '' || email.trim() == '' || password.trim() == ''){

        Toastify({
        text: "All fields are required",
        className:"danger",
        duration: 5000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
      $('#agency_profile_form_btn').removeAttr('disabled');
      $('#agency_profile_form_btn').removeClass('disabled');

    }
    else{
      var frmdata = new FormData();
      frmdata.append('name',name);
      frmdata.append('phone_number',phone_number);
      frmdata.append('email',email);
      frmdata.append('password',password);

      
      /*axios.post("<?= url(''); ?>"*/
      axios.post("<?= url('admin/agency_profile'); ?>",frmdata).then(function(res){
          if(res.data.code == 200){
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
              /*window.location.href = res.data.redirect_uri;*/
          $('#agency_profile_form_btn').removeAttr('disabled');
          $('#agency_profile_form_btn').removeClass('disabled');
          }
          else{
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
          $('#agency_profile_form_btn').removeAttr('disabled');
          $('#agency_profile_form_btn').removeClass('disabled');
          }
      });
    }
});

$('#addfaq_form').submit(function(event){
$('#addfaq_form_btn').attr('disabled','disabled');
    $('#addfaq_form_btn').addClass('disabled');
    event.preventDefault();
    var question = $('input[name=question]').val();
    var answer = $('textarea[name=answer]').val();
    /*if(question.trim() == '' || answer.trim() == ''){

        Toastify({
        text: "All fields are required",
        className:"danger",
        duration: 5000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
      $('#addfaq_form_btn').removeAttr('disabled');
      $('#addfaq_form_btn').removeClass('disabled');

    }*/
    /*else{*/
      var frmdata = new FormData();
      frmdata.append('question',question);
      frmdata.append('answer',answer);
      if($('input[name=faq_id]').length > 0){
        frmdata.append('faq_id',$('input[name=faq_id]').val());
      }
      /*axios.post("<?= url(''); ?>"*/
      axios.post("<?= url('admin/add_faq'); ?>",frmdata).then(function(res){
          if(res.data.code == 200){
            Toastify({
              text: res.data.message,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
              window.location.href = res.data.redirect_uri;
          /*$('#addfaq_form_btn').removeAttr('disabled');
          $('#addfaq_form_btn').removeClass('disabled');*/
          }
          else{
            console.log(res.data.message);
            var error = '';
            if(res.data.message.hasOwnProperty('question')){
              error += res.data.message.question;
            }
            else if(res.data.message.hasOwnProperty('answer')){
              error += res.data.message.answer;
            }
            Toastify({
              text: error,
              className:"danger",
              duration: 5000,
              destination: "",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
              }).showToast();
          $('#addfaq_form_btn').removeAttr('disabled');
          $('#addfaq_form_btn').removeClass('disabled');
          }
      });
    /*}*/
});
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <div class="clearfix"> </div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="footer">
  <div class="footer-inner"> © Copyright . {{ config('app.name') }} All Rights Reserved </div>
  <div class="footer-tools" onclick="window.scrollTo(0, 0);"> <span class="go-top"> <i class="fa fa-angle-up"></i> </span> </div>
</div>
</body>
</html>
