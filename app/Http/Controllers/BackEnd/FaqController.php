<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Faq;

class FaqController extends Controller
{
    
    public function index()
    {
        $faqs = Faq::orderBy('id','desc')->get();
        return view('backEnd.view-faq',compact('faqs'));
    }

    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-faq-create',compact('languages'));
    }

   
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'show_on_home' => 'required|string',
        ]);

        Faq::create([
            'title' => $request->title,
            'content' => $request->content,
            'show_on_home' => $request->show_on_home,
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
        $faq = Faq::findOrFail($id);
        $languages = Language::orderBy('id','desc')->get();

        return view('backEnd.view-faq-edit',compact('faq','languages'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'show_on_home' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update([
            'title' => $request->title,
            'content' => $request->content,
            'show_on_home' => $request->show_on_home,
            'lang_id' => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
