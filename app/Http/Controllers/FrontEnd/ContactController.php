<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguageDetail;
use App\Models\Language;
use App\Models\PageContact;
use App\Rules\Captcha;
use App\Models\Admin;
use App\Models\Setting;
use App\Mail\Websitemail;
use Mail;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        $data['page_contact'] = PageContact::where('lang_id',session()->get('session_lang_id'))->first();

        return view('frontEnd.view-contact',$data);
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
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if($setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ]);
        }

        $admin_data = Admin::where('id',1)->first();
        $subject = $request->subject;
        
        $message = '<b>Name:</b><br>'.$request->name.'<br><br>';
        $message .= '<b>Email:</b><br>'.$request->email.'<br><br>';
        $message .= '<b>Phone:</b><br>'.$request->phone.'<br><br>';
        $message .= '<b>Subject:</b><br>'.$request->subject.'<br><br>';
        $message .= '<b>Message:</b><br>'.$request->message.'<br><br>';
        
        Mail::to($admin_data->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', SUCCESS_CONTACT_FORM);
    }
}
