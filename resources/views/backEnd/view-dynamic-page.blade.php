@extends('layouts.backEnd.app')

@section('title')
{{ A_DYNAMIC_PAGES }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('dynamic-pages.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_DYNAMIC_PAGES }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_BANNER }}</th>
            <th>{{ A_NAME }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($all_dynamic_pages as $key => $dynamic_page)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>
              <img src="{{ asset('upload/'.$dynamic_page->banner) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $dynamic_page->name }}</td>
            <td>{{ $dynamic_page['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('dynamic-pages.edit',$dynamic_page->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $dynamic_page->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $dynamic_page->id }}" method="POST" action="{{ route('dynamic-pages.destroy',$dynamic_page->id)}}" class="delete-form">
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