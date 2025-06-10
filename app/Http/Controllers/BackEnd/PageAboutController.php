<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageAbout;
use App\Models\Language;

class PageAboutController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-about',compact('languages'));
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
        $page_about = PageAbout::where('lang_id',$id)->first();
        return view('backEnd.view-page-about-edit',compact('page_about'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_about = PageAbout::findOrFail($id);
        $page_about->update([
            'about_heading' => $request->about_heading,
            'about_content' => $request->about_content,
            'mt_about'      => $request->mt_about,
            'md_about'      => $request->md_about
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
