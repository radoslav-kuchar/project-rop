@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
<form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row"><h1>Edit Profile</h1></div>

                <style>
                    #id1{display: none;}
                    #id2{display: none;}
                </style>
                
                <input type="radio" name="isCompany" id="company" onclick="getElementById('id1').style.display = 'none'; getElementById('id2').style.display = 'block'" required>
                <label for="company">This is a company profile</label>
                <input type="radio" name="isCompany" id="user" onclick="getElementById('id2').style.display = 'none'; getElementById('id1').style.display = 'block'" required>
                <label for="user">This is a user profile</label>

                <h1 id="id1">ID 1</h1>
                <h1 id="id2">ID 2</h1>

                <div class="form-group row">
                    <label for="companyName" class="col-md-4 col-form-label ">Názov spoločnosti</label>

                    <input id="companyName" type="text" class="form-control @error('companyName') is-invalid @enderror" 
                    name="companyName" value="{{ old('companyName') ?? $user->profile->companyName }}" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row">
                    <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
                </div>


                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            
            </div>
        </div>
    </form>
</div>
@endsection
