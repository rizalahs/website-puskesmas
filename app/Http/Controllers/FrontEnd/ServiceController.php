<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\PageService;
use App\Models\Service;
use App\Models\LanguageDetail;
use App\Models\Language;
use App\Models\User;
use App\Models\Setting;
use App\Models\Admin;
use App\Rules\Captcha;
use App\Mail\Websitemail;
use Mail;
use Session;

class ServiceController extends Controller
{
    public function index()
    {
        $data['page_service'] = PageService::where('lang_id',session()->get('session_lang_id'))->first();
        $data['services'] = Service::where('lang_id',session()->get('session_lang_id'))->get();

        return view('frontEnd.view-service',$data);
    }

    public function view($slug)
    {
        $data['service']  = Service::where('lang_id',session()->get('session_lang_id'))->where('slug',$slug)->first();
        if (isset($data['service']->slug)) {            
            $data['services'] = Service::where('lang_id',session()->get('session_lang_id'))->get();

            return view('frontEnd.view-service-detail',$data);
        }else{
            return back();
        }
    }

    public function sendEmail(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return response()->json(['code'=>2,'success_message'=>env('PROJECT_NOTIFICATION')]);
        }

        $setting = Setting::orderBy('id','desc')->first();

        $request->validate([
            'name'=>'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ], [
            'name.required' => ERROR_EMPTY_NAME,
            'email.required' => ERROR_EMPTY_EMAIL,
            'email.email' => ERROR_INVALID_EMAIL,
            'phone.required' => ERROR_EMPTY_PHONE,
            'message.required' => ERROR_EMPTY_MESSAGE,
        ]);

        if($setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => ERROR_INCORRECT_CAPTCHA
            ]);
        }

        $admin_data = Admin::where('id',1)->first();
        $subject = 'Service Enquery';
        
        $message = '<b>Service Name:</b><br>'.$request->service_name.'<br><br>';
        $message .= '<b>Name:</b><br>'.$request->name.'<br><br>';
        $message .= '<b>Email:</b><br>'.$request->email.'<br><br>';
        $message .= '<b>Phone:</b><br>'.$request->phone.'<br><br>';
        $message .= '<b>Message:</b><br>'.$request->message.'<br><br>';
        
        Mail::to($admin_data->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', SUCCESS_SERVICE_PAGE_FORM);
    }
}
