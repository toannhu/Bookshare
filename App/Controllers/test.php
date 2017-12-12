<?php

    class test extends Controller{
        public function testMeth($name='specified'){
            $user= $this->Model('User');
            $user->name= 'Cong';
            echo $name;
            $this->loadView($name);
            
        }
    }