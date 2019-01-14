<?php

namespace app\controllers;

/*контроллер содержит в себе actions где каждое действие представляет собой
реакцию на какой либо запрос */
abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout =  "/../layouts/main";
    protected $useLayout = true;

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }
    }

    public function actionIndex()
    {
        $nameOfTemplate = static::getDefault();
        $nameOfController = static::getContollerName();
        $product = static::getAll();
        echo $this->render($nameOfTemplate, [$nameOfController => $product]);
    } /* по традиции дефолтное действие index которое будет выполнятся
    в случае вызова контроллера без указания конкретного действия*/

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = static::getOne($id);
        $nameOfController = static::getContollerName();
        echo $this->render("card", [$nameOfController => $product]);
    }

    protected function render($template, $params = [])
    {
        if ($this->useLayout) {

            return $this->renderTemplate("{$this->layout}", ['content' => $this->renderTemplate($template, $params)]);

        }
        return $this->renderTemplate($template, $params);
    }

    protected function renderTemplate($template, $params = [])
    {
        ob_start(); /* включение буферезации вывода. Все что идет в выходной
        поток после этой функции накапливается в памяти */
        $nameOfDir = static::getContollerName() . "s/"; 
        $templatePath = TEMPLATES_DIR . $nameOfDir . $template . ".php";
        extract($params); // из массива переменных делает отдельные переменные
        include $templatePath;
        return ob_get_clean(); /* возвращает содержимое буфера в виде строки
    и очищает его*/
    }

}
