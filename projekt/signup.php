<?php
include_once 'head.php';
echo "<title>Sign-Up</title>
</head>";
include_once 'header.php';

if(checkSession())
{
    header("location: index.php?error=AlreadyLogd");
}
//detta är själva signup fönstret som använder post funktionen för till nästa fil

?>
<div class="logSignSetup">
<section class="sign">

<form action="includes/signupFunk.php" method="post">
        <div class="signWindow">
        <h2>Sign-up</h2>

           
        <label>Name<input type="text" name="name" placeholder="Name..."></label>

        <br>
        
        <label>Email<input type="text" name="email" placeholder="Email..."></label>

        <br>
        <label>Username<input type="text" name="Username" placeholder="Username..."></label>

        <br>
        <label> password...<input type="password" name="pwd" placeholder="pasword..."></label>

        <br>
        <label> password repeat...<input type="password" name="pwdrepeat" placeholder="pasword repeat..."></label>

        <button type="submit" class="uploadButtons" name="submit">sign up</button>
        </div>
        </form>
</section>

</div>
    <?php
    ?>
</body>
</html>



