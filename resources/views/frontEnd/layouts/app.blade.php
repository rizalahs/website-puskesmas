<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $route = Route::currentRouteName();
    @endphp

    @if($route == 'home.page')
        @php $item_data = \App\Models\PageHome::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->title }}</title>
        <meta name="description" content="{{ $item_data->meta_description }}">
    @endif

    @if($route == 'home.search')
        @php $item_data = \App\Models\PageSearch::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_search }}</title>
        <meta name="description" content="{{ $item_data->md_search }}">
    @endif


    @if($route == 'home.about')
        @php $item_data = \App\Models\PageAbout::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_about }}</title>
        <meta name="description" content="{{ $item_data->md_about }}">
    @endif

    @if($route == 'term.and.condition')
        @php $item_data = \App\Models\PageTerm::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_term }}</title>
        <meta name="description" content="{{ $item_data->md_term }}">
    @endif

    @if($route == 'privacy.policy')
        @php $item_data = \App\Models\PagePrivacy::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_privacy }}</title>
        <meta name="description" content="{{ $item_data->md_privacy }}">
    @endif


    @if($route == 'home.faq')
        @php $item_data = \App\Models\PageFaq::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_faq }}</title>
        <meta name="description" content="{{ $item_data->md_faq }}">
    @endif

    @if($route == 'home.team')
        @php $item_data = \App\Models\PageTeam::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_team }}</title>
        <meta name="description" content="{{ $item_data->md_team }}">
    @endif

    @if(Request::is('team/team-member/*'))
        @php
            $main_url = Request::url();
            $slug = explode('team/team-member/',$main_url);
        @endphp
        @php $single_member = \App\Models\TeamMember::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first(); @endphp
        <title>{{ $single_member->meta_title }}</title>
        <meta name="description" content="{{ $single_member->meta_description }}">
    @endif

    @if($route == 'home.portfolio')
        @php $item_data = \App\Models\PagePortfolio::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_portfolio }}</title>
        <meta name="description" content="{{ $item_data->md_portfolio }}">
    @endif

    @if(Request::is('portfolio/*'))
        @php
            $main_url = Request::url();
            $slug = explode('portfolio/',$main_url);
        @endphp
        @php $single_data = \App\Models\Portfolio::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first(); @endphp
        <title>{{ $single_data->meta_title }}</title>
        <meta name="description" content="{{ $single_data->meta_description }}">
    @endif

    @if($route == 'home.testimonial')
        @php $item_data = \App\Models\PageTestimonial::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_testimonial }}</title>
        <meta name="description" content="{{ $item_data->md_testimonial }}">
    @endif

    @if($route == 'home.pricing')
        @php $item_data = \App\Models\PagePricing::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_pricing }}</title>
        <meta name="description" content="{{ $item_data->md_pricing }}">
    @endif

    @if(Request::is('home/page/*'))
        @php
            $main_url = Request::url();
            $slug = explode('home/page/',$main_url);
            $single_data = \App\Models\DynamicPage::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first();
        @endphp
        <title>{{ $single_data->meta_title }}</title>
        <meta name="description" content="{{ $single_data->meta_description }}">
    @endif

    @if($route == 'home.photo.gallery')
        @php $item_data = \App\Models\PagePhotoGallery::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_photo_gallery }}</title>
        <meta name="description" content="{{ $item_data->md_photo_gallery }}">
    @endif

    @if($route == 'home.news')
        @php $item_data = \App\Models\PageNews::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_news }}</title>
        <meta name="description" content="{{ $item_data->md_news }}">
    @endif

    @if(Request::is('news/*'))
        @php
            $main_url = Request::url();
            $slug = explode('news/',$main_url);
        @endphp
        @php $single_data = \App\Models\News::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first(); @endphp

        <title>{{ $single_data->meta_title }}</title>
        <meta name="description" content="{{ $single_data->meta_description }}">
    @endif

    @if(Request::is('news-category/*'))
        @php
            $main_url = Request::url();
            $slug = explode('news-category/',$main_url);
        @endphp
        @php $single_data = \App\Models\Category::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first(); @endphp
        <title>{{ $single_data->meta_title }}</title>
        <meta name="description" content="{{ $single_data->meta_description }}">
    @endif

    @if($route == 'home.service')
        @php $item_data = \App\Models\PageService::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_service }}</title>
        <meta name="description" content="{{ $item_data->md_service }}">
    @endif

    @if(Request::is('service/*'))
        @php
            $main_url = Request::url();
            $slug = explode('service/',$main_url);
        @endphp
        @php $single_data = \App\Models\Service::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first(); @endphp
        <title>{{ $single_data->meta_title }}</title>
        <meta name="description" content="{{ $single_data->meta_description }}">
    @endif

    @if($route == 'home.event')
        @php $item_data = \App\Models\PageEvent::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_event }}</title>
        <meta name="description" content="{{ $item_data->md_event }}">
    @endif

    @if(Request::is('event/*'))
        @php
            $main_url = Request::url();
            $slug = explode('event/',$main_url);
        @endphp
        @php $single_data = \App\Models\Event::where('lang_id',session('session_lang_id'))->where('slug',$slug[1])->first(); @endphp
        <title>{{ $single_data->meta_title }}</title>
        <meta name="description" content="{{ $single_data->meta_description }}">
    @endif

    @if($route == 'home.contact')
        @php $item_data = \App\Models\PageContact::where('lang_id',session('session_lang_id'))->first(); @endphp
        <title>{{ $item_data->mt_contact }}</title>
        <meta name="description" content="{{ $item_data->md_contact }}">
    @endif


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('upload/'.$setting->favicon) }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if(session('session_lang_id'))
        @php
            $lang = App\Models\Language::find(session('session_lang_id'));
        @endphp
        @if($lang->layout_direction == 'Right')
            <link rel="stylesheet" href="{{ asset('frontEnd/css/rtl.css') }}">
        @endif
    @endif

    <!--Js-->
    <script src="{{ asset('frontEnd/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/viewportchecker.js') }}"></script>
    <script src="{{ asset('frontEnd/js/sweetalert2.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <style>
        .header-area,
        ul.nav-menu li ul li a,
        .searchbar .input-search,
        .text-animated li a,
        .slider-one .owl-nav .owl-prev,
        .slider-one .owl-nav .owl-next,
        .about-tab:before,
        .progress-gallery .bar-container .progress .progress-bar-custom,
        .choose-item:before,
        .feature-icon i,
        .feature-item:hover .feature-text,
        .bg-counterup,
        .portfolio-bg,
        .faq-header button.faq-button,
        .faq-header button.faq-button.collapsed:hover,
        .booking-area:before,
        .bg-booking,
        .team-carousel .owl-nav .owl-prev,
        .team-carousel .owl-nav .owl-next,
        .team-text,
        .team-social li a:hover,
        .price-header i,
        .button-df a,
        .bg-testimonial,
        .testimonial-carousel .owl-dots .owl-dot,
        .blog-carousel .owl-nav .owl-prev,
        .blog-carousel .owl-nav .owl-next,
        .blog-author li.blog-button a,
        .call-us:before,
        .footer-item h3:before,
        .footer-item h3:after,
        .footer-item .btn,
        .footer-item ul.footer-social li a,
        .scroll-top,
        .headstyle h4:before,
        .headstyle h4:after,
        .team-detail-text ul li a,
        .sidebar-item h3:before,
        .sidebar-item h3:after,
        .event-contact-item,
        .gallery-bg,
        .testimonial-grid .testimonial-description p:before,
        .testimonial-two-carousel .testimonial-description p:before,
        .form-button .btn,
        .project-carousel .owl-nav .owl-prev,
        .project-carousel .owl-nav .owl-next,
        .sidebar-item button,
        .contact-item:hover .contact-icon,
        .contact-form .btn,
        span.input-group-btn {
            background: #{{ $setting->front_end_color }}!important;
        }

        ul.nav-menu li:hover > a,
        .searchbar .search-button:hover,
        .text-animated li a:hover,
        .text-animated li:last-child a:hover,
        .slider-one .owl-nav .owl-prev:hover,
        .slider-one .owl-nav .owl-next:hover,
        .feature-item:hover .feature-icon i,
        .services-text a:hover,
        .portfolio-menu li.filtr-active,
        .portfolio-menu li:hover,
        .portfolio-text h3 a:hover,
        .form-button .btn2:hover,
        .blog-item h3 a:hover,
        .blog-item span i,
        .blog-author li a i,
        .blog-author li a:hover,
        .call-us .button a:hover,
        .footer-item ul li a:hover,
        .team-info ul li span,
        li.event-header-left i,
        .recent-text a:hover,
        .event-contact-item:hover .event-contact-icon,
        .service-sidebar-item ul li a:hover,
        .portfolio-details ul li span,
        .sidebar-item ul li a:hover,
        .blog-one-text h3 a:hover,
        .blog-one-text ul li i,
        .single-blog ul li i,
        .contact-icon {
            color: #{{ $setting->front_end_color }}!important;
        }

        .text-animated li a,
        .slider-one .owl-nav .owl-prev,
        .slider-one .owl-nav .owl-next,
        .feature-icon i,
        .feature-item:hover .feature-text,
        .footer-item .form-control,
        .footer-item .btn,
        .footer-item ul.footer-social li a,
        .event-contact-item:hover .event-contact-icon,
        .form-control:focus,
        .sidebar-item button,
        .contact-item:hover .contact-icon,
        .contact-form .btn {
            border-color: #{{ $setting->front_end_color }}!important;
        }

        .video-button span {
            border-left-color: #{{ $setting->front_end_color }}!important;
        }

        .portfolio-menu li.filtr-active,
        .team-social li a:hover {
            border-bottom-color: #{{ $setting->front_end_color }}!important;
        }

        .portfolio-menu li.filtr-active:before,
        .team-social li a:hover {
            border-top-color: #{{ $setting->front_end_color }}!important;
        }

        ul.nav-menu li ul li:hover > a {
            background: #f1f1f1!important;
        }
        .text-animated li a:hover,
        .text-animated li:last-child a:hover,
        .slider-one .owl-nav .owl-prev:hover,
        .slider-one .owl-nav .owl-next:hover {
            background: #fff!important;
            border-color: #fff!important;
        }
        .text-animated li:last-child a {
            background: #313131!important;
            border-color: #313131!important;
        }
        .blog-author li.blog-button a,
        .blog-author li.blog-button i,
        .footer-item ul.footer-social li a:hover,
        .contact-item:hover .contact-icon {
            color: #fff!important;
        }
        .feature-item:hover .feature-icon i,
        .faq-header button.faq-button.collapsed {
            background: #fff!important;
        }
        .team-carousel .owl-nav .owl-prev:hover,
        .team-carousel .owl-nav .owl-next:hover,
        .blog-carousel .owl-nav .owl-prev:hover,
        .blog-carousel .owl-nav .owl-next:hover,
        .button-df a:hover,
        .testimonial-carousel .owl-dots .owl-dot.active,
        .blog-author li.blog-button a:hover,
        .footer-item ul.footer-social li a:hover,
        .team-detail-text ul li a:hover,
        .form-button .btn:hover,
        .project-carousel .owl-nav .owl-prev:hover,
        .project-carousel .owl-nav .owl-next:hover,
        .contact-form .btn:hover {
            background: #313131!important;
        }
        .footer-item ul.footer-social li a:hover,
        .contact-form .btn:hover {
            border-color: #313131!important;
        }
        .event-contact-item:hover,
        .faq-body,
        .feature-item:hover .feature-icon i, .faq-header button.faq-button.collapsed {
            background: #f5f5f5!important;
        }

        .booking-form input:focus,
        .booking-form textarea:focus {
            border-color: #fff!important;
        }

        .booking-form button[type="submit"] {
            background: #313131!important;
            color: #fff!important;
        }

        .booking-form button[type="submit"]:hover {
            background: #fff!important;
            color: #313131!important;
        }
    </style>

