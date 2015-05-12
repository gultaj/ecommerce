<?php

class Availability {

  protected static $data = [
    'Out of Stock',
    'In Stock'
  ];

  public static function display($availability = 0) {
    echo self::$data[$availability];
  }

  public static function displayClass($availability = 0) {
    echo strtolower(str_replace(' ', '', self::$data[$availability]));
  }
}

 ?>
