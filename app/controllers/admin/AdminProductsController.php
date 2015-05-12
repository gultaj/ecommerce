<?php

class AdminProductsController extends \BaseController {

	/**
	 * Display a listing of products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return View::make('admin.products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.products.create');
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules);
		// echo '<pre>';
		// dd($data);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$image = $data['image'];
		$filename = '/uploads/'.date('Y-m-d-H.i.s').'-'.$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(468, 249)->save(public_path() . $filename);
		$data['image'] = $filename;

		Product::create($data);

		return Redirect::route('admin.products.index')->with('message', 'Product created');
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		return View::make('admin.products.edit', compact('product'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('admin.products.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = 	Product::find($id);
		Product::destroy($id);

		File::delete(public_path() . $product->image);

		return Redirect::route('admin.products.index')->with('message', 'Product deleted');
	}

}
