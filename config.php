<?php

return array(
    "site" => array(
        "root" => "http://localhost/DWS/framework4",
        "subdomain" => "/DWS/framework4",
        "rutaCSS" => "http://localhost/DWS/framework4/public/css/",
        "rutaIMAGES" => "http://localhost/DWS/framework4/public/images/",
        "rutaABSOLUTA" => "C:/xampp/htdocs/DWS/framework4/public/vistas/"



    ),
 //$this->bbdd=new PdoConnection("CONNECTION:host=HOST;dbname=NAMEDB","USERNAME","PASSWORD");   
    "DB" => array(
        "CONNECTION"=>"mysql",
        "HOST"=>"host",
        "PORT" => "3306",
        "USERNAME"=>"root",
        "PASSWORD" => "",  
        "NAMEDB" => "nba",
 
    )
);
