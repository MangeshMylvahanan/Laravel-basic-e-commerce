@extends('Home.master')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <img class="detail-img" src="{{url($products['product_image'])}}" alt="">
        </div>
        <div class="col-sm-6">
        <h2>{{$products['product_name']}}</h2>
        <h4><b>Price : </b>{{$products['product_price']}}/-</h3>
        <h3><b>Discount Price : </b>{{$products['product_discountprice']}}/-</h3>
        <h4><b>Details: </b>{{$products['product_description']}}.</h4>
        <h4><b>catagory: </b>{{$products['catagory']}}</h4>
        <br><br>
        <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value={{$products['id']}}>
        <button class="btn btn-primary">Add to Cart</button>
        </form>
        <br><br>
        <a href="/buynow" class="btn btn-success">Buy Now</a>
        <br><br>
     </div>
    </div>
 </div>
@endsection