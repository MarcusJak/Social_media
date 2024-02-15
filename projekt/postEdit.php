<?php
include_once 'head.php';
echo "<title>Post-Edit</title>
</head>";
include_once 'header.php';

//Denna sida hämtar bilden som användaren vill ändra och skriver om dens text
if(checkSession())
{
    $picID=$_GET["varname"];


    echo "<div class='profileSetup'><div class='content2'><h1>Edit:</h1>";


require_once'includes/dbhFunk.php';

    $result = mysqli_query($conn, "SELECT * FROM posts where id='$picID';");
$row = mysqli_fetch_array($result);

echo "<form action='includes/editTextFunk.php?picID=$row[id]' method='post'><div id='img_div'>";
//kollar vilken typ av bild
if($row["imageType"]=='Picture'){

  echo "<img src='../../writeable/images/".$row['image']."' alt='fromLokal' >";
}
else
{
echo "<img src=https://images.unsplash.com/".$row['image']." alt='fromWebb'>";  
}


echo"</div>
<div id='changeWindow'><label>change your text <textarea id='textChange' class='image_text' cols='40' rows='4' name='image_text' >$row[text]
</textarea>
</label></div><br>";


  echo "<label>edit<button class='editButton' name='edit'>edit</button>";
  echo "</label></form>";





echo "</div></div>";
}
else{
  header("location: index.php?error=notLoggedin");
}