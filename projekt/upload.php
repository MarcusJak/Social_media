
<?php
include_once 'head.php';
echo "<title>Upload</title>
</head>";
include_once 'header.php';

if(checkSession())
{

 // denna section är var användaren ser sina inlägg 
    require_once'includes/dbhFunk.php';

    $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY dated DESC");

    echo "<div class='container'><section class='content3'><h1>Your uploads:</h1>";

    while ($row = mysqli_fetch_array($result)) {
      //hämtar rätt användares bilder
        if($row["usersid"]==$_SESSION["userid"])
        {
          echo "<div class='uploads'>";
      echo "<div class='img_div'>";
      //kollar typen av bild
      if($row["imageType"]=='Picture'){

        echo "<picture><img src='../../writeable/images/".$row['image']."' alt='fromLokal' ></picture>";
    }
    else
    {
      echo "<picture><img src='https://images.unsplash.com/".$row['image']."' alt='fromWebb'></picture>";  
    }
      echo "</div><div class=textShow>";

      if($row['text']){
        echo"text: ".$row['text']."";
      }
      else{
        echo"text: -";

      }    

      echo "</div>";

      echo "<form action='includes/postRemoveFunk.php?varname=images/$row[image]&picID=$row[id]' method='post'>";

      echo "<label>delete<button class='editButton' name='delete'>delete</button>";
      echo "</label></form><br>";
      
      echo "<form action='postEdit.php?varname=$row[id]' method='post'>";

      echo "<label>edit text<button class='editButton' name='edit'>edit text</button>";
      echo "</label></form>";
      echo "</div>";

    }

}
echo "</section>";
}
else{
    header("location: index.php?error=notLoggedin");
}

//denna section är var användaren kan lägga ut nya inlägg
?>


<section class="content1">
<h1>Upload:</h1>
    <form method="POST" action="includes/postFunk.php" enctype="multipart/form-data">
    <label id="selectFile"> selectFile <input type="file" name="image" accept="image/jpg, image/jpeg, image/png"></label>

  <br>
<label id="text">image text<textarea id="image_text" class="image_text" cols="40" 	rows="4" 	name="image_text" placeholder="image text"></textarea></label>
      <br>
  		<label id='upload'>POST<button type="submit" class="uploadButtons"  name="upload">POST</button>
      </label>  
      </form>
      <br>
  		<label id='selectLokal'>Lokal
      <button type="submit" class="uploadButtons"  name="selectWebb">Lokal</button>
  		</label>
      <br>
      <label id='selectWebb'>webb
      <button type="submit" class="uploadButtons"  name="selectWebb">Webb</button>
      </label>
      <br>
      <label id='submit'>Select Image
      <button type="submit" class="uploadButtons"  name="SelectImage">Select Image</button>
      </label>
      <br>
      <label id="inputImage">search<input type ="text" id="imageSearch" placeholder="search..."></label>
      <br>
      <label id='searchWebb'>
      search
      <button type="submit" class="uploadButtons"  >search</button>
      </label>


    <script src='javascript/upload.js'></script>
<div id="searchImage">
</div>
</section>
</div>


