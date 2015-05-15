<?php

class StoreController extends \BaseController {

  public function __construct() {
    $this->beforeFilter('csrf', ['on' =>'post']);
    $this->beforeFilter('auth', ['only' => ['postAddToCart', 'getCart', 'getRemoveItem']]);
  }

  public function index() {
    $products = Product::take(4)->orderBy('created_at', 'DESC')->get();
    return View::make('store.index', compact('products'));
  }

  public function product($id) {
    $product = Product::find($id);

    return View::make('store.product', compact('product'));
  }

  public function category($id) {
    $products = Product::where('category_id', '=', $id)->paginate(1);
    $category = Category::find($id);

    return View::make('store.category', compact(['products', 'category']));
  }

  public function search() {
    $keyword = Input::get('keyword');
    $products = Product::where('title', 'LIKE', '%'.$keyword.'%')->get();

    return View::make('store.search', compact(['keyword', 'products']));
  }

  public function postAddToCart()
  {
    $product = Product::find(Input::get('id'));
    $quantity = Input::get('quantity');

    Cart::insert([
      'id'       => $product->id,
      'name'     => $product->title,
      'price'    => $product->price,
      'quantity' => $quantity,
      'image'    => $product->image,
    ]);

    return Redirect::route('store.cart');
  }

  public function getCart()
  {
    return View::make('store.cart')->with('products', Cart::contents());
  }

  public function getRemoveItem($ids)
  {
    $item = Cart::item($ids);
    $item->remove();

    return Redirect::route('store.cart')->with('message', 'Item is deleted');
  }

}

 ?>
