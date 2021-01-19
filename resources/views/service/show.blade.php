@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-6 col-md-6 col-sd-12">
            @foreach($service->getPhotos() as $photo)
            <img class="w-100 h-auto" src="/storage/{{ $photo ?? '' }}">
            @endforeach
        </div>
        <div class="col-lg-6 col-md-6 col-sd-12">
            <h1>{{ $service->name }}</h1>
            <a href="/service/user/{{ $service->user->id }}"><strong>{{ $service->user->name }}</strong></a>
            <p>{{ $service->description }}</p>
            <h3>{{ $service->price }}</h3>
            <h3>{{ $service->category }}</h3>
            <h3>{{ $service->city }}</h3>
            <a href="/order/create/{{ $service->id }}" class="btn btn-primary ml-auto">Objednať</a>
        </div>
    </div>
    @auth
    <div class="row d-flex justify-content-center py-4">
        <div class="col-lg-12 col-md-12 col-sd-12">
            <h3>Pridaj recenziu</h3>
            <form action="/review" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="txt-center">
                <style>.txt-center {text-align: center;}.hide {display: none;}.clear {float: none;clear: both;}.rating {width: 90px; unicode-bidi: bidi-override;direction: rtl;text-align: center;position: relative;}.rating > label {float: right;display: inline; padding: 0; margin: 0; position: relative; width: 1.1em; cursor: pointer; color: #FFD700; } .rating > label:hover, .rating > label:hover ~ label, .rating > input.radio-btn:checked ~ label { color: transparent; } .rating > label:hover:before, .rating > label:hover ~ label:before, .rating > input.radio-btn:checked ~ label:before, .rating > input.radio-btn:checked ~ label:before { content: "\2605"; position: absolute; left: 0; color: #FFD700; }</style>
                        <div class="rating">
                            <input id="star5" name="stars" type="radio" value="5" class="radio-btn hide" required/>
                            <label for="star5">☆</label>
                            <input id="star4" name="stars" type="radio" value="4" class="radio-btn hide" required/>
                            <label for="star4">☆</label>
                            <input id="star3" name="stars" type="radio" value="3" class="radio-btn hide" required/>
                            <label for="star3">☆</label>
                            <input id="star2" name="stars" type="radio" value="2" class="radio-btn hide" required/>
                            <label for="star2">☆</label>
                            <input id="star1" name="stars" type="radio" value="1" class="radio-btn hide" required/>
                            <label for="star1">☆</label>
                            <div class="clear"></div>
                        </div>
                </div>
                <input type="text" name="review" id="review" autocomplete="off">
                <input type="submit">
            </form>
        </div>
    </div>
    @endauth
    <div class="container py-5">
        @foreach($reviews as $review)
            <div class="row py-2 d-flex flex-column border-top border-bottom">
                <a href="/service/user/{{ $review->user->id }}"><strong class="pr-3">{{ $review->user->name }}</strong><small>{{ $review->created_at }}</small></a>
                <p></p>
                <div>
                    @for($i = 0; $i < $review->stars; $i++)
                        <span style="font-size:100%;color:#FFD700;">&starf;</span>
                    @endfor
                    @for($i = 5; $i > $review->stars; $i--)
                        <span style="font-size:100%;color:#FFD700;">&star;</span>
                    @endfor
                    <p class="py-3 text-justify">{{ $review->review }}</p>
                </div>
            </div>
        @endforeach
        <div class="row pt-2">
        <div class="col-12 d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
    </div>
</div>
@endsection