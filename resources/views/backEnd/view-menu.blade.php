@extends('layouts.backEnd.app')

@section('title')
{{ A_MANAGE_MENU }}
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="pl-2">
          <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_MANAGE_MENU }}</h1>
          <form class="user" method="POST" action="{{ route('menus.update') }}">
            @csrf
            @method('PUT')

            @foreach($menus as $menu)
            <input type="hidden" name="id[]" value="{{ $menu->id }}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">{{ $menu->name }}</label>
              <div class="col-sm-3">
                <select name="status[]" class="form-control">
                  <option value="Show" {{($menu->status== 'Show') ? "selected":""}}>{{ A_SHOW }}</option>
                  <option value="Hide" {{($menu->status== 'Hide') ? "selected":""}}>{{ A_HIDE }}</option>
                </select>
              </div>
            </div>
            @endforeach

            <div class="form-group row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-3">
                <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{ A_UPDATE }}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection