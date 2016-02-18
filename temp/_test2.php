<?php
  $video_id = "32735700";
  $url = "http://vimeo.com/api/v2/video/" . $video_id . ".json";
  $json_url = file_get_contents($url); 
  $data = json_decode($json_url, true);
  //print_r($data);
  echo $data[0]["title"] . "<br>";
  echo $data[0]["description"] . "<br>";
  echo $data[0]["duration"] . "<br>";
?>