<?php
namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
  public static function getContollerName() : string
   {
      return 'product';
   }

  public static function getOne($id) 
  {
    return Product::getOne($id);
  }

  public static function getDefault() 
  {
    return "catalog";
  }

  public static function getAll() 
  {
    return Product::getAll();
  }


}