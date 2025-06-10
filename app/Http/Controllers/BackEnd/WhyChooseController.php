<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\WhyChoose;

class WhyChooseController extends Controller
{
    
    public function index()
    {
        $why_chooses = WhyChoose::orderBy('id','desc')->get();
        return view('backEnd.view-why-choose',compact('why_chooses'));
    }

   
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-why-choose-create',compact('languages'));
    }

    
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name'    => 'required|string',
            'content' => 'required|string',
            'icon'    => 'required|string',
            'photo'   => 'required|image',
        ]);

        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'why_choose_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
        }
        /* end image part */

        WhyChoose::create([
            'name'    => $request->name,
            'content' => $request->content,
            'icon'    => $request->icon,
            'photo'   => $filename,
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
        $why_choose = WhyChoose::findOrFail($id);
        $languages = Language::orderBy('id','desc')->get();

        return view('backEnd.view-why-choose-edit',compact('why_choose','languages'));
    }

   
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name'    => 'required|string',
            'content' => 'required|string',
            'icon'    => 'required|string',
            'photo'   => 'image',
        ]);

        $why_choose = WhyChoose::findOrFail($id);
        $why_choose->name    = $request->name;
        $why_choose->content = $request->content;
        $why_choose->icon    = $request->icon;
        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$why_choose->photo));
            $filename = 'why_choose_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $why_choose['photo'] = $filename;
        }
        /* end image part */
        $why_choose->lang_id   = $request->lang_id;
        $why_choose->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $why_choose = WhyChoose::findOrFail($id);
            if (file_exists(public_path('upload/' . $why_choose->photo)) AND ! empty($why_choose->photo)) {
                unlink(public_path('upload/' . $why_choose->photo));
            }
        $why_choose->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
