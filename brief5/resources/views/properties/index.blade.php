@extends('main.layouts')
@section('content')

 <div class="site-section block-13">
      <div class="container" >
        <div class="row">


<form action="{{ route('properties.index') }}" method="get" class="d-flex align-items-center justify-content-center">
        @csrf
        <div class="col-3">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ request('name') }}" placeholder="Enter property name" class="form-control border-secondary bg-transparent">
</div>
<div class="col-2"><label for="property_type">Type:</label>
        <select name="property_type" id="property_type" class="form-control border-secondary bg-transparent">
            <option value="">Any</option>
            @foreach ($propertyTypes as $propertyType)
                <option value="{{ $propertyType->id }}" @if(request('property_type') == $propertyType->id) selected @endif>
                    {{ $propertyType->name }}
                </option>
            @endforeach
        </select></div>
<div class="col-2"> <label for="location">Location:</label>
        <select name="location" id="location" class="form-control border-secondary bg-transparent">
            <option value="">Any</option>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}" @if(request('location') == $location->id) selected @endif>
                    {{ $location->name }}
                </option>
            @endforeach
        </select></div>
<div class="col-2">

        <label for="min_price">Min Price:</label>
        <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="Min Price" class="form-control border-secondary bg-transparent">
</div>
<div class="col-2"><label for="max_price">Max Price:</label>
        <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Max Price" class="form-control border-secondary bg-transparent">
</div>


        <button type="submit" class="btn btn-primary rounded-top-right-0 p-2 mx-2">Search</button>
    </form>
</div>
<hr>
<div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Browse Apartments</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt
              officia, error reiciendis ab quod?</p>
          </div>

<div class="row">
    @foreach ($properties as $property)
        <div class="col-md-6 col-lg-3 my-3" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('properties.show',  $property->id) }}" class="unit-9">
                <div class="image" style="background-image: url('{{ $property->image }}');"></div>
                <div class="unit-9-content">
                    <h2>{{ $property->name }}</h2>
                    <span>${{ $property->one_day_price }}/night</span>
   
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>
</div>


<div class="site-section">

<div class="container">

  <div class="row">
    <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto" data-aos="fade-up">
      <h2 class="mb-5">Featured Apartments</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?</p>
    </div>
  </div>

  <div class="site-block-retro d-block d-md-flex">

    <a href="#" class="col1 unit-9 no-height" data-aos="fade-up" data-aos-delay="100">
      <div class="image" style="background-image: url('{{ asset('apart-master/images/img_4.jpg') }}');"></div>
      <div class="unit-9-content">
        <h2>Baltimore Apartment</h2>
        <span>$600/night</span>
      </div>
    </a>

    <div class="col2 ml-auto">

      <a href="#" class="col2-row1 unit-9 no-height" data-aos="fade-up" data-aos-delay="200">
        <div class="image" style="background-image: url('{{ asset('apart-master/images/img_3.jpg') }}');"></div>
        <div class="unit-9-content">
          <h2>Austin Apartment</h2>
          <span>$290/night</span>
        </div>
      </a>

      <a href="#" class="col2-row2 unit-9 no-height" data-aos="fade-up" data-aos-delay="300">
        <div class="image" style="background-image: url('{{ asset('apart-master/images/img_1.jpg') }}');"></div>
        <div class="unit-9-content">
          <h2>Atlanta Apartment</h2>
          <span>$1,290/night</span>
        </div>
      </a>

    </div>

  </div>

</div>
</div>



    <div class="site-section block-13">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Love By Our Customers</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt
              officia, error reiciendis ab quod?</p>
          </div>
        </div>
        <div class="nonloop-block-13 owl-carousel">

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">
              <img src="https://media.licdn.com/dms/image/C4D03AQGptFfm3HvREQ/profile-displayphoto-shrink_800_800/0/1524242172852?e=2147483647&v=beta&t=O87Ea3x37BryBstVoSEwmpABkawSKdHs4OGfCjO5uKY" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Megan Smith</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam
                illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">
              <img src="https://th.bing.com/th/id/R.4c4dad6f9a7d039e9c20f204cbb51550?rik=MOptyLgYaTvuSw&pid=ImgRaw&r=0" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Brooke Cagle</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam
                illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">
              <img src="https://th.bing.com/th/id/OIP.Tm36oz4KNYa2Fn7VeLmKcAHaHa?rs=1&pid=ImgDetMain" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Philip Martin</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam
                illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">
              <img src="https://th.bing.com/th/id/OIP.iwyM_iTPHO1ptw8VMrdlGQHaHa?rs=1&pid=ImgDetMain" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Steven Ericson</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam
                illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">
              <img src="https://th.bing.com/th/id/OIP.8BXNcJu6neL_XzJ3P1zVEAAAAA?rs=1&pid=ImgDetMain" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Nathan Dumlao</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam
                illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">
              <img src="https://d2qp0siotla746.cloudfront.net/img/use-cases/profile-picture/template_0.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="text-black">
              <h3 class="font-weight-light h5">Brook Smith</h3>
              <p class="font-italic">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam
                illo, cum sed ea? Ducimus quos, ea?&rdquo;</p>
            </div>
          </div>

        </div>
      </div>
    </div>



@endsection
