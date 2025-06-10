@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_FILE }}
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_FILE }}</h1>
                  <form class="user" method="POST" action="{{ route('files.update',$file->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ $file->title }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_URL }} </label>
                      <div class="col-sm-10">
                        <a href="{{ asset('upload/'.$file->file_name) }}" target="_blank">{{ url('upload/file/'.$file->file_name) }}</a>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PREVIEW }} </label>
                      <div class="col-sm-10">
                        @php
                          $exp = explode('.',$file->file_name);
                        @endphp

                        @if( $exp[1] == 'jpg' || $exp[1] == 'JPG' || $exp[1] == 'jpeg' || $exp[1] == 'jpeg' || $exp[1] == 'png' || $exp[1] == 'PNG' || $exp[1] == 'gif' || $exp[1] == 'GIF' )
                        <img src="{{ asset('upload/'.$file->file_name) }}" class="img-fluid img-thumbnail img-style">
                        @endif

                        @if( $exp[1] == 'pdf' || $exp[1] == 'PDF' )
                        <img src="{{ asset('backEnd/img/pdf.png') }}" class="img-fluid img-thumbnail img-style">
                        @endif

                        @if( $exp[1] == 'doc' || $exp[1] == 'DOC' || $exp[1] == 'docx' || $exp[1] == 'DOCX' )
                        <img src="{{ asset('backEnd/img/docx.png') }}" class="img-fluid img-thumbnail img-style">
                        @endif

                        @if( $exp[1] == 'xls' || $exp[1] == 'XLS' || $exp[1] == 'xlsx' || $exp[1] == 'XLSX' )
                        <img src="{{ asset('backEnd/img/xlsx.png') }}" class="img-fluid img-thumbnail img-style">
                        @endif

                        @if( $exp[1] == 'csv' || $exp[1] == 'CSV' )
                        <img src="{{ asset('backEnd/img/csv.png') }}" class="img-fluid img-thumbnail img-style">
                        @endif 
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
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{ A_UPDATE }}">
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