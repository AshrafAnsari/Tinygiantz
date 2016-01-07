<?php
$post_id = htmlspecialchars($_GET["postid"]);
$date = date("Y-m-d", time());
$servername = "localhost";
$username = "ktulu";
$password = "rgclw3jtrpgh3drc";
$dbname = "Tinygiantz";
$connection = mysqli_connect($servername, $username, $password, $dbname);

$pageNumber = htmlspecialchars($_GET["page"]) + 0;
$pageNumberCurrent = 0;
if(is_int($pageNumber)){
  $pageNumberCurrent = $pageNumber;
  if($pageNumber == 1 || $pageNumber == 0){
    $pageNumber = 0;
    $pageNumberCurrent = 1;
  }
  else {
    $pageNumber = ($pageNumber * 10) - 10;
  }
}
else {
  $pageNumber = 0;
}
$pageNumberNextMulti = $pageNumberCurrent + 1;
$pageNumberPreviousMulti = $pageNumberCurrent - 1;
if($pageNumberCurrent == 1){
  $pageNumberPreviousMulti = 1;
}
$category = htmlspecialchars($_GET["category"]);
$length = htmlspecialchars($_GET["length"]);

?>