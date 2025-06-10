<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id','desc')->get();
        return view('backEnd.view-client',compact('clients'));
    }
 
    public function create()
    {
        return view('backEnd.view-client-create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name'  => 'required|string',
            'photo' => 'required|image',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->url  = $request->url;
        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'client_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $client['photo'] = $filename;
        }
        /* end image part */
        $client->save();

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $client   = Client::findOrFail($id);
        return view('backEnd.view-client-edit',compact('client'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name'  => 'required|string',
            'photo' => 'image',
        ]);

        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->url  = $request->url;
        /* start image part */
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/'.$client->photo));
            $filename = 'client_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $client['photo'] = $filename;
        }
        /* end image part */
        $client->save();

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $client = Client::findOrFail($id);
        if (file_exists(public_path('upload/' . $client->photo)) AND ! empty($client->photo)) {
            unlink(public_path('upload/' . $client->photo));
        }
        $client->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
