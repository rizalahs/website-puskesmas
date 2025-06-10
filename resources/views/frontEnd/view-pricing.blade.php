@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_pricing) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_pricing->pricing_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Price-Table Start-->
<div class="price-area price-page pt_60 pb_90">
    <div class="container">
        <div class="row">
            @foreach($pricing_tables as $pricing)
                <div class="offset-md-2 col-md-8 offset-md-2 offset-lg-0 col-lg-4 offset-lg-0 offset-lg-0">
                    <div class="price-item">
                        <div class="price-header">
                            <i class="{{ $pricing->icon }}" aria-hidden="true"></i>
                            <h3>{{ $pricing->title }}</h3>
                            <h2>{{ $pricing->price }}</h2>
                            <p>{{ $pricing->subtitle }}</p>
                        </div>
                        <div class="price-body">
                            {!! $pricing->text !!}
                        </div>
                        <div class="price-footer">
                            <div class="button-df">
                                <a href="{{ $pricing->button_url }}">{{ $pricing->button_text }} <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </div>
</div>
<!--Price-Table End-->
@endsection