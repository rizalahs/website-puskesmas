@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_news) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ CATEGORY }}: {{ $category->name }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Blog-One Start-->
<div class="blog-one-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">               
                @foreach($news_wise_categories as $data)
                    <div class="blog-one-item">
                        <div class="blog-one-photo">
                            <a href="{{ route('news.view',$data->slug) }}"><img src="{{ asset('upload/'.$data->photo) }}" alt="Blog Photo"></a>
                        </div>
                        <div class="blog-one-text">
                            @php
                             $category = \App\Models\Category::find($data->category_id);
                            @endphp
                            <ul>
                                <li><i class="fa fa-edit"></i><a href="{{ route('news.category.view',$category->slug) }}">{{ $data['category']['name'] }}</a></li>
                                <li><i class="fa fa-calendar-o"></i>
                                    {{ date('M d, Y',strtotime($data->news_date)) }}
                                </li>
                            </ul>
                            <h3><a href="{{ route('news.view',$data->slug) }}">{{ $data->title }}</a></h3>
                            <p>
                                {{ $data->short_content }}
                            </p>
                            <div class="button-df">
                                <a href="{{ route('news.view',$data->slug) }}">{{ READ_MORE }}<i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!--Sidebar Start-->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <form method="POST" action="{{ route('home.search') }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{ SEARCH_FOR }}" name="search_string" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="form1"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-item">
                        <h3>{{ SIDEBAR_NEWS_HEADING_1 }}</h3>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{ route('news.category.view',$category->slug) }}">
                                    <i class="fas fa-chevron-right"></i>
                                    {{ $category->name }}
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-item">
                        <h3>{{ SIDEBAR_NEWS_HEADING_2 }}</h3>
                        @php $i=0; @endphp
                        @foreach($all_news as $data)
                            @php $i++; @endphp
                            @if($i > $setting->sidebar_total_recent_post)
                                @php break; @endphp
                            @endif
                            <div class="sidebar-recent-item">
                                <div class="recent-photo">
                                    <a href="{{ route('news.view',$data->slug) }}"><img src="{{ asset('upload/'.$data->photo) }}" alt="Blog Photo"></a>
                                </div>
                                <div class="recent-text">
                                    <a href="{{ route('news.view',$data->slug) }}">{{ $data->title }}</a>
                                    <div class="rpwwt-post-date">
                                        {{ date('M d, Y',strtotime($data->news_date)) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Sidebar End-->
        </div>
    </div>
</div>
<!--Blog-One End-->
@endsection