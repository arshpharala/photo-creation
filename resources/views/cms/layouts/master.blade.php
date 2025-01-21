<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="token" content="{{ csrf_token() }}">
  <title>CMS | Photo Creation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  {{-- <script src="{{url('ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
  <link rel="stylesheet" href="{{url('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/cms/tabs/tab.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
  <!-- Tempusdominus Bbootstrap 4 -->
  {{-- <link rel="stylesheet" href="{{url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/dist/css/select2.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('adminlte/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
  {{-- Toastr css  --}}
  <link rel="stylesheet" href="{{url('adminlte/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/plugins/toggle/toggle.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/plugins/locationTier/locationTier.css')}}">
  <!-- SweetAlert2 -->
  {{-- <link rel="stylesheet" href="{{url('adminlte/plugins/sweetalert2/sweetalert2.min.css')}}"> --}}
  <link href="{{url('adminlte/bootstrap-toggle-master/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('adminlte/DataTables/datatables.min.css')}}"/>
   {{-- <link rel="stylesheet" href="{{ url('adminlte/plugins/select2/css/select2.min.css')}}"/> --}}

   @yield('headerLinks')
</head>
<style>
  .select2-container--default .select2-selection--single .select2-selection__rendered{
  line-height: 19px;
  
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
  color: black;
  padding-left: 30px;
}

</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image">
            <img src="{{url('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2 mr-1" alt="User Image" width="30">
            {{Auth()->User()->name}}
          </div>
         
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{Auth()->User()->email}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('changePassword')}}" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('editProfile')}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Update Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"></a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{url('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Photo Creation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     
            <!-- <ul class="nav nav-treeview" style="display: none;"> -->
            <li class="nav-item">
                <a href="{{url('/users')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/roles')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/permissions')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/modules')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('pageDetailList')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page Content</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blogList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('enquiryList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bannerList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('websiteList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Content</p>
                </a>
              </li>
            <!-- </ul> -->

        

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  @if ($errors->any())
  
  <div id="toastsContainerTopRight" class="toasts-top-right fixed p-2">
    @foreach ($errors->all() as $key => $error)

    <div class="toast bg-yellow  fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        @php

         if(Str::contains($error, ['has'])){
          $data = explode('The', $error );
          $data = explode('has', $data[0]);
         }
         elseif(Str::contains($error, ['may'])){
          $data = explode('The', $error );
          $data = explode('may', $data[1]);
         }
         else{
          $data = explode('The ', $error);
          if(!empty($data[1])){
          $data = explode('field ', $data[1]);
          }
         }
        
        @endphp
        <strong class="mr-auto text-white">{{ ucfirst($data[0]) }}</strong>
        <button type="button" class="close px-2" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">x</span></button>
      </div>
      <div class="toast-body text-white">{{$error}}</div>
  
     
    </div>
    @endforeach
  </div>
@endif
    
@yield('content')

<footer class="main-footer">
  <strong>Copyright &copy; 2025 <a href="#">Photo Creation</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>

</div>

<div class="modal fade" id="common-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- ./wrapper -->


<!-- jQuery -->
{{-- <script src="{{url('ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script> --}}
<script src="{{url('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ url('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- datepicker -->
<script src="{{ url('adminlte/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ url('adminlte/cms/common.js')}}"></script>
<!-- Summernote -->
<script src="{{ url('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/dist/js/adminlte.js')}}"></script>
<script src="{{url('adminlte/bootstrap-toggle-master/js/bootstrap-toggle.min.js')}}"></script>
<!-- AdminLTE select 2 -->
{{-- <script type="text/javascript" src="{{url('adminlte/dist/js/select2.min.js')}}"></script> --}}
<script src="{{url('adminlte/cms/summernote-cleaner.js')}}"></script>
{{-- Data Tables --}}
<script type="text/javascript" src="{{url('adminlte/DataTables/datatables.min.js')}}"></script>
{{-- Toastr js --}}
<script src="{{Url('adminlte/plugins/toastr/toastr.min.js')}}"></script>
<!-- SweetAlert2 -->
{{-- <script src="{{Url('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script> --}}
@yield('footer')
<script>

  $(".toast").toast();
  $(function () {
      @if($message = Session::get('success'))
      toastr.success('{{$message}}');
      @endif
      @if($message = Session::get('failure'))
      toastr.error('{{$message}}');
      @endif
      
  });

  function getItem(path) {

$.ajax({
    url:path,
    method:'GET',
    beforeSend: function(){
        $('#common-modal').find('.modal-content').html('');
        $('#common-modal').modal('hide');
    },
    success: function (res) {
        $('#common-modal').find('.modal-content').html(res.view);
    },
    complete: function (res) {
        $('#common-modal').modal('show');
    }
});

}

  function summernoteload(elm){
    $(elm).summernote({
      toolbar:[
        ['cleaner',['cleaner']], // The Button
        ['style',['style']],
        ['font',['bold','italic','underline','clear']],
        ['fontname',['fontname']],
        ['fontsize',['fontsize']],
        ['color',['color']],
        ['para',['ul','ol','paragraph']],
        ['height',['height']],
        ['table',['table']],
        ['insert',['media','link','hr']],
        ['view',['fullscreen','codeview']],
        ['help',['help']],
        ['picture']
    ],
    cleaner:{
          action: 'button', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
          newline: '<br>', // Summernote's default is to use '<p><br></p>'
          notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
          icon: '<i class="note-icon">clean</i>',
          keepHtml: true, // Remove all Html formats
          keepOnlyTags: ['<p>', '<ul>', '<li>', '<a>','<h3>','<h4>','<h5>','<img>','<ol>','<span>'], // If keepHtml is true, remove all tags except these
          keepClasses: true, // Remove Classes
          badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
          badAttributes: ['style', 'start','color','bgcolor'], // Remove attributes from remaining tags
          limitChars: false, // 0/false|# 0/false disables option
          limitDisplay: 'both', // text|html|both
          limitStop: false // true/false
    },
      height: 200,
      callbacks: {
          onImageUpload: function(image) {
            var data = new FormData();
            data.append("image", image[0]);
            $.ajax({
                url:"{{route('ImageUpload')}}",
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                  },
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(url) {
                  var imagetag = $('<img>').attr('src', url);
                  // console.log(imagetag);
                  $('.summernote').summernote("insertNode", imagetag[0]);
                },
                error: function(data) {
                    console.log(data);
                }
            });
          }
      }
    });
  }

  $(document).ready(function() {
    
    $(document).on('click', function (event) {
           $target = $(event.target);

    });
    $('#country').on('input',function(){
     var country=$('#country').val();
     
      $.ajax({
        url:selectedcountry,
        data:{country_id: country},
        type:'post',
        global:false,
        headers: {
                      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                  },
        success:function(response){
          if(response=='done'){
            var base_url=window.location.origin;
            
          window.location=base_url+'/dashboard';
          }
          else{
          alert('country code not available');
          }
        }
      });
      
    });
        $(".selectJS").select2({
            width:'100%',
            placeholder:'Choose One'
            
        });
        
          $('#myonoffswitch').change(function(){
              $('#submit').click();
          });
    
      summernoteload('.summernote');


    });

    </script>
</body>
</html>
