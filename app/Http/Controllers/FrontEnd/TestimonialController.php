<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTestimonial;
use App\Models\Testimonial;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class TestimonialController extends Controller
{
    public function index()
    {
        $data['page_testimonial'] = PageTestimonial::where('lang_id',session()->get('session_lang_id'))->first();
        $data['testimonials'] = Testimonial::where('lang_id',session()->get('session_lang_id'))->get();

        return view('frontEnd.view-testimonial',$data);
    }
}