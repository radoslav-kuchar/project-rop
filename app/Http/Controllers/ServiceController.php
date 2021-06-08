<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\User;
use App\Models\Review;
use App\Models\City;
use App\Models\ServiceCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(Request $request)
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

        return view('service.index', compact('services'));
    }

    public function create(User $user, Service $service)
    {
        $categories = ServiceCategory::all();
        $cities = City::all();
        return view('service.create', compact('user', 'service', 'categories', 'cities'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer ',
            'category_id' => 'required',
            'city_id' => 'required',
        ]);

        $service = Auth::user()->services()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'city_id' => $data['city_id'],
        ]);
        if(isset($request->photos)){
            foreach($request->photos as $photo)
            {
                $path = $photo->store('uploads', 'public');

                $photo = Image::make(public_path("storage/{$path}"))->fit(1024,1024);
                $photo->save();

                $pathToSave = '/storage/' . $path;

                DB::insert('insert into service_photos (service_id, path) values (?, ?)', [$service->id, $pathToSave]);
            }
        }

        return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $service->city_name = City::find($service['city_id'])->name;
        $service->path = $service->getPhotos();
        $service->category_name = ServiceCategory::find($service['category_id'])->name;

        $reviews = Review::where('service_id', $service->id)->get();
        foreach($reviews as $review)
        {
            $review->user_name = User::find($review->user_id)->name;
        }

        $service->user_name = User::find($service->user_id)->name;

        return view('service.detail', compact('service', 'reviews'));
    }
}
