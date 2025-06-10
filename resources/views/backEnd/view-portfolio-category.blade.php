@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_PORTFOLIO_CATEGORY }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('portfolio-categories.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_PORTFOLIO_CATEGORY }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_CATEGORY_NAME }}</th>
            <th>{{ A_STATUS }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($portfolio_categories as $key => $p_category)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		<td>{{ $p_category->name }}</td>
            <td>
              @if($p_category->status == "Active")
                <span class="badge bg-success text-light pl-3 pr-3">{{ A_ACTIVE }}</span>
              @else
                <span class="badge bg-warning text-light pl-3 pr-3">{{ A_INACTIVE }}</span>
              @endif
            </td>
            <td>{{ $p_category['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('portfolio-categories.edit',$p_category->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $p_category->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $p_category->id }}" method="POST" action="{{ route('portfolio-categories.destroy',$p_category->id)}}" class="delete-form">
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