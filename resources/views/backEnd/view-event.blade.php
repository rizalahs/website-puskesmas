@extends('layouts.backEnd.app')

@section('title')
{{ A_EVENTS }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('events.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EVENTS }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_TITLE }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_BANNER }}</th>
            <th class="date">{{ A_START_DATE }}</th>
            <th class="date">{{ A_END_DATE }}</th>
            <th>{{ A_STATUS }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th class="event-action">{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($events as $key => $event)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>{{ $event->title }}</td>
            <td>
              <img src="{{ asset('upload/'.$event->photo) }}" class="img-fluid img-thumbnail news-photo">
            </td>
            <td>
              <img src="{{ asset('upload/'.$event->banner) }}" class="img-fluid img-thumbnail news-banner">
            </td>
            <td width="12%">{{ $event->start_date }}</td>
            <td width="12%">{{ $event->end_date }}</td>
            <td>
              @php
                $today = date('Y-m-d');
                $start = $event->start_date;
                $end = $event->end_date;
              @endphp

              @if($today >= $start && $today <= $end)
                <span class="badge btn-success p-1">Current Event</span>
              @endif
              @if($today < $start)
                <span class="badge btn-warning p-1">Upcoming Event</span>
              @endif
              @if($today > $end)
                <span class="badge btn-danger p-1">Past Event</span>
              @endif
            </td>
            <td>{{ $event['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('events.edit',$event->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $event->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $event->id }}" method="POST" action="{{ route('events.destroy',$event->id)}}" class="delete-form">
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