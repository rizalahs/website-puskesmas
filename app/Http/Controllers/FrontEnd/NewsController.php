<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\PageNews;
use App\Models\Category;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class NewsController extends Controller
{
    public function index()
    {
        $data['page_news'] = PageNews::where('lang_id',session()->get('session_lang_id'))->first();
        $data['news_fetched']  = News::where('lang_id',session()->get('session_lang_id'))->orderBy('id','desc')->paginate(10);
        $data['categories'] = Category::where('lang_id',session()->get('session_lang_id'))->orderBy('id','desc')->get();

        return view('frontEnd.view-news',$data);
    }

    public function view($slug)
    {
        $data['news']  = News::where('lang_id',session()->get('session_lang_id'))->where('slug',$slug)->first();
        $data['news_slug'] = $slug;
        if (isset($data['news']->slug)) {
            $data['page_news'] = PageNews::where('lang_id',session()->get('session_lang_id'))->first();;
            $data['categories'] = Category::where('lang_id',session()->get('session_lang_id'))->orderBy('id','desc')->get();

            return view('frontEnd.view-news-detail',$data);
        }else{
            return back();
        }
    }

    public function categoryWiseview($slug)
    {
        $single_cat = Category::where('lang_id',session()->get('session_lang_id'))->where('slug',$slug)->first();

        if (isset($single_cat->id)) { 
            $data['news_wise_categories']  = News::where('lang_id',session()->get('session_lang_id'))->where('category_id',$single_cat->id)->get();     
            $data['page_news'] = PageNews::where('lang_id',session()->get('session_lang_id'))->first();;
            $data['category'] = Category::where('lang_id',session()->get('session_lang_id'))->where('slug',$slug)->orderBy('id','desc')->first();
            $data['categories'] = Category::where('lang_id',session()->get('session_lang_id'))->orderBy('id','desc')->get();

            return view('frontEnd.view-news-category-wise',$data);
        }else{
            return back();
        }
    }
}
