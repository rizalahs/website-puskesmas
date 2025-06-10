<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Language;
use Str;

class TeamMemberController extends Controller
{
    
    public function index()
    {
        $team_members = TeamMember::orderBy('id','desc')->get();
        return view('backEnd.view-team-member',compact('team_members'));
    }

   
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-team-member-create',compact('languages'));
    }

    
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'name'        => 'required|string',
            'slug'        => 'required|unique:team_members',
            'designation' => 'required|string',
            'photo'       => 'required|image',
        ]);

        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'team_member_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
        }
        /* end image part */

        TeamMember::create([
            'photo'            => $filename,
            'name'             => $request->name,
            'slug'             => Str::slug($request->slug),
            'designation'      => $request->designation,
            'detail'           => $request->detail,
            'facebook'         => $request->facebook,
            'twitter'          => $request->twitter,
            'linkedin'         => $request->linkedin,
            'youtube'          => $request->youtube,
            'google_plus'      => $request->google_plus,
            'instagram'        => $request->instagram,
            'flickr'           => $request->flickr,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'website'          => $request->website,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'lang_id'          => $request->lang_id,
        ]);

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $team_member = TeamMember::findOrFail($id);
        $languages   = Language::orderBy('id','desc')->get();

        return view('backEnd.view-team-member-edit',compact('team_member','languages'));
    }

    
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $team_member = TeamMember::findOrFail($id);
        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'name'        => 'required|string',
            'slug'        => 'required|string|unique:team_members,slug,'.$team_member->id,
            'designation' => 'required|string',
            'photo'       => 'image',
        ]);

        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$team_member->photo));
            $filename = 'team_member_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $team_member['photo'] = $filename;
        }
        /* end image part */
        $team_member->name = $request->name;
        $team_member->slug = Str::slug($request->slug);
        $team_member->designation = $request->designation;
        $team_member->detail = $request->detail;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->youtube  = $request->youtube;
        $team_member->google_plus   = $request->google_plus;
        $team_member->instagram   = $request->instagram;
        $team_member->flickr   = $request->flickr;
        $team_member->phone  = $request->phone;
        $team_member->email  = $request->email;
        $team_member->website   = $request->website;
        $team_member->meta_title   = $request->meta_title;
        $team_member->meta_description   = $request->meta_description;
        $team_member->lang_id  = $request->lang_id;
        $team_member->save();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $team_member = TeamMember::findOrFail($id);
        if(file_exists(public_path('upload/'.$team_member->photo))) {
            unlink(public_path('upload/' . $team_member->photo));
        }
        $team_member->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
