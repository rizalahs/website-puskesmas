@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_SOCIAL_MEDIA }}
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_SOCIAL_MEDIA }}</h1>
                  <form class="user" method="POST" action="{{ route('social-medias.update') }}">
                    @csrf
                    @method('PUT')

                    @foreach($social_medias as $data)
                    <input type="hidden" name="id[]" value="{{ $data->id }}">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ $data->social_name }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="social_url[]" class="form-control" value="{{ $data->social_url }}">
                      </div>
                    </div>
                    @endforeach

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