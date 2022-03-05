<style>
.php-style-1 {
	background: #4a7b73;
  color: white;
  font-size: 40px;
  padding: 10px;
}

.php-style-3 {
  background: hsl(174, 20%, 79%);;
  border: 7px double #4a7b73;
  font-size: 20px;
  text-align: center;
  color: black;
  padding: 20px;
  line-height: 2;
}

.button {
  padding: 5px;
}
</style>
<?php
  // reg ex
    // name
    $regExName = "/^[a-zA-Z]+$/";
    // email address
    $regExEmail = "/^[a-zA-Z0-9+_.-]{1,100}@[a-zA-Z0-9+_.-]{1,100}.com$/";
    //zodiac
    $regExZodiac = "/^(Aries|Taurus|Gemini|Cancer|Leo|Virgo|Libra|Scorpio|Sagittarius|Capricorn|Aquarius|Pisces)$/";

    
  // generator variables
    // login
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $email = $_POST["emailAddress"];
    // story
    $weather = $_POST["weather"];
    $day = $_POST["day"];
    $location = $_POST["location"];
    $item = $_POST["item"];
    $adjective = $_POST["adjective"];
    $size = $_POST["size"];
    $emotion = $_POST["emotion"];
    $color = $_POST["color"];


  // validation
    // firstname
    if (preg_match($regExName, $fName) && preg_match($regExName, $lName)) {
        $name = $fName ."  ".$lName;
        echo("<h1 class='php-style-1'> Hi, " . $name . "!</h1>");
    }
    else {
      echo("<h1 class='php-style-1'> Hi, Guest!</h1>");
    }

    // file
    if(file_exists("names.txt")) 
    {
      $fileNames = file_get_contents("names.txt");
      $fileSplit = explode(",", $fileNames);
    }

    if (($fName != "") && ($lName != "")){
        // story
        echo("<p class='php-style-3'> It was a ".$weather." ".$day." when ".$fName." decided to get out the house and head to the ".$location.". 
        They grabbed their ".$item." and hit the road. As they walked towards the ".$adjective." ".$location.", they saw a ".$size.", floating
        object in the ".$color." sky. They began to grow ".$emotion." and looked up as the object made its way towards them.
        A beam of ".$color." light consumed them as they heard 'Welcome ".$fName.", we come in peace.'   
        </p>");
    }else{
      $key = array_rand($fileSplit);
      $guest = $fileSplit[$key];
      
      echo("<p class='php-style-3'> It was a ".$weather." ".$day." when ".$guest." decided to get out the house and head to the ".$location.". 
        They grabbed their ".$item." and hit the road. As they walked towards the ".$adjective." ".$location.", they saw a ".$size.", floating
        object in the ".$color." sky. They began to grow ".$emotion." and looked up as the object made its way towards them.
        A beam of ".$color." light consumed them as they heard 'Welcome ".$guest.", we come in peace.'   
        </p>");
    }
    
    // email
    if (preg_match($regExEmail, $email)) {
      echo("Your email, "."<b><i>". $email ."</i></b>".", was approved. <br><br> 
      Want to receive your story results through email? <br><br>
      <button class='button'>Yes, send my results.</button>
      ");
      // hoping to get use actual mail() function in the future.
   } else {
        echo("Without a valid email, we are unable to send you your results.");
      }
?>


