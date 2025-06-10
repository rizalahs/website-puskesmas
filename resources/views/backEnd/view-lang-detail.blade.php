@extends('layouts.backEnd.app')

@section('title')
{{ A_LANGUAGE_DETAIL }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="pl-2">
          <a href="{{route('languages.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
          <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_LANGUAGE_DETAIL }}</h1>
            <form class="user" method="POST" action="{{ route('languages.detail.update') }}">
              @csrf

              @foreach($language_details as $lang_detail)
              <input type="hidden" name="id[]" value="{{ $lang_detail->id }}">
              <div class="form-group row language-page-separator">
                <label class="col-sm-6 col-form-label">{{ $lang_detail->lang_string }}</label>
                <div class="col-sm-6">
                  <input type="text" name="lang_string_value[]" class="form-control" value="{{ $lang_detail->lang_string_value }}">
                </div>
              </div>
              @endforeach

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
@endsection