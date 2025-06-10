@extends('layouts.backEnd.app')

@section('title')
{{ A_CLIENTS }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('clients.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_CLIENTS }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_NAME }}</th>
            <th>{{ A_URL }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($clients as $key => $client)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>
              <img src="{{ asset('upload/'.$client->photo) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->url }}</td>
        		<td>
        			<a href="{{ route('clients.edit',$client->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $client->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $client->id }}" method="POST" action="{{ route('clients.destroy',$client->id)}}" class="delete-form">
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