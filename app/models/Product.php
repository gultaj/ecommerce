<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title'        => 'required|min:2',
		'category_id'  => 'required|integer',
		'description'  => 'required|min:20',
		'price'        => 'required|numeric',
		'availability' => 'integer',
		'image'        => 'required|image|mimes:jpeg,jpg,bmp,png,gif'

	];

	// Don't forget to fill this array
	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function Category() {
		return $this->belongsTo('Category');
	}

}
