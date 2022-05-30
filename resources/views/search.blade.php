@extends('master.master')
@section('content')
<div class="container">
  @if (count($data))
  <button class="btn btn-success mt-3"><a href="{{route('orderNow')}}" id="test" class="text-light text-decoration-none">Order Now</a></button>
 
  <h3 class="mt-4">Qidiruv natijasi</h3>
  @else
  <button class="btn btn-secondary my-3"><a href="/" class="text-light text-decoration-none"> Go Back</a></button>
  <h3 class="mt-4">Malumot yo'q</h3>
  @endif
  
    @foreach ($data as $item)
    <div class="row border-bottom">
        <div class="col-md-4">
          <img width="300px" src="{{$item->image}}" class="d-block border-0 my-4" width="300px"  alt="{{$item->name}}">
        </div>
        <div class="col-md-4 mb-4">
            <button class="btn btn-secondary mb-2"><a href="/" class="text-light text-decoration-none"> Go Back</a></button>
            
            <h2>{{$item->name}}</h2>
            <h3>Price: {{$item->price}}$</h3>
            <h5><b>Description:</b> {{$item->description}}</h5>
            <h5><b>Category:</b> {{$item->category}}</h5><br>

            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$item->id}}">
                <button class="btn btn-primary mt-2">Add to Cart</button><br>
            </form>
        </div>
    </div>
    @endforeach
</div>
 
    
@endsection