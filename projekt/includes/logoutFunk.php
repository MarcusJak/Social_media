<?php
//denna fil tar bort sessionen dvs loggar ut användaren
session_start();
session_unset();
session_destroy();
header("location: ../login.php");