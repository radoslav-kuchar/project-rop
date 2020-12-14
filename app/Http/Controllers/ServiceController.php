<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Review;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(Request $request)
    {   
        $services = Service::filter()->paginate(10);
        //$services = Service::orderByDesc('created_at')->latest()->paginate(10);

        return view('service.index', compact('services'));
    }

    public function indexByUser(User $user, Request $request){
        $services = Service::whereIn('user_id', $user)->latest()->paginate(10);

        return view('service.index', compact('services'));
    }


    public function create(User $user, Service $service)
    {
        return view('service.create', compact('user', 'service'));
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer ',
            'category' => 'required',
            'city' => 'required',
        ]);

        $service = auth()->user()->services()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category' => $data['category'],
            'city' => $data['city'],
        ]);

        if(isset($request->photos)){
            foreach($request->photos as $photo)
            {
                $path = $photo->store('uploads', 'public');

                $photo = Image::make(public_path("storage/{$path}"))->fit(1024,1024);
                $photo->save();

                DB::insert('insert into service_photos (service_id, path) values (?, ?)', [$service->id, $path]);
            }
        }

        return redirect('/service/user/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $reviews = Review::where('service_id', $service->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('service.show', compact('service','reviews'));
    }
}
