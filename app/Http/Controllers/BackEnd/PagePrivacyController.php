<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePrivacy;
use App\Models\Language;

class PagePrivacyController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-privacy',compact('languages'));
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
        $page_privacy = PagePrivacy::where('lang_id',$id)->first();
        return view('backEnd.view-page-privacy-edit',compact('page_privacy'));
    }

   
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_privacy = PagePrivacy::findOrFail($id);
        $page_privacy->update([
            'privacy_heading' => $request->privacy_heading,
            'privacy_content' => $request->privacy_content,
            'mt_privacy'      => $request->mt_privacy,
            'md_privacy'      => $request->md_privacy
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

   
    public function destroy($id)
    {
        //
    }
}
