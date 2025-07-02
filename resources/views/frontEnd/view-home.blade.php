@extends('frontEnd.layouts.app')

@section('content')
<!--Slider Start-->
<div class="slider">
    <div class="slide-carousel slider-one owl-carousel">
        @foreach($sliders as $slider)
            <div class="slider-item flex" style="background-image:url({{ asset('upload/'.$slider->photo) }});">
                <div class="bg-slider"></div>
                <div class="container">
                    <div class="row">
                        <div class="@if($slider->position == 'Left') {{'col-lg-6 col-md-9 col-12'}} @else {{'offset-lg-6 col-lg-6 offset-md-3 col-md-9 col-12'}} @endif">
                            <div class="slider-text">

                                @if($slider->heading != '' )
                                <div class="text-animated">
                                    <h1>{{ $slider->heading }}</h1>
                                </div>
                                @endif

                                @if($slider->content != '')
                                <div class="text-animated">
                                    <p>
                                        {!! $slider->content !!}
                                    </p>
                                </div>
                                @endif

                                @if($slider->button1_text != '' || $slider->button2_text != '' )
                                <div class="text-animated">
                                    <ul>
                                        @if($slider->button1_text != '')
                                        <li><a href="{{ $slider->button1_url }}">{{ $slider->button1_text }}</a></li>
                                        @endif

                                        @if($slider->button2_text != '')
                                        <li><a href="{{ $slider->button2_url }}">{{ $slider->button2_text }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--Slider End-->

<!--About Start-->
@if($page_home_lang_independent->home_welcome_status == 'Show')
<div class="about-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt_30">
                <div class="about-content">
                    <div class="headline-left">
                        <h2>
                            <span>{{ $page_home->home_welcome_title }}</span>
                            {{ $page_home->home_welcome_subtitle }}
                        </h2>
                    </div>
                    <p>
                    	{!! $page_home->home_welcome_text !!}
                    </p>

                    <div class="progress-gallery main-prog">

                        @if( $page_home->home_welcome_pbar1_text !='' && $page_home->home_welcome_pbar1_value !='' )
                        <div class="bar-container">
                            <p>
                            	{{ $page_home->home_welcome_pbar1_text }}
                            </p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $page_home->home_welcome_pbar1_value }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $page_home->home_welcome_pbar1_value }}%">
                                </div>
                            </div>
                            <div class="percentage-show">{{ $page_home->home_welcome_pbar1_value}}%</div>
                        </div>
                        @endif

                        @if( $page_home->home_welcome_pbar2_text !='' && $page_home->home_welcome_pbar2_value !='' )
                        <div class="bar-container">
                            <p>{{ $page_home->home_welcome_pbar2_text }}</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $page_home->home_welcome_pbar2_value }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $page_home->home_welcome_pbar2_value }}%">
                                </div>
                            </div>
                            <div class="percentage-show">{{ $page_home->home_welcome_pbar2_value }}%</div>
                        </div>
                        @endif

                        @if( $page_home->home_welcome_pbar3_text !='' && $page_home->home_welcome_pbar3_value !='' )
                        <div class="bar-container">
                            <p>{{ $page_home->home_welcome_pbar3_text }}</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $page_home->home_welcome_pbar3_value }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $page_home->home_welcome_pbar3_value }}%">
                                </div>
                            </div>
                            <div class="percentage-show">{{ $page_home->home_welcome_pbar3_value}}%</div>
                        </div>
                        @endif

                        @if( $page_home->home_welcome_pbar4_text !='' && $page_home->home_welcome_pbar4_value !='' )
                        <div class="bar-container">
                            <p>{{ $page_home->home_welcome_pbar4_text }}</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $page_home->home_welcome_pbar4_value }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $page_home->home_welcome_pbar4_value }}%">
                                </div>
                            </div>
                            <div class="percentage-show">{{ $page_home->home_welcome_pbar4_value }}%</div>
                        </div>
                        @endif

                        @if( $page_home->home_welcome_pbar5_text !='' && $page_home->home_welcome_pbar5_value !='' )
                        <div class="bar-container">
                            <p>{{ $page_home->home_welcome_pbar5_text }}</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $page_home->home_welcome_pbar5_value }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $page_home->home_welcome_pbar5_value }}%">
                                </div>
                            </div>
                            <div class="percentage-show">{{ $page_home->home_welcome_pbar5_value }}%</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt_30">
                <div class="about-tab" style="background-image: url({{ asset('upload/'.$page_home_lang_independent->home_welcome_video_bg) }})">
                    <div class="video-section">
                        <a class="video-button" href="#" data-toggle="modal" data-target="#myModal"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-Box Start-->
    <div class="video-modal">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-box bg-area">
                        <div class="modal fade in" id="myModal" role="dialog">
                            <div class="modal-dialog hb-style">

                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="download-video">
                                            <div class="pos_r h_0 pb_56_per">
                                               {!! $page_home_lang_independent->home_welcome_video !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">{{ CLOSE }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-Box End-->
</div>
@endif
<!--About End-->

<!--Blog-Area Start-->
@if($page_home_lang_independent->home_blog_status == 'Show')
<div class="blog-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_blog_title }}</h2>
                    <h3>{{ $page_home->home_blog_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel owl-carousel">
                    @php $i=0; @endphp
                    @foreach($news_fetched as $data)
                        @php $i++; @endphp
                        @if($i > $page_home_lang_independent->home_blog_item)
                            @php break; @endphp
                        @endif

                        <div class="blog-item effect-item">
                            <a href="{{ route('news.view',$data->slug) }}" class="image-effect">
                                <div class="blog-image" style="background-image: url({{ asset('upload/'.$data->photo) }})"></div>
                            </a>
                            <div class="blog-text">
                                <h3><a href="{{ route('news.view',$data->slug) }}">{{ $data->title }}</a></h3>
                                <span><i class="fas fa-calendar"></i>
                                    {{ date('M d, Y',strtotime($data->news_date)) }}
                                </span>
                                <p>
                                    {{ $data->short_content }}
                                </p>
                            </div>
                            <div class="blog-author">
                                @php
                                $category = \App\Models\Category::find($data->category_id);
                                @endphp
                                <ul>
                                    <li>
                                        <a href="{{ route('news.category.view',$category->slug) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            {{ $data['category']['name'] }}
                                        </a>
                                    </li>
                                    <li class="blog-button"><a href="{{ route('news.view',$data->slug) }}"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--Blog-Area End-->


<!--Feature-Area Start-->
@if($page_home_lang_independent->home_feature_status == 'Show')
<div class="feature-area feature-two bg-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_feature_title }}</h2>
                    <h3>{{ $page_home->home_feature_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($features as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="{{ $data->icon }}" aria-hidden="true"></i>
                        </div>
                        <div class="feature-text">
                            <h4>{{ $data->title }}</h4>
                            <p>
                                {!! $data->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!--Feature-Area End-->

<!--Services Start-->
@if($page_home_lang_independent->home_service_status == 'Show')
<div class="services-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_service_title }}</h2>
                    <h3>{{ $page_home->home_service_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
        	@foreach($services as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="services-item effect-item">
                        <a href="{{ route('service.view',$data->slug) }}" class="image-effect">
                            <div class="services-photo" style="background-image: url({{ asset('upload/'.$data->photo) }})"></div>
                        </a>
                        <div class="services-text">
                            <h3><a href="{{ route('service.view',$data->slug) }}">
                            	{{ $data->name }}</a></h3>
                            <p>
                                {!! $data->short_description !!}
                            </p>
                            <div class="button-bn">
                                <a href="{{ route('service.view',$data->slug) }}">{{ READ_MORE }}<i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!--Services End-->

<!--Counter-Area Start-->
@if($page_home_lang_independent->counter_status == 'Show')
<div class="counterup-area pt_60 pb_90" style="background-image: url({{ asset('upload/'.$page_home_lang_independent->counter_photo) }})">
    <div class="bg-counterup"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item flex">
                    <i class="{{ $page_home->counter_1_icon }}" aria-hidden="true"></i>
                    <h2 class="counter">{{ $page_home->counter_1_value }}</h2>
                    <h4>{{ $page_home->counter_1_title }}</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item flex">
                    <i class="{{ $page_home->counter_2_icon }}" aria-hidden="true"></i>
                    <h2 class="counter">{{ $page_home->counter_2_value }}</h2>
                    <h4>{{ $page_home->counter_2_title }}</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item flex">
                    <i class="{{ $page_home->counter_3_icon }}" aria-hidden="true"></i>
                    <h2 class="counter">{{ $page_home->counter_3_value }}</h2>
                    <h4>{{ $page_home->counter_3_title }}</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item flex">
                    <i class="{{ $page_home->counter_4_icon }}" aria-hidden="true"></i>
                    <h2 class="counter">{{ $page_home->counter_4_value }}</h2>
                    <h4>{{ $page_home->counter_4_title }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--Counter-Area End-->

<!--Choose-Area Start-->
@if($page_home_lang_independent->home_why_choose_status == 'Show')
<div class="choose-area pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_why_choose_title }}</h2>
                    <h3>{{ $page_home->home_why_choose_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($why_chooses as $data)
                <div class="col-lg-4">
                    <div class="choose-item flex" style="background-image: url({{ asset('upload/'.$data->photo) }})">
                        <div class="choose-icon">
                            <i class="{{ $data->icon }}" aria-hidden="true"></i>
                        </div>
                        <div class="choose-text">
                            <h4>{{ $data->name }}</h4>
                            <p>
                                {!! $data->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!--Choose-Area End-->

<!--Portfolio Start-->
@if($page_home_lang_independent->home_portfolio_status == 'Show')
<div class="portfolio-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_portfolio_title }}</h2>
                    <h3>{{ $page_home->home_portfolio_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="portfolio-menu">
                    <ul id="filtrnav">
                        <li class="filtr filtr-active" data-filter="all">{{ ALL }}</li>
                        @foreach($portfolio_categories as $data)
                            <li class="filtr" data-filter="{{ $data->id }}">{{  $data->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row filtr-container">
            @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 filtr-item" data-category="{{ $portfolio->category_id }}" data-sort="Menu">
                    <div class="portfolio-group">
                        <div class="portfolio-photo" style="background-image: url({{ asset('upload/'.$portfolio->photo) }})">
                            <div class="portfolio-bg"></div>
                            <div class="portfolio-table">
                                <div class="portfolio-icon">
                                    <a href="{{ asset('upload/'.$portfolio->photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-text">
                            <h3><a href="{{ route('portfolio.view',$portfolio->slug) }}">{{ $portfolio->name }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!--Portfolio End-->

<!--Booking-Area Start-->
@if($page_home_lang_independent->home_booking_status == 'Show')
<div class="booking-area pt_60 pb_90" style="background-image: url({{ asset('upload/'.$page_home_lang_independent->home_booking_photo) }})">
    <div class="bg-booking"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="booking-gallery">
                    <div class="headline hl-white hl-left">
                        <h2>{{ $page_home->home_booking_form_title }}</h2>
                    </div>
                    <div class="booking-form pt_30">
                        <form method="POST" action="{{ route('home.send.email') }}" class="form_contact_ajax">
                            @csrf
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="first_name" placeholder="{{ FIRST_NAME }}">
                                    <span class="text-danger error-text first_name_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="last_name" placeholder="{{ LAST_NAME }}">
                                    <span class="text-danger error-text last_name_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="{{ PHONE_NUMBER }}">
                                    <span class="text-danger error-text phone_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="email" placeholder="{{ EMAIL_ADDRESS }}">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="{{ SUBJECT }}">
                                    <span class="text-danger error-text subject_error"></span>
                                </div>
                                <div class="form-group col-12">
                                    <textarea class="form-control" name="message" placeholder="{{ MESSAGE }}"></textarea>
                                    <span class="text-danger error-text message_error"></span>
                                </div>
                                @php
                                    $setting = \App\Models\Setting::orderBy('id','desc')->first();
                                @endphp
                                @if($setting->google_recaptcha_status == 'Show')
                                <div class="form-group col-12">
                                    <div class="g-recaptcha" data-sitekey="{{ $setting->google_recaptcha_key }}"></div>
                                    <span class="text-danger error-text g-recaptcha-response_error"></span>
                                </div>
                                @endif
                                <div class="form-button col-12">
                                    <button type="submit" class="btn btn2" name="form_quick_contact">{{ SUBMIT }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-area faq-home mt_30">
                    <div class="headline hl-white hl-left">
                        <h2>{{ $page_home->home_booking_faq_title }}</h2>
                    </div>
                    <div class="faq-group pt-30">
                        <div id="accordion">
                        @php
                            $i=0;
                        @endphp
                        @foreach($faqs as $faq)
                            @php $i++; @endphp
                            <div class="faq-item card">
                                <div class="faq-header" id="heading{{$i}}">
                                    <button class="faq-button collapsed" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}"><i class="fa fa-caret-right"></i>{{ $faq->title }}</button>
                                </div>
                                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                                    <div class="faq-body">
                                        {!! $faq->content !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--Booking-Area End-->

<!--Team-Area Start-->
@if($page_home_lang_independent->home_team_status == 'Show')
<div class="team-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_team_title }}</h2>
                    <h3>{{ $page_home->home_team_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team-carousel owl-carousel">
                    @foreach ($team_members as $data)
                        <div class="team-item">
                            <div class="team-photo">
                                <img src="{{ asset('upload/'.$data->photo) }}" alt="Team Photo">
                            </div>
                            <div class="team-text">
                                <a href="{{ route('home.team.member',['id' => $data->id,'slug' => $data->slug]) }}">{{ $data->name }}</a>
                                <p>{{ $data->designation }}</p>
                            </div>
                            <div class="team-social">
                                <ul>
                                    @if($data->facebook != '')
                                        <li><a href="{{ $data->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    @endif
                                    @if($data->twitter != '')
                                        <li><a href="{{ $data->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if($data->linkedin != '')
                                        <li><a href="{{ $data->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    @endif
                                    @if($data->youtube != '')
                                        <li><a href="{{ $data->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    @endif
                                    @if($data->google_plus != '')
                                        <li><a href="{{ $data->google_plus }}" target="_blank"><i class="fab fa-google-plus"></i></a></li>
                                    @endif
                                    @if($data->instagram != '')
                                        <li><a href="{{ $data->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if($data->flickr != '')
                                        <li><a href="{{ $data->flickr }}" target="_blank"><i class="fab fa-flickr"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--Team-Area End-->

<!--Price-Table Start-->
@if($page_home_lang_independent->home_ptable_status == 'Show')
<div class="price-area bg-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $page_home->home_ptable_title }}</h2>
                    <h3>{{ $page_home->home_ptable_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($pricing_tables as $data)
                <div class="offset-md-2 col-md-8 offset-md-2 offset-lg-0 col-lg-4">
                    <div class="price-item">
                        <div class="price-header">
                            <i class="{{ $data->icon }}" aria-hidden="true"></i>
                            <h3>{{ $data->title }}</h3>
                            <h2>{{ $data->price }}</h2>
                            <p>{{ $data->subtitle }}</p>
                        </div>
                        <div class="price-body">
                            {!! $data->text !!}
                        </div>
                        <div class="price-footer">
                            <div class="button-df">
                                <a href="{{ $data->button_url }}">{{ $data->button_text }} <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!--Price-Table End-->

<!--Testomonial-Area Start-->
@if($page_home_lang_independent->home_testimonial_status == 'Show')
<div class="testimonial-area pt_90 pb_90" style="background-image: url({{ asset('upload/'.$page_home_lang_independent->home_testimonial_photo) }})">
    <div class="bg-testimonial"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline hl-white">
                    <h2>{{ $page_home->home_testimonial_title }}</h2>
                    <h3>{{ $page_home->home_testimonial_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel mt-30">
                    @foreach($testimonials as $data)
                        <div class="testimonial-item">
                            <div class="testimonial-photo">
                                <img src="{{ asset('upload/'.$data->photo) }}" alt="Cline Photo">
                            </div>
                            <div class="testimonial-name">
                                <h4>{{ $data->name }}</h4>
                                <p>{{ $data->designation }}</p>
                            </div>
                            <div class="testimonial-description">
                                <p>
                                    {{ $data->comment }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--Testomonial-Area End-->

{{-- <!--Berita Kemenkes-->
        <div class="call-us" style="background-image: url({{ asset('upload/'.$footer_setting_lang_independent->cta_background) }}">
        <div class="container">
            <script src="https://static.elfsight.com/platform/platform.js" async></script>
            <div class="elfsight-app-9fac8069-36ae-454f-ad32-392f4313de02" data-elfsight-app-lazy></div>
        </div>
        </div>
<!--Berita Kemenkes--> --}}

<!--Brand-Area Start-->
<div class="brand-area bg-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand-carousel owl-carousel">
                    @foreach($clients as $data)
                        @if($data->url != '')
                            <div class="brand-item"><a href="{{ $data->url }}"><img src="{{ asset('upload/'.$data->photo) }}" alt="{{ $data->name }}"></a></div>
                        @else
                            <div class="brand-item"><img src="{{ asset('upload/'.$data->photo) }}" alt="{{ $data->name }}"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--Brand-Area End-->
@endsection

@push('js')
<script>
    $('.filtr-container').filterizr();

    $('#filtrnav li').on('click', function() {
        $('.filtr').removeClass('filtr-active');
        $(this).addClass('filtr-active');
        var filter = $(this).data('fltr');
        filtrnav.filterizr('filter', filter);
    });
</script>

<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();

                        let Msg = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500
                        })

                        Msg.fire({
                          type: 'success',
                          title: data.success_message,
                        })

                    }
                    else
                    {
                        $(form)[0].reset();
                        grecaptcha.reset();

                        let Msg = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2500
                        })

                        Msg.fire({
                          type: 'error',
                          title: data.success_message,
                        })
                    }
                }
            });
        });
    })(jQuery);
</script>
@endpush
