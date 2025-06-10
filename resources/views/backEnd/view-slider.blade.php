@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_SLIDER }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('sliders.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_SLIDER }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_HEADING }}</th>
            <th>{{ A_BUTTON_1_TEXT }}</th>
            <th>{{ A_BUTTON_1_URL }}</th>
            <th>{{ A_BUTTON_2_TEXT }}</th>
            <th>{{ A_BUTTON_2_URL }}</th>
            <th>{{ A_POSITION }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($sliders as $key => $slider)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>
              <img src="{{ asset('upload/'.$slider->photo) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $slider->heading }}</td>
            <td>{{ $slider->button1_text }}</td>
            <td>{{ $slider->button1_url }}</td>
            <td>{{ $slider->button2_text }}</td>
            <td>{{ $slider->button2_url }}</td>
            <td>{{ $slider->position }}</td>
            <td>{{ $slider['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('sliders.edit',$slider->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $slider->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $slider->id }}" method="POST" action="{{ route('sliders.destroy',$slider->id)}}" class="delete-form">
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