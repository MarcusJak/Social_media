<?php

$serverName='studentmysql.miun.se';
$dbUsername='';
$dbUserPassword='';
$dbName='';
//kopplar till databasen
$conn=new mysqli();
//$conn=new mysqli('localhost', 'root', '', 'projekt');

if(!$conn)
{
    die("error");
}
