@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-6 col-md-6 col-sd-12">
            <img class="w-100 h-auto" onclick="openModal();currentSlide(1)" src="/storage/{{ $service->image }}">
        </div>



<script type="text/javascript">
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

        <!-- Images used to open the lightbox -->

<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="/storage/images/img1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="/storage/images/img2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="/storage/images/img3.jpeg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="/storage/images/img4.jpg" style="width:100%">
    </div>

    <!-- Next/previous controls -->
    <a class="prev" style="color: #fff;" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" style="color: #fff;" onclick="plusSlides(1)">&#10095;</a>

    <!-- Caption text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <!-- Thumbnail image controls -->
    <div class="column">
      <img class="demo" src="img1.jpg" onclick="currentSlide(1)" alt="Nature">
    </div>

    <div class="column">
      <img class="demo" src="img2.jpg" onclick="currentSlide(2)" alt="Snow">
    </div>

    <div class="column">
      <img class="demo" src="img3.jpg" onclick="currentSlide(3)" alt="Mountains">
    </div>

    <div class="column">
      <img class="demo" src="img4.jpg" onclick="currentSlide(4)" alt="Lights">
    </div>
  </div>
</div>

<style>
    .row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>




        
        <div class="col-lg-6 col-md-6 col-sd-12">
            <h1>{{ $service->serviceName }}</h1>
            <a href="/services/user/{{ $service->user->id }}"><strong>{{ $service->user->name }}</strong></a>
            <p>{{ $service->serviceDescription }}</p>
            <h3>{{ $service->servicePrice }}</h3>
            <h3>{{ $service->serviceCategory }}</h3>
            <h3>{{ $service->serviceCity }}</h3>
            @auth
            <form action="/order/create/{{ $service->id }}" method="post">
              @csrf
              <input type="submit" class="btn btn-primary">
            </form>
            @endauth
        </div>
    </div>
    @auth
    <div class="row d-flex justify-content-center py-4">
        <div class="col-lg-12 col-md-12 col-sd-12">
            <h3>Pridaj recenziu</h3>
            <form action="/services/reviews" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="txt-center">
                <style>.txt-center {text-align: center;
                        }
                        .hide {
                            display: none;
                        }

                        .clear {
                            float: none;
                            clear: both;
                        }

                        .rating {
                            width: 90px;
                            unicode-bidi: bidi-override;
                            direction: rtl;
                            text-align: center;
                            position: relative;
                        }

                        .rating > label {
                            float: right;
                            display: inline;
                            padding: 0;
                            margin: 0;
                            position: relative;
                            width: 1.1em;
                            cursor: pointer;
                            color: #FFD700;
                        }

                        .rating > label:hover,
                        .rating > label:hover ~ label,
                        .rating > input.radio-btn:checked ~ label {
                            color: transparent;
                        }

                        .rating > label:hover:before,
                        .rating > label:hover ~ label:before,
                        .rating > input.radio-btn:checked ~ label:before,
                        .rating > input.radio-btn:checked ~ label:before {
                            content: "\2605";
                            position: absolute;
                            left: 0;
                            color: #FFD700;
                        }</style>
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
                <a href="/services/user/{{ $review->user->id }}"><strong class="pr-3">{{ $review->user->name }}</strong><small>{{ $review->created_at }}</small></a>
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