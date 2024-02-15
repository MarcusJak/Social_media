<?php

session_start();
require_once'dbhFunk.php';
require_once 'functionsFunk.php';

//ändrar texten i en post
$picid=$_GET["picID"];
$text = $_POST['image_text'];

if(!checkSession())
{
    header("location: ../index.php?error=notLoggedin");
}
else{
mysqli_query($conn, "UPDATE posts SET text = '$text' where id='$picid'");


header("location: ../upload.php");
}











