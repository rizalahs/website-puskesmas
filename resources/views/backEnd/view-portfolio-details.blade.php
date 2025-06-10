@extends('layouts.backEnd.app')

@section('title')
{{ A_PORTFOLIO_DETAIL }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('portfolios.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_PORTFOLIO_DETAIL }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-sm p-2" id="dataTable" width="100%" cellspacing="0">
      <tr>
        <td class="portfolio-detail-width1">{{ A_NAME }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio->name }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_CONTENT }}</td>
        <td class="portfolio-detail-width2">{!! $portfolio->content !!}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_CLIENT_NAME }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio->client_name }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_CLIENT_COMPANY }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio->client_company }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_START_DATE }}</td>
        <td class="portfolio-detail-width2">{{ date('d-M-Y',strtotime($portfolio->start_date)) }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_END_DATE }}</td>
        <td class="portfolio-detail-width2">{{ date('d-M-Y',strtotime($portfolio->end_date)) }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_WEBSITE }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio->website }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_COST }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio->cost }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_COMMENT }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio->client_comment }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_CATEGORY }}</td>
        <td class="portfolio-detail-width2">{{ $portfolio['portfolioCategory']['name'] }}</td>
      </tr>
      <tr>
        <td class="portfolio-detail-width1">{{ A_PHOTO }}</td>
        <td class="portfolio-detail-width2"><img src="{{ asset('upload/'.$portfolio->photo) }}" class="img-style"></td>
      </tr>

      <tr>
        <td class="portfolio-detail-width1">{{ A_OTHER_PHOTOS }}</td>
        <td class="portfolio-detail-width2">
          @php
            $others = App\Models\PortfolioPhoto::where('portfolio_id',$portfolio->id)->get();
          @endphp
          @foreach($others as $other_img)
          <img src="{{ asset('upload/'.$other_img->othersPhoto) }}" class="img-style">
          @endforeach
        </td>
      </tr>
    </table>
    </div>
  </div>
</div>
@endsection