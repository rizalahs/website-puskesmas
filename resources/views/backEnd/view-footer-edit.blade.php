@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_FOOTER }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('footers.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_FOOTER }}</h1>
                  <form class="user" method="POST" action="{{ route('footers.update',$footer->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group row p-2 title">
                      <span>{{ A_GENERAL_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_COPYRIGHT_TEXT }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="footer_copyright" class="form-control" value="{{ $footer->footer_copyright }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ADDRESS }}</label>
                      <div class="col-sm-10">
                        <textarea name="footer_address" class="form-control" rows="3">{{ $footer->footer_address }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EMAIL }}</label>
                      <div class="col-sm-10">
                        <textarea name="footer_email" class="form-control" rows="3">{{ $footer->footer_email }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PHONE }}</label>
                      <div class="col-sm-10">
                        <textarea name="footer_phone" class="form-control" rows="3">{{ $footer->footer_phone }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_NEWSLETTER_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NEWSLETTER_TEXT }}</label>
                      <div class="col-sm-10">
                        <textarea name="newsletter_text" class="form-control" rows="3">{{ $footer->newsletter_text }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_CTA_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TEXT }}</label>
                      <div class="col-sm-10">
                        <textarea name="cta_text" class="form-control" rows="3">{{ $footer->cta_text }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_TEXT }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="cta_button_text" class="form-control" value="{{ $footer->cta_button_text }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BUTTON_URL }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="cta_button_url" class="form-control" value="{{ $footer->cta_button_url }}">
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