@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_portfolio) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_portfolio->portfolio_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Project Start-->
<div class="portfolio-area project-page pt_90 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio-menu">
                    <ul id="filtrnav">
                        <li class="filtr filtr-active" data-filter="all">{{ ALL }}</li>
                        @foreach($portfolio_categories as $data)
                            <li class="filtr" data-filter="{{ $data->id }}">{{  $data->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row filtr-container">
            @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 filtr-item" data-category="{{ $portfolio->category_id }}" data-sort="Menu">

                    <div class="portfolio-group">
                        <div class="portfolio-photo" style="background-image: url({{ asset('upload/'.$portfolio->photo) }})">
                            <div class="portfolio-bg"></div>
                            <div class="portfolio-table">
                                <div class="portfolio-icon">
                                    <a href="{{ asset('upload/'.$portfolio->photo) }}" class="magnific"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-text">
                            <h3><a href="{{ route('portfolio.view',$portfolio->slug) }}">{{ $portfolio->name }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--Project End -->
@endsection

@push('js')
<script>
    $('.filtr-container').filterizr();
    
    $('#filtrnav li').on('click', function() {
        $('.filtr').removeClass('filtr-active');
        $(this).addClass('filtr-active');
        var filter = $(this).data('fltr');
        filtrnav.filterizr('filter', filter);
    });
</script>
@endpush