<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterLangIndependent;
use App\Models\Footer;
use App\Models\Language;

class FooterController extends Controller
{
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        $lang_independent = FooterLangIndependent::orderBy('id','desc')->first();
        return view('backEnd.view-footer',compact('languages','lang_independent'));
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
        $footer = Footer::where('lang_id',$id)->first();
        return view('backEnd.view-footer-edit',compact('footer'));
    }
    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $footer = Footer::findOrFail($id);
        $footer->update([
            'footer_copyright' => $request->footer_copyright,
            'footer_address'   => $request->footer_address,
            'footer_email'     => $request->footer_email,
            'footer_phone'     => $request->footer_phone,
            'newsletter_text'  => $request->newsletter_text,
            'cta_text'         => $request->cta_text,
            'cta_button_text'  => $request->cta_button_text,
            'cta_button_url'   => $request->cta_button_url
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
    
    public function destroy($id)
    {
        //
    }

    public function independentUpdate(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $lang_ind = FooterLangIndependent::orderBy('id','desc')->first();
        $lang_ind->footer_recent_news_item      = $request->footer_recent_news_item;
        $lang_ind->footer_recent_portfolio_item = $request->footer_recent_portfolio_item;
        if($request->hasFile('cta_background')) {
            $file = $request->file('cta_background');
            @unlink(public_path('upload/'.$lang_ind->cta_background));
            $filename = 'cta_background_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $lang_ind->cta_background = $filename;
        }
        $lang_ind->save();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
}