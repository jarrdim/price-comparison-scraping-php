<?php

define('NAME','PRICE COMPARISON WEBSITE');
define('DEBUG',"true");

if($_SERVER['SERVER_NAME'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] =='localhost' )
{
    define('DBHOST','127.0.0.1');
    define('DBUSER','root');
    define('DBNAME','price_comparison');
    define('DBDRIVER','');
    define('DBPASS','');
    define('ROOT','http://localhost/PROJECTS/price/public');
}
else
{
    define('ROOT','https://wwww/system/public');
}

