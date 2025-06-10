@extends('layouts.backEnd.app')

@section('title')
{{ A_EMAIL_TO_SUBSCRIBER }}
@endsection

@section('content')
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EMAIL_TO_SUBSCRIBER }}</h1>
                  <form class="user" method="POST" action="{{ route('subscribers.email.send') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBJECT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_MESSAGE }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea name="message" class="form-control" rows="10">{{ old('message') }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{ A_SEND_EMAIL }}">
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
  <script type="text/javascript" src="{{ asset('backEnd/js/jquery-3.6.0.js') }}"></script>
  <script type="text/javascript" src="{{ asset('backEnd/js/jquery-ui.js') }}"></script>
@endpush