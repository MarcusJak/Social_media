
<?php
include_once 'head.php';
echo "<title>Login</title>
</head>";
include_once 'header.php';


if(checkSession())
{
    header("location: index.php?error=AlreadyLogd");
}
?>
   <!--Detta är själva login fönstret som använder post funktionen för till nästa fil-->

<div class="logSignSetup">
    <section class="sign">
        <form action="includes/loginFunk.php" method="post">
        <div class="signWindow">
                <h2>Login</h2>
                <label>Username/Email<input type="text" name="uid" placeholder="Username/Email..."></label>


            <br>
            <label> password...<input type="password" name="pwd" placeholder="pasword..."></label>


            <button type="submit" name="submit" class="uploadButtons">login</button>
        </div>
    
    </form>
    </section>

</div>
    <?php
    ?>
   

</body>
</html>