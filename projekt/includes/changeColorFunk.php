<?php
//denna sida ändrar variabeln i cookies




if (isset($_COOKIE["color"]))
{
echo "ja";
if($_COOKIE['color'])
{
    echo 'true->false';

    setcookie("color", 0,time()+(60*60*24*30),"/~maja2003/DT100G/projekt");



}
else{

    echo 'false->true';
    setcookie("color", 1,time()+(60*60*24*30),"/~maja2003/DT100G/projekt");

  
}

}

else{
    setcookie("color", 1,time()+(60*60*24*30),"/~maja2003/DT100G/projekt");

}






header("location: ../index.php");
