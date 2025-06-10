<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Service;
use Str;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();
        return view('backEnd.view-service',compact('services'));
    }

    
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-service-create',compact('languages'));
    }

   
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'name'              => 'required|string',
            'slug'              => 'required|string|unique:services',
            'short_description' => 'required|string',
            'description'       => 'required|string',
            'photo'             => 'required|image',
        ]);

        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'service_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
        }
        /* end image part */

        Service::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'photo' => $filename,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
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
        $service   = Service::findOrFail($id);
        $languages = Language::orderBy('id','desc')->get();

        return view('backEnd.view-service-edit',compact('service','languages'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $service = Service::findOrFail($id);
        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'name'              => 'required|string',
            'slug'              => 'required|string|unique:services,slug,'.$service->id,
            'short_description' => 'required|string',
            'description'       => 'required|string',
            'photo'             => 'image',
        ]);

        $service->name              = $request->name;
        $service->slug              = Str::slug($request->slug);
        $service->short_description = $request->short_description;
        $service->description       = $request->description;
        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$service->photo));
            $filename = 'service_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $service['photo'] = $filename;
        }
        /* end image part */
        $service->meta_title       = $request->meta_title;
        $service->meta_description = $request->meta_description;
        $service->lang_id          = $request->lang_id;
        $service->save();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $service = Service::findOrFail($id);
        if (file_exists(public_path('upload/' . $service->photo)) AND ! empty($service->photo)) {
            unlink(public_path('upload/' . $service->photo));
        }
        $service->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
