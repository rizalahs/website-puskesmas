@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_testimonial) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_testimonial->testimonial_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Testimonial-Two Start-->
<div class="testimonial-area testimonial-grid pt_60 pb_90">
    <div class="container">
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-item mt_30">
                        <div class="testimonial-photo">
                            <img src="{{ asset('upload/'.$testimonial->photo) }}" alt="">
                        </div>
                        <div class="testimonial-name">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->designation }}</p>
                        </div>
                        <div class="testimonial-description">
                            <p>
                                {{ $testimonial->comment }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--Testimonial-Two End-->
@endsection