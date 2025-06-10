<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePricing;
use App\Models\PricingTable;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class PricingController extends Controller
{
    public function index()
    {
        $data['page_pricing'] = PagePricing::where('lang_id',session()->get('session_lang_id'))->first();
        $data['pricing_tables'] = PricingTable::where('lang_id',session()->get('session_lang_id'))->get();

        return view('frontEnd.view-pricing',$data);
    }
}
