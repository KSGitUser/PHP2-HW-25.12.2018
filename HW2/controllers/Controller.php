<?php

namespace app\controllers;

use \app\interfaces\IRenderer;

/*контроллер содержит в себе actions где каждое действие представляет собой
реакцию на какой либо запрос */
abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout =  "layouts/main";
    protected $useLayout = true;
    protected $renderer;

     /**
     * Controller constructor.
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }



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



    protected function render($template, $params = [])
    {
        if ($this->useLayout) {

            return $this->renderTemplate("{$this->layout}", ['content' => $this->renderTemplate($template, $params)]);

        }
        return $this->renderTemplate($template, $params);
    }

    protected function renderTemplate($template, $params = [])
    {
        
        return $this->renderer->render($template, $params);
    }



}
