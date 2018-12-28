<?php

class Clothes
{
    public $id;
    public $name;
    public $brand;
    public $size;
    public $color;
    public $price;
    public $department;

    public function __construct($id = null, $name = null, $brand = null,
        $size = null, $color = null, $price = null, $department = null) {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->size = $size;
        $this->color = $color;
        $this->price = $price;
        $this->department = $department;
    }

    public function showProductPropeties()
    {
        echo $this->prepareProductsToShow();
    }

    public function setParam($nameOfParam = null, $newValue = null)
    {
        $this->{$nameOfParam} = $newValue;
    }

    public function getParam($nameOfParam)
    {
        return $this->{$nameOfParam};
    }

    private function prepareProductsToShow()
    {
        $stringToShow = '<ol>';
        foreach ($this as $key => $value) {
            $stringToShow .= "<li>$key - $value\n</li>";
        };
        $stringToShow .= '</ol>';
        return $stringToShow;
    }

}

class Shirt extends Clothes
{
    public $neckSize;
    public $sleeveLength;

    public function __construct($id = null, $name = null, $brand = null,
        $size = null, $color = null, $price = null, $department = null, $neckSize = null, $sleeveLength = null) {
        parent::__construct($id, $name, $brand,
            $size, $color, $price, $department);
        $this->neckSize = $neckSize;
        $this->sleeveLength = $sleeveLength;
    }

}

$newCloths = new Clothes(1, "Brand new", "BrooksCool", 48, "black", 250, "women's cloth");
echo $newCloths->name;


$newCloths->setParam("price", 1000);
$newCloths->setParam("quantaty", 1);
$newCloths->showProductPropeties();

echo $newCloths->getParam("size");

$shirtA = new Shirt(2, "Summer shirt", "adibas", 32, "gray", 180, "women's cloth", 15, 32);

$shirtA->showProductPropeties();

echo "<hr/>";

/* Что он выведет на каждом шаге? Почему? */

/* class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo(); */

/* Результат будет 1234, так как: 
Статическая переменная существует только в локальной области видимости функции, но НЕ ТЕРЯЕТ своего значения, когда выполнение программы выходит из этой области видимости. 
А так же в связи с тем что метод foo() существует в единственном экземляре, несмотря на существование двух объектов.*/

/* ---------------------------------- */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2

/* Позднее статическое связывание -  ссылается на класс, вызванный непосредственно в ходе выполнения. 
При создании наследника создался новый метод. 
 */

/* ------------------------------------------ */






