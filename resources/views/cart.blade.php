<?php
use App\Http\Controllers\AppController;
$total= AppController::item();
$totalprice= AppController::totalprice();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body >

    <div class="hero hero-normal">
    <div class="container">
    <div class="row">

    <div class="shoping__cart__table" style="margin-top: 5%">
        <table style="text-indent: 50px">
            <thead>
                <tr>
                    <th class="shoping__product">Products</th>
                    <th >Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($details as $detail)
                
                <tr>
                    <td class="shoping__cart__item">
                        <img src="{{ asset($detail['product_img']) }}" style="height: 70px; width:70px;">
                        <h5>{{ $detail['product_name'] }}</h5>
                    </td>
                    <td class="shoping__cart__price">
                        {{ $detail['price'] }}
                    </td>
                    <td class="shoping__cart__quantity">
                        <div class="quantity">
                        <form method="POST">
                            @csrf
                            <div class="pro-qty">
                                <input type="text" name="qty" value="{{ $detail['qty'] }}" min="1">
                                <input type="hidden" name="price" value="{{ $detail['price'] }}" >
                                <input type='hidden' name='id' value='{{$detail['id']}}'>
                                <button type="submit" action="/cart"  class="btn btn-sm btn-success">Update</button>
                                
                            </div>
                            
                            
                           
                        </form>
                        <form action="/cart/delete" method="Get">
                            <input type='hidden' name='id' value='{{$detail['id']}}'>
                            <button type="submit" class="btn btn-sm btn-success">Delete</button>
                        </form>
                       
                        </div>
                    </td>
                    <td class="shoping__cart__total">
                        {{$detail['updated_price'] }}
                    </td>
                   
                </tr>
            @endforeach  
            </tbody>
        </table>
    </div>
    <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
       
        <div class="pt-4">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="row price-details">
                <div class="col-md-6">
                  
                   <h6>Price ({{$total }} items)</h6>
                    <h6>Delivery Charges</h6>
                    <hr>
                    <h6>Amount Payable</h6>
                </div>
                <div class="col-md-6">
                    <h6>{{$totalprice}}</h6>
                    <h6 class="text-success">FREE</h6>
                    <hr>
                    <h6>
                        {{$totalprice}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <form action="/back" method="GET">
            <div class="col-md-6" style="text-indent: 80px">
                @foreach ($details as $ip)
               
                 <input type='hidden' name='ip' value='{{ $ip['ip'] }}'>
                 @endforeach

                <button type="submit"  class="btn btn-sm btn-success">CheckOut</button>
            </div>
            </form>
        </div>
       
    </div>
    
    </div>
</div>
</div>

  
    
</div>
</body>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>