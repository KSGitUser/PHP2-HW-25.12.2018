<?php


class TestProduct extends \PHPUnit\Framework\TestCase
{

  public function testGetPrice()
  {
    $product = new \app\models\Product();
    $product->price = 500;

    $this->assertEquals(500, $product->getPrice());
 }

}