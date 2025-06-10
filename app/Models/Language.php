<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PageHome;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pageHome()
    {
        return $this->belongsTo(PageHome::class,'id','lang_id');
    }

    public function pageAbout()
    {
        return $this->belongsTo(PageAbout::class,'id','lang_id');
    }

    public function pageFaq()
    {
        return $this->belongsTo(PageFaq::class,'id','lang_id');
    }

    public function pageService()
    {
        return $this->belongsTo(PageService::class,'id','lang_id');
    }

    public function pageTestimonial()
    {
        return $this->belongsTo(PageTestimonial::class,'id','lang_id');
    }

    public function pageNews()
    {
        return $this->belongsTo(PageNews::class,'id','lang_id');
    }

    public function pageEvent()
    {
        return $this->belongsTo(PageEvent::class,'id','lang_id');
    }

    public function pageContact()
    {
        return $this->belongsTo(PageContact::class,'id','lang_id');
    }

    public function pageSearch()
    {
        return $this->belongsTo(PageSearch::class,'id','lang_id');
    }

    public function pageTeam()
    {
        return $this->belongsTo(PageTeam::class,'id','lang_id');
    }

    public function pagePortfolio()
    {
        return $this->belongsTo(PagePortfolio::class,'id','lang_id');
    }

    public function pagePhotoGallery()
    {
        return $this->belongsTo(PagePhotoGallery::class,'id','lang_id');
    }

    public function pagePricing()
    {
        return $this->belongsTo(PagePricing::class,'id','lang_id');
    }

    public function pageTerm()
    {
        return $this->belongsTo(PageTerm::class,'id','lang_id');
    }

    public function pagePrivacy()
    {
        return $this->belongsTo(PagePrivacy::class,'id','lang_id');
    }
}
