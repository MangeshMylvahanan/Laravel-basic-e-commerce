<?php
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
$userId = Session::get('user')['id'];
$products = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->select('products.*', 'carts.id as cart_id')
    ->get();
$totalAmount = 0;
foreach ($products as $item) {
    $totalAmount += $item->product_discountprice;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>eCommerce Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="/payment" method="POST">
        <div class="container">
            <h2>Order Details</h2>
            <br>
            @foreach ($products as $item)
                <div class=" row searched-item">
                    <div class="col-sm-2">
                        <a href="detail/{{ $item->id }}">
                            <img class="trending-image" src="{{ $item->product_image }}">
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <div class="">
                            <p>{{ $item->product_name }}</p>
                            <input type="hidden" name="product_id" value={{ $item->id }}>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="">
                            <h6>{{ $item->product_discountprice }}/-</h6>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <a href="/removecart/{{ $item->cart_id }}" class="btn btn-warning">Remove</a>
                        <p>from cart also.</p>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
        <div>
            <h4 style="margin-left: 310px;">Total Amount: <input type="text" style="width: 180px;"
                    value={{ $totalAmount }}></h4>
        </div>
        <div class="">
            <button class="btn btn-primary" style="margin-left: 475px;" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Proceed to checkout</button>
        </div>
        <div class="offcanvas offcanvas-end bg-info" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Delivery details</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="container">
                    <div class="col-md-6">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter your phone number">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>

</html>
