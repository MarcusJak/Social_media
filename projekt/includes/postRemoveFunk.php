<?php
    require_once 'functionsFunk.php';
    session_start();

//denna sida tar bort ett inlägg
if(!checkSession())
{
    header("location: ../index.php?error=notLoggedin");
}
else{

if(isset($_POST["delete"])){
    
    $picDir=$_GET["varname"];
    $picid=$_GET["picID"];

    require_once'dbhFunk.php';
  
  
   

//om en bild finns flera inlägg av med samma fil kommer den vara kvar, då annars försvinner bilden på det andra inlägget också
$query = "SELECT image, COUNT(*) FROM posts GROUP BY image;";
$result = $conn->query($query);

while ($row = mysqli_fetch_array($result)) {
  if("images/".$row["image"]==$picDir&&$row["COUNT(*)"]==1)
  {
    unlink("../../../writeable/".$picDir);
  }
 
}


$sql = "DELETE FROM posts WHERE id ='". $picid."';";
$conn->query($sql);


header("location: ../upload.php");

}
}