@extends('layouts.backEnd.app')

@section('title')
{{ A_COMMENT }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_COMMENT }}</h1>
                  <form class="user" method="POST" action="{{ route('comment.update',@$commet->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <p class="news-comment">{{ A_GET_YOUR_COMMENT_CODE }} (<a href="https://developers.facebook.com/docs/plugins/comments/">https://developers.facebook.com/docs/plugins/comments/</a>)</p>
                      <label class="col-sm-12">{{ A_CODE_AFTER_OPENING_BODY_TAG }} </label>
                      <div class="col-sm-12">
                        <textarea name="code_body" class="form-control" rows="8">{{ @$commet->code_body }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-12">
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