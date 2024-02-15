<?php

$serverName='studentmysql.miun.se';
$dbUsername='maja2003';
$dbUserPassword='dsck6ly5';
$dbName='maja2003';
//kopplar till databasen
$conn=new mysqli('studentmysql.miun.se', 'maja2003', 'dsck6ly5', 'maja2003');
//$conn=new mysqli('localhost', 'root', '', 'projekt');

if(!$conn)
{
    die("error");
}
