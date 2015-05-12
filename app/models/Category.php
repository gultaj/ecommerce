<?php

class Category extends \Eloquent {

	protected $fillable = ['name'];

	public static $rules = [
		'name' => 'required|min:3'
	];

	public function Products() {
		return $this->hasMany('Product');
	}
}
