<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHome extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function language()
    {
        return $this->belongsTo(Language::class,'lang_id','id');
    }
}
