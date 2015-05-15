@extends('layouts.main')

@section('promo')

  <section id="promo">
    <div id="promo-details">
      <h1>Today's Deals</h1>
      <p>Checkout this section of<br /> products at a discounted price.</p>
      <a href="#" class="default-btn">Shop Now</a>
    </div><!-- end promo-details -->
    {{ HTML::image('img/promo.png', 'Promotional Ad') }}
  </section><!-- promo -->

@stop

@section('content')

  <h2>Featured</h2>
  <hr>
  <div id="products">

  @foreach($products as $product)

    <div class="product">
      {{ HTML::decode(link_to_route('store.product',
        HTML::image($product->image, $product->title, ['class' => 'feature', 'width' => 240, 'height' => 127]), [$product->id])) }}


      <h3>{{ link_to_route('store.product', $product->title, [$product->id]) }}</h3>

      <p>{{ $product->description }}</p>

      <h5>Availability: <span class="{{ Availability::displayClass($product->availability) }}">
        {{ Availability::display($product->availability) }}
      </span></h5>

      <p>
      {{ Form::open(['url' => 'store/addtocart'])}}
        {{ Form::hidden('quantity', 1) }}
        {{ Form::hidden('id', $product->id) }}
        <button type="submit" class="cart-btn">
          <span class="price">${{ $product->price }}</span>{{ HTML::image('img/white-cart.gif', 'Add to Cart') }} ADD TO CART
        </button>
      {{ Form::close() }}
      </p>
    </div>

  @endforeach

  </div>

@stop
