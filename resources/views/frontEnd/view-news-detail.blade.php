@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_news) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $news->title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Blog-One Start-->
<div class="blog-one-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-blog">
                    <img src="{{ asset('upload/'.$news->photo) }}" alt="News Photo">
                    <h3>{{ $news->title }}</h3>
                    @php
                     $category = \App\Models\Category::find($news->category_id);
                    @endphp
                    <ul>
                        <li><i class="fas fa-edit"></i><a href="{{ route('news.category.view',$category->slug) }}">{{ $news['category']['name'] }}</a></li>
                        <li><i class="fas fa-calendar"></i>
                            {{ date('M d, Y',strtotime($news->news_date)) }}
                        </li>
                    </ul>
                    {!! $news->content !!}
                </div>
                
                <div class="comment-form headstyle mt_50">
                    <h4>{{ SHARE_THIS_NEWS }}</h4>
                    <div class="share_buttons">
                        <a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u={{ route('news.view',$news->slug) }}&t={{ $news->title }}"><i class="fab fa-facebook-f"></i></a>

                        <a class="twitter" target="_blank" href="https://twitter.com/share?text={{ $news->title }}&url={{ route('news.view',$news->slug) }}"><i class="fab fa-twitter"></i></a>

                        <a class="pinterest" target="_blank" href="https://www.pinterest.com/pin/create/button/?description={{ $news->title }}&media=&url={{ $news->title }}"><i class="fab fa-pinterest"></i></a>
                        
                        <a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('news.view',$news->slug) }}&title={{ $news->title }}"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                @if($news->comment == 'On')
                <div class="comment-form headstyle mt_50">
                    <h4>{{ COMMENT }}</h4>
                    @php
                    $url = url('/news/'.$news_slug);
                    @endphp
                    <div class="comment-inner">
                        <div class="fb-comments" data-href="{{ $url }}" data-numposts="5"></div>
                    </div>
                </div>
                @endif
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
                                <li><a href="{{ route('news.category.view',$category->slug) }}"><i class="fas fa-chevron-right"></i>
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
                                    <a href="{{ route('news.view',$data->slug) }}">{{ $news->title }}</a>
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