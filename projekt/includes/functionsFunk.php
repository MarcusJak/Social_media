<?php
//denna funktion kollar om inputen är tom
function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat)
{
    if(empty($name)||empty($email)||empty($pwd)||empty($pwdrepeat))
    {
        $result= true;

    }
    else{
        $result= false;

    }
    return $result;
}
//denna funktion kollar om användarnamnet är gilltigt
function invalidName($username){
    if(!preg_match("/^[a-zA-Z 0-9]*$/",$username))
    {
        $result =true;
    }
    else {
        $result =false;

    }
    return $result;
}
//denna funktion kollar om emailet är godkänt
function invalidEmail($email){
    //kollar om mailen är skriven i rätt format
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $result =true;
    }

    else {
        $result =false;

    }
    return $result;
}
//kollar om lösenorden är samma
function pwdMatch($pwd,$pwdrepeat){
    
    if($pwd!==$pwdrepeat)
    {
        $result =true;
    }
    else {
        $result =false;

    }
    return $result;
}
//kollar om användaren finns i databasen
function uidExist($conn,$username,$email ){
    
    $sql="SELECT* FROM users WHERE userName = '$username' OR usersEmail='$email';";
    $result=mysqli_query($conn, $sql);
    if($row = mysqli_fetch_array($result)) {
        return $row;
    }
    else{
        return false;
    }
}
// denna funktion skapar en användare
function createUsers($conn, $name,$email,$username,$pwd){    
   //krypterar lösenordet
    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
    $sql="INSERT INTO users(name,usersEmail,userName,usersPwd) VALUES('$name','$email','$username','$hashedPwd');";   
    mysqli_query($conn, $sql);

    header("location: ../login.php");

    exit();
}


//denna funktion kollar om inputen är tom
function emptyInputlogin($username,$pwd)
{
    if(empty($username)||empty($pwd))
    {
        $result= true;

    }
    else{
        $result= false;

    }
    return $result;
}

//denna funktion kollar så att användaren finns och isf kollar löseordet och om allt stämmer startar session och loggar in användaren
function loginUser($conn, $username,$pwd){
    $userData= uidExist($conn,$username,$username);
    if($userData==false)
    {
        header("location: ../login.php?error=dontExist");
        exit();

    }
    //jämför lösenordet
    $pwdhashed= $userData["usersPwd"];
    $checkPwd=password_verify($pwd,$pwdhashed);

    if($checkPwd===false)
    {  
        header("location: ../login.php?error=wronglogin2");
        exit();
    
    }

    else if($checkPwd===true)
    {    
        //loggar in användaren
        session_id('MarcusHem');
        session_start();
        $_SESSION["userid"]=$userData["usersId"];
        $_SESSION["userName"]=$userData["userName"];
        header("location: ../index.php");
        exit();
    }
}

//kontrollerar användaren
function checkSession(){

    if(session_id()=='MarcusHem'&&isset($_SESSION["userName"])){
        return true;
    }
    else{
        return false;
    }
}