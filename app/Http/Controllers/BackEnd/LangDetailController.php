<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguageDetail;

class LangDetailController extends Controller
{
    public function detail($id)
    {
        $language_details = languageDetail::where('lang_id',$id)->get();
        return view('backEnd.view-lang-detail',compact('language_details'));
    }

    public function Update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $array_id       = [];
        $array_lang_val = [];

        foreach($request->id as $val) {
            $array_id[] = $val;
        }

        foreach($request->lang_string_value as $val) {
            $array_lang_val[] = $val;
        }

        for($i=0; $i<count($array_id); $i++) {

            $lang_detail = languageDetail::findOrFail($array_id[$i]);
            $lang_detail->update([
                'lang_string_value' => $array_lang_val[$i]
            ]);
        }

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
}
