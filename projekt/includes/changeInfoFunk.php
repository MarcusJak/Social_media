<?php
session_start();

//denna sida ändrar infon i databasen 
require_once'dbhFunk.php';
require_once 'functionsFunk.php';
if(!checkSession())
{
    header("location: ../index.php?error=notLoggedin");
}
else{
    $name=$_POST["name"];
    $mail=$_POST["email"];
    $username=$_POST["uid"];

echo $username."----".$name."-----".$mail."------".$_SESSION["userid"];

if(!invalidEmail($mail))
{
    echo uidExist($conn,$username,$mail)['usersId'];
    if(uidExist($conn,$username,$mail)['usersId']==$_SESSION['userid'])
    {

    $sql= "UPDATE `users` SET `name` = '$name', `usersEmail` = '$mail', `userName` = '$username' WHERE `users`.`usersId` =$_SESSION[userid] ;";
    mysqli_query($conn, $sql);
    header("location: ../profile.php?error=Done");
    }
}
    header("location: ../profile.php?error=notDone");

}

