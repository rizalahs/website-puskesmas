<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTerm;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class TermAndConditionController extends Controller
{
    public function index()
    {
        $data['page_term'] = PageTerm::where('lang_id',session()->get('session_lang_id'))->first();

        return view('frontEnd.view-term-and-condition',$data);
    }
}
