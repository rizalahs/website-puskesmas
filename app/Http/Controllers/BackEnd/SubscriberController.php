<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BackEndSendEmail;
use Mail;
use App\Mail\Websitemail;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::where('status',1)->orderBy('id','desc')->get();
        return view('backEnd.view-subscriber',compact('subscribers'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }

    public function view()
    {
        return view('backEnd.view-send-email');
    }

    public function sendEmail(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'subject'  => 'required|string',
            'message'  => 'required|string',
        ]);

        
        $subject = $request->subject;
        $message = $request->message;
        
        $active_subscribers = Subscriber::where('status',1)->get();

        foreach ($active_subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Websitemail($subject,$message));
        }

        return redirect()->back()->with('success',A_SUCCESS_EMAIL_SENT);
    }
}
