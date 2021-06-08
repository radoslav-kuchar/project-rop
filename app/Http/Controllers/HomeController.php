<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Review;
use App\Models\City;
use App\Models\User;
use App\Models\ServiceCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::paginate(3);

        foreach($services as $service) {
            $service->category_name = ServiceCategory::find($service['category_id'])->name;
            $service->city_name = City::find($service['city_id'])->name;
            $service->path = $service->getPhotos();
            $service->review_avg = Review::where('service_id', $service->id)->avg('stars');
            $service->reviews = Review::where('service_id', $service->id)->count();
            $service->user_name = User::find($service->user_id)->name;
        }
        
        return view("service.index", compact('services'));
    }
}
