@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_event) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $event->title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Event-Details Start-->
<div class="event-detail pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="event-detail-content">
                    <div class="event-carousel owl-carousel">
                        <div class="event-photo-item">
                            <img src="{{ asset('upload/'.$event->photo) }}" alt="Event Photo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="event-contact-item">
                                <div class="event-contact-icon">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                                <div class="event-contact-text">
                                    <h4>{{ EVENT_START_DATE }}</h4>
                                    <p>
                                        {{ date('M d, Y',strtotime($event->start_date)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="event-contact-item">
                                <div class="event-contact-icon">
                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                </div>
                                <div class="event-contact-text">
                                    <h4>{{ EVENT_END_DATE }}</h4>
                                    <p>
                                        {{ date('M d, Y',strtotime($event->end_date)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-0 col-md-4 offset-sm-3 col-sm-6 offset-sm-3">
                            <div class="event-contact-item">
                                <div class="event-contact-icon">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                </div>
                                <div class="event-contact-text">
                                    <h4>{{ ADDRESS }}</h4>
                                    <p>
                                        {{ $event->event_location }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-detail-text">
                        <h3>{{ $event->title }}</h3>
                        {!! $event->content !!}
                    </div>
                </div>
                <div class="event-map headstyle">
                    <h4>{{ EVENT_LOCATION_MAP }}</h4>
                    {!! $event->event_map !!}
                </div>
                <div class="comment-form headstyle mt_50">
                    <h4>{{ SHARE_THIS_EVENT }}</h4>
                    <div class="share_buttons">
                        <a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u={{ route('event.view',$event->slug) }}&t={{ $event->title }}"><i class="fab fa-facebook-f"></i></a>

                        <a class="twitter" target="_blank" href="https://twitter.com/share?text={{ $event->title }}&url={{ route('event.view',$event->slug) }}"><i class="fab fa-twitter"></i></a>

                        <a class="pinterest" target="_blank" href="https://www.pinterest.com/pin/create/button/?description={{ $event->title }}&media=&url={{ $event->title }}"><i class="fab fa-pinterest"></i></a>
                        
                        <a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('event.view',$event->slug) }}&title={{ $event->title }}"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="event-sidebar sidebar">
                    <div class="sidebar-item">
                        <h3>{{ SIDEBAR_EVENT_HEADING_1 }}</h3>
                        @php $i=0; @endphp
                        @foreach($events as $event)
                            @php $i++; @endphp
                            @if($i > $setting->sidebar_total_upcoming_event)
                                @php break; @endphp
                            @endif

                            @php
                                $today = date('Y-m-d');
                                $start = date('Y-m-d',strtotime($event->start_date));
                            @endphp

                            @if($today < $start)
                            <div class="sidebar-recent-item">
                                <div class="recent-photo">
                                    <a href="{{ route('event.view',$event->slug) }}"><img src="{{ asset('upload/'.$event->photo) }}" alt="Event Photo"></a>
                                </div>
                                <div class="recent-text">
                                    <a href="{{ route('event.view',$event->slug) }}">{{ $event->title }}</a>
                                    <div class="rpwwt-post-date">{{ START_DATE }}: {{ date('d-M-Y',strtotime($event->start_date)) }}</div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="sidebar-item">
                        <h3>{{ SIDEBAR_EVENT_HEADING_2 }}</h3>
                        @php $i=0; @endphp
                        @foreach($events as $event)
                            @php $i++; @endphp
                            @if($i > $setting->sidebar_total_past_event)
                                @php break; @endphp
                            @endif
                            
                            @php
                                $today = date('Y-m-d');
                                $end = date('Y-m-d',strtotime($event->end_date));
                            @endphp

                            @if($today > $end)
                            <div class="sidebar-recent-item">
                                <div class="recent-photo">
                                    <a href="{{ route('event.view',$event->slug) }}"><img src="{{ asset('upload/'.$event->photo) }}" alt="Event Photo"></a>
                                </div>
                                <div class="recent-text">
                                    <a href="{{ route('event.view',$event->slug) }}">{{ $event->title }}</a>
                                    <div class="rpwwt-post-date">{{ START_DATE }}: {{ date('d-M-Y',strtotime($event->start_date)) }}</div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Event-Details End-->
@endsection