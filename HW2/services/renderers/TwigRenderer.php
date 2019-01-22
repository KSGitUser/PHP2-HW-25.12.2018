<?php

namespace app\services\renderers;

use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{

  protected $templater;


  public function __construct() {
    $this->templater = new \Twig_Environment(new \Twig_Loader_Filesystem( $_SERVER['DOCUMENT_ROOT'] . '/../views'));    
  }

    public function render($template, $params = [])
    {
      extract($params);
      $template =  $template . '.twig';
      return $this->templater->render($template, ['product' => $product]);
    }

}
