@extends('layouts.backEnd.app')

@section('title')
{{ A_FAQS }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('faqs.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_FAQS }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_TITLE }}</th>
            <th>{{ A_QUESTION_SHOW_ON_HOME }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($faqs as $key => $faq)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		<td>{{ $faq->title }}</td>
            <td>{{ $faq->show_on_home }}</td>
            <td>{{ $faq['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('faqs.edit',$faq->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

                <button type="button" onclick="deleteData({{ $faq->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
                  <i class="fa fa-trash"></i>
                </button>
                <form id="delete-form-{{ $faq->id }}" method="POST" action="{{ route('faqs.destroy',$faq->id)}}" class="delete-form">
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