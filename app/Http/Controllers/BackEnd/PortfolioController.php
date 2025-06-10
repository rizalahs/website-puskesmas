<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;
use App\Models\PortfolioPhoto;
use App\Models\Portfolio;
use App\Models\Language;
use DB;
use Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $all_portfolios = Portfolio::orderBy('id','desc')->get();
        return view('backEnd.view-portfolio',compact('all_portfolios'));
    }

    public function create()
    {
        $languages = Language::orderBy('id','desc')->get();
        $portfolio_categories = PortfolioCategory::where('status','Active')->orderBy('id','desc')->get();

        return view('backEnd.view-portfolio-create',compact('portfolio_categories','languages'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request['slug'] = Str::slug($request['slug'],'-');
        DB::transaction(function() use($request){
        $request->validate([
            'name'          => 'required|string',
            'slug'          => 'required|string|unique:portfolios',
            'short_content' => 'required|string',
            'content'       => 'required|string',
            'category_id'   => 'required|string',
            'photo'         => 'required|image',
        ]);

        $portfolio = new Portfolio();
        $portfolio->name             = $request->name;
        $portfolio->slug             = Str::slug($request->slug);
        $portfolio->short_content    = $request->short_content;
        $portfolio->content          = $request->content;
        $portfolio->client_name      = $request->client_name;
        $portfolio->client_company   = $request->client_company;
        $portfolio->start_date       = $request->start_date;
        $portfolio->end_date         = $request->end_date;
        $portfolio->cost             = $request->cost;
        $portfolio->website          = $request->website;
        $portfolio->client_comment   = $request->client_comment;
        $portfolio->category_id      = $request->category_id;
        $portfolio->meta_title       = $request->meta_title;
        $portfolio->meta_description = $request->meta_description;
        $portfolio->lang_id          = $request->lang_id;

        /* start image part */
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'portfolio_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload'),$filename);
            $portfolio->photo = $filename;
        }
        /* end image part */
        if ($portfolio->save()) {
            //portfolio-othersPhoto-table-data-insert
                $files = $request->othersPhoto;
                if (!empty($files)) {
                    foreach ($files as $file) {

                        $imgName = 'portfolio_other_'.time().$file->getClientOriginalName();
                        $file->move(public_path('upload'),$imgName);
                        $data['othersPhoto'] = $imgName;

                        $data = new PortfolioPhoto();
                        $data->portfolio_id = $portfolio->id;
                        $data->othersPhoto  = $imgName;
                        $data->save();
                    }
                }

        }else{
            notify()->error("Sorry! Data not saved.", "Error");
            return redirect()->back();
        }

        });

        return redirect()->back()->with('success',A_SUCCESS_DATA_ADD);

    }
   
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('backEnd.view-portfolio-details',compact('portfolio'));
    }
   
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $languages     = Language::orderBy('id','desc')->get();
        $portfolio_categories = PortfolioCategory::where('status','Active')->orderBy('id','desc')->get();

        return view('backEnd.view-portfolio-edit',compact('portfolio','languages','portfolio_categories'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        DB::transaction(function() use($request,$id){
            
            $portfolio = Portfolio::findOrFail($id);
            $request['slug'] = Str::slug($request['slug'],'-');
            $request->validate([
                'name'          => 'required|string',
                'slug'          => 'required|string|unique:portfolios,slug,'.$portfolio->id,
                'short_content' => 'required|string',
                'content'       => 'required|string',
                'category_id'   => 'required|string',
                'photo'         => 'image',
            ]);
            
            $portfolio->name             = $request->name;
            $portfolio->slug             = Str::slug($request->slug);
            $portfolio->short_content    = $request->short_content;
            $portfolio->content          = $request->content;
            $portfolio->client_name      = $request->client_name;
            $portfolio->client_company   = $request->client_company;
            $portfolio->start_date       = $request->start_date;
            $portfolio->end_date         = $request->end_date;
            $portfolio->cost             = $request->cost;
            $portfolio->website          = $request->website;
            $portfolio->client_comment   = $request->client_comment;
            $portfolio->category_id      = $request->category_id;
            $portfolio->meta_title       = $request->meta_title;
            $portfolio->meta_description = $request->meta_description;
            $portfolio->lang_id          = $request->lang_id;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                @unlink(public_path('upload/'.$portfolio->photo));
                $filename = 'portfolio_'.time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload'),$filename);
                $portfolio->photo = $filename;
            }

            if ($portfolio->save()) {
                $files = $request->othersPhoto;
                if (!empty($files)) {
                    foreach ($files as $file) {
                        $imgName = 'portfolio_other_'.time().$file->getClientOriginalName();
                        $file->move(public_path('upload'),$imgName);
                        $data['othersPhoto'] = $imgName;
                        $data = new PortfolioPhoto();
                        $data->portfolio_id = $portfolio->id;
                        $data->othersPhoto  = $imgName;
                        $data->save();
                    }
                }
            } else {
                notify()->error("Sorry! Data not saved.", "Error");
                return redirect()->back();
            }
        });

        return redirect()->back()->with('success',A_SUCCESS_DATA_UPDATE);
    }
    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $portfolio = Portfolio::findOrFail($id);
        if (file_exists(public_path('upload/'.$portfolio->photo)) AND ! empty($portfolio->photo)) {
            unlink(public_path('upload/'.$portfolio->photo));
        }

        $otherImgs = PortfolioPhoto::where('portfolio_id',$portfolio->id)->get()->toArray();
        foreach ($otherImgs as $image_file) {
            if (file_exists(public_path('upload/' . $image_file['othersPhoto'])) AND ! empty($image_file['othersPhoto'])) {
                unlink(public_path('upload/' . $image_file['othersPhoto']));
            }
            PortfolioPhoto::where('portfolio_id',$portfolio->id)->delete();
        }
        $portfolio->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }

    public function delete_other_photo($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $portfolio_photo = PortfolioPhoto::findOrFail($id);
        if (file_exists(public_path('upload/'.$portfolio_photo->othersPhoto)) ) {
            unlink(public_path('upload/'.$portfolio_photo->othersPhoto));
        }
        PortfolioPhoto::where('id',$id)->delete();

        return redirect()->back()->with('success',A_SUCCESS_DATA_DELETE);
    }
}
