<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFaq;
use App\Models\Language;

class PageFaqController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-faq',compact('languages'));
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
        $page_faq = PageFaq::where('lang_id',$id)->first();
        return view('backEnd.view-page-faq-edit',compact('page_faq'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_faq = PageFaq::findOrFail($id);
        $page_faq->update([
            'faq_heading' => $request->faq_heading,
            'mt_faq'      => $request->mt_faq,
            'md_faq'      => $request->md_faq
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
