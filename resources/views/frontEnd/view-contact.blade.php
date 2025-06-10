@extends('frontEnd.layouts.app')

@section('content')
<!--Banner Start-->
<div class="banner-slider" style="background-image: url({{ asset('upload/'.$setting->banner_contact) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ $page_contact->contact_heading }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Contact Start-->
<div class="contact-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>{{ ADDRESS }}</h4>
                        <p>
                            {!! nl2br($page_contact->contact_address) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-mobile-alt" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>{{ PHONE_NUMBER }}</h4>
                        <p>
                            {!! nl2br($page_contact->contact_phone) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>{{ EMAIL_ADDRESS }}</h4>
                        <p>
                            {!! nl2br($page_contact->contact_email) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-form headstyle pt_90">
                    <h4>{{ CONTACT_FORM }}</h4>
                    <form method="POST" action="{{ route('contact.send.email') }}">
                        @csrf
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="{{ NAME }}" name="name" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="{{ PHONE_NUMBER }}" name="phone" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}" name="email" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="{{ SUBJECT }}" name="subject" autocomplete="off">
                            </div>
                            <div class="form-group col-12">
                                <textarea class="form-control" placeholder="{{ MESSAGE }}" name="message"></textarea>
                            </div>
                            @php
                              $setting = \App\Models\Setting::orderBy('id','desc')->first();
                            @endphp
                            @if($setting->google_recaptcha_status == 'Show')
                            <div class="form-group col-12">
                                <div class="g-recaptcha" data-sitekey="{{ $setting->google_recaptcha_key }}"></div>
                            </div>
                            @endif
                            <div class="form-group col-12">
                                <button type="submit" class="btn">{{ SEND_MESSAGE }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Contact End-->

<!--Map Start-->
<div class="map-area">{!! $page_contact->contact_map !!}</div>
@endsection

@push('js')
<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        grecaptcha.reset();

                        let Msg = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500
                        })

                        Msg.fire({
                          type: 'success',
                          title: data.success_message,
                        })
                    }
                    else 
                    {
                        $(form)[0].reset();
                        grecaptcha.reset();

                        let Msg = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2500
                        })

                        Msg.fire({
                          type: 'error',
                          title: data.success_message,
                        })
                    }
                }
            });
        });
    })(jQuery);
</script>
@endpush