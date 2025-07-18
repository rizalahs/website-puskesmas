@extends('layouts.backEnd.app')

@section('title')
{{ A_LANGUAGE_FRONT }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('languages.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_LANGUAGE_FRONT }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_NAME }}</th>
            <th>{{ A_SHORT_NAME }}</th>
            <th>{{ A_LAYOUT_DIRECTION }}</th>
            <th>{{ A_LANGUAGE_DEFAULT }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($languages as $key => $language)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		<td>{{ $language->name }}</td>
        		<td>{{ $language->short_name }}</td>
        		<td>{{ $language->layout_direction }}</td>
        		<td>
        			@if($language->lang_default == 1)
        			<span>{{ A_YES }}</span>
        			@else
        			<span>{{ A_NO }}</span>
        			@endif
        		</td>
        		<td>
        			<a href="{{ route('languages.detail',$language->id) }}" class="btn btn-warning btn-sm" title="Update Details">
        				<i class="fa fa-pen"></i>
        			</a>

        			<a href="{{ route('languages.edit',$language->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

              		<button type="button" onclick="deleteData({{ $language->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
              			<i class="fa fa-trash"></i>
              		</button>
              		<form id="delete-form-{{ $language->id }}" method="POST" action="{{ route('languages.destroy',$language->id)}}" class="delete-form">
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