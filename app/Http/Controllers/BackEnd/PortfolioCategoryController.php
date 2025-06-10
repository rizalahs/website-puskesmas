<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;
use App\Models\Language;

class PortfolioCategoryController extends Controller
{
    
    public function index()
    {
        $portfolio_categories = PortfolioCategory::orderBy('id','desc')->get();
        return view('backEnd.view-portfolio-category',compact('portfolio_categories'));
    }

    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-portfolio-category-create',compact('languages'));
    }

    
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name'   => 'required|string',
            'status' => 'required|string',
        ]);

        PortfolioCategory::create([
            'name'    => $request->name,
            'status'  => $request->status,
            'lang_id' => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $portfolio_category = PortfolioCategory::findOrFail($id);
        $languages = Language::orderBy('id','desc')->get();

        return view('backEnd.view-portfolio-category-edit',compact('portfolio_category','languages'));
    }

   
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name'   => 'required|string',
            'status' => 'required|string',
        ]);

        $data = PortfolioCategory::findOrFail($id);
        $data->update([
            'name'    => $request->name,
            'status'  => $request->status,
            'lang_id' => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $portfolio_category = PortfolioCategory::findOrFail($id);
        $portfolio_category->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
