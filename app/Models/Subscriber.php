<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Subscriber extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getSubscriber()
    {
        $subscribers = DB::table('subscribers')->where('status',1)->select('id','email')->get();

        return $subscribers;
    }
}
