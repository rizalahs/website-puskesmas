@extends('layouts.backEnd.app')

@section('title')
{{ A_FILES }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{ route('files.create') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i> {{ A_ADD_NEW }}</a>
    <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_FILES }}</h1>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{ A_SERIAL }}</th>
            <th>{{ A_PREVIEW }}</th>
            <th>{{ A_TITLE }}</th>
            <th>{{ A_DOWNLOAD_FILE }}</th>
            <th>{{ A_ACTION }}</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($files as $key => $file)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td width="13%">
              @php
                $exp = explode('.',$file->file_name);
              @endphp

              @if( $exp[1] == 'jpg' || $exp[1] == 'JPG' || $exp[1] == 'jpeg' || $exp[1] == 'jpeg' || $exp[1] == 'png' || $exp[1] == 'PNG' || $exp[1] == 'gif' || $exp[1] == 'GIF' )
              <img src="{{ asset('upload/'.$file->file_name) }}" class="img-fluid img-thumbnail img-style">
              @endif

              @if( $exp[1] == 'pdf' || $exp[1] == 'PDF' )
              <img src="{{ asset('backEnd/img/pdf.png') }}" class="img-fluid img-thumbnail img-style">
              @endif

              @if( $exp[1] == 'doc' || $exp[1] == 'DOC' || $exp[1] == 'docx' || $exp[1] == 'DOCX' )
              <img src="{{ asset('backEnd/img/docx.png') }}" class="img-fluid img-thumbnail img-style">
              @endif

              @if( $exp[1] == 'xls' || $exp[1] == 'XLS' || $exp[1] == 'xlsx' || $exp[1] == 'XLSX' )
              <img src="{{ asset('backEnd/img/xlsx.png') }}" class="img-fluid img-thumbnail img-style">
              @endif

              @if( $exp[1] == 'csv' || $exp[1] == 'CSV' )
              <img src="{{ asset('backEnd/img/csv.png') }}" class="img-fluid img-thumbnail img-style">
              @endif              
            </td>
            <td>{{ $file->title }}</td>
            <td><a href="{{ route('files.download',$file->id) }}">{{ A_DOWNLOAD }}</a></td>
        		<td width="10%">
        			<a href="{{ route('files.edit',$file->id) }}" class="btn btn-success btn-sm" title="Edit">
        				<i class="fa fa-edit"></i>
        			</a>

          		<button type="button" onclick="deleteData({{ $file->id }})" class="btn btn-danger btn-sm" title="{{ A_DELETE }}">
          			<i class="fa fa-trash"></i>
          		</button>
          		<form id="delete-form-{{ $file->id }}" method="POST" action="{{ route('files.destroy',$file->id) }}" class="delete-form">
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