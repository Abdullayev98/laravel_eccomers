@extends('master.master')
@section('content')
<div class="container">
  @if (count($myorders))
  <button class="btn btn-success mt-3"><a href="{{route('orderNow')}}" id="test" class="text-light text-decoration-none">Order Now</a></button>
 
  <h3 class="mt-4">Mening buyurtmalarim</h3>
  @else
  <button class="btn btn-secondary my-3"><a href="/" class="text-light text-decoration-none"> Go to Order</a></button>
  <h3 class="mt-4">Mahsulotlarga buyurtma berish</h3>
  @endif
  
    @foreach ($myorders as $myorder)
    <div class="row border-bottom">
        <div class="col-md-3">
          <img width="150px" src="{{$myorder->products->image}}" class="d-block border-0 my-4" width="300px"  alt="{{$myorder->products->name}}">
        </div>
        <div class="col-md-3 my-3">
          <h4>{{$myorder->products->name}}</h4>
          <h5>Delivery status: {{$myorder->status}}</h5>
          <h6>Addres: {{$myorder->address}}</h6>
          <h6>Payment status: {{$myorder->payment_status}}</h6>
          <h6>Payment method: {{$myorder->dpayment_method}}</h6>
        </div>
      </div>
    @endforeach
  </div>
 
    
@endsection