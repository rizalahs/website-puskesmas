@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_HOME_PAGE }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_HOME_PAGE }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_TITLE }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($languages as $key => $language)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $language['pageHome']['title'] }}</td>
            <td>{{ $language->name }}</td>
            <td>
              <a href="{{ route('page-homes.edit',$language->id)}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">
      <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-2">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-4">
                    <h1 class="h4 text-gray-900 mb-4 page-home">{{ A_HOME_PAGE_ITEMS_LANG_INDEPENDENT }}</h1>
                  <hr class="p-2 mb-4">

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_WELCOME_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_VIDEO }}</label>
                      <div class="col-sm-10">
                        <textarea name="home_welcome_video" class="form-control" rows="3">{{ $lang_independent->home_welcome_video }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_welcome_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_welcome_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_welcome_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                    
                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.welcome.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_WELCOME_SECTION_VIDEO_BACKGROUND }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EXISTING_VIDEO_BACKGROUND }}</label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.$lang_independent->home_welcome_video_bg) }}" class="img-fluid img-thumbnail page-home-img">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_VIDEO_BACKGROUND }}</label>
                      <div class="col-sm-10">
                        <input type="file" name="home_welcome_video_bg"><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_WHY_CHOOSE_US_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_why_choose_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_why_choose_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_why_choose_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_FEATURE_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_feature_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_feature_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_feature_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_SERVICE_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_service_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_service_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_service_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_COUNTER_INFORMATION_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="counter_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->counter_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->counter_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.counter.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_COUNTER_PHOTO_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EXISTING_COUNTER_BACKGROUND }}</label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.$lang_independent->counter_photo) }}" class="img-fluid img-thumbnail page-home-img">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NEW_COUNTER_BACKGROUND }}</label>
                      <div class="col-sm-10">
                        <input type="file" name="counter_photo"><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_PORTFOLIO_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_portfolio_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_portfolio_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_portfolio_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_BOOKING_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_booking_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_booking_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_booking_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.booking.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_BOOKING_PHOTO_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EXISTING_BOOKING_BACKGROUND }}</label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.$lang_independent->home_booking_photo) }}" class="img-fluid img-thumbnail page-home-img">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NEW_BOOKING_BACKGROUND }}</label>
                      <div class="col-sm-10">
                        <input type="file" name="home_booking_photo"><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_TEAM_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_team_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_team_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_team_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_PRICING_TABLE_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_ptable_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_ptable_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_ptable_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_TESTIMONIAL_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_testimonial_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_testimonial_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_testimonial_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->


                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.testimonial.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_TESTIMONIAL_PHOTO_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EXISTING_PHOTO }}</label>
                      <div class="col-sm-10">
                        <img src="{{ asset('upload/'.$lang_independent->home_testimonial_photo) }}" class="img-fluid img-thumbnail page-home-img">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_NEW_PHOTO }}</label>
                      <div class="col-sm-10">
                        <input type="file" name="home_testimonial_photo"><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->

                  <!-- form start-->
                  <form class="user" method="POST" action="{{ route('page.home.indp.update',@$lang_independent->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row p-2 title">
                      <span>{{ A_BLOG_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_blog_item" class="form-control" value="{{ @$lang_independent->home_blog_item }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_QUESTION_SHOW_ON_HOME }}?</label>
                      <div class="col-sm-10">
                        <select name="home_blog_status" class="form-control select2">
                          <option value="Show" {{ (@$lang_independent->home_blog_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$lang_independent->home_blog_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                  <!-- form end-->
                    
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