@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_about) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_about->about_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--About Start-->
<div class="about-page pt_60 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $page_about->about_content !!}
            </div>
        </div>
    </div>
</div>
<!--About End-->
@endsection