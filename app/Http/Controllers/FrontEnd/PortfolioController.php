<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\PagePortfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioPhoto;
use App\Models\LanguageDetail;
use App\Models\Language;
use App\Models\User;
use App\Models\Setting;
use App\Rules\Captcha;
use Session;
use App\Mail\Websitemail;
use Mail;
use App\Models\Admin;

class PortfolioController extends Controller
{
    public function index()
    {
        $data['page_portfolio']    = PagePortfolio::where('lang_id',session()->get('session_lang_id'))->first();
        $data['portfolio_categories'] = PortfolioCategory::where('lang_id',session()->get('session_lang_id'))->get();

        return view('frontEnd.view-portfolio',$data);
    }

    public function view($slug)
    {
        $data['portfolio']  = Portfolio::where('lang_id',session()->get('session_lang_id'))->where('slug',$slug)->first();
        if (isset($data['portfolio']->slug)) {
            $data['all_news']  = News::all();
            $data['portfolios'] = Portfolio::all();
            
            $data['page_portfolio']    = PagePortfolio::where('lang_id',session()->get('session_lang_id'))->first();
            $data['portfolio_categories'] = PortfolioCategory::where('lang_id',session()->get('session_lang_id'))->get();
            $data['portfolio_photos'] = PortfolioPhoto::where('portfolio_id',$data['portfolio']->id)->get();
            $data['portfolio_order_by_name'] = Portfolio::where('lang_id',session()->get('session_lang_id'))->orderBy('name','asc')->get();

            return view('frontEnd.view-portfolio-detail',$data);
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
        $subject = 'Portfolio Enquery';
        
        $message = '<b>Portfolio Name:</b><br>'.$request->portfolio_name.'<br><br>';
        $message .= '<b>Name:</b><br>'.$request->name.'<br><br>';
        $message .= '<b>Email:</b><br>'.$request->email.'<br><br>';
        $message .= '<b>Phone:</b><br>'.$request->phone.'<br><br>';
        $message .= '<b>Message:</b><br>'.$request->message.'<br><br>';
        
        Mail::to($admin_data->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', SUCCESS_PORTFOLIO_PAGE_FORM);
    }
}
