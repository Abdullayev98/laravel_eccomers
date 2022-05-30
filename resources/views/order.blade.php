@extends('master.master')
@section('content')
<div class="container" style="height: 80vh">
    <button class="btn btn-secondary my-3"><a href="/" class="text-light text-decoration-none"> Go Back</a></button>
    <table class="table table-striped border-4 mt-2">
        <tbody>
          <tr>
            <td><b>Amount</b></td>
            <td><b>{{$total}}$</b></td>
          </tr>
          <tr>
             <td><b>Soliq</b></td>
             <td><b>0 $</b></td>
          </tr>
          <tr>
             <td><b>Xizmat</b></td>
             <td><b>10 $</b></td>
          </tr>
          <tr>
             <td><b>Umumiy</b></td>
             <td><b>{{$total+10}}$</b></td>
          </tr>
        </tbody>
      </table>

      <form action="{{route('OrderPlace')}}" method="post">
        @csrf
        <div class="form-group">
          <textarea class="form-control" name="address" id="address"  placeholder="Enter your address"></textarea>
        </div><br>
        <div class="form-check ms-4">
            <input class="form-check-input" type="radio" name="payment" id="click" value="click" >
            <label class="form-check-label" for="click"> Click xizmati </label>
        </div><br>
        <div class="form-check ms-4">
            <input class="form-check-input" type="radio" name="payment" id="payme" value="payme" >
            <label class="form-check-label" for="payme"> Payme xizmati </label>
        </div><br>
        <div class="form-check ms-4">
            <input class="form-check-input" type="radio" name="payment" id="oson" value="oson">
            <label class="form-check-label" for="oson"> Oson xizmati </label>
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
 
    
@endsection