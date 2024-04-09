<?php

class Route
    {
        public $controller = 'Home';
        public $method = 'index';

    public function getURL()
    {
        $url = $_GET['url'] ?? 'home';

        $url = explode('/',$url);

        return $url;


    }
    public function loadController()
    {
        $arr = $this->getURL();
 
        $filename = "../app/controllers/".ucfirst($arr[0]).".php";
        
     
       //print_r($arr);
        if(file_exists($filename))
        {
        
            require  $filename;
            $this->controller = ucfirst($arr[0]);
            unset($arr[0]);
        }
        else
        {
            $filename = "../app/controllers/Error404.php";
            require  $filename;
            $this->controller = 'Error404';
        }

        $controller = new $this->controller ;
        $method = $arr[1] ?? "this->method";


        if(!empty($arr[1]))
        {
            
            if(method_exists($controller,$method))
            {
                $this->method = $method;
                unset($arr[1]);
                   
            }

        }
        $arr = array_values($arr);
        $y = $arr;
        call_user_func_array([$controller, $this->method], $y);



       //$controller->index();



        

    }

    function seek($any)
        {
        echo "<pre>";
        print_r($any);
        echo "</pre>";
        }

    }