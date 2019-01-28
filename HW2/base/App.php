<?php

namespace app\base;

use app\traits\TSingletone;

use \app\models\Product;
use \app\sservices\Autoloader;
use \app\services\Db;
use \app\models\Order;
use app\services\renderers\TemplateRenderer;
use app\services\Request;
use \app\models\Basket;
use \app\models\repositories;


/**
 * Class App
 * @package app\base
 * @property Db $db;
 * @property Request $request;
 * @property IRenderer $renderer;
 * 
 */
class App
{
    use TSingletone;

    public $config;
    /** @var storage */
    public $components = [];

    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Текст, отправляемый в том случае,
            если пользователь нажал кнопку Cancel';
            exit;
        } else {
            echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
            echo "<p>Вы ввели пароль {$_SERVER['PHP_AUTH_PW']}.</p>";
        }


        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
      
        $request = App::call()->request;

        $params = $request->getParams();
        $basket = App::call()->basket;
        $basket->addToSession($params['productId'], $params['quantity']);
    }
 
    protected function runController() {
      $request = App::call()->request;
      $controllerName = 
          $request->getControllerName() ?: $this->config['defaultController'];
      $actionName = $request->getActionName();

      $controllerClass = 
          $this->config['controllerNamespace'] .
          ucfirst($controllerName) . "Controller";

      if (class_exists($controllerClass)) {
          $controller = new $controllerClass(App::call()->renderer);
          $controller->runAction($actionName);
      }
    }

    public function createComponent($name)
    {
        if ($params = $this->config['components'][$name]) {

          $class = $params['class'];
          if (class_exists($class)) {
            unset($params['class']);
            $reflection = new \ReflectionClass($class);
            return $reflection->newInstanceArgs($params);
          }
            throw new \Exeption("Не определен класс компонента");

        }
        /* throw new \Exeption("Компонент {$name} не найден"); */
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }
}
