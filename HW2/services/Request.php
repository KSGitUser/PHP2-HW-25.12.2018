<?php

namespace app\services;

class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $params;
    protected $requestMethod;

    protected $pattern =
          '#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui';

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
      
    }

    public function parseRequest()
    {
      preg_match_all($this->pattern, $this->requestString, $matches);
          
      if(preg_match_all($this->pattern, $this->requestString, $matches))
        { 
          $this->controllerName = $matches['controller'][0];
          $this->actionName = $matches['action'][0];
          $this->params = $_REQUEST;
        }/*  else {
          throw new \Exception('Error URL');
        } */

    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMethod()
    {
      return $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function getAjax()
    {
      if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) 
      {
        //request is ajax
      }
    }
}