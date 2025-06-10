@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_TERM_PAGE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('page-terms.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_TERM_PAGE }}</h1>
                  <form class="user" method="POST" action="{{ route('page-terms.update',$page_term->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_HEADING }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="term_heading" class="form-control" value="{{ $page_term->term_heading }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CONTENT }}</label>
                      <div class="col-sm-10">
                        <textarea name="term_content" class="form-control summernote2" rows="3">{{ $page_term->term_content }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="mt_term" class="form-control" value="{{ $page_term->mt_term }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_DESCRIPTION }}</label>
                      <div class="col-sm-10">
                        <textarea name="md_term" class="form-control" rows="3">{{ $page_term->md_term }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_LANGUAGE }}</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control" value="{{ $page_term['language']['name'] }}">
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