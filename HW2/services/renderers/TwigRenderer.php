<?php

namespace app\services\renderers;

use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{

    public function render($template, $params = [])
    {
      extract($params);
      $template =  $template . '.twig';
      $loader = new \Twig_Loader_Filesystem( $_SERVER['DOCUMENT_ROOT'] . '/../views');
      $twig = new \Twig_Environment($loader);
      return $twig->render($template, ['product' => $product]);
    }

}
