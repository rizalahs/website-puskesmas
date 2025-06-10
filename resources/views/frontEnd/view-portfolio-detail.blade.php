@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_portfolio) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $portfolio->name }}</h1>
        </div>
    </div>
</div>
<!--Banner End--> 

<!--Portfolio-Details Start-->
<div class="portfolio-details pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="portfolio-carousel owl-carousel">

                    <a href="{{ asset('upload/'.$portfolio->photo) }}" class="magnific">
                        <img src="{{ asset('upload/'.$portfolio->photo) }}" alt="Project Photo">
                    </a>

                    @if(!empty($portfolio_photos))
                        @foreach($portfolio_photos as $data)
                            <a href="{{ asset('upload/'.$data->othersPhoto) }}" class="magnific">
                                <img src="{{ asset('upload/'.$data->othersPhoto) }}" alt="Project Photo">
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="portfolio-details-text">
                    <h3>{{ PROJECT_OVERVIEW }}</h3>
                    {!! $portfolio->content !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-sidebar">
                    <div class="portfolio-details headstyle">
                        <h4>{{ SIDEBAR_PORTFOLIO_HEADING_1 }}</h4>
                        <ul>
                            <li>
                                <span>{{ CLIENT_NAME }}:</span><br>
                                {{ $portfolio->client_name }}
                            </li>
                            <li>
                                <span>{{ CLIENT_COMPANY_NAME }}:<br></span>
                                {{ $portfolio->client_company }}
                            </li>
                            <li>
                                <span>{{ PROJECT_START_DATE }}:<br></span>
                                {{ date('d-M-Y',strtotime($portfolio->start_date)) }}
                            </li>
                            <li>
                                <span>{{ PROJECT_END_DATE }}:<br></span>
                                {{ date('d-M-Y',strtotime($portfolio->end_date)) }}
                            </li>
                            <li>
                                <span>{{ CLIENT_COMMENT }}:<br></span>
                                {{ $portfolio->client_comment }}
                            </li>
                        </ul>
                    </div>
                    <div class="portfolio-form headstyle mt-30">
                        <h4>{{ SIDEBAR_PORTFOLIO_HEADING_2 }}</h4>
                        <form method="POST" action="{{ route('portfolio.send.email') }}">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="portfolio_name" value="{{ $portfolio->name }}">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ NAME }}" name="name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}" name="email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control" placeholder="{{ PHONE_NUMBER }}" name="phone" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="{{ MESSAGE }}" name="message"></textarea>
                                </div>
                                @php
                                  $setting = \App\Models\Setting::orderBy('id','desc')->first();
                                @endphp
                                @if($setting->google_recaptcha_status == 'Show')
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ $setting->google_recaptcha_key }}"></div>
                                </div>
                                @endif
                                <div class="form-button">
                                    <button type="submit" class="btn" name="form_portfolio">{{ SUBMIT }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Portfolio-Details End-->

<!--Recent Project Start-->
<div class="recent-project bg-area pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ RECENT_PORTFOLIO }}</h2>
                    <h3>{{ RECENT_PORTFOLIO_SUBTITLE }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="project-carousel owl-carousel">
                    @php 
                        $i=0; 
                    @endphp
                    @foreach($portfolio_order_by_name as $data)
                        @if($i>10)
                            @php 
                                break; 
                            @endphp
                        @endif
                        <div class="portfolio-group">
                            <div class="portfolio-photo" style="background-image: url({{ asset('upload/'.$data->photo) }})">
                                <div class="portfolio-bg"></div>
                                <div class="portfolio-table">
                                    <div class="portfolio-icon">
                                        <a href="{{ asset('upload/'.$data->photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-text">
                                <h3><a href="{{ route('portfolio.view',$data->slug) }}">{{ $data->name }}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--Recent Project End-->
@endsection

@push('js')
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
                        grecaptcha.reset();

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