<?php
session_start();

//denna fil adderar en gillning för ett inlägg
require_once'dbhFunk.php';
require_once 'functionsFunk.php';

if(!checkSession())
{
    header("location: ../index.php?error=notLoggedin");
}
else{

$picid=$_GET["id"];


$result = mysqli_query($conn, "select likes from posts where id='$picid'");

$row = mysqli_fetch_array($result);

$temp=$row['likes']+1;
mysqli_query($conn, "UPDATE posts SET likes = '$temp' where id='$picid'");



header("location: ../index.php");
}
