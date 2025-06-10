@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_faq) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_faq->faq_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--FAQ Start-->
<div class="faq-area faq-main-page pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="faq-group headstyle mt-30">
                    <div id="accordion">
                        @php
                            $i=0;
                        @endphp
                        @foreach($faqs as $faq)
                            @php $i++; @endphp
                            <div class="faq-item card">
                                <div class="faq-header" id="heading{{$i}}">
                                    <button class="faq-button @if($i!=1) {{'collapsed'}} @endif" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}"><i class="fa fa-caret-right"></i>{{ $faq->title }}</button>
                                </div>

                                <div id="collapse{{$i}}" class="collapse @if($i==1) {{'show'}} @endif" aria-labelledby="heading{{$i}}" data-parent="#accordion">
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
<!--FAQ End-->
@endsection