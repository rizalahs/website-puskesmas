<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguageAdminDetail;

class LanguageAdminController extends Controller
{
 
    public function index() {
        $language_data = LanguageAdminDetail::orderBy('id', 'asc')->get();
        return view('backEnd.view-lang-admin', compact('language_data'));
    }

    public function update(Request $request) {

        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $i=0;
        foreach(request('lang_id') as $value) {
            $arr1[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_string') as $value){
            $arr2[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_string_value') as $value){
            $arr3[$i] = $value;
            $i++;
        }
        for($i=0;$i<count($arr1);$i++){
            $data = array();
            $data['lang_string_value'] = $arr3[$i];
            LanguageAdminDetail::where('id', $arr1[$i])->update($data);
        }

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
}
