@extends('layouts.main')

@section('content')

  <div id="shopping-cart">
    <h1>Shopping Cart & Checkout</h1>

    <form action="#" method="post">
        <table border="1">
            <tr>
                <th>#</th> <th>Product Name</th> <th>Unit Price</th> <th>Quantity</th> <th>Subtotal</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                  {{ HTML::image($product->image, $product->name, ['width' => 65, 'height' => 37]) }}
                  {{ $product->name }}
                </td>
                <td>${{ $product->price }}</td>
                <td>
                    {{ $product->quantity }}
                </td>
                <td>
                    ${{ $product->quantity * $product->price }}
                    {{ HTML::decode(link_to_route('store.removeitem', HTML::image('img/remove.gif', 'Remove product'), [$product->identifier])) }}
                </td>
            </tr>
            @endforeach

            <tr class="total">
                <td colspan="5">
                    Subtotal: ${{ Cart::total() }}<br />
                    <span>TOTAL: ${{ Cart::total() }}</span><br />

                    {{ link_to_route('home', 'CONTINUE SHOPPING', null, ['class' => 'tertiary-btn']) }}
                    <input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
                </td>
            </tr>
        </table>
    </form>
</div><!-- end shopping-cart -->

@stop
