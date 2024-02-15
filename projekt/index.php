



<?php
include_once 'head.php';
echo "<title>Home</title>
</head>";
include_once 'header.php';


 require_once'includes/dbhFunk.php';




echo "<div class='profileSetup'><section class='content2'>";

echo "<div class='usersPref'><h3>Home</h3>
<label> select sort type<select name='sort' class='homeSelect' id=sortType>";
    
//själva sorterings altenativen bestäms

$options = array( 'dated', 'likes' );

foreach($options as $value=>$name)
{
    if($name ==$_COOKIE['sort'])
    {
         echo "<option selected='selected' value='".$name."'>".$name."</option>";
    }
    else
    {
         echo "<option value='".$name."'>".$name."</option>";
    }
}



    echo " </select></label>
     <br><br> 
    <label> submit<button type='submit' name='sub' class='homeButtons'  onClick='document.location.reload(true)'>
    sort 
    </button></label>
    <br><br>";




    echo "<form action='includes/changeColorFunk.php' method='post'>";

    echo "<label>change color<button id='changeColor' class='homeButtons' name='changeColor'>changeColor
    </button></label></form></div>";





    ?>
    
    <div id="scrollValue">

    </div>

    <!-- här hämtas alla inlägg samt loopas in till hemsidan -->
<?php  




    if($_COOKIE['sort'])
    {
      $sortType=$_COOKIE['sort'];
      $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY $sortType DESC");

  }
    else{
      $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY dated DESC");
    }
    
while ($row = mysqli_fetch_array($result)) {
        
      echo "<div class='img_div'>";

//kollar vilken typ av bild
      if($row["imageType"]=='Picture'){

        echo "<picture><img src='../../writeable/images/".$row['image']."' alt='fromLokal' ></picture>";
    }
    else
    {
      echo "<picture><img src='https://images.unsplash.com/".$row['image']."' alt='fromWebb'></picture>";  
    }
    

// här skriv själva texten samt likes och like knappen om man är inloggad
      $result2 = mysqli_query($conn, "SELECT * FROM users where usersId = $row[usersid]");
          $row2 = mysqli_fetch_array($result2);
          echo "<div class=textShow><h4>username: ".$row2['userName']."
          </h4> <h4>date: <time>".$row['dated']."</time></h4>";
          if($row['text']){
            echo"<h4>text: ".$row['text']."</h4>";
          }
          else{
            echo"<h4>text: - </h4>";

          }          
          echo "<div class= likeArea>".$row['likes']."
          </div><br>" ;
          if(isset($_SESSION["userName"]))
          {
          echo "<form action='includes/likePostFunk.php?id=$row[id]' method='post'>";
          echo "<label>like<button class='likeButton'>like
          </button></label>";
           echo "</form>";
          }
          echo "</div></div>";
   


    }
    

?>
</section>
</div>
<script src='javascript/index.js'></script>


 
</body>



     

   