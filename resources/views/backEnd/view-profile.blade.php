@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_PROFILE }}
@endsection

@section('content')
<div class="card shadow mb-5 pb-5">
  <div class="card-body"><br><br>
    <div class="container">
      <nav>
        <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_PROFILE }}</h1>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">{{ A_UPDATE_INFORMATION }}</a>

          <a class="nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">{{ A_UPDATE_PASSWORD }}</a>

        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">

        <!-- Info Section Start -->
        <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('admin_profile_update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NAME }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $admin->name }}" placeholder="Enter your name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EMAIL_ADDRESS }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{ $admin->email }}" placeholder="Enter your email">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EXISTING_PHOTO }}</label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.Auth::guard('admin')->user()->photo) }}" class="img-fluid img-thumbnail img-style">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NEW_PHOTO }}</label>
                      <div class="col-sm-10">
                        <input type="file" name="photo"><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Info Section End -->

        <!-- Password Section Start -->
        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('admin_password_update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')               

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_NEW_PASSWORD }}</label>
                      <div class="col-sm-9">
                        <input type="password" name="password" class="form-control">

                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_CONFIRM_PASSWORD }}</label>
                      <div class="col-sm-9">
                        <input type="password" name="password_confirmation" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Password Section End -->
      </div>
    </div>
  </div>
</div>
@endsection
