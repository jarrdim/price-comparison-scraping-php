<?php




session_start();

require "../app/core/init.php";

    if(DEBUG == 'true')
    {
        ini_set("display_errors",1);

    }
    else{
        ini_set("display_errors",0);
    }


    $app = new Route();

 $app->loadController();
