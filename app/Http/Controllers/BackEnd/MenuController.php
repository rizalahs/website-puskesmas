<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('backEnd.view-menu',compact('menus'));
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

        foreach($request->status as $val) {
            $arr2[] = $val;
        }

        for($i=0; $i<count($arr1); $i++) {

            $menu = Menu::findOrFail($arr1[$i]);
            $menu->update([
                'status' => $arr2[$i]
            ]);
        }

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

}
