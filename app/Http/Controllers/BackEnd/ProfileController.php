<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('backEnd.view-profile',compact('admin'));
    }

    public function infoUpdate(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $admin = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins,email,'.$admin->id],
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$admin->photo));
            $filename = 'admin_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $admin->photo = $filename;
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function passwordUpdate(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $admin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();
        
        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
}
