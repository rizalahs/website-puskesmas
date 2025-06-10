@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_TEAM_MEMBER }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('team-members.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_TEAM_MEMBER }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_PHOTO }}</th>
            <th>{{ A_NAME }}</th>
            <th>{{ A_DESIGNATION }}</th>
            <th>{{ A_LANGUAGE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($team_members as $key => $team_member)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>
              <img src="{{ asset('upload/'.$team_member->photo) }}" class="img-fluid img-thumbnail img-style">
            </td>
            <td>{{ $team_member->name }}</td>
            <td>{{ $team_member->designation }}</td>
            <td>{{ $team_member['language']['name'] }}</td>
        		<td>
        			<a href="{{ route('team-members.edit',$team_member->id)}}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $team_member->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $team_member->id }}" method="POST" action="{{ route('team-members.destroy',$team_member->id)}}" class="delete-form">
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