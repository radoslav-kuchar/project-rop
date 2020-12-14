@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
<form action="/service" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row"><h1>Pridať službu</h1></div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label ">Názov služby</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') ?? $user->name }}" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label ">Popis služby</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" 
                    name="description" value="{{ old('description') ?? $user->description }}" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label ">Cena služby</label>

                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" 
                    name="price" value="{{ old('price') ?? $user->price }}" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label ">Kategória služby</label>
                    
                    <select name="category" id="category" required>
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

                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label ">Miesto služby</label>

                    <select name="city" id="city" required>
                        <option value="Košice">Košice</option>
                        <option value="Bratislava">Bratislava</option>
                    </select>

                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="photos" class="col-md-4 col-form-label ">Pridaj fotografie</label>
                    <input type="file" name="photos[]" id="photos" multiple accept="image/*">
                </div>


                <div class="row pt-4">
                    <button class="btn btn-primary">Pridať službu</button>
                </div>
            
            </div>
        </div>
    </form>
</div>
@endsection
