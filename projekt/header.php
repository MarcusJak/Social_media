




<?php



//bestäms om hemsidan skall vara inverterad eller inte

if($_COOKIE["color"])
{
echo "<body style='filter: invert(100%);'>";
}
else{
    echo "<body style='filter: invert(0%);'>";

}



?>
<header>
<nav>
<ul>
<?php
//olika navbars beroende om man är inloggad
if(checkSession())
{
    echo" <li><a href='index.php'>Hem</a></li>";
    echo" <li><a href='profile.php'>profile page</a></li>";
    echo"<li><a href='includes/logoutFunk.php'>logout</a></li>";
    echo" <li><a href='upload.php'>upload</a></li>";

}
else{
    echo" <li><a href='index.php'>Hem</a></li>";
    echo"<li><a href='signup.php'>sign-up</a></li>";
    echo"<li><a href='login.php'>login</a></li>";

}

?>
<script>
//kontrollerar om cookies är på eller inte
if(!navigator.cookieEnabled)
{
    window.location.href = "https://studenter.miun.se/~maja2003/DT100G/projekt/noCookies.php?";

}


</script>



        
    </ul>

</nav>
</header>