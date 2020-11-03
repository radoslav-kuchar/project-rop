@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
<form action="/services" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row"><h1>Pridať službu</h1></div>
                <div class="form-group row">
                    <label for="serviceName" class="col-md-4 col-form-label ">Názov služby</label>

                    <input id="serviceName" type="text" class="form-control @error('serviceName') is-invalid @enderror" 
                    name="serviceName" value="{{ old('serviceName') ?? $user->serviceName }}" autofocus>

                    @error('serviceName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="serviceDescription" class="col-md-4 col-form-label ">Popis služby</label>

                    <input id="serviceDescription" type="text" class="form-control @error('serviceDescription') is-invalid @enderror" 
                    name="serviceDescription" value="{{ old('serviceDescription') ?? $user->serviceDescription }}" autofocus>

                    @error('serviceDescription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="servicePrice" class="col-md-4 col-form-label ">Cena služby</label>

                    <input id="servicePrice" type="text" class="form-control @error('servicePrice') is-invalid @enderror" 
                    name="servicePrice" value="{{ old('servicePrice') ?? $user->servicePrice }}" autofocus>

                    @error('servicePrice')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="serviceCategory" class="col-md-4 col-form-label ">Kategória služby</label>
                    
                    <select name="serviceCategory" id="serviceCategory" required>
                        <optgroup label="Administratívne služby">
                            <option value="Archivácia a ochrana dát">Archivácia a ochrana dát</option>
                            <option value="Spracovanie dát">Spracovanie dát</option>
                            <option value="Správa registratúry a dokumentov">Správa registratúry a dokumentov</option>
                        </optgroup>
                        <optgroup label="Krása a relax">
                            <option value="Kaderníctvo/Barber">Kaderníctvo/Barber</option>
                            <option value="Kozmetický salón">Kozmetický salón</option>
                            <option value="Masáže">Masáže</option>
                            <option value="Nechtové štúdium">Nechtové štúdium</option>
                            <option value="Sauna">Sauna</option>
                            <option value="Solárium">Solárium</option>
                            <option value="Tetovanie a piercing">Tetovanie a piercing</option>
                            <option value="Vizážista">Vizážista</option>
                            <option value="Wellness">Wellness</option>
                        </optgroup>
                    </select>

                    @error('serviceCategory')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="serviceCity" class="col-md-4 col-form-label ">Miesto služby</label>

                    <select name="serviceCity" id="serviceCity" required>
                        <option value="Košice">Košice</option>
                        <option value="Bratislava">Bratislava</option>
                    </select>

                    @error('serviceCity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label ">Pridať obrázok</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
                </div>


                <div class="row pt-4">
                    <button class="btn btn-primary">Pridať službu</button>
                </div>
            
            </div>
        </div>
    </form>
</div>
@endsection
