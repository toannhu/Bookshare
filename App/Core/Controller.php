<?php
    class Controller{
       
        protected function Model($model){
            require('../App/Models/'.$model.'.php');
            return new $model();
        }

        protected function loadView($view,$data=[]){
            require('../App/Views/'.$view.'.php');
        }
    }
?>