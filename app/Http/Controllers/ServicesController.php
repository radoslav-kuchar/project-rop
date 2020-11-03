<?php

namespace App\Http\Controllers;

use App\User;
use App\Service;
use App\Review;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $services = Service::filter()->paginate(10);
        //$services = Service::orderByDesc('created_at')->latest()->paginate(10);

        return view('services.index', compact('services'));
    }
    public function indexByUser(User $user, Request $request){
        $services = Service::whereIn('user_id', $user)->latest()->paginate(10);

        return view('services.index', compact('services'));
    }

    /*************************************************************************
    public function index(Request $request){
        $services = Service::where('serviceCategory', $request->query('serviceCategory'))->paginate(10);

        return view('services.index', compact('services'));
    }*************************************************************************/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Service $service)
    {
        return view('services.create', compact('user', 'service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'serviceName' => 'required',
            'serviceDescription' => 'required',
            'servicePrice' => 'required|integer ',
            'serviceCategory' => 'required',
            'serviceCity' => 'required',
            'image' => 'required|image',
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(512,512);
        $image->save();

        auth()->user()->services()->create([
            'serviceName' => $data['serviceName'],
            'serviceDescription' => $data['serviceDescription'],
            'servicePrice' => $data['servicePrice'],
            'serviceCategory' => $data['serviceCategory'],
            'serviceCity' => $data['serviceCity'],
            'image' => $imagePath,
        ]);

        return redirect('/services/user/' . auth()->user()->id);
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
        return view('services.show', compact('service','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}