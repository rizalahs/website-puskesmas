<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Event;
use Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id','desc')->get();
        return view('backEnd.view-event',compact('events'));
    }

    
    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        return view('backEnd.view-event-create',compact('languages'));
    }

   
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'title'          => 'required|string',
            'slug'           => 'required|string|unique:team_members',
            'short_content'  => 'required|string',
            'content'        => 'required|string',
            'start_date'     => 'required',
            'end_date'       => 'required',
            'event_location' => 'required|string',
            'event_map'      => 'required|string',
            'photo'          => 'required|image|mimes:jpeg,png,jpg,gif',
            'banner'         => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);


        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'event_photo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
        }
        /* end image part */

        /* start banner part */
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $bannername = 'event_banner_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$bannername);
        }
        /* end banner part */

        Event::create([
            'title'            => $request->title,
            'slug'             => Str::slug($request->slug),
            'short_content'    => $request->short_content,
            'content'          => $request->content,
            'start_date'       => date('Y-m-d',strtotime($request->start_date)),
            'end_date'         => date('Y-m-d',strtotime($request->end_date)),
            'event_location'   => $request->event_location,
            'event_map'        => $request->event_map,
            'photo'            => $filename,
            'banner'           => $bannername,
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
        $event = Event::findOrFail($id);
        $languages   = Language::orderBy('id','desc')->get();

        return view('backEnd.view-event-edit',compact('event','languages'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $event = Event::findOrFail($id);
        $request['slug'] = Str::slug($request['slug'],'-');
        $request->validate([
            'title'          => 'required|string',
            'slug'           => 'required|string|unique:events,slug,'.$event->id,
            'short_content'  => 'required|string',
            'content'        => 'required|string',
            'start_date'     => 'required',
            'end_date'       => 'required',
            'event_location' => 'required|string',
            'event_map'      => 'required|string'
        ]);

        /* start image part */
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$event->photo));
            $filename = 'event_photo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $event['photo'] = $filename;
        }
        /* end image part */

        /* start image part */
        if ($request->hasFile('banner')) {
            $request->validate([
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            $file = $request->file('banner');
            @unlink(public_path('upload/'.$event->banner));
            $bannername = 'event_banner_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$bannername);
            $event['banner'] = $bannername;
        }
        /* end image part */

        $event->title            = $request->title;
        $event->slug             = Str::slug($request->slug);
        $event->short_content    = $request->short_content;
        $event->content          = $request->content;
        $event->start_date       = date('Y-m-d',strtotime($request->start_date));
        $event->end_date         = date('Y-m-d',strtotime($request->end_date));
        $event->event_location   = $request->event_location;
        $event->event_map        = $request->event_map;
        $event->meta_title       = $request->meta_title;
        $event->meta_description = $request->meta_description;
        $event->lang_id          = $request->lang_id;
        $event->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $event = Event::findOrFail($id);
        if (file_exists(public_path('upload/' . $event->photo)) AND ! empty($event->photo)) {
            unlink(public_path('upload/' . $event->photo));
        }
        if (file_exists(public_path('upload/' . $event->banner)) AND ! empty($event->banner)) {
            unlink(public_path('upload/' . $event->banner));
        }
        $event->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
