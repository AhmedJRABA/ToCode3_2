<?php
    require_once ('lib/nusoap.php');
    function sayHello($name){
        return ("Hello: " .$name);
    }
    function reserverBillet($name,$nb_pers){
       switch ($name){
            case "tunisie": return $nb_pers*750 ;break;
            case "france": return $nb_pers*900 ;break;
            case "angleterre": return $nb_pers*1200 ;break;
            case "espagne": return $nb_pers*800 ;break;
            case "italie": return $nb_pers*1500 ;break;
            case "écosse": return $nb_pers*2300 ;break;
       }
    }
    $server = new nusoap_server();
    $server->configureWSDL("webService1");
    $server->register(
        "sayHello",    //nom du fonction
        array("name"=>'xsd:string'),    //inputs
        array("return"=>'xsd:string')    //outputs
    );
    $server->register(
        "reserverBillet",    //nom du fonction
        array("name"=>'xsd:string',"nb_pers"=>'xsd:integer'),    //inputs
        array("return"=>'xsd:integer')    //outputs
    );
    
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA :'';
    $server->service($HTTP_RAW_POST_DATA);
?>
