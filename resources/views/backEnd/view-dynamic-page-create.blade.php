@extends('layouts.backEnd.app')

@section('title')
{{ A_ADD_DYNAMIC_PAGE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('dynamic-pages.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_ADD_DYNAMIC_PAGE }}</h1>
                  <form class="user" method="POST" action="{{ route('dynamic-pages.store') }}" enctype="multipart/form-data">
                    @csrf

                   <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NAME }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                      	<input type="text" name="name" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SLUG }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CONTENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="content" class="form-control summernote" rows="6"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BANNER }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="file" name="banner"><br>
                        <small>({{ A_ALLOWED_PHOTO_TYPES }})</small><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="meta_title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_DESCRIPTION }}</label>
                      <div class="col-sm-10">
                        <textarea name="meta_description" class="form-control" rows="2"></textarea>
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