<?php
  error_reporting(E_ALL);
  $vidid = $_POST['vidid'];
  $url = "youtube-dl -f 140  https://www.youtube.com/watch?v=$vidid";
  exec("$url 2>&1", $result);
  foreach($result as $key => $value) {
    echo $value ."<br/>";
  } 
  echo "<p>Audio Successfully downloaded. </p>";
?>
<p> Go back to <a href="./">Home</a> </p>
