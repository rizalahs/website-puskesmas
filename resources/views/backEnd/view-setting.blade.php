@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_SETTIING }}
@endsection

@section('content')
<div class="card shadow mb-5 pb-5">
  <div class="card-body">
    <div class="container">
      <nav>
      <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_SETTIING }}</h1>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-link active" id="nav-logo-tab" data-toggle="tab" href="#nav-logo" role="tab" aria-controls="nav-logo" aria-selected="true">{{ A_LOGO }}</a>
          <a class="nav-link" id="nav-favicon-tab" data-toggle="tab" href="#nav-favicon" role="tab" aria-controls="nav-favicon" aria-selected="false">{{ A_FAVICON }}</a>
          <a class="nav-link" id="nav-top-bar-tab" data-toggle="tab" href="#nav-top-bar" role="tab" aria-controls="nav-top-bar" aria-selected="false">{{ A_TOP_BAR }}</a>

          <a class="nav-link" id="nav-banner-tab" data-toggle="tab" href="#nav-banner" role="tab" aria-controls="nav-banner" aria-selected="false">{{ A_BANNER }}</a>

          <a class="nav-link" id="nav-sidebar-tab" data-toggle="tab" href="#nav-sidebar" role="tab" aria-controls="nav-sidebar" aria-selected="false">{{ A_SIDEBAR }}</a>

          <a class="nav-link" id="nav-color-tab" data-toggle="tab" href="#nav-color" role="tab" aria-controls="nav-color" aria-selected="false">{{ A_COLOR }}</a>

          <a class="nav-link" id="nav-captcha-tab" data-toggle="tab" href="#nav-captcha" role="tab" aria-controls="nav-captcha" aria-selected="false">{{ A_CAPTCHA }}</a>

          <a class="nav-link" id="nav-language-tab" data-toggle="tab" href="#nav-language" role="tab" aria-controls="nav-language" aria-selected="false">{{ A_LANGUAGE }}</a>

          <a class="nav-link" id="nav-other-tab" data-toggle="tab" href="#nav-other" role="tab" aria-controls="nav-other" aria-selected="false">{{ A_OTHER }}</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">

        <!-- Logo Section Start -->
        <div class="tab-pane fade show active" id="nav-logo" role="tabpanel" aria-labelledby="nav-logo-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.logo.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_EXISTING_LOGO }}</label>
                      <div class="col-sm-9">
                        <img src="{{ asset('upload/'.$setting->logo) }}" class="img-fluid img-thumbnail logo">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_CHANGE_LOGO }}</label>
                      <div class="col-sm-9">
                        <input type="file" name="logo"><br>
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
        <!-- Logo Section End -->

        <!-- Favicon Section Start -->
        <div class="tab-pane fade" id="nav-favicon" role="tabpanel" aria-labelledby="nav-favicon-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.favicon.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_EXISTING_FAVICON }}</label>
                      <div class="col-sm-9">
                        <img src="{{ asset('upload/'.$setting->favicon) }}"
                        class="img-fluid img-thumbnail favicon">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_CHANGE_FAVICON }}</label>
                      <div class="col-sm-9">
                        <input type="file" name="favicon"><br>
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
        <!-- Favicon Section End -->

        <!-- Top Bar Section Start -->
        <div class="tab-pane fade" id="nav-top-bar" role="tabpanel" aria-labelledby="nav-top-bar-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.text.items.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TOP_BAR_EMAIL }}</label>
                      <div class="col-sm-9">
                        <input type="email" name="top_bar_email" class="form-control" value="{{ @$setting->top_bar_email }}"><br>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TOP_BAR_PHONE }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="top_bar_phone" class="form-control" value="{{ @$setting->top_bar_phone }}"><br>
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
        <!-- Top Bar Section End -->

        <!-- Banner Section start -->
        <div class="tab-pane fade" id="nav-banner" role="tabpanel" aria-labelledby="nav-banner-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.banner.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="tab-pane" id="tab_banner">
                      <div class="row">
                        <div class="col-md-6">
                          <table class="table table-bordered">                                
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_ABOUT_PAGE }}</label>
                                <p>
                                    <img src="{{ asset('upload/'.$setting->banner_about) }}" alt="" class="banner-img">
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                  <label>{{ A_CHANGE_BANNER }}</label><br>
                                  <small>{{ A_SELECT_PHOTO }}</small>
                                  <input type="file" class="banner-input" name="banner_about">
                                  <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_about">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_TESTIMONIAL_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_testimonial) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_testimonial">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_testimonial">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_NEWS_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_news) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_news">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_news">
                              </td> 
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_EVENT_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_event) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_event">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_event">
                              </td> 
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_CONTACT_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_contact) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_contact">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_contact">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_SEARCH_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_search) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_search">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_search">
                              </td> 
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_PRIVACY_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_privacy) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_privacy">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_privacy">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_VERIFY_SUBSCRIBER_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_verify_subscriber) }}" alt="" class="banner-img">  
                                </p>
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_verify_subscriber">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_verify_subscriber">
                              </td>
                            </tr>
                          </table>
                        </div>


                        <div class="col-md-6">
                          <table class="table table-bordered">    
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_FAQ_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_faq) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_faq">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_faq">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_SERVICE_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_service) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_service">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_service">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_PORTFOLIO_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_portfolio) }}" alt="" class="banner-img">
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_portfolio">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_portfolio">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_TEAM_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_team) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_team">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_team">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_PRICING_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_pricing) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_pricing">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_pricing">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_PHOTO_GALLERY_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_photo_gallery) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_photo_gallery">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_photo_gallery">
                              </td>
                            </tr>
                            <tr>
                              <td class="banner-half">
                                <label>{{ A_TERM_PAGE }}</label>
                                <p>
                                  <img src="{{ asset('upload/'.$setting->banner_terms) }}" alt="" class="banner-img">  
                                </p>                                        
                              </td>
                              <td class="banner-half">
                                <label>{{ A_CHANGE_BANNER }}</label><br>
                                <small>{{ A_SELECT_PHOTO }}</small>
                                <input type="file" class="banner-input" name="banner_terms">
                                <input type="submit" class="btn btn-primary btn-sm banner-btn" value="{{ A_CHANGE }}" name="form_banner_terms">
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Section End -->

        <!-- Sidebar Section Start -->
        <div class="tab-pane fade" id="nav-sidebar" role="tabpanel" aria-labelledby="nav-sidebar-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.text.items.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row p-2 slider-section">
                      <span>{{ A_NEWS_PAGE_SIDEBAR }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TOTAL_RECENT_POST }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="number" name="sidebar_total_recent_post" required class="form-control" value="{{ @$setting->sidebar_total_recent_post }}">
                      </div>
                    </div>

                    <div class="form-group row p-2 slider-section">
                      <span>{{ A_EVENT_PAGE_SIDEBAR }}</span>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TOTAL_UPCOMING_EVENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="number" name="sidebar_total_upcoming_event" required class="form-control" value="{{ @$setting->sidebar_total_upcoming_event }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TOTAL_PAST_EVENT }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="number" name="sidebar_total_past_event" required class="form-control" value="{{ @$setting->sidebar_total_past_event }}">
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
        <!-- Sidebar Section End -->

        <!-- Color Section Start -->
        <div class="tab-pane fade" id="nav-color" role="tabpanel" aria-labelledby="nav-color-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.text.items.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_COLOR }}</label>
                      <div class="col-sm-6">
                        <input type="text" name="front_end_color" class="form-control jscolor" value="{{ $setting->front_end_color }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-6">
                        <input type="submit" name="btn" class="btn btn-primary" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Color Section End -->

        <!-- Captcha Section start -->
        <div class="tab-pane fade" id="nav-captcha" role="tabpanel" aria-labelledby="nav-captcha-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.text.items.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_RECAPTCHA_SITE_KEY }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="google_recaptcha_key" class="form-control" value="{{ @$setting->google_recaptcha_key }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_RECAPTCHA_SECRET_KEY }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="google_recaptcha_secret" class="form-control" value="{{ @$setting->google_recaptcha_secret }}">
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_RECAPTCHA_STATUS }} <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <select name="google_recaptcha_status" class="form-control">
                          <option value="Show" {{ (@$setting->google_recaptcha_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$setting->google_recaptcha_status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                        </select>
                        
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
        <!-- Captcha Section End -->

        <!-- Language Section start -->
        <div class="tab-pane fade" id="nav-language" role="tabpanel" aria-labelledby="nav-language-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.text.items.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_LANGUAGE_OPTION }} <span class="text-danger">*</span></label>
                      <div class="col-sm-5">
                        <select name="language_status" class="form-control">
                          <option value="Show" {{ (@$setting->language_status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                          <option value="Hide" {{ (@$setting->language_status == 'Hide') ? "selected" : "" }}>{{ A_HIDE }}</option>
                        </select>
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
        <!-- Language Section End -->

        <!-- Other Section Start -->
        <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
          <div class="card p-0 shadow-lg">
            <div class="card-body row">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('setting.text.items.update',$setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                   
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TAWK_LIVE_CHAT_CODE }}</label>
                      <div class="col-sm-9">
                        <textarea  name="tawk_live_chat_code" rows="6" class="form-control">{{ @$setting->tawk_live_chat_code }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ A_TAWK_LIVE_CHAT_STATUS }}</label>
                      <div class="col-sm-9">
                        <select name="tawk_live_chat_status" class="form-control">
                          <option value="On" {{ (@$setting->tawk_live_chat_status== 'On') ? "selected":""}}>{{ A_ON }}</option>
                          <option value="Off" {{ (@$setting->tawk_live_chat_status == 'Off') ? "selected" : "" }}>{{ A_OFF }}</option>
                        </select>
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
        <!-- Other Section End -->

      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script type="text/javascript" src="{{ asset('backEnd/js/jscolor.js') }}"></script>
@endpush