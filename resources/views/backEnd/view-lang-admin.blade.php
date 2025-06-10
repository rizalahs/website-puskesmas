@extends('layouts.backEnd.app')

@section('title')
{{ A_LANGUAGE_ADMIN }}
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
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_LANGUAGE_ADMIN }}</h1>
                  <form class="user" method="POST" action="{{ route('admin_language_update') }}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>{{ A_KEY }}</th>
                                <th>{{ A_VALUE }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($language_data as $row)
                                <input type="hidden" name="lang_id[]" value="{{ $row->id }}">
                                <input type="hidden" name="lang_string[]" value="{{ $row->lang_string }}">
                                <tr>
                                    <td>
                                        <input type="text" name="" class="form-control" value="{{ $row->lang_string }}" disabled>
                                    </td>
                                    <td>
                                        <input type="text" name="lang_string_value[]" class="form-control" value="{{ $row->lang_string_value }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">{{ A_UPDATE }}</button>
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