@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_event) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_event->event_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Event-Area Start-->
<div class="event-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($events as $event)
                    <div class="event-item">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="event-photo" style="background-image: url({{ asset('upload/'.$event->photo) }})"></div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="event-body">
                                    <div class="event-header">
                                        <ul>
                                            <li class="event-header-left">
                                                <h4>{{ $event->title }}</h4>
                                                <div><i class="far fa-clock"></i>
                                                    {{ START_DATE }}: {{ date('M d, Y',strtotime($event->start_date)) }}
                                                </div>
                                                <div><i class="far fa-clock"></i>{{ END_DATE }}: {{ date('M d, Y',strtotime($event->end_date)) }}
                                                </div>
                                                
                                            </li>
                                            <li class="event-header-left">
                                                <div><i class="fas fa-map-marker-alt"></i>{{ ADDRESS }}: {!! nl2br($event->event_location) !!}</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="event-content">
                                        <p>
                                            {{ $event->short_content }}
                                        </p>
                                        <div class="button-df">
                                            <a href="{{ route('event.view',$event->slug) }}">{{ READ_MORE }}<i class="fa fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_30 text-center">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
<!--Event-Area End -->
@endsection