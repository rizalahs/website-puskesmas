<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;

class PhotoGalleryController extends Controller
{
    
    public function index()
    {
        $photos = PhotoGallery::orderBy('id','desc')->get();
        return view('backEnd.view-photo',compact('photos'));
    }

    
    public function create()
    {
        return view('backEnd.view-photo-create');
    }

   
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'photo'   => 'required|image',
        ]);

        $data = new PhotoGallery();
        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'photo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $photo_data = PhotoGallery::findOrFail($id);
        return view('backEnd.view-photo-edit',compact('photo_data'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'photo' => 'image',
        ]);

        $data = PhotoGallery::findOrFail($id);
        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$data->photo));
            $filename = 'photo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $data['photo'] = $filename;
        }
        $data->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $photo = PhotoGallery::findOrFail($id);
        if (file_exists(public_path('upload/' . $photo->photo)) AND ! empty($photo->photo)) {
            unlink(public_path('upload/' . $photo->photo));
        }
        $photo->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
