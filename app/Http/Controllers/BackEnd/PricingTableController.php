<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\PricingTable;

class PricingTableController extends Controller
{
    
    public function index()
    {
        $pricing_tables = PricingTable::orderBy('id','desc')->get();
        return view('backEnd.view-pricing-table',compact('pricing_tables'));
    }

    
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-pricing-table-create',compact('languages'));
    }

    
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'price'       => 'required|string',
            'subtitle'    => 'required|string',
            'text'        => 'required|string',
            'button_text' => 'required|string',
            'button_url'  => 'required|string',
        ]);

        PricingTable::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'price'       => $request->price,
            'subtitle'    => $request->subtitle,
            'text'        => $request->text,
            'button_text' => $request->button_text,
            'button_url'  => $request->button_url,
            'lang_id'     => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $pricing_table = PricingTable::findOrFail($id);
        $languages     = Language::orderBy('id','desc')->get();

        return view('backEnd.view-pricing-table-edit',compact('pricing_table','languages'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'price'       => 'required|string',
            'subtitle'    => 'required|string',
            'text'        => 'required|string',
            'button_text' => 'required|string',
            'button_url'  => 'required|string',
        ]);

        $pricing = PricingTable::findOrFail($id);
        $pricing->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'price'       => $request->price,
            'subtitle'    => $request->subtitle,
            'text'        => $request->text,
            'button_text' => $request->button_text,
            'button_url'  => $request->button_url,
            'lang_id'     => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $pricing_table = PricingTable::findOrFail($id);
        $pricing_table->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
