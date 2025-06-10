@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_photo_gallery) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_photo_gallery->photo_gallery_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Gallery Start-->
<div class="gallery-page pt_60 pb_90">
    <div class="container">
        <div class="row">
            @foreach($photo_gallery as $data)
                <div class="col-lg-4 col-sm-6">
                    <div class="gallery-group">
                        <div class="gallery-photo" style="background-image: url({{ asset('upload/'.$data->photo) }})">
                            <div class="gallery-bg"></div>
                            <div class="gallery-table">
                                <div class="gallery-icon">
                                    <a href="{{ asset('upload/'.$data->photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--Gallery End-->
@endsection