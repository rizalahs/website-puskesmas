<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Event;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\PhotoGallery;
use App\Models\PricingTable;

class DashboardController extends Controller
{
    public function index()
    {
        $data['count_news']            = News::count();
        $data['count_events']          = Event::count();
        $data['count_clients']         = Client::count();
        $data['count_services']        = Service::count();
        $data['count_categories']      = Category::count();
        $data['count_team_members']    = TeamMember::count();
        $data['count_testimonials']    = Testimonial::count();
        $data['count_pricing_tables']  = PricingTable::count();
        $data['count_photo_galleries'] = PhotoGallery::count();

        return view('backEnd.dashboard',$data);
    }
}
