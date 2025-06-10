<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePhotoGallery;
use App\Models\Language;

class PagePhotoGalleryController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-photo-gallery',compact('languages'));
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
        $page_photo_gallery = PagePhotoGallery::where('lang_id',$id)->first();
        return view('backEnd.view-page-photo-gallery-edit',compact('page_photo_gallery'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_photo_gallery = PagePhotoGallery::findOrFail($id);
        $page_photo_gallery->update([
            'photo_gallery_heading' => $request->photo_gallery_heading,
            'mt_photo_gallery'      => $request->mt_photo_gallery,
            'md_photo_gallery'      => $request->md_photo_gallery
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
