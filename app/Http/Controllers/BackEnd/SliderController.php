<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Slider;

class SliderController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('backEnd.view-slider',compact('sliders'));
    }

   
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-slider-create',compact('languages'));
    }

   
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'photo' => 'required|image',
        ]);

        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'slider_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
        }
        /* end image part */

        Slider::create([
            'heading'      => $request->heading,
            'content'      => $request->content,
            'button1_text' => $request->button1_text,
            'button1_url'  => $request->button1_url,
            'button2_text' => $request->button2_text,
            'button2_url'  => $request->button2_url,
            'position'     => $request->position,
            'photo'        => $filename,
            'lang_id'      => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);direct()->route('sliders.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $languages = Language::orderBy('id','desc')->get();

        return view('backEnd.view-slider-edit',compact('slider','languages'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'photo' => 'image',
        ]);

        $slider = Slider::findOrFail($id);
        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$slider->photo));
            $filename = 'slider_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $slider['photo'] = $filename;
        }
        /* end image part */
        $slider->heading      = $request->heading;
        $slider->content      = $request->content;
        $slider->button1_text = $request->button1_text;
        $slider->button1_url  = $request->button1_url;
        $slider->button2_text = $request->button2_text;
        $slider->button2_url  = $request->button2_url;
        $slider->position     = $request->position;
        $slider->lang_id      = $request->lang_id;
        $slider->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $slider = Slider::findOrFail($id);
        if (file_exists(public_path('upload/' . $slider->photo)) AND ! empty($slider->photo)) {
            unlink(public_path('upload/' . $slider->photo));
        }
        $slider->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
