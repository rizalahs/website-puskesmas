<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// pagination
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Language;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\Footer;
use App\Models\FooterLangIndependent;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\LanguageDetail;
use App\Models\LanguageAdminDetail;
use App\Models\DynamicPage;
use App\Models\Menu;
use App\Models\Comment;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $language_admin_details = LanguageAdminDetail::get();
        foreach($language_admin_details as $row) {
            define($row->lang_string, $row->lang_string_value);
        };

        View::composer('*', function($view){

            $view->with('languages', Language::orderBy('id','desc')->get());
            $view->with('setting', Setting::orderBy('id','desc')->first());
            $view->with('socials', SocialMedia::all());
            $view->with('footer_setting', Footer::where('lang_id',session('session_lang_id'))->first());
            $view->with('footer_setting_lang_independent', FooterLangIndependent::orderBy('id','desc')->first());
            $view->with('all_news', News::where('lang_id',session('session_lang_id'))->orderBy('id','desc')->get());
            $view->with('portfolios', Portfolio::where('lang_id',session('session_lang_id'))->orderBy('id','desc')->get());
            $view->with('count_dynamic_page', DynamicPage::where('lang_id',session('session_lang_id'))->count());
            $view->with('dynamic_pages', DynamicPage::where('lang_id',session('session_lang_id'))->get());
            $view->with('menus', Menu::all());
            $view->with('comment', Comment::first());
        });

        if (empty(env('ASSET_URL'))) {
            config(['app.asset_url' => config('app.url').'/']);
        }
    }
}
