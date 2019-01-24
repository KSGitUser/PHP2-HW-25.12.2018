<?php
namespace app\services\renderers;

use app\interfaces\IRenderer;
use app\base\App;

class TemplateRenderer implements IRenderer
{
  public function render($template, $params = [])
  {
    ob_start(); /* включение буферезации вывода. Все что идет в выходной
    поток после этой функции накапливается в памяти */
    $nameOfDir = $template . "s/"; 
    $templatePath = App::call()->config['templatesDir'] .  $template . ".php";
     extract($params); // из массива переменных делает отдельные переменные
    include $templatePath;
    return ob_get_clean(); /* возвращает содержимое буфера в виде строки
и очищает его*/
  }
    
}