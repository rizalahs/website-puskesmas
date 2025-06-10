<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePricing;
use App\Models\Language;

class PagePricingController extends Controller
{
   
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-pricing',compact('languages'));
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
        $page_pricing = PagePricing::where('lang_id',$id)->first();
        return view('backEnd.view-page-pricing-edit',compact('page_pricing'));
    }

   
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_pricing = PagePricing::findOrFail($id);
        $page_pricing->update([
            'pricing_heading' => $request->pricing_heading,
            'mt_pricing'      => $request->mt_pricing,
            'md_pricing'      => $request->md_pricing
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

   
    public function destroy($id)
    {
        //
    }
}
