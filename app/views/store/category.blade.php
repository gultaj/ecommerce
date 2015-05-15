@extends('layouts.main')

@section('promo')

  <section id="promo-alt">
    <div id="promo1">
      <h1>The brand new MacBook Pro</h1>
      <p>With a special price, <span class="bold">today only!</span></p>
      <a href="#" class="secondary-btn">READ MORE</a>
      {{ HTML::image('img/macbook.png', 'MacBook Pro') }}
    </div><!-- end promo1 -->
    <div id="promo2">
      <h2>The iPhone 5 is now<br>available in our store!</h2>
      <a href="">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
      {{ HTML::image('img/iphone.png', 'iPhone') }}
    </div><!-- end promo2 -->
    <div id="promo3">
      {{ HTML::image('img/thunderbolt.png', 'Thunderbolt') }}
      <h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
      <a href="#">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
    </div><!-- end promo3 -->
  </section><!-- promo-alt -->

@stop

@section('content')
  <h2>{{ $category->name }}</h2>
  <hr>

  <aside id="categories-menu">
    <h3>CATEGORIES</h3>
    <ul>
      @foreach(Category::lists('name', 'id') as $id => $category)
        <li>{{ link_to_route('store.category', $category, [$id]) }}</li>
      @endforeach
    </ul>
  </aside><!-- end categories-menu -->

  <div id="listings">
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

@section('pagination')

  <section id='pagination'>
    {{ $products->links() }}
  </section>

@stop
