<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  @php
    $setting = \App\Models\Setting::orderBy('id','desc')->first();
  @endphp
  <link rel="icon" type="image/png" href="{{ asset('upload/'.$setting->favicon) }}">

  <title>@yield('title')</title>

  {{-- <link href="{{ asset('backEnd/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <link href="{{ asset('backEnd/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/css/summernote-bs4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/css/custom.css') }}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  @stack('css')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  	@include('layouts.backEnd.partials.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
      	@include('layouts.backEnd.partials.header')
      	@yield('content')
      </div>
      <!-- End of Main Content -->
      	@include('layouts.backEnd.partials.footer')
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('backEnd/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('backEnd/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backEnd/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('backEnd/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('backEnd/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backEnd/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backEnd/js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('backEnd/js/sweetalert2@11.js') }}"></script>
  <script src="{{ asset('backEnd/js/customSweetalert2.js') }}"></script>
  <script src="{{ asset('backEnd/js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('backEnd/js/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('backEnd/plugins/select2/js/select2.full.min.js') }}"></script>

  <script>
    //image section
    $(document).ready(function(){
      $('#image').on('change',function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });

      $('#banner').on('change',function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showBanner').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });

    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    });

    //date picker
    $( function() {
      $(".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
      });
    } );

    //summer note
    $('.summernote').summernote({
      tabsize: 2,
      height: 300
    });

    $('.summernote2').summernote({
      tabsize: 2,
      height: 200
    });

  </script>

    @stack('js')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: 'error',
                title: '{{ $error }}'
            });
        </script>
        @endforeach
    @endif
    
    @if(Session::has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get("error") }}'
            });
        </script>
    @endif

    @if(Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ Session::get("success") }}"
            });
        </script>
    @endif

</body>

</html>
