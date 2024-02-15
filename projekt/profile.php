<?php
include_once 'head.php';
echo "<title>Profile</title>
</head>";
include_once 'header.php';

if(!checkSession())
{
    header("location: index.php?error=notLoggedin");
}




require_once'includes/dbhFunk.php';

//denna section visar användarens uppgifter
echo "<div class='profileSetup'><section class='content2'>";
        
          $result2 = mysqli_query($conn, "SELECT * FROM users where usersid='$_SESSION[userid]';");
          $row2 = mysqli_fetch_array($result2);
          echo "<div class= 'profilText'><h2>Profil namn:</h2><h3>".$row2['name']."</h3><h2> Email:</h2><h3> ".$row2['usersEmail']."</h3></div>";
      echo "<button type='submit' class='profileButtons' id ='changebutton' name='change'>chage info</button>";



      echo "<form action='includes/changeInfoFunk.php' method='post'>";

    
    //detta syns inte föränn användaren klickar på knappen changebutton
    echo" <div id='changeInfoInput'>
    <label>full name...<input type='text' name='name'  value='$row2[name]'></label><br>
    <label>email...<input type='text' name='email' value='$row2[usersEmail]'></label><br>
    <label>user name...<input type='text' name='uid' value='$row2[userName]'></label>";

     echo "<button type='submit' class='profileButtons' name='submitChange'>
     submitChange</button>";
     
     
     
     echo "</div></form><script src='javascript/profile.js'></script></section></div>";
    

    

