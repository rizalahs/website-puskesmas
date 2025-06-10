@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_service) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $service->name }}</h1>
        </div>
    </div>
</div>
<!--Banner End--> 

<!--Single-Service Start-->
<div class="single-service-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-info">
                    <div class="single-ser-carousel owl-carousel">
                        <div class="event-photo-item">
                            <img src="{{ asset('upload/'.$service->photo) }}" alt="Service Photo">
                        </div>
                    </div>
                    <h2>{{ $service->name }}</h2>
                    {!! $service->description !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="service-sidebar-item headstyle">
                        <h4>{{ SIDEBAR_SERVICE_HEADING_1 }}</h4>
                        <ul>
                            @foreach($services as $data)
                                <li><a href="{{ route('service.view',$data->slug) }}"><i class="fas fa-chevron-right"></i> {{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="service-sidebar-item headstyle">
                        <h4>{{ SIDEBAR_SERVICE_HEADING_2 }}</h4>
                        <form method="POST" action="{{ route('service.send.email') }}">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="service_name" value="{{ $service->name }}">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ NAME }}" name="name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}" name="email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ PHONE_NUMBER }}" name="phone" autocomplete="off">
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
                                    <button type="submit" class="btn" name="form_service">{{ SUBMIT }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Single-Service End-->
@endsection

@push('js')
@endpush