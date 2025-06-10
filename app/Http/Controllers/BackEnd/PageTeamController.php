<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTeam;
use App\Models\Language;

class PageTeamController extends Controller
{
    
    public function index()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-page-team',compact('languages'));
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
        $page_team = PageTeam::where('lang_id',$id)->first();
        return view('backEnd.view-page-team-edit',compact('page_team'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $page_team = PageTeam::findOrFail($id);
        $page_team->update([
            'team_heading' => $request->team_heading,
            'mt_team'      => $request->mt_team,
            'md_team'      => $request->md_team
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        //
    }
}
