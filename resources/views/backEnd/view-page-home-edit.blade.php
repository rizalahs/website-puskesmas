@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_HOME_PAGE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('page-homes.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
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
                    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_HOME_PAGE }}</h1>
                  <form class="user" method="POST" action="{{ route('page-homes.update',$page_home->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group row p-2 title">
                      <span>{{ A_META_INFORMATION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ $page_home->title }}">
                      </div>
                    </div>

                 
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_DESCRIPTION }}</label>
                      <div class="col-sm-10">
                        <textarea name="meta_description" class="form-control" rows="3">{{ $page_home->meta_description }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_WELCOME_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_welcome_title" class="form-control" value="{{ $page_home->home_welcome_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_welcome_subtitle" class="form-control" value="{{ $page_home->home_welcome_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TEXT }}</label>
                      <div class="col-sm-10">
                        <textarea name="home_welcome_text" class="form-control summernote2" rows="3">{{ $page_home->home_welcome_text }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_1_TEXT }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar1_text" class="form-control" value="{{ $page_home->home_welcome_pbar1_text }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_1_VALUE }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar1_value" class="form-control" value="{{ $page_home->home_welcome_pbar1_value }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_2_TEXT }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar2_text" class="form-control" value="{{ $page_home->home_welcome_pbar2_text }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_2_VALUE }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar2_value" class="form-control" value="{{ $page_home->home_welcome_pbar2_value }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_3_TEXT }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar3_text" class="form-control" value="{{ $page_home->home_welcome_pbar3_text }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_3_VALUE }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar3_value" class="form-control" value="{{ $page_home->home_welcome_pbar3_value }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_4_TEXT }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar4_text" class="form-control" value="{{ $page_home->home_welcome_pbar4_text }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_4_VALUE }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar4_value" class="form-control" value="{{ $page_home->home_welcome_pbar4_value }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_5_TEXT }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar5_text" class="form-control" value="{{ $page_home->home_welcome_pbar5_text }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_PROGRESS_BAR_5_VALUE }}</label>
                      <div class="col-sm-4">
                        <input type="text" name="home_welcome_pbar5_value" class="form-control" value="{{ $page_home->home_welcome_pbar5_value }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_WHY_CHOOSE_US_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_why_choose_title" class="form-control" value="{{ $page_home->home_why_choose_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_why_choose_subtitle" class="form-control" value="{{ $page_home->home_why_choose_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_FEATURE_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_feature_title" class="form-control" value="{{ $page_home->home_feature_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_feature_subtitle" class="form-control" value="{{ $page_home->home_feature_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_SERVICE_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_service_title" class="form-control" value="{{ $page_home->home_service_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_service_subtitle" class="form-control" value="{{ $page_home->home_service_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_COUNTER_INFORMATION_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ITEM_1_TITLE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_1_title" class="form-control" value="{{ $page_home->counter_1_title }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_1_VALUE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_1_value" class="form-control" value="{{ $page_home->counter_1_value }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_1_ICON }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_1_icon" class="form-control" value="{{ $page_home->counter_1_icon }}">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ITEM_2_TITLE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_2_title" class="form-control" value="{{ $page_home->counter_2_title }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_2_VALUE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_2_value" class="form-control" value="{{ $page_home->counter_2_value }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_2_ICON }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_2_icon" class="form-control" value="{{ $page_home->counter_2_icon }}">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ITEM_3_TITLE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_3_title" class="form-control" value="{{ $page_home->counter_3_title }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_3_VALUE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_3_value" class="form-control" value="{{ $page_home->counter_3_value }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_3_ICON }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_3_icon" class="form-control" value="{{ $page_home->counter_3_icon }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ITEM_4_TITLE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_4_title" class="form-control" value="{{ $page_home->counter_4_title }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_4_VALUE }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_4_value" class="form-control" value="{{ $page_home->counter_4_value }}">
                      </div>

                      <label class="col-sm-2 col-form-label">{{ A_ITEM_4_ICON }}</label>
                      <div class="col-sm-2">
                        <input type="text" name="counter_4_icon" class="form-control" value="{{ $page_home->counter_4_icon }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_PORTFOLIO_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_portfolio_title" class="form-control" value="{{ $page_home->home_portfolio_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_portfolio_subtitle" class="form-control" value="{{ $page_home->home_portfolio_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_BOOKING_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BOOKING_FORM_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_booking_form_title" class="form-control" value="{{ $page_home->home_booking_form_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_BOOKING_FAQ_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_booking_faq_title" class="form-control" value="{{ $page_home->home_booking_faq_title }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_TEAM_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_team_title" class="form-control" value="{{ $page_home->home_team_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_team_subtitle" class="form-control" value="{{ $page_home->home_team_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_PRICING_TABLE_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_ptable_title" class="form-control" value="{{ $page_home->home_ptable_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_ptable_subtitle" class="form-control" value="{{ $page_home->home_ptable_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_TESTIMONIAL_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_testimonial_title" class="form-control" value="{{ $page_home->home_testimonial_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_testimonial_subtitle" class="form-control" value="{{ $page_home->home_testimonial_subtitle }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 title">
                      <span>{{ A_BLOG_SECTION }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_blog_title" class="form-control" value="{{ $page_home->home_blog_title }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_SUBTITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="home_blog_subtitle" class="form-control" value="{{ $page_home->home_blog_subtitle }}">
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