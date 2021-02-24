<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\User;
use App\Models\Review;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(Request $request)
    {   
        $servicesPrepare = Service::filter($request->all())->get();
        //$services = Service::orderByDesc('created_at')->latest()->paginate(10);

        $services = array();

        foreach($servicesPrepare as $service){
            $serviceArrayPrepare = array(
                "id" => $service['id'],
                "user_id" => $service['user_id'],
                "user" => $service->user,
                "name" => $service['name'],
                "description" => $service['description'],
                "category" => $service['category'],
                "city" => $service['city'],
                "price" => $service['price'],
                "path" => $service->getPhotos(),
            );

            array_push($services, $serviceArrayPrepare);
        }

        return response()->json($services);
    }

    public function indexByUser(User $user, Request $request){
        $servicesPrepare = Service::whereIn('user_id', $user)->latest()->paginate(10);
        
        $services = array();

        foreach($servicesPrepare as $service){
           array_push($services, array_merge(array($service), array($service->getPhotos())));
        }

        return response()->json($services);
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

        $service = Auth::user()->services()->create([
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

                $pathToSave = '/storage/' . $path;

                DB::insert('insert into service_photos (service_id, path) values (?, ?)', [$service->id, $pathToSave]);

            }
        }

        //return redirect('/service/user/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $reviews = Review::where('service_id', $service->id)->get();
        $service_photos = $service->getPhotos();

        return view('service.detail', compact('service', 'service_photos', 'reviews'));
    }
}
