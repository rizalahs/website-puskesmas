@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_SERVICE }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('services.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_SERVICE }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_NAME }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($services as $key => $service)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		<td>{{ $service->name }}</td>
            <td>
              <img src="{{ asset('upload/'.$service->photo) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $service['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('services.edit',$service->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

              		<button type="button" onclick="deleteData({{ $service->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
              			<i class="fa fa-trash"></i>
              		</button>
              		<form id="delete-form-{{ $service->id }}" method="POST" action="{{ route('services.destroy',$service->id)}}" class="delete-form">
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