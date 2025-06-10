@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_SUBSCRIBER }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('subscribers.send.email') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_EMAIL_TO_SUBSCRIBERS }}</a>
    <a href="{{ route('subscriber.export.csv') }}" class="btn btn-success ml-2 mr-2 float-right btn-sm"><i class="fa fa-file"></i> {{ A_EXPORT_AS_CSV }}</a>
    <a href="{{ route('remove.subscriber.pending') }}" class="btn btn-warning float-right btn-sm" onclick="return confirm('Are you sure to delete all pending subscribers?')"><i class="fa fa-trash"></i> {{ A_REMOVE_PENDING_SUBSCRIBERS }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_SUBSCRIBER }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_EMAIL_ADDRESS }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($subscribers as $key => $subscriber)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>{{ $subscriber->email }}</td>
        		<td>
          		<button type="button" onclick="deleteData({{ $subscriber->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $subscriber->id }}" method="POST" action="{{ route('subscribers.destroy',$subscriber->id)}}" class="delete-form">
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