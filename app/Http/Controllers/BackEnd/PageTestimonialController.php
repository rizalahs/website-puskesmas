<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTestimonial;
use App\Models\Language;

class PageTestimonialController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-testimonial',compact('languages'));
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
        $page_testimonial = PageTestimonial::where('lang_id',$id)->first();
        return view('backEnd.view-page-testimonial-edit',compact('page_testimonial'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_testimonial = PageTestimonial::findOrFail($id);
        $page_testimonial->update([
            'testimonial_heading' => $request->testimonial_heading,
            'mt_testimonial'      => $request->mt_testimonial,
            'md_testimonial'      => $request->md_testimonial
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
