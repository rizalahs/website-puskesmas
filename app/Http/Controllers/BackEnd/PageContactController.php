<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContact;
use App\Models\Language;

class PageContactController extends Controller
{
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-contact',compact('languages'));
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
        $page_contact = PageContact::where('lang_id',$id)->first();
        return view('backEnd.view-page-contact-edit',compact('page_contact'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_contact = PageContact::findOrFail($id);
        $page_contact->update([
            'contact_heading' => $request->contact_heading,
            'contact_address' => $request->contact_address,
            'contact_email'   => $request->contact_email,
            'contact_phone'   => $request->contact_phone,
            'contact_map'     => $request->contact_map,
            'mt_contact'      => $request->mt_contact,
            'md_contact'      => $request->md_contact 
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
