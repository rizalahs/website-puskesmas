@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_team) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $member->name }}</h1>
        </div>
    </div>
</div>
<!--Banner End--> 

<!--Team Start-->
<div class="team-detail pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-detail-photo">
                    <img src="{{ asset('upload/'.$member->photo) }}" alt="Team Photo">
                </div>
                <div class="team-info headstyle">
                    <h4>{{ CONTACT }}</h4>
                    <ul>
                        @if($member->email != '')
                            <li><span><i class="fa fa-envelope"></i></span>{{ $member->email }}</li>
                        @endif
                        @if($member->phone != '')
                            <li><span><i class="fa fa-phone"></i></span>{{ $member->phone }}</li> 
                        @endif
                        @if($member->website != '')
                            <li><span><i class="fa fa-globe"></i></span>{{ $member->website }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-detail-text">
                    <h4>{{ $member->name }}</h4>
                    <span>{{ $member->designation }}</span>
                    <p>
                        {!! $member->detail !!}
                    </p>
                    <ul>
                        @if($member->facebook != '')
                            <li><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        @endif

                        @if($member->twitter != '')
                            <li><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        @endif

                        @if($member->linkedin != '')
                            <li><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        @endif

                        @if($member->youtube != '')
                            <li><a href="{{ $member->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        @endif

                        @if($member->google_plus != '')
                            <li><a href="{{ $member->google_plus }}" target="_blank"><i class="fab fa-google-plus"></i></a></li>
                        @endif

                        @if($member->instagram != '')
                            <li><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif

                        @if($member->flickr != '')
                            <li><a href="{{ $member->flickr }}" target="_blank"><i class="fab fa-flickr"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Team End-->
@endsection