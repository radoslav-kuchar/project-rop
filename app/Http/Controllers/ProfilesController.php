<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $profile)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\User $userApp\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\User $userApp\Profile  $profile
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        /*$userData = request()->validate([

        ])*/

        $data = request()->validate([
            'companyName' => 'required',
            'image' => 'image',
            'isCompany' => 'required'
        ]);
        
        if(request('image')){
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(512,512);
        $image->save();

        
        auth()->user()->profile()->update([
            'companyName' => $data['companyName'],
            'companyPhone' => $data['companyPhone'],
            'companyEmail' => $data['companyEmail'],
            'companyField' => $data['companyField'],
            'image' => $imagePath,
        ]);
        }
        else{
            auth()->user()->profile()->update($data);
        }

        return redirect("/profile/" . auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
