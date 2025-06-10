@extends('layouts.backEnd.app')

@section('title')
{{ A_FEATURES }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('features.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_FEATURES }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_TITLE }}</th>
            <th>{{ A_CONTENT }}</th>
            <th>{{ A_ICON }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($features as $key => $feature)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		<td>{{ $feature->title }}</td>
        		<td>{!! $feature->content !!}</td>
            <td class="icon-width"><i class="{{ $feature->icon }} feature-icon"></i></td>
            <td>{{ $feature['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('features.edit',$feature->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

              		<button type="button" onclick="deleteData({{ $feature->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
              			<i class="fa fa-trash"></i>
              		</button>
              		<form id="delete-form-{{ $feature->id }}" method="POST" action="{{ route('features.destroy',$feature->id)}}" class="delete-form">
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