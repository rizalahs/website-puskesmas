<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Language;
use App\Models\LanguageDetail;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session('session_lang_id') == null) {
            $language_data = Language::where('lang_default',1)->first();
            session(['session_lang_id' => $language_data->id]);
        }

        $language_admin_details = LanguageDetail::where('lang_id',session('session_lang_id'))->get();
        foreach($language_admin_details as $row) {
            define($row->lang_string, $row->lang_string_value);
        };

        return $next($request);
    }
}
