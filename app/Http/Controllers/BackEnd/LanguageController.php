<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\LanguageDetail;
use App\Models\PageHome;
use App\Models\Footer;
use App\Models\PageAbout;
use App\Models\PageFaq;
use App\Models\PageService;
use App\Models\PageTestimonial;
use App\Models\PageNews;
use App\Models\PageEvent;
use App\Models\PageContact;
use App\Models\PageSearch;
use App\Models\PageTeam;
use App\Models\PagePortfolio;
use App\Models\PagePhotoGallery;
use App\Models\PagePricing;
use App\Models\PageTerm;
use App\Models\PagePrivacy;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-lang',compact('languages'));
    }

    
    public function create()
    {
        return view('backEnd.view-lang-create');
    }

    
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => 'required|string',
            'short_name' => 'required|string',
            'layout_direction' => 'required|string',
        ]);

        $lang = new Language();
        $lang->name = $request->name;
        $lang->short_name = $request->short_name;
        $lang->layout_direction = $request->layout_direction;
        
        if($request->lang_default == '1'){
            $all_lan = Language::where('lang_default','1')->get();
            foreach ($all_lan as $singl_lang) {
                $lang = Language::findOrFail($singl_lang->id);
                $lang->lang_default = '0';
                $lang->update();
            }
        }else{
            $lang->lang_default = '0'; 
        }
        $lang->lang_default = $request->lang_default;
        $lang->save();

        if (!empty($lang->id)) {

            /* language detail section */
            $temp_arr = array(
                'HOME',
                'ABOUT',
                'TEAM',
                'PAGE',
                'EVENT',
                'PHOTO_GALLERY',
                'TESTIMONIAL',
                'FAQ',
                'PRICING_TABLE',
                'SERVICE',
                'PORTFOLIO',
                'NEWS',
                'CONTACT',
                'SEARCH_FOR',
                'READ_MORE',
                'SUBMIT',
                'FIRST_NAME',
                'LAST_NAME',
                'PHONE_NUMBER',
                'EMAIL_ADDRESS',
                'ADDRESS',
                'MESSAGE',
                'START_DATE',
                'END_DATE',
                'EVENT_START_DATE',
                'EVENT_END_DATE',
                'EVENT_LOCATION_MAP',
                'SHARE_THIS_EVENT',
                'SHARE_THIS_NEWS',
                'COMMENT',
                'NAME',
                'ALL',
                'PROJECT_OVERVIEW',
                'CATEGORY',
                'CLIENT_NAME',
                'CLIENT_COMPANY_NAME',
                'PROJECT_START_DATE',
                'PROJECT_END_DATE',
                'CLIENT_COMMENT',
                'NEWS_DATE',
                'RECENT_PORTFOLIO',
                'RECENT_PORTFOLIO_SUBTITLE',
                'CONTACT_FORM',
                'SEND_MESSAGE',
                'SUBJECT',
                'NO_RESULT_FOUND',
                'TERMS_AND_CONDITIONS',
                'PRIVACY_POLICY',
                'SUCCESS_SUBSCRIPTION',
                'FOOTER_1_HEADING',
                'FOOTER_2_HEADING',
                'FOOTER_3_HEADING',
                'FOOTER_4_HEADING',
                'SIDEBAR_NEWS_HEADING_1',
                'SIDEBAR_NEWS_HEADING_2',
                'SIDEBAR_EVENT_HEADING_1',
                'SIDEBAR_EVENT_HEADING_2',
                'SIDEBAR_SERVICE_HEADING_1',
                'SIDEBAR_SERVICE_HEADING_2',
                'SIDEBAR_PORTFOLIO_HEADING_1',
                'SIDEBAR_PORTFOLIO_HEADING_2',
                'ERROR_EMPTY_NAME',
                'ERROR_EMPTY_FIRST_NAME',
                'ERROR_EMPTY_LAST_NAME',
                'ERROR_EMPTY_PHONE',
                'ERROR_EMPTY_EMAIL',
                'ERROR_INVALID_EMAIL',
                'ERROR_EXIST_EMAIL',
                'ERROR_EMPTY_SUBJECT',
                'ERROR_EMPTY_MESSAGE',
                'ERROR_EMPTY_CAPTCHA',
                'ERROR_INCORRECT_CAPTCHA',
                'SUCCESS_CONTACT_FORM',
                'SUCCESS_SUBSCRIPTION_FORM',
                'SUCCESS_SERVICE_PAGE_FORM',
                'SUCCESS_PORTFOLIO_PAGE_FORM',
                'SUCCESS_SUBSCRIBER_VERIFICATION',
                'ERROR_SUBSCRIBER_VERIFICATION',
                'SUCCESS_PENDING_SUBSCRIBER_DELETE',
                'CLOSE'
            );

            for ($i=0; $i < count($temp_arr); $i++) {
                languageDetail::create([
                    'lang_string' => $temp_arr[$i],
                    'lang_string_value' => '',
                    'lang_id' => $lang->id
                ]);
            }


            /* footer Section */
            Footer::create([
                'footer_copyright' => '',
                'footer_address'   => '',
                'footer_email'     => '',
                'footer_phone'     => '',
                'newsletter_text'  => '',
                'cta_text'         => '',
                'cta_button_text'  => '',
                'cta_button_url'   => '',
                'lang_id'          => $lang->id
            ]);

            /* PageHome Section */
            PageHome::create([
                'title' => 'Home Page',
                'meta_description' => '',
                'home_welcome_title' => '',
                'home_welcome_subtitle' => '',
                'home_welcome_text' => '',
                'home_welcome_pbar1_text' => '',
                'home_welcome_pbar1_value' => '',
                'home_welcome_pbar2_text' => '',
                'home_welcome_pbar2_value' => '',
                'home_welcome_pbar3_text' => '',
                'home_welcome_pbar3_value' => '',
                'home_welcome_pbar4_text' => '',
                'home_welcome_pbar4_value' => '',
                'home_welcome_pbar5_text' => '',
                'home_welcome_pbar5_value' => '',
                'home_why_choose_title' => '',
                'home_why_choose_subtitle' => '',
                'home_feature_title' => '',
                'home_feature_subtitle' => '',
                'home_service_title' => '',
                'home_service_subtitle' => '',
                'counter_1_title' => '',
                'counter_1_value' => '',
                'counter_1_icon' => '',
                'counter_2_title' => '',
                'counter_2_value' => '',
                'counter_2_icon' => '',
                'counter_3_title' => '',
                'counter_3_value' => '',
                'counter_3_icon' => '',
                'counter_4_title' => '',
                'counter_4_value' => '',
                'counter_4_icon' => '',
                'home_portfolio_title' => '',
                'home_portfolio_subtitle' => '',
                'home_booking_form_title' => '',
                'home_booking_faq_title' => '',
                'home_team_title' => '',
                'home_team_subtitle' => '',
                'home_ptable_title' => '',
                'home_ptable_subtitle' => '',
                'home_testimonial_title' => '',
                'home_testimonial_subtitle' => '',
                'home_blog_title' => '',
                'home_blog_subtitle' => '',
                'home_cta_text' => '',
                'home_cta_button_text' => '',
                'home_cta_button_url' => '',
                'lang_id' => $lang->id
            ]);

            /* page about Section */
            PageAbout::create([
                'about_heading' => 'About Heading',
                'about_content' => 'About Content',
                'mt_about'      => '',
                'md_about'      => '',
                'lang_id'       => $lang->id
            ]);

            /* page faq Section */
            PageFaq::create([
                'faq_heading' => 'FAQ Heading',
                'mt_faq'      => '',
                'md_faq'      => '',
                'lang_id'     => $lang->id
            ]);

            /* page service Section */
            PageService::create([
                'service_heading' => 'Service Heading',
                'mt_service'      => '',
                'md_service'      => '',
                'lang_id'         => $lang->id
            ]);

            /* page testimonial Section */
            PageTestimonial::create([
                'testimonial_heading' => 'Testimonial Heading',
                'mt_testimonial'      => '',
                'md_testimonial'      => '',
                'lang_id'             => $lang->id
            ]);

            /* page news Section */
            PageNews::create([
                'news_heading' => 'News Heading',
                'mt_news'      => '',
                'md_news'      => '',
                'lang_id'      => $lang->id
            ]);

            /* page event Section */
            PageEvent::create([
                'event_heading' => 'Event Heading',
                'mt_event'      => '',
                'md_event'      => '',
                'lang_id'       => $lang->id
            ]);

            /* page contact Section */
            PageContact::create([
                'contact_heading' => 'Contact Heading',
                'contact_address' => '',
                'contact_email'   => '',
                'contact_phone'   => '',
                'contact_map'     => '',
                'mt_contact'      => '',
                'md_contact'      => '',
                'lang_id'         => $lang->id
            ]);

            /* page search Section */
            PageSearch::create([
                'search_heading' => 'Search Heading',
                'mt_search'      => '',
                'md_search'      => '',
                'lang_id'        => $lang->id
            ]);

            /* page team Section */
            PageTeam::create([
                'team_heading' => 'Team Heading',
                'mt_team'      => '',
                'md_team'      => '',
                'lang_id'      => $lang->id
            ]);

            /* page portfolio Section */
            PagePortfolio::create([
                'portfolio_heading' => 'Portfolio Heading',
                'mt_portfolio'      => '',
                'md_portfolio'      => '',
                'lang_id'           => $lang->id
            ]);

            /* page photo gallery Section */
            PagePhotoGallery::create([
                'photo_gallery_heading' => 'Photo Gallery Heading',
                'mt_photo_gallery'      => '',
                'md_photo_gallery'      => '',
                'lang_id'               => $lang->id
            ]);

            /* page pricing Section */
            PagePricing::create([
                'pricing_heading' => 'Pricing Heading',
                'mt_pricing'      => '',
                'md_pricing'      => '',
                'lang_id'         => $lang->id
            ]);

            /* page term Section */
            PageTerm::create([
                'term_heading' => 'Term Heading',
                'term_content' => 'Term Content',
                'mt_term'      => '',
                'md_term'      => '',
                'lang_id'      => $lang->id
            ]);

            /* page privacy Section */
            PagePrivacy::create([
                'privacy_heading' => 'Privacy Heading',
                'privacy_content' => 'Privacy Content',
                'mt_privacy'      => '',
                'md_privacy'      => '',
                'lang_id'         => $lang->id
            ]);

        }

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('backEnd.view-lang-edit',compact('language'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => 'required|string',
            'short_name' => 'required|string',
            'layout_direction' => 'required|string',
        ]);

        $lang = Language::findOrFail($id);
        $lang->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'layout_direction' => $request->layout_direction,
            'lang_default' => $request->lang_default,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }

}
