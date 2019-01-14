<?php

namespace app\controllers;

use \app\models\Product;

/*контроллер содержит в себе actions где каждое действие представляет собой
реакцию на какой либо запрос */
class ProductController
{
  protected $action;
  protected $defaultAction = 'index';
  protected $layout = "main";
  protected $useLayout = true;
  
  
  public function runAction($action = null)
  {
    $this->action = $action ?: $this->defaultAction;
    $method = "action" . ucfirst($this->action);

    if(method_exists($this, $method)) {
      $this->$method();
    } else {
      echo "404";
    } 
  }

  public function actionIndex()
  {
   echo "catalog";
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionCard()
  {
    $id = $_GET['id'];
    $product = Product::getOne($id);
    echo $this->render("card", ['product' => $product]);
  }

  protected function render($template, $params =[]) {
    if ($this->useLayout) {

      return $this->renderTemplate("layouts/{$this->layout}", ['content' => $this->renderTemplate($template, $params)]);

    }
    return $this->renderTemplate($template, $params);
  }

  protected function renderTemplate($template, $params = [])
  { 
      ob_start(); /* включение буферезации вывода. Все что идет в выходной 
      поток после этой функции накапливается в памяти */
      $templatePath = TEMPLATES_DIR . $template . ".php";
      extract($params); // из массива переменных делает отдельные переменные
      include $templatePath;
      return ob_get_clean(); /* возвращает содержимое буфера в виде строки
      и очищает его*/
  }

}