<?php
//denna fil loggar in användaren och använder funktioner ifrån functions.phpn
if(isset($_POST["submit"])){
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];

require_once'dbhFunk.php';
require_once'functionsFunk.php';


if(emptyInputlogin($username,$pwd)!==false)
{
header("location: ../login.php?error=emptyIntput");
exit();

}

loginUser($conn, $username,$pwd);



}
else{
    header("location: ../login.php");
    exit();
}

