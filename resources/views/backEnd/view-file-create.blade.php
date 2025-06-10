@extends('layouts.backEnd.app')

@section('title')
{{ A_ADD_FILE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('files.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
    </div>
  </div><br>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_ADD_FILE }}</h1>
                  <form class="user" method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_UPLOAD_FILE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="file" name="file_name"><br>
                        <small>({{ A_ALLOWED_FILE_TYPES }})</small><br>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{ A_SUBMIT }}">
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
@endsection