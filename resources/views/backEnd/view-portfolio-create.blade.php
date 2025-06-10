@extends('layouts.backEnd.app')

@section('title')
{{ A_ADD_PORTFOLIO }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('portfolios.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_ADD_PORTFOLIO }}</h1>
                  <form class="user" method="POST" action="{{ route('portfolios.store') }}" enctype="multipart/form-data">
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
                      <label class="col-sm-2 col-form-label">{{ A_SHORT_CONTENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="short_content" class="form-control" rows="3"></textarea>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CONTENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="content" class="form-control summernote" rows="6"></textarea>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CLIENT_NAME }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="client_name" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CLIENT_COMPANY }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="client_company" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_START_DATE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="start_date" class="form-control datepicker" readonly="" value="{{ date('Y-m-d') }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_END_DATE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="end_date" class="form-control datepicker" readonly="" value="{{ date('Y-m-d') }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_WEBSITE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="website" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_COST }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="cost" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_COMMENT }}</label>
                      <div class="col-sm-10">
                        <textarea name="client_comment" class="form-control" rows="5"></textarea>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CATEGORY }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select name="category_id" class="form-control select2">
                          @foreach($portfolio_categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        
                      </div>
                    </div>

                    <div class="form-group row p-2 seo-section">
                      <span>{{ A_FEATURED_PHOTO }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_FEATURED_PHOTO }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="file" name="photo"><br>
                        <small>({{ A_ALLOWED_PHOTO_TYPES }})</small><br>
                        
                      </div>
                    </div>

                    <div class="form-group row p-2 seo-section">
                      <span>{{ A_OTHER_PHOTOS }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_OTHER_PHOTOS }}</label>
                      <div class="col-sm-10">
                        <input type="file" name="othersPhoto[]" multiple><br>
                        <small>({{ A_YOU_CAN_SELECT_MULTIPLE_IMAGE }})</small><br>
                      </div>
                    </div>

                    <div class="form-group row p-2 seo-section">
                      <span>{{ A_SEO_INFORMATION }}</span>
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

@push('js')
<!-- Date Picker-->
  <script type="text/javascript" src="{{ asset('backEnd/js/jquery-3.6.0.js') }}"></script>
  <script type="text/javascript" src="{{ asset('backEnd/js/jquery-ui.js') }}"></script>
@endpush