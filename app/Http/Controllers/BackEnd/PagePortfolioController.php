<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePortfolio;
use App\Models\Language;

class PagePortfolioController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-portfolio',compact('languages'));
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
        $page_portfolio = PagePortfolio::where('lang_id',$id)->first();
        return view('backEnd.view-page-portfolio-edit',compact('page_portfolio'));
    }

   
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_portfolio = PagePortfolio::findOrFail($id);
        $page_portfolio->update([
            'portfolio_heading' => $request->portfolio_heading,
            'mt_portfolio'      => $request->mt_portfolio,
            'md_portfolio'      => $request->md_portfolio
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
