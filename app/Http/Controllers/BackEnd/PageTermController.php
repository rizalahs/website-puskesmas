<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTerm;
use App\Models\Language;

class PageTermController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-term',compact('languages'));
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
        $page_term = PageTerm::where('lang_id',$id)->first();
        return view('backEnd.view-page-term-edit',compact('page_term'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_term = PageTerm::findOrFail($id);
        $page_term->update([
            'term_heading' => $request->term_heading,
            'term_content' => $request->term_content,
            'mt_term'      => $request->mt_term,
            'md_term'      => $request->md_term
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