</head>

<body>
    <!-- widget_disabilitas -->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=NHe0yEod"></script>
    <script src="{{ asset('frontEnd/js/widget_disabilitas.js') }}"></script>

    {!! $comment->code_body !!}

    <!-- Banner Gambar -->
    {{-- <div class="top-banner">
    <img src="{{ asset('asset/tanpajudul1.png') }}" alt="Banner Puskesmas" style="width: 100%; height: 350px;">
    </div> --}}



    <!--Header-Area Start-->
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-12">
                    <div class="header-social">
                        <ul>
                            <li>
                                <div class="social-bar">
                                    <ul>
                                    @foreach($socials as $data)
                                        @if($data->social_url != '')
                                            <li>
                                                <a href="{{ $data->social_url }}">
                                                    <i class="{{ $data->social_icon }}"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-12">
                    <div class="header-info">
                        <ul class="first">
                            <li>
                                <i class="fa fa-envelope"></i>
                                <span>{{ $setting->top_bar_email }}</span>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>{{ $setting->top_bar_phone }}</span>
                            </li>
                        </ul>


                        @if($setting->language_status == 'Show')
                        <div class="lang-right">
                            <form method="POST" action="{{ route('lang.change') }}">
                                @csrf
                                <select name="lang_change_id" class="form-control" onchange="this.form.submit()">
                                    @foreach($languages as $lang)
                                        <option value="{{ $lang->id }}" @if($lang->id == session('session_lang_id')) selected @endif>{{ $lang->short_name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Header-Area End-->

    <!--Menu Start-->
    <div id="strickymenu" class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="logo flex">
                        <a href="{{ route('home.page') }}">
                            <img src="{{ asset('upload/'.$setting->logo) }}" alt="Logo" style="height: 100px; width: auto;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-12 main-menu">
                    <div class="main-menu-item">
                        <ul class="nav-menu">

                            @php
                                $check_menu = [];
                            @endphp

                            @foreach($menus as $data)
                                @php
                                    $check_menu[$data->id] = $data->status;
                                @endphp
                            @endforeach

                            @if($check_menu[1] == 'Show')
                            <li><a href="{{ route('home.page') }}">Beranda</a></li>
                            @endif

                            @if($check_menu[2] == 'Show')
                            <li><a href="{{ route('home.about') }}">Tentang</a></li>
                            @endif

                            @if($check_menu[11] == 'Show')
                            <li><a href="{{ route('home.news') }}">Berita</a></li>
                            @endif


                             @if($check_menu[4] == 'Show')
                            <li><a href="{{ route('home.event') }}">Acara</a></li>
                            @endif

                            @if($check_menu[3] == 'Show')
                            <li><a href="{{ route('home.team') }}">Team</a></li>
                            @endif
                            <li class="menu-item-has-children">
                                <a href="javascript:void;">
                                    <div class="dropdown-main-container">
                                        <div class="name">
                                             Halaman
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-sort-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul>

                                    @if($check_menu[5] == 'Show')
                                    <li><a href="{{ route('home.photo.gallery') }}">PHOTO_GALLERY</a></li>
                                    @endif

                                    @if($check_menu[6] == 'Show')
                                    <li><a href="{{ route('home.testimonial') }}">{{ TESTIMONIAL }}</a></li>
                                    @endif

                                    @if($check_menu[7] == 'Show')
                                    <li><a href="{{ route('home.faq') }}">{{ FAQ }}</a></li>
                                    @endif

                                    @if($check_menu[8] == 'Show')
                                    <li><a href="{{ route('home.pricing') }}">{{ PRICING_TABLE }}</a></li>
                                    @endif

                                    @if($count_dynamic_page >= 1)
                                    @foreach($dynamic_pages as $value)
                                    <li><a href="{{ route('home.dynamic.page',$value->slug) }}">{{ $value->name }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                            @if($check_menu[9] == 'Show')
                            <li><a href="{{ route('home.service') }}">Layanan</a></li>
                            @endif

                            @if($check_menu[10] == 'Show')
                            <li><a href="{{ route('home.portfolio') }}">Inovasi</a></li>
                            @endif

                            @if($check_menu[12] == 'Show')
                            <li><a href="{{ route('home.contact') }}">Kontak</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="searchbar">
                        <div class="search-button"><i class="fa fa-search"></i></div>
                        <form method="POST" action="{{ route('home.search') }}">
                            @csrf
                            <div class="input-group input-search">
                                <input type="text" class="form-control" placeholder="{{ SEARCH_FOR }}" name="search_string">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="form1"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Menu End-->

    @yield('content')


    <!--Call Start-->
    <div class="call-us" style="background-image: url({{ asset('upload/'.$footer_setting_lang_independent->cta_background) }}">
        <div class="container">
            {{-- <div class="row"> --}}
                {{-- <div class="col-lg-9 col-md-8 col-12"> --}}
                    <!-- Elfsight Google Reviews | Untitled Google Reviews -->

                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-a7d0c17f-d759-4c48-87a5-b2eece0d8630" data-elfsight-app-lazy></div>

                    {{-- <div class="call-text">
                        <h3>{{ $footer_setting->cta_text }}</h3>
                    </div> --}}
                {{-- </div> --}}
                {{-- <div class="col-lg-3 col-md-4 col-12"> --}}
                    {{-- <div class="button"> --}}
                        {{-- <a href="{{ $footer_setting->cta_button_url }}">
                            {{ $footer_setting->cta_button_text }}
                            <i class="fa fa-chevron-circle-right"></i>
                        </a> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    <!--Call End-->

    <!--Footer-Area Start-->
    <div class="footer-area pt_60 pb_90">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item" id="newsletter">
                        <h3>{{ FOOTER_1_HEADING }}</h3>
                        <p>
                            {!! nl2br($footer_setting->newsletter_text) !!}
                        </p>
                        <form method="POST" action="{{ route('home.subscriber') }}" class="form_subscriber_ajax">
                            @csrf

                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}" name="email">
                                <span class="input-group-btn">
                                    <button class="btn" type="submit" name="form_subscribe"><i class="fa fa-location-arrow"></i></button>
                                </span>
                            </div>
                            <span class="text-danger error-text email_error"></span>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item footer-recent-post">
                        <h3>{{ FOOTER_2_HEADING }}</h3>
                        <ul>
                            @php
                                $i=0;
                            @endphp
                            @foreach($all_news as $news)
                                @php
                                    $i++;
                                @endphp
                                @if($i > $footer_setting_lang_independent->footer_recent_news_item)
                                    @break
                                @endif
                                <li><span><a href="{{ route('news.view',$news->slug) }}"><i class="fas fa-caret-right"></i> {{ $news->title }}</a></span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h3>Gallery</h3>
                        <div class="row pl-10 pr-10">
                            @php
                                $i=0;
                            @endphp
                            @foreach($portfolios as $portfolio)
                                @php
                                    $i++;
                                @endphp
                                @if($i > $footer_setting_lang_independent->footer_recent_portfolio_item)
                                    @break
                                @endif
                                <div class="col-4 footer-project">
                                    <a href="{{ route('portfolio.view',$portfolio->slug) }}"><img src="{{ asset('upload/'.$portfolio->photo) }}" alt="Project Photo"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h3>{{ FOOTER_4_HEADING }}</h3>
                        <div class="footer-address-item">
                            <div class="icon">@if($footer_setting->footer_address)<i class="fas fa-map-marker-alt"></i>@endif</div>
                            <div class="text">
                                <span>
                                    {!! nl2br($footer_setting->footer_address) !!}
                                </span>
                            </div>
                        </div>
                        <div class="footer-address-item">
                            <div class="icon">@if($footer_setting->footer_phone)<i class="fa fa-phone"></i>@endif</div>
                            <div class="text">
                                <span>
                                    {!! nl2br($footer_setting->footer_phone) !!}
                                </span>
                            </div>
                        </div>
                        <div class="footer-address-item">
                            <div class="icon">@if($footer_setting->footer_email)<i class="fas fa-envelope"></i>@endif</div>
                            <div class="text">
                                <span>
                                    {!! nl2br($footer_setting->footer_email) !!}
                                </span>
                            </div>
                        </div>
                        <ul class="footer-social">
                            @foreach ($socials as $row)
                                @if($row->social_url != '')
                                    <li>
                                        <a href="{{ $row->social_url }}">
                                            <i class="{{ $row->social_icon }}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom pt_50 pb_50">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    {{-- <div class="footer-menu">
                        <ul>
                            <li><a href="{{ route('home.page') }}">{{ HOME }}</a></li>
                            <li><a href="{{ route('term.and.condition') }}">{{ TERMS_AND_CONDITIONS }}</a></li>
                            <li><a href="{{ route('privacy.policy') }}">{{ PRIVACY_POLICY }}</a></li>
                        </ul>
                    </div> --}}

                    @if($setting->tawk_live_chat_status == 'On')
                        {!! $setting->tawk_live_chat_code !!}
                    @endif
                    <div class="copy-text">
                        <p>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#externalModal">
                                {{ $footer_setting->footer_copyright }}
                            </a>
                        </p>
                        <!-- Modal -->
                        <div class="modal fade" id="externalModal" tabindex="-1" aria-labelledby="externalModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <iframe src="https://rizal-abdullah.vercel.app/" width="100%" height="500px" style="border: none;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer-Area End-->

    <!--Scroll-Top-->
    @if($setting->tawk_live_chat_status == 'On')
    <div class="scroll-top mb_80">
        <i class="fa fa-angle-up"></i>
    </div>
    @else
    <div class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </div>
    @endif
    <!--Scroll-Top-->

    <!-- loader start here-->
    <div class="modal-busy" id="loader">
        <div class="center-busy" id="test-git">
            <img src="{{ asset('frontEnd/images/loading2.gif') }}">
        </div>
    </div>
    <!-- loader end here-->

    <script src="{{ asset('frontEnd/js/custom.js') }}"></script>
    @if(session('session_lang_id'))
        @php
            $lang = App\Models\Language::find(session('session_lang_id'));
        @endphp
        @if($lang->layout_direction == 'Right')
            <script src="{{ asset('frontEnd/js/rtl.js') }}"></script>
        @else
            <script src="{{ asset('frontEnd/js/ltr.js') }}"></script>
        @endif
    @endif

    <script>
    (function($){
        $(".form_subscriber_ajax").on('submit', function(e){
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
                    else
                    {
                        $(form)[0].reset();

                        let Msg = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        Msg.fire({
                          type: 'success',
                          title: data.success_message,
                        })

                    }
                }
            });
        });
    })(jQuery);
    </script>

    @stack('js')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: 'error',
                title: '{{ $error }}'
            });
        </script>
        @endforeach
    @endif

    @if(Session::has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get("error") }}'
            });
        </script>
    @endif

    @if(Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ Session::get("success") }}"
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
