@extends('layouts.backEnd.app')

@section('title')
{{ A_EDIT_CONTACT_PAGE }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{ route('page-contacts.index') }}" class="btn btn-primary float-right btn-sm"><i class="fa fa-eye"></i> {{ A_VIEW_ALL }}</a>
    </div>
  </div><br>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <h1 class="h4 text-gray-900 mb-4 page-home"><i class="fas fa-chevron-circle-right"></i> {{ A_EDIT_CONTACT_PAGE }}</h1>
                  <form class="user" method="POST" action="{{ route('page-contacts.update',$page_contact->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_HEADING }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="contact_heading" class="form-control" value="{{ $page_contact->contact_heading }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_ADDRESS }}</label>
                      <div class="col-sm-10">
                        <textarea name="contact_address" class="form-control" rows="2">{{ $page_contact->contact_address }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_EMAIL_ADDRESS }}</label>
                      <div class="col-sm-10">
                        <textarea name="contact_email" class="form-control" rows="2">{{ $page_contact->contact_email }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_PHONE }}</label>
                      <div class="col-sm-10">
                        <textarea name="contact_phone" class="form-control" rows="2">{{ $page_contact->contact_phone }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_CONTACT_MAP_IFRAME }}</label>
                      <div class="col-sm-10">
                        <textarea name="contact_map" class="form-control" rows="5">{{ $page_contact->contact_map }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_TITLE }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="mt_contact" class="form-control" value="{{ $page_contact->mt_contact }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_META_DESCRIPTION }}</label>
                      <div class="col-sm-10">
                        <textarea name="md_contact" class="form-control" rows="3">{{ $page_contact->md_contact }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">{{ A_LANGUAGE }}</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control" value="{{ $page_contact['language']['name'] }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{ A_UPDATE }}">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection