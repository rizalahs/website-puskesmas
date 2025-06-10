<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function create()
    {
        $social_medias = SocialMedia::all();
        return view('backEnd.view-social-media-create',compact('social_medias'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $arr1 = [];
        $arr2 = [];

        foreach($request->id as $val) {
            $arr1[] = $val;
        }

        foreach($request->social_url as $val) {
            $arr2[] = $val;
        }

        for($i=0; $i<count($arr1); $i++) {

            $data = SocialMedia::findOrFail($arr1[$i]);
            $data->update([
                'social_url' => $arr2[$i]
            ]);
        }
        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
}
