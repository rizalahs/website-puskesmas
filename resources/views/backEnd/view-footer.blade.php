@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_FOOTER }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_FOOTER }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($languages as $key => $language)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $language->name }}</td>
            <td>
              <a href="{{ route('footers.edit',$language->id)}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-2">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                    <h1 class="h4 text-gray-900 mb-4 text-danger heading">{{ A_FOOTER_SETTING_ITEMS_LANG_INDEPENDENT }}</h1>
                    <hr class="p-2 mb-4">
                  <form class="user" method="POST" action="{{ route('footer.independent.update') }}" enctype="multipart/form-data">
                    @csrf

                    
                    <div class="form-group row p-2 title">
                      <span>{{ A_GENERAL_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_NUMBER_RECENT_NEWS }}</label>
                      <div class="col-sm-9">
                        <input type="number" name="footer_recent_news_item" class="form-control" value="{{ @$lang_independent->footer_recent_news_item }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_NUMBER_RECENT_PORTFOLIOS }}</label>
                      <div class="col-sm-9">
                        <input type="number" name="footer_recent_portfolio_item" class="form-control" value="{{ @$lang_independent->footer_recent_portfolio_item }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_CTA_BACKGROUND }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_EXISTING_BACKGROUND }}</label>
                      <div class="col-sm-9">
                        <img src="{{ asset('upload/'.$lang_independent->cta_background) }}" class="img-fluid img-thumbnail img-style">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_CHANGE_BACKGROUND }}</label>
                      <div class="col-sm-9">
                        <input type="file" name="cta_background"><br>
                        <small>({{ A_ALLOWED_PHOTO_TYPES }})</small><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
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
</div>
@endsection