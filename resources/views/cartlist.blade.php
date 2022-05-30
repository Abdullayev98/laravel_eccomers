@extends('master.master')
@section('content')
<div class="container">
  @if (count($carts))
  <button class="btn btn-success mt-3"><a href="{{route('orderNow')}}" id="test" class="text-light text-decoration-none">Order Now</a></button>
 
  <h3 class="mt-4">Mahsulotlar natijasi</h3>
  @else
  <button class="btn btn-secondary my-3"><a href="/" class="text-light text-decoration-none"> Go Back</a></button>
  <h3 class="mt-4">Iltimos mahsulot buyurtma bering</h3>
  @endif
  
    @foreach ($carts as $cart)
    <div class="row border-bottom">
        <div class="col-md-3">
          <img width="150px" src="{{$cart->products->image}}" class="d-block border-0 my-4" width="300px"  alt="{{$cart->products->name}}">
        </div>
        <div class="col-md-3 mt-5">
          <h4>{{$cart->products->name}}</h4>
          <h5>Price: {{$cart->products->price}}$</h5>
          <h6><b>Description:</b> {{$cart->products->description}}</h6>
        </div>
        <div class="col-md-3 mt-5">
          
          <button class="btn btn-danger"><a href="{{route('remove_cart',$cart->id)}}"  onclick=" return confirm('Are you sure remove the product from your cartlist')" id="test" class="text-light text-decoration-none">Remove product</a></button>
        </div>
      </div>
    @endforeach
  </div>
 
    
@endsection