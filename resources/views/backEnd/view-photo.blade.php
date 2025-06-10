@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_PHOTO_GALLERY }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('photo-gallerys.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_PHOTO_GALLERY }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($photos as $key => $photo_data)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>
              <img src="{{ asset('upload/'.$photo_data->photo) }}" class="img-fluid img-thumbnail img-style">
            </td>
        		<td>
        			<a href="{{ route('photo-gallerys.edit',$photo_data->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $photo_data->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $photo_data->id }}" method="POST" action="{{ route('photo-gallerys.destroy',$photo_data->id)}}" class="delete-form">
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