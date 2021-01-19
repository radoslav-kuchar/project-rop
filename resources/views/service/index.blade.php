@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
    <div class="row">
        <form action="{{ route('services.index') }}" class="d-flex">
            <select class="form-control mr-2" name="category" id="category">
                <option value="" selected disabled>Vybrať kategóriu</option>
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
            <select class="form-control mr-2" name="city" id="city">
                <option value="" selected disabled>Vybrať mesto</option>
                <option value="Košice">Košice</option>
                <option value="Bratislava">Bratislava</option>
            </select>
            <select class="form-control mr-2" name="sortBy" id="sortBy">
                <option value="" selected disabled>Zoradiť podľa</option>
                <option value="Najlacnejšie">Najlacnejšie</option>
                <option value="Najdrahšie">Najdrahšie</option>
                <option value="Najnovšie">Najnovšie</option>
                <option value="Najstaršie">Najstaršie</option>
            </select>
            <button class="btn btn-primary">Filtrovať</button>
        </form>
    </div>
    <div class="row">
    @foreach($services as $service)
        <div class="col-lg-4 col-md-6 col-sd-12 text-center py-4 d-flex flex-column justify-items-center">
            <a href="/service/{{ $service->id }}"><img class="w-100 h-auto py-3" src="/storage/{{ $service->getThumbnail() ?? '' }}"><h1>{{ $service->name }}</h1></a>
            <a href="/service/user/{{ $service->user_id }}"><h5>Show more from this company</h5></a>
            <p>{{ $service->description }}</p>
            <h3>{{ $service->price }}</h3>
        </div>
    @endforeach
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $services->links() }}
        </div>
    </div>
</div>
@endsection