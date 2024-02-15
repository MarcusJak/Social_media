<?php
//skapar en användare 
if(isset($_POST["submit"])){
$name=$_POST["name"];
$email=$_POST["email"];
$username=$_POST["Username"];
$pwd=$_POST["pwd"];
$pwdrepeat=$_POST["pwdrepeat"];

require_once 'dbhFunk.php';
require_once 'functionsFunk.php';

//kontrollerar infon med hjälp av funktioner ifrån functionFunk filen

if(emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat)!==false)
{
    header("location: ../signup.php?error=noInput");
exit();
}

if(invalidName($username)!==false)
{
    header("location: ../signup.php?error=exist");

exit();
}
if(invalidEmail($email)!==false)
{
    header("location: ../signup.php?error=wrongMail");

exit();
}

if(pwdMatch($pwd,$pwdrepeat)!==false)
{    header("location: ../signup.php?error=wrongPsw");

exit();
}
if(uidExist($conn,$username,$email)!==false)
{
    header("location: ../signup.php?error=wrongUserExist");

    exit();
}
//skapar en användare
createUsers($conn, $name,$email,$username,$pwd);

}
