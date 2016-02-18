<?php
/*
header('Content-Type: image/png');
include "functions/functions.php";
function saveImage($id, $url, $format){
  $opts = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"Accept-language: en\r\n" .
          "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:23.0) Gecko/20100101 Firefox/23.0\r\n" . 
      "Referer: http://www.funnyjunk.com\r\n"
    )
  );  
  $file_name = $id . $format;
  define("DIRECTORY", "assets/pictures/posts/");
  $content = file_get_contents($url, false, stream_context_create($opts));
  file_put_contents(DIRECTORY . $file_name, $content);
}
$sql_image_query = "SELECT * FROM Films";
$sql_image_result = mysqli_query($connection, $sql_image_query);
while($image_result = mysqli_fetch_assoc($sql_image_result)) {
  $last_period = strrpos($image_result["Picture"], ".");
  $image_format = substr($image_result["Picture"], $last_period);
  saveImage($image_result["PostID"],$image_result["Picture"],$image_format);
}
*/
?>