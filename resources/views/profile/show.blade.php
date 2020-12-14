@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-6 col-md-12 col-sd-12 d-flex justify-content-center">
            <img class="rounded-circle w-50" src="/storage/{{ $user->profile->image }}">
        </div>
        <div class="col-lg-6 col-md-6 col-sd-12">
            
            <h1>{{ $user->profile->companyName }}</h1>
            <p>{{ $user->profile->companyPhone }}</p>
            <h3>{{ $user->profile->companyEmail }}</h3>
            <h3>{{ $user->profile->companyField }}</h3>
        </div>
    </div>
    <div class="row">
        
    </div>
</div>
@endsection
