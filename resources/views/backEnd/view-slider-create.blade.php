@extends('layouts.backEnd.app')

@section('title')
{{ A_ADD_SLIDER }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('sliders.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_ADD_SLIDER }}</h1>
                  <form class="user" method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PHOTO }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="file" name="photo"><br>
                        <small>({{ A_ALLOWED_PHOTO_TYPES }})</small><br>
                        
                      </div>
                    </div>

                   <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_HEADING }}</label>
                      <div class="col-sm-10">
                      	<input type="text" name="heading" class="form-control">
                      </div>
                    </div>                    

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CONTENT }}</label>
                      <div class="col-sm-10">
                        <textarea name="content" class="form-control summernote" rows="6"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_1_TEXT }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="button1_text" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_1_URL }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="button1_url" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_2_TEXT }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="button2_text" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_2_URL }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="button2_url" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_POSITION }}</label>
                      <div class="col-sm-10">
                        <select name="position" class="form-control select2">
                          <option value="Left">{{ A_LEFT }}</option>
                          <option value="Right">{{ A_RIGHT }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_LANGUAGE }}</label>
                      <div class="col-sm-10">
                        <select name="lang_id" class="form-control select2">
                          @foreach($languages as $language)
                          <option value="{{ $language->id }}">{{ $language->name }}</option>
                          @endforeach
                        </select>
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