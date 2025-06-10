@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_search) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_search->search_heading }} {{ $search }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Event-Area Start-->
<div class="event-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($news->isEmpty())
                    <div class="alert alert-danger text-center">
                        <span>{{ NO_RESULT_FOUND }}</span>
                    </div>
                @else
                @foreach($news as $data)
                    <div class="event-item">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="event-photo" style="background-image: url({{ asset('upload/'.$data->photo) }})"></div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="event-body">
                                    <div class="event-header">
                                        <ul>
                                            <li class="event-header-left">
                                                <h4>{{ $data->title }}</h4>
                                                <span><i class="fas fa-clock"></i>
                                                    {{ NEWS_DATE }} :
                                                {{ date('M d, Y',strtotime($data->news_date)) }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="event-content">
                                        <p>
                                            {{ $data->short_content }}
                                        </p>
                                        <div class="button-df">
                                            <a href="{{ route('news.view',$data->slug) }}">{{ READ_MORE }}<i class="fa fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!--Event-Area End -->
@endsection