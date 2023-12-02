@extends('main.layouts')
@section('content')

<div class="container">
      <div class="featured-property-half d-flex">
        <div class="image" style="background-image: url('{{ asset($property->image) }}');"></div>
        <div class="text">
          @if (session('error'))
         <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <h2>Property Information</h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis quae obcaecati doloribus distinctio, aliquam vero? Molestias, amet, eveniet.</p>
          <ul class="property-list-details mb-5">
            <li class="text-black">Property Name: <strong class="text-black">{{ $property->name }}</strong></li>
            <li>Price/day: <strong>{{ $property->one_day_price }}JD</strong></li>
            <li>Location: <strong>{{ $property->location->name }}</strong></li>
            <li>Category: <strong>{{ $property->propertyType->name }}</strong></li>
            <li>Lunch Date: {{ $property->created_at }}<strong></strong></li>
          </ul>

          <form method="POST" action="{{ route('bookings.store') }}">
              @csrf
              <input type="hidden" name='property_id' value='{{$property->id}}'>
              <label for="start_date">From:</label>
              <input id="start_date" type="date" name="start_date" required min="<?php echo date('Y-m-d'); ?>" max="2099-12-31" oninput="disableBookedDates()"/>

              <label for="end_date">To:</label>
              <input id="end_date" type="date" name="end_date" required min="<?php echo date('Y-m-d'); ?>" max="2099-12-31" />
            <br>
              <button class="btn btn-primary rounded-top-right-0 p-3" type="submit">Reserve</button><br><br>
          </form>

          <div class="month">
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      December/ 2023
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>


  @php
    $currentDate = now();
    $lastDayOfMonth = now()->endOfMonth();
  @endphp

  @while($currentDate <= $lastDayOfMonth)
    <li style="{{ in_array($currentDate->toDateString(), $bookedDates) ? 'background-color: #ccc;' : '' }}">
      {{ $currentDate->format('d') }}
      <br>
      {{ in_array($currentDate->toDateString(), $bookedDates) ? 'Booked' : 'Available' }}
    </li>

    @php
      $currentDate->addDay();
    @endphp
  @endwhile
</ul>
        </div>
      </div>
    </div>



<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}

.month {
  /* padding: 70px 25px; */
  width: 100%;
  background: #e3c4a8;
  margin: auto;
  text-align: center;
}


.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  /* padding-top: 10px; */
}

.month .next {
  float: right;
  /* padding-top: 10px; */
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}


.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>

@if(!empty($value->star_rating))
  <div class="container">
      <div class="row">
         <div class="col mt-4">
               <p class="font-weight-bold ">Review</p>
               <div class="form-group row">
                  <input type="hidden" name="booking_id" value="{{ $value->id }}">
                  <div class="col">
                     <div class="rated">
                      @for($i=1; $i<=$value->star_rating; $i++)
                        {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                        <label class="star-rating-complete" title="text">{{$i}} stars</label>
                      @endfor
                      </div>
                  </div>
               </div>
               <div class="form-group row mt-4">
                  <div class="col">
                      <p>{{ $value->comments }}</p>
                  </div>
               </div>
         </div>
      </div>
   </div>
  @else
  <div class="container">
      <div class="row">
         <div class="col mt-4">
            <form class="py-2 px-4" action="{{route('reviews.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
               @csrf
               <p class="font-weight-bold ">Review</p>
               <div class="form-group row">
                  <input type="hidden" name="property_id" value="{{$property->id}}">
                  <div class="col">
                     <div class="rate">
                        <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" class="rate" name="rating" value="2">
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                        <label for="star1" title="text">1 star</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mt-4">
                  <div class="col">
                     <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                  </div>
               </div>
               <div class="mt-3 text-right">
                  <button class="btn btn-primary rounded-top-right-0" type="submit">Submit
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
   @endif


<!-- Display property details -->
<div class="container">
  <div class="row">
     <div class="col mt-4">
<h2>Reviews</h2>
@if($reviews->isEmpty())
    <p>No reviews yet.</p>
@else
@foreach($reviews as $review)
<div class="d-flex">
  <div>
    <img src="{{ asset($review->renter->image)}}" alt="" width="100" height="100" style=" object-fit:cover border-radius:50%">

  </div>
<ul>
    <li>
      <p> {{ $review->renter->name }}</p>
        <p>Rating:
            @for ($i = 0; $i < $review->rating; $i++)
            <span style="color: orange;">★</span>
            @endfor

        </p>
        <p>Comment: {{ $review->comment }}</p>
    </li>
  </ul>
  <hr>
</div>
@endforeach
@endif
        </div>
        </div>
        </div>

<script>
    var startDateInput = document.getElementById("start_date");
    var endDateInput = document.getElementById("end_date");

    startDateInput.addEventListener("change", function() {
        endDateInput.min = startDateInput.value;
    });

</script>

@endsection
