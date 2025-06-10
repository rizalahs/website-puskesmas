<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function change(Request $request)
    {
        Session::put('session_lang_id',$request->lang_change_id);
        return redirect()->back();
    }

}
