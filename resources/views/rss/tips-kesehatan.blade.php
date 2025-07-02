@extends('frontEnd.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-primary wow fadeInDown">📰 Artikel & Tips Kesehatan dari Kementerian Kesehatan</h2>

    @foreach ($data as $section)
        <div class="mb-5">
            <h4 class="border-start border-4 ps-3 border-success text-success fw-semibold mb-3 wow fadeInLeft">{{ $section['title'] }}</h4>

            @if (!empty($section['items']))
                <div class="row g-4">
                    @foreach ($section['items'] as $item)
                        <div class="col-md-6 col-lg-4 wow fadeInUp">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ $item['link'] }}" target="_blank" class="text-decoration-none text-primary">
                                            {{ $item['title'] }}
                                        </a>
                                    </h5>
                                    <small class="text-muted d-block mb-2">{{ $item['pubDate'] }}</small>
                                    <p class="card-text text-dark small">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning wow fadeIn">
                    Artikel tidak dapat dimuat saat ini. Silakan coba beberapa saat lagi.
                </div>
            @endif
        </div>
    @endforeach
</div>
<div class="owl-carousel owl-theme mb-5">
    @foreach ($data[0]['items'] as $item)
        <div class="item">
            <div class="card h-100 shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ $item['link'] }}" target="_blank" class="text-decoration-none text-primary">
                            {{ $item['title'] }}
                        </a>
                    </h5>
                    <p class="small text-muted">{{ $item['pubDate'] }}</p>
                    <p class="text-dark small">{{ $item['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
        }
    });
</script>
@endsection
