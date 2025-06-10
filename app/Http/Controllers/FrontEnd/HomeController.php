<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Slider;
use App\Models\PageHomeLangIndependent;
use App\Models\PageHome;
use App\Models\WhyChoose;
use App\Models\Feature;
use App\Models\Service;
use App\Models\PortfolioCategory;
use App\Models\Faq;
use App\Models\TeamMember;
use App\Models\PricingTable;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\DynamicPage;
use App\Models\Language;
use App\Models\LanguageDetail;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FrontEndBooking;
use Session;

class HomeController extends Controller
{
    public function index()
    {  
        $data['sliders'] = Slider::where('lang_id',session('session_lang_id'))->get();
        $data['page_home_lang_independent'] = PageHomeLangIndependent::orderBy('id','desc')->first();
        $data['page_home'] = PageHome::where('lang_id',session('session_lang_id'))->first();
        $data['why_chooses'] = WhyChoose::where('lang_id',session('session_lang_id'))->get();
        $data['features'] = Feature::where('lang_id',session('session_lang_id'))->orderBy('id','desc')->get();
        $data['services'] = Service::where('lang_id',session('session_lang_id'))->orderBy('id','desc')->get();
        $data['portfolios'] = Portfolio::where('lang_id',session('session_lang_id'))->orderBy('id','desc')->get();
        $data['portfolio_categories'] = PortfolioCategory::where('lang_id',session('session_lang_id'))->get();
        $data['faqs'] = Faq::where('lang_id',session('session_lang_id'))->where('show_on_home','Yes')->orderBy('id','desc')->get();
        $data['team_members'] = TeamMember::where('lang_id',session('session_lang_id'))->get();
        $data['pricing_tables'] = PricingTable::where('lang_id',session('session_lang_id'))->get();
        $data['testimonials'] = Testimonial::where('lang_id',session('session_lang_id'))->get();
        $data['news_fetched']  = News::where('lang_id',session('session_lang_id'))->orderBy('id','desc')->get();
        $data['clients']  = Client::all();
        $data['dynamic_pages']  = DynamicPage::where('lang_id',session('session_lang_id'))->get();
        $data['count_dynamic_page']  = DynamicPage::where('lang_id',session('session_lang_id'))->count();

        return view('frontEnd.view-home',$data);
    }

    public function dynamicPage($slug)
    {
        $data['dynamic_page']  = DynamicPage::where('slug',$slug)->first();
        return view('frontEnd.view-dynamic-page',$data);
    }

    public function sendEmail(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return response()->json(['code'=>2,'success_message'=>env('PROJECT_NOTIFICATION')]);
        }

        $validator = \Validator::make($request->all(),[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required'
        ], [
            'first_name.required' => ERROR_EMPTY_FIRST_NAME,
            'last_name.required' => ERROR_EMPTY_LAST_NAME,
            'email.required' => ERROR_EMPTY_EMAIL,
            'email.email' => ERROR_INVALID_EMAIL,
            'phone.required' => ERROR_EMPTY_PHONE,
            'subject.required' => ERROR_EMPTY_SUBJECT,
            'message.required' => ERROR_EMPTY_MESSAGE,
            'g-recaptcha-response.required' => ERROR_INCORRECT_CAPTCHA
        ]);

        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $booking = $request->all();
            $users = User::where('role','Admin')->get();

            Notification::send($users, new FrontEndBooking($booking));
            return response()->json(['code'=>1,'success_message'=>SUCCESS_CONTACT_FORM]);
        }
    }
}
