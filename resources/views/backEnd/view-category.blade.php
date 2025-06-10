@extends('layouts.backEnd.app')

@section('title')
{{ A_NEWS_CATEGORIES }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_NEWS_CATEGORIES }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_CATEGORY_NAME }}</th>
            <th>{{ A_CATEGORY_BANNER }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($categories as $key => $category)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <img src="{{ asset('upload/'.$category->banner) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $category['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('categories.edit',$category->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>
          		<button type="button" onclick="deleteData({{ $category->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $category->id }}" method="POST" action="{{ route('categories.destroy',$category->id)}}" class="delete-form">
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