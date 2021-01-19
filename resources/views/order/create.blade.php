@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sd-12">
            <form action="/order" method="post" class="d-flex flex-column">
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                @csrf
                <div>
                        <label for="fName" class="col-md-4 col-form-label">Meno</label>

                        <input id="fName" type="text" class="form-control @error('fName') is-invalid @enderror" name="fName" value="{{ old('fName') }}" autofocus required>

                        @error('fName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div>
                        <label for="lName" class="col-md-4 col-form-label">Priezvisko</label>

                        <input id="lName" type="text" class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ old('lName') }}" autofocus required>

                        @error('lName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div>
                        <label for="email" class="col-md-4 col-form-label">Emailová adresa</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus required>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div>
                        <label for="phone" class="col-md-4 col-form-label">Telefónne číslo</label>

                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autofocus required>

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>



                <button class="btn btn-primary mt-3 ml-auto">Odoslať objednávku</button>
            </form>
        </div>
    </div>
</div>
@endsection