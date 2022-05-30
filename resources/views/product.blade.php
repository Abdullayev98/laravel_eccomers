@extends('master.master')
@section('content')
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

    <div class="carousel-inner">
        @foreach ($products as $product)
          <div class="carousel-item {{$product->id == 1 ? 'active' : ''}}">
            <a href="detail/{{$product->id}}">
              <img src="{{$product->image}}" class="d-block ms-5" height="480px" alt="{{$product->name}}">
              <div class="carousel-caption d-none d-md-block" style="background-color: #502cd499">
                  <h5>{{$product->name}}</h5>
                  <p>{{$product->description}}</p>
              </div>
            </a>
          </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <ul class="list-group list-group-horizontal">
    @foreach ($products as $product)
       <a href="detail/{{$product->id}}">
            <li class="list-group-item">
                <ul class="list-group h-25">
                    <li class="list-group-item"><img src="{{$product->image}}" class="d-block border-0" width="100px"  alt="{{$product->name}}"></li>
                    <li class="list-group-item border-0">{{$product->name}}</li>
                </ul>
            </li>
       </a>
    @endforeach
  </ul>
    
    
@endsection