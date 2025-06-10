@extends('layouts.backEnd.app')

@section('title')
{{ A_ADD_LANGUAGE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('languages.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_ADD_LANGUAGE }}</h1>
                  <form class="user" method="POST" action="{{ route('languages.store') }}">
                    @csrf

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_NAME }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                      	<input type="text" name="name" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_SHORT_NAME }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="short_name" class="form-control">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_LAYOUT_DIRECTION }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <select name="layout_direction" class="form-control">
                          <option value="Left">{{ A_LEFT }}</option>
                          <option value="Right">{{ A_RIGHT }}</option>
                        </select>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_LANGUAGE_DEFAULT }}</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="lang_default" value="0">
                        <input type="checkbox" name="lang_default" value="1" class="lang-checkbox">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
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