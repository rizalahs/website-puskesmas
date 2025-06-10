<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageEvent;
use App\Models\Event;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class EventController extends Controller
{
    public function index()
    {
        $data['page_event'] = PageEvent::where('lang_id',session()->get('session_lang_id'))->first();
        $data['events'] = Event::where('lang_id',session()->get('session_lang_id'))->paginate(5);

        return view('frontEnd.view-event',$data);
    }

    public function view($slug)
    {
        $data['event'] = Event::where('lang_id',session()->get('session_lang_id'))->where('slug',$slug)->first();
        if (isset($data['event']->slug)) {
            $data['events'] = Event::where('lang_id',session()->get('session_lang_id'))->orderBy('id','desc')->get();

            return view('frontEnd.view-event-detail',$data);
        }else{
            return back();
        }
    }
}
