<?php

class StoreController extends \BaseController {

  public function __construct() {
    $this->beforeFilter('csrf', ['on' =>'post']);
  }

  public function index() {
    $products = Product::take(4)->orderBy('created_at', 'DESC')->get();
    return View::make('store.index', compact('products'));
  }

  public function show($id) {
    $product = Product::find($id);

    return View::make('store.view', compact('product'));
  }
}

 ?>
