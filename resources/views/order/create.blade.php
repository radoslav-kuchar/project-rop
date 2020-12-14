@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form action="/order" method="post">
            @csrf
            <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
            <label for="fName">Meno</label>
            <input type="text" name="fName" id="fName" class="form-control">

            <button class="btn btn-primary">Odoslať objednávku</button>
        </form>
    </div>
</div>
@endsection