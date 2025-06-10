@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_PORTFOLIO }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('portfolios.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_PORTFOLIO }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_NAME }}</th>
            <th>{{ A_CATEGORY }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($all_portfolios as $key => $portfolio)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		<td>{{ $portfolio->name }}</td>
        		<td>{{ $portfolio['portfolioCategory']['name'] }}</td>
            <td>
              <img src="{{ asset('upload/'.$portfolio->photo) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $portfolio['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('portfolios.show',$portfolio->id)}}" class="btn btn-info btn-sm" target="_blank" title="Details">
        				<i class="fa fa-eye"></i>
        			</a>

              <a href="{{ route('portfolios.edit',$portfolio->id)}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fa fa-edit"></i>
              </a>

          		<button type="button" onclick="deleteData({{ $portfolio->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $portfolio->id }}" method="POST" action="{{ route('portfolios.destroy',$portfolio->id)}}" class="delete-form">
                    @csrf
                    @method('DELETE')
                </form>

        		</td>
        	</tr>
        	@endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection