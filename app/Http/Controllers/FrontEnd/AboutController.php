<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageAbout;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class AboutController extends Controller
{
    public function index()
    {
        $data['page_about'] = PageAbout::where('lang_id',session()->get('session_lang_id'))->first();

        return view('frontEnd.view-about',$data);
    }
}
