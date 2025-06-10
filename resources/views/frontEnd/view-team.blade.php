@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_team) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_team->team_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Team Start-->
<div class="team-page pt_60 pb_90">
    <div class="container">
        <div class="row">
            @foreach($team_members as $data)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="team-item">
                        <div class="team-photo">
                            <img src="{{ asset('upload/'.$data->photo) }}" alt="Team Member">
                        </div>
                        <div class="team-text">
                            <a href="{{ route('home.team.member',['id' => $data->id,'slug' => $data->slug]) }}">{{ $data->name }}</a>
                            <p>{{ $data->designation }}</p>
                        </div>
                        <div class="team-social">
                            <ul>
                                @if($data->facebook != '')
                                    <li><a href="{{ $data->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                @endif

                                @if($data->twitter != '')
                                    <li><a href="{{ $data->facebook }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                @endif

                                @if($data->linkedin != '')
                                    <li><a href="{{ $data->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                @endif

                                @if($data->youtube != '')
                                    <li><a href="{{ $data->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                @endif

                                @if($data->google_plus != '')
                                    <li><a href="{{ $data->google_plus }}" target="_blank"><i class="fab fa-google-plus"></i></a></li>
                                @endif

                                @if($data->instagram != '')
                                    <li><a href="{{ $data->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                @endif

                                @if($data->flickr != '')
                                    <li><a href="{{ $data->flickr }}" target="_blank"><i class="fab fa-flickr"></i></a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--Team End-->
@endsection