@extends('layouts.main')

@section('search-keyword')

  <section id="search-keyword">
    <h1>Search Results for <span>"{{ $keyword }}"</span></h1>
  </section><!-- end search-keyword -->

@stop

@section('content')

  <div id="search-results">

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
        <a href="#" class="cart-btn">
          <span class="price">${{ $product->price }}</span>
          {{ HTML::image('img/white-cart.gif', 'Add to Cart') }}
          ADD TO CART
        </a>
      </p>
    </div>

  @endforeach

  </div>
@stop
