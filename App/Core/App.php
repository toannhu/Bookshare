<?php

    class App{
        protected $controller='test';
        protected $method='testMeth';
        protected $params='';

        public function __construct(){
            $url=$this->parseURL();
            print_r($url);
            echo '<br>';
            if (file_exists('../App/Controllers/'.$url[0].'.php')){
                $this->controller=$url[0];             
                
                unset($url[0]);
            }
            
            require('../App/Controllers/'.$this->controller.'.php' );
            
            $this->controller= new $this->controller;
            
            if(isset($url[1])){
                if (method_exists($this->controller,$url[1])){
                    $this->method=$url[1];
                    unset($url[1]);
                }
            }
            
            $this->params= $url ? array_values($url):[];
            call_user_func_array([$this->controller,$this->method],$this->params);
        }

        public function parseURL(){
            if(isset($_GET['url'])){
                return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
            }
        }
    }
?>