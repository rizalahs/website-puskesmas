@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_NEWS }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('news.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_NEWS }}</h1>
                  <form class="user" method="POST" action="{{ route('news.update',$news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                   <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ $news->title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SLUG }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control" value="{{ $news->slug }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SHORT_CONTENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="short_content" class="form-control" rows="3">{{ $news->short_content }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CONTENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="content" class="form-control summernote" rows="6">{{ $news->content }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PUBLISH_DATE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="news_date" class="form-control datepicker" readonly="" value="{{ $news->news_date }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CATEGORY }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select name="category" class="form-control select2">
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? "selected" : "" }}>{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_COMMENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select name="comment" class="form-control select2">
                          <option value="On" {{ ($news->comment == 'On') ? "selected" : ""}}>{{ A_ON }}</option>
                          <option value="Off" {{ ($news->comment == 'Off') ? "selected" : ""}}>{{ A_OFF }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row p-2 seo-section">
                      <span>{{ A_PHOTO_BANNER }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_FEATURED_PHOTO }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="file" name="photo" id="image"><br>
                        <small>({{ A_ALLOWED_PHOTO_TYPES }})</small><br>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.$news->photo) }}" class="show-img" id="showImage">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BANNER }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="file" name="banner" id="banner"><br>
                        <small>({{ A_ALLOWED_PHOTO_TYPES }})</small><br>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.$news->banner) }}" class="show-img" id="showBanner">
                      </div>
                    </div>

                    <div class="form-group row p-2 seo-section">
                      <span>{{ A_SEO_INFORMATION }}</span>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="meta_title" class="form-control" value="{{ $news->meta_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_DESCRIPTION }}</label>
                      <div class="col-sm-10">
                        <textarea name="meta_description" class="form-control" rows="2">{{ $news->meta_description }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_LANGUAGE }}</label>
                      <div class="col-sm-10">
                        <select name="lang_id" class="form-control">
                          @foreach($languages as $language)
                          <option value="{{ $language->id }}" {{ $language->id == $news->lang_id ? "selected" : "" }}>{{ $language->name }}</option>
                          @endforeach
                        </select>
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


@push('js')
<!-- Date Picker-->
  <script type="text/javascript" src="{{ asset('backEnd/js/jquery-3.6.0.js') }}"></script>
  <script type="text/javascript" src="{{ asset('backEnd/js/jquery-ui.js') }}"></script>
@endpush