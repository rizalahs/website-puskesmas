<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSearch;
use App\Models\Language;

class PageSearchController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-search',compact('languages'));
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
        $page_search = PageSearch::where('lang_id',$id)->first();
        return view('backEnd.view-page-search-edit',compact('page_search'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_search = PageSearch::findOrFail($id);
        $page_search->update([
            'search_heading' => $request->search_heading,
            'mt_search'      => $request->mt_search,
            'md_search'      => $request->md_search
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        //
    }
}
