<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/images/logo.png')}}"> --}}

    <title>Goaly | Dashboard</title>

    <!-- vendor css -->
    <link href="{{asset('admin_theme/css/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/js/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/js/prismjs/themes/prism-vs.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin_theme/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('admin_theme/css/responsive.dataTables.min.css')}}" rel="stylesheet"> --}}
    <link href="{{ asset('admin_theme/css/select2.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css" rel="stylesheet">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous"> --}}
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('admin_theme/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('admin_theme/css/dashforge.dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_theme/css/plugins.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin_theme/css/custom.css')}}" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin_theme/css/image-uploader.min.css')}}"/>
    <link rel="icon" href="{{asset('assets/img/logo-goaly.png')}}">
    <link href="{{ asset('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    
    .custom-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
        z-index: 9999;
    }

    .custom-modal.active {
        opacity: 1;
        pointer-events: auto; /* Allow interaction when modal is visible */
    }

    .custom-modal-dialog {
        max-width: 600px;
        width: 90%; /* Responsive sizing */
    }

    .custom-modal-content {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
        position: relative;
        max-height: 90vh; /* Prevents the modal from going off screen */
        overflow-y: auto; /* Adds scrolling for overflowing content */
    }

    .custom-modal-header {
        display: flex;
        justify-content: space-between; /* Align title and button on opposite sides */
        align-items: center;
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
    }

    .custom-modal-body {
        padding: 20px;
    }

    .custom-modal-footer {
        display: flex;
        justify-content: flex-end; /* Align buttons to the right */
        gap: 10px; /* Space between buttons */
        padding: 15px 20px;
        border-top: 1px solid #ddd;
        background-color: #f9f9f9; /* Optional: slightly different background for footer */
    }

    .close {
        font-size: 1.5rem;
        color: #000;
        background: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    button {
        cursor: pointer;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button.btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    button.btn-primary:hover {
        background-color: #0056b3;
    }

    button.btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    button.btn-secondary:hover {
        background-color: #5a6268;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    textarea.form-control {
        height: 100px;
    }

    @media (max-width: 768px) {
        .table {
            font-size: 14px;
        }

    }
.tooltip-container {
  position: relative;
  display: inline-block;
}

.tooltip-container .hide {
  display: none;
  position: absolute;
  background-color: #fff;
  color: red;
  border: 1px solid #ddd;
  padding: 5px;
  font-size: 12px;
  z-index: 1;
  width: 150px;
  margin-top: 5px;
}

.tooltip-container:hover .hide {
  display: block;
}

</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>

    @include('admin.layout.admin_sidebar')

    <div class="content ht-100v pd-0">
      <div class="content-header">
        {{-- <div class="content-search">
          <img src="{{asset('theme/images/logo.png')}}" width="80" alt="Logo">
        </div> --}}

        <div class="navbar-right">
<!--           <div class="dropdown dropdown-notification">
            <select class="select2" name="domain" id="domain">
              <option value="{{env('DEFAULT_DOMAIN')}}">{{env('DEFAULT_DOMAIN')}}</option>
             {{--@foreach ($domains as $domain)
                @if (env('DEFAULT_DOMAIN') != $domain->domain_name)
                  <option @if ( isset($_COOKIE["domain"]) && $_COOKIE["domain"] == $domain->domain_name) selected="selected" @endif value="{{$domain->domain_name}}">{{$domain->domain_name}}</option>
                @endif
              @endforeach --}}
            </select>
          </div> -->
         <span class="dtime">{{ now()->format('D, j M Y') }}</span>

          <div class="dropdown dropdown-profile">
            <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
              <div class="avatar avatar-sm"><img src="{{asset('assets/layouts/layout/img/avatar3_small.png')}}"
               class="rounded-circle" alt="">Admin<i class="fa fa-angle-down"></i></div>
            </a><!-- dropdown-link -->
            <div class="dropdown-menu dropdown-menu-right tx-13">
              <div class="avatar avatar-lg mg-b-15"><img src="{{asset('assets/layouts/layout/img/avatar3_small.png')}}" class="rounded-circle" alt=""></div>
              {{-- <h6 class="tx-semibold mg-b-5">Katherine Pechon</h6> --}}
              <h6 class="tx-semibold mg-b-5">Administrator</h6>
              {{-- <p class="mg-b-25 tx-12 tx-color-03">Administrator</p> --}}

              {{-- <a href="" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
              <a href="profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
              <div class="dropdown-divider"></div>
              <a href="page-help-center.html" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>
              <a href="" class="dropdown-item"><i data-feather="life-buoy"></i> Forum</a>
              <a href="" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a> --}}
              <a href="#" class="dropdown-item"><i data-feather="settings"></i>Settings</a>
              <a href="{{url('/admin/logout')}}" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div>
      </div>
      <div class="content-body">
        @yield('admin_content')
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('admin_theme/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/parsleyjs/parsley.min.js')}}"></script>

    <script src="{{asset('admin_theme/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/dataTables.dataTables.min.js')}}"></script>
    {{-- <script src="{{asset('admin_theme/js/dataTables.responsive.min.js')}}"></script> --}}
    <script src="{{asset('admin_theme/js/responsive.dataTables.min.js')}}"></script>

    <script src="{{asset('admin_theme/js/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery.flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('admin_theme/js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <script src="{{asset('admin_theme/js/dashforge.js')}}"></script>
    <script src="{{asset('admin_theme/js/dashforge.aside.js')}}"></script>
    <script src="{{asset('admin_theme/js/dashforge.sampledata.js')}}"></script>
    <script src="{{asset('admin_theme/js/dashboard-one.js')}}"></script>

    <script src="{{asset('admin_theme/js/prismjs/prism.js')}}"></script>
    <script src="{{asset('admin_theme/js/gmaps/gmaps.min.js')}}"></script>
    <script src="{{ asset('/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/fileinput.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <!-- append theme customizer -->
    <script src="{{asset('admin_theme/js/js.cookie.js')}}"></script>
    <script src="{{asset('admin_theme/js/dashforge.settings.js')}}"></script>
    <script src="{{ asset('admin_theme/js/select2.min.js')}}"></script>

    <script src="{{asset('admin_theme/js/custom.js')}}"></script>
    {{-- <script src="{{asset('admin_theme/js/functions.js')}}"></script> --}}
    <script src="{{ asset('admin_theme/js/custom2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin_theme/js/image-uploader.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin_theme/js/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

    

    <script>

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

      $(function(){
        'use strict';

        var mapMarker = new GMaps({
        el: '#map2',
        lat: 37.7810822,
        lng: -122.3871956,
        zoom: 13.91
        });

        mapMarker.addMarker({
        lat: 37.7810822,
        lng: -122.3871956,
        title: 'GMAP',
        click: function(e) {
            alert('You clicked in this marker');
        }
        });

      });

      $('#datetimepicker1').datetimepicker({
      });
      function datetime(e) {
        console.log({e});
      }
    </script>


  </body>
</html>
