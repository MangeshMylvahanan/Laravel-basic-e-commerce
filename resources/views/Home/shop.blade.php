@extends('Home.master')
@section('main-content')
    <div class="row">
        @foreach ($products as $item)
            <div class="col-md-3">
                <div class="card">
                    <a href="detail/{{ $item['id'] }}">
                        <img src="{{ url($item['product_image']) }}" alt="no image">
                        <h4>{{ $item['product_name'] }}</h4>
                        <p><b>Discount:</b>{{ $item['product_discount'] }}%</p>
                        <p><b>Price:</b>{{ $item['product_price'] }}/-</p>
                        <p><b>Discount Price:</b>{{ $item['product_discountprice'] }}/-</p>
                    </a>
                    <a href="/buynow" class="btn btn-success">Buy now</a>
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value={{ $item['id'] }}>
                        <button class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
