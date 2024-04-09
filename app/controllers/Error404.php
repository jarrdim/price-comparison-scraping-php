
<?php

class Error404 extends Controller
{
    public function index()
    {
        $controller = new Controller;
        $controller->view('404');
      
    }

}