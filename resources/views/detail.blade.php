@extends('master.master')
@section('content')
<div class="container mb-3">
    <div class="row">
        <div class="col-md-6">
            <img src="{{$product->image}}" class="d-block border-0 my-4" width="300px"  alt="{{$product->name}}">
        </div>
        <div class="col-md-6">
            <button class="btn btn-secondary my-3"><a href="/" class="text-light text-decoration-none"> Go Back</a></button>
            
            <h2>{{$product->name}}</h2>
            <h3>Price: {{$product->price}}$</h3>
            <h5><b>Description:</b> {{$product->description}}</h5>
            <h5><b>Category:</b> {{$product->category}}</h5><br>

            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="btn btn-primary mt-2">Add to Cart</button><br>
            </form>
            <button class="btn btn-success mt-4">Buy Now</button><br>


        </div>
    </div>
</div>
    
@endsection