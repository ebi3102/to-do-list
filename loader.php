<?php
include_once 'config.php' ;
spl_autoload_register(function ($class_name)
{
    include "modules/".$class_name.".php";
});

$conn = new ConnectionDb($dbConfig['hostname'] , $dbConfig['username'] , $dbConfig['password'] , $dbConfig['db_name']);
