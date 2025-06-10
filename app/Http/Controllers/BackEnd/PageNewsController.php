<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageNews;
use App\Models\Language;

class PageNewsController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-news',compact('languages'));
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
        $page_news = Pagenews::where('lang_id',$id)->first();
        return view('backEnd.view-page-news-edit',compact('page_news'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_news = Pagenews::findOrFail($id);
        $page_news->update([
            'news_heading' => $request->news_heading,
            'mt_news'      => $request->mt_news,
            'md_news'      => $request->md_news
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

   
    public function destroy($id)
    {
        //
    }
}
