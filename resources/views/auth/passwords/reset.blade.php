<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ A_RESET_PASSWORD }}</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('backEnd/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('backEnd/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backEnd/css/custom.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ A_RESET_PASSWORD }}</h1>
                  </div>
                  <form method="POST" action="{{ route('admin_reset_password_submit',[$token,$email]) }}" class="user">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-group row">
                        <label for="password" class="col-md-12 col-form-label text-md-left">{{ A_PASSWORD }}</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control fz_15" name="password" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-12 col-form-label text-md-left">{{ A_CONFIRM_PASSWORD }}</label>
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control fz_15" name="password_confirmation" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-user btn-block fz_15">{{ A_RESET_PASSWORD }}</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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