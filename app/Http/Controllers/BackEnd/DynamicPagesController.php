<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DynamicPage;
use App\Models\Language;
use Str;

class DynamicPagesController extends Controller
{
    
    public function index()
    {
        $all_dynamic_pages = DynamicPage::orderBy('id','desc')->get();
        return view('backEnd.view-dynamic-page',compact('all_dynamic_pages'));
    }

    
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-dynamic-page-create',compact('languages'));
    }

    
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'name'    => 'required|string',
            'slug'    => 'required|unique:dynamic_pages',
            'content' => 'required|string',
            'banner'  => 'required|image',
        ]);

        /* start image part */
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = 'dynamic_page_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
        }
        /* end image part */

        DynamicPage::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'content' => $request->content,
            'banner' => $filename,
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
        $dynamic_page = DynamicPage::findOrFail($id);
        $languages = Language::orderBy('id','desc')->get();

        return view('backEnd.view-dynamic-page-edit',compact('dynamic_page','languages'));
    }
    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $dynamic_page = DynamicPage::findOrFail($id);
        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'name'    => 'required|string',
            'slug'    => 'required|unique:dynamic_pages,slug,'.$dynamic_page->id,
            'content' => 'required|string',
            'banner'  => 'image',
        ]);

        $dynamic_page->name    = $request->name;
        $dynamic_page->slug    = Str::slug($request->slug);
        $dynamic_page->content = $request->content;
        /* start image part */
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            @unlink(public_path('upload/'.$dynamic_page->banner));
            $filename = 'dynamic_page_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $dynamic_page['banner'] = $filename;
        }
        /* end image part */
        $dynamic_page->meta_title       = $request->meta_title;
        $dynamic_page->meta_description = $request->meta_description;
        $dynamic_page->lang_id          = $request->lang_id;
        $dynamic_page->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $dynamic_page = DynamicPage::findOrFail($id);
            if (file_exists(public_path('upload/' . $dynamic_page->banner)) AND ! empty($dynamic_page->banner)) {
                unlink(public_path('upload/' . $dynamic_page->banner));
            }
        $dynamic_page->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}