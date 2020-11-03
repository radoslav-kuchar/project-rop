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
                
                <input type="radio" name="radioGroup" id="company" onclick="getElementById('id1').style.display = 'none'; getElementById('id2').style.display = 'block'" value="true" required>
                <label for="company">This is a company profile</label>
                <input type="radio" name="radioGroup" id="user" onclick="getElementById('id2').style.display = 'none'; getElementById('id1').style.display = 'block'" value="false" required>
                <label for="user">This is a user profile</label>

                

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

                <div class="form-group row">
                    <label for="companyPhone" class="col-md-4 col-form-label ">Telefónne číslo</label>

                    <input id="companyPhone" type="text" class="form-control @error('companyPhone') is-invalid @enderror" 
                    name="companyPhone" value="{{ old('companyPhone') ?? $user->profile->companyPhone }}" autofocus>

                    @error('companyPhone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="companyEmail" class="col-md-4 col-form-label ">Email spoločnosti</label>

                    <input id="companyEmail" type="text" class="form-control @error('companyEmail') is-invalid @enderror" 
                    name="companyEmail" value="{{ old('companyEmail') ?? $user->profile->companyEmail }}" autofocus>

                    @error('companyEmail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="companyField" class="col-md-4 col-form-label ">Company Field</label>

                    <input id="companyField" type="text" class="form-control @error('companyField') is-invalid @enderror" 
                    name="companyField" value="{{ old('companyField') ?? $user->profile->companyField }}" autofocus>

                    @error('companyField')
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
