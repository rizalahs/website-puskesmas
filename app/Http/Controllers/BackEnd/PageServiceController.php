<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageService;
use App\Models\Language;

class PageServiceController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-service',compact('languages'));
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
        $page_service = PageService::where('lang_id',$id)->first();
        return view('backEnd.view-page-service-edit',compact('page_service'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_service = PageService::findOrFail($id);
        $page_service->update([
            'service_heading' => $request->service_heading,
            'mt_service'      => $request->mt_service,
            'md_service'      => $request->md_service
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

   
    public function destroy($id)
    {
        //
    }
}
