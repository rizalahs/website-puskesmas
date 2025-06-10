<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePhotoGallery;
use App\Models\PhotoGallery;
use App\Models\LanguageDetail;
use App\Models\Language;
use Session;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $data['page_photo_gallery'] = PagePhotoGallery::where('lang_id',session()->get('session_lang_id'))->first();
        $data['photo_gallery'] = PhotoGallery::all();

        return view('frontEnd.view-photo-gallery',$data);
    }
}
