@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_service) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_service->service_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Service-Area Start-->
<div class="service-page pt_60 pb_90">
    <div class="container">
        <div class="row">
            @foreach($services as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="services-item effect-item">
                        <a href="{{ route('service.view',$data->slug) }}" class="image-effect">
                            <div class="services-photo" style="background-image: url({{ asset('upload/'.$data->photo) }})"></div>
                        </a>
                        <div class="services-text">
                            <h3><a href="{{ route('service.view',$data->slug) }}">{{ $data->name }}</a></h3>
                            <p>
                                {{ $data->short_description }}
                            </p>
                            <div class="button-bn">
                                <a href="{{ route('service.view',$data->slug) }}">
                                    {{ READ_MORE }}
                                    <i class="fa fa-chevron-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--Service-Area End-->
@endsection