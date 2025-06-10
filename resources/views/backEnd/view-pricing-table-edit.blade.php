@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_PRICING_TABLE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('why-chooses.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_PRICING_TABLE }}</h1>
                  <form class="user" method="POST" action="{{ route('pricing-tables.update',$pricing_table->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ICON }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="icon" class="form-control" value="{{ $pricing_table->icon }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ $pricing_table->title }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PRICE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" value="{{ $pricing_table->price }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}  <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="subtitle" class="form-control" value="{{ $pricing_table->subtitle }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TEXT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="text" class="form-control summernote" rows="6">{{ $pricing_table->text }}</textarea>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_TEXT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="button_text" class="form-control" value="{{ $pricing_table->button_text }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_URL }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="button_url" class="form-control" value="{{ $pricing_table->button_url }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_LANGUAGE }}</label>
                      <div class="col-sm-10">
                        <select name="lang_id" class="form-control">
                          @foreach($languages as $language)
                          <option value="{{ $language->id }}" {{ $language->id == $pricing_table->lang_id ? "selected" : "" }}>{{ $language->name }}</option>
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