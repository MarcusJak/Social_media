<?php
//denna sida lägger in inlägget in till databasen 
session_start();
require_once 'functionsFunk.php';

require_once'dbhFunk.php';
if(!checkSession())
{
    header("location: ../index.php?error=notLoggedin");
}
//om det är en lokal bild körs det i denna if sats
else{
  if (isset($_POST['upload'])) {

	$image = $_FILES['image']['name'];
	$text = $_POST['image_text'];

	  if(empty($image))
	  {
		header("location: ../upload.php?error=noImage");

	  }
	  else{
  	

  	$target = "../../../writeable/images/".basename($image);

  	$sql = "INSERT INTO posts (image, imageType, usersid, text) VALUES ('$image','Picture','$_SESSION[userid]','$text')";
  	mysqli_query($conn, $sql);

  	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	header("location: ../upload.php");
	  
}
  }
//om det är en webbbaserad bild körs denna if sats
else if (isset($_POST['webbImage'])) {


$imageURL = $_GET['varname'];
$imageText = $_GET['text'];

$imageURL=substr($imageURL, 28);

  $sql = "INSERT INTO posts (image, imageType, usersid, text) VALUES ('$imageURL', 'URL', '$_SESSION[userid]','$imageText')";
  mysqli_query($conn, $sql);
  

  header("location: ../upload.php");
}

else{  
	header("location: ../upload.php?error=Null");


}
}
?>