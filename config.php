<?php 

##Configuration pour aller chercher les informations via la DB du localhost

define("DB_HOST","localhost");
define("DB_NAME","article");
define("DB_USER","root");
define("DB_PASSWORD","root");

$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($connect -> error) :
    echo "erreur de connexion :" .$connect -> error;
    exit;
    else : $connect -> set_charset("utf-8");
    endif;

session_start();