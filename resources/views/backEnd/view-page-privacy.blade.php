@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_PRIVACY_PAGE }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_PRIVACY_PAGE }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_HEADING }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($languages as $key => $language)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $language['pagePrivacy']['privacy_heading'] }}</td>
            <td>{{ $language->name }}</td>
            <td>
              <a href="{{ route('page-privacys.edit',$language->id)}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection