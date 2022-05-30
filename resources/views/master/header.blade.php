<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Auth::user()){
  $total = ProductController::CartItem();
}

?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container">
      <a class="navbar-brand" href="{{route('index')}}">Brand</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="
            @auth   {{route('myOrder')}}
            @else   {{route('login')}}
            @endauth
            ">Orders</a>
          </li>
          <li>
            <form class="position-absolute mt-1 ms-1" action="/search" method="GET">
                <input type="text" placeholder="Search" name="query" class="float-start">

                <input type="submit">search</button>
              </form>
          </li>
          
          
        </ul>
        <ul class="navbar-nav me-1 mb-2 mb-sm-0">
            <li class="nav-item">
                <a class="nav-link" href="
                    @auth   {{route('cartlist')}}
                    @else   {{route('login')}}
                    @endauth
                ">Cart({{$total}})</a>
            </li>
            @auth
            <li class="nav-item dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth::user()->name}}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{route('logout')}}"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span> Chiqish</a></li>
              </ul>
            </li>
            @endauth
            @if(url()->current()!='http://127.0.0.1:8000/login')
              @guest
                <li class="nav-item dropdown">
                  <button class="btn btn-secondary" type="button">
                    <a href="{{route('login')}}" class="text-light text-decoration-none"> Login</a>
                </button>
                </li>
              @endguest
            @endif
        </ul>
        
      </div>
    </div>
  </nav>
