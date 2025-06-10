<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFaq;
use App\Models\Faq;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class FaqController extends Controller
{
    public function index()
    {
        $data['page_faq'] = PageFaq::where('lang_id',session()->get('session_lang_id'))->first();
        $data['faqs'] = Faq::where('lang_id',session()->get('session_lang_id'))->get();

        return view('frontEnd.view-faq',$data);
    }
}
