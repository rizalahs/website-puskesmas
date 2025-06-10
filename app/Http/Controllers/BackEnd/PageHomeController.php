<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeLangIndependent;
use App\Models\PageHome;
use App\Models\Language;

class PageHomeController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        $lang_independent = PageHomeLangIndependent::orderBy('id','desc')->first();
        return view('backEnd.view-page-home',compact('languages','lang_independent'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $page_home = PageHome::where('lang_id',$id)->first();
        return view('backEnd.view-page-home-edit',compact('page_home'));
    }

   
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $page_home = PageHome::findOrFail($id);
        $page_home->update([
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'home_welcome_title' => $request->home_welcome_title,
            'home_welcome_subtitle' => $request->home_welcome_subtitle,
            'home_welcome_text' => $request->home_welcome_text,
            'home_welcome_pbar1_text' => $request->home_welcome_pbar1_text,
            'home_welcome_pbar1_value' => $request->home_welcome_pbar1_value,
            'home_welcome_pbar2_text' => $request->home_welcome_pbar2_text,
            'home_welcome_pbar2_value' => $request->home_welcome_pbar2_value,
            'home_welcome_pbar3_text' => $request->home_welcome_pbar3_text,
            'home_welcome_pbar3_value' => $request->home_welcome_pbar3_value,
            'home_welcome_pbar4_text' => $request->home_welcome_pbar4_text,
            'home_welcome_pbar4_value' => $request->home_welcome_pbar4_value,
            'home_welcome_pbar5_text' => $request->home_welcome_pbar5_text,
            'home_welcome_pbar5_value' => $request->home_welcome_pbar5_value,
            'home_why_choose_title' => $request->home_why_choose_title,
            'home_why_choose_subtitle' => $request->home_why_choose_subtitle,
            'home_feature_title' => $request->home_feature_title,
            'home_feature_subtitle' => $request->home_feature_subtitle,
            'home_service_title' => $request->home_service_title,
            'home_service_subtitle' => $request->home_service_subtitle,
            'counter_1_title' => $request->counter_1_title,
            'counter_1_value' => $request->counter_1_value,
            'counter_1_icon' => $request->counter_1_icon,
            'counter_2_title' => $request->counter_2_title,
            'counter_2_value' => $request->counter_2_value,
            'counter_2_icon' => $request->counter_2_icon,
            'counter_3_title' => $request->counter_3_title,
            'counter_3_value' => $request->counter_3_value,
            'counter_3_icon' => $request->counter_3_icon,
            'counter_4_title' => $request->counter_4_title,
            'counter_4_value' => $request->counter_4_value,
            'counter_4_icon' => $request->counter_4_icon,
            'home_portfolio_title' => $request->home_portfolio_title,
            'home_portfolio_subtitle' => $request->home_portfolio_subtitle,
            'home_booking_form_title' => $request->home_booking_form_title,
            'home_booking_faq_title' => $request->home_booking_faq_title,
            'home_team_title' => $request->home_team_title,
            'home_team_subtitle' => $request->home_team_subtitle,
            'home_ptable_title' => $request->home_ptable_title,
            'home_ptable_subtitle' => $request->home_ptable_subtitle,
            'home_testimonial_title' => $request->home_testimonial_title,
            'home_testimonial_subtitle' => $request->home_testimonial_subtitle,
            'home_blog_title' => $request->home_blog_title,
            'home_blog_subtitle' => $request->home_blog_subtitle,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

   
    public function destroy($id)
    {
        //
    }

    public function pageIndpUpdate(Request $request,$id)
    {

        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $home_lng_indp = PageHomeLangIndependent::findOrFail($id);

        if ($request->home_welcome_video || $request->home_welcome_status != null) {
            $home_lng_indp->update([
                'home_welcome_video' => $request->home_welcome_video,
                'home_welcome_status' => $request->home_welcome_status,
            ]);
        }       

        if ($request->home_why_choose_status != null) {
            $home_lng_indp->update([
                'home_why_choose_status' => $request->home_why_choose_status,
            ]);
        }

        if ($request->home_feature_status != null) {
            $home_lng_indp->update([
                'home_feature_status' => $request->home_feature_status,
            ]);
        }

        if ($request->home_service_status != null) {
            $home_lng_indp->update([
                'home_service_status' => $request->home_service_status,
            ]);
        }
        
        if ($request->counter_status != null) {
            $home_lng_indp->update([
                'counter_status' => $request->counter_status,
            ]);
        }

        if ($request->home_portfolio_status != null) {
            $home_lng_indp->update([
                'home_portfolio_status' => $request->home_portfolio_status,
            ]);
        }

        if ($request->home_booking_status != null) {
            $home_lng_indp->update([
                'home_booking_status' => $request->home_booking_status,
            ]);
        }

        if ($request->home_team_status != null) {
            $home_lng_indp->update([
                'home_team_status' => $request->home_team_status,
            ]);
        }

        if ($request->home_ptable_status != null) {
            $home_lng_indp->update([
                'home_ptable_status' => $request->home_ptable_status,
            ]);
        }            
        
        if ($request->home_testimonial_status != null) {
            $home_lng_indp->update([
                'home_testimonial_status' => $request->home_testimonial_status,
            ]);
        }

        if ($request->home_blog_item || $request->home_blog_status != null) {
            $home_lng_indp->update([
                'home_blog_item' => $request->home_blog_item,
                'home_blog_status' => $request->home_blog_status,
            ]);
        }


        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function pageIndpUpdate2(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data = PageHomeLangIndependent::findOrFail($id);
        /* start image part */
        if ($request->hasFile('home_welcome_video_bg')) {
            $file = $request->file('home_welcome_video_bg');
            @unlink(public_path('upload/'.$data->home_welcome_video_bg));
            $filename = 'welcome_video_background_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $data['home_welcome_video_bg'] = $filename;
        }
        /* end image part */
        $data->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function pageIndpUpdate3(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data = PageHomeLangIndependent::findOrFail($id);
        /* start image part */
        if ($request->hasFile('counter_photo')) {
            $file = $request->file('counter_photo');
            @unlink(public_path('upload/'.$data->counter_photo));
            $filename = 'counter_photo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $data['counter_photo'] = $filename;
        }
        /* end image part */
        $data->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function pageIndpUpdate4(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data = PageHomeLangIndependent::findOrFail($id);
        /* start image part */
        if ($request->hasFile('home_booking_photo')) {
            $file = $request->file('home_booking_photo');
            @unlink(public_path('upload/'.$data->home_booking_photo));
            $filename = 'home_booking_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $data['home_booking_photo'] = $filename;
        }
        /* end image part */
        $data->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function pageIndpUpdate5(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data = PageHomeLangIndependent::findOrFail($id);
        /* start image part */
        if ($request->hasFile('home_testimonial_photo')) {
            $file = $request->file('home_testimonial_photo');
            @unlink(public_path('upload/'.$data->home_testimonial_photo));
            $filename = 'home_testimonial_photo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $data['home_testimonial_photo'] = $filename;
        }
        /* end image part */
        $data->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
}
