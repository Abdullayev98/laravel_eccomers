@extends('master.master')
@section('content')
<div style="height: 77vh">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                @if (session('success'))
                    <div class="alert alert-danger">
                        {{session('success')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Log In</h2>
                <form action="{{route('login')}}" method="post" class="mt-3">
                @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" />
                    </div>
    
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="passwordid">Password</label>
                        <input type="password" id="passwordid" name="password" class="form-control" />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4 form-control">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection