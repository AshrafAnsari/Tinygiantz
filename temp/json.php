<?php
    //http://player.vimeo.com/video/32735700
    //https://www.youtube.com/watch?v=tC1LxFS5uA4
    //https://vimeo.com/148317618
    //http://img.youtube.com/vi/tC1LxFS5uA4/maxresdefault.jpg
    $link = htmlspecialchars($_GET["link"]);
    if ($link != "") {
      if (strpos($link,"youtu")) {
        $link = $link;
        if(strpos($link, "v=")){
          $vidkey = substr($link, strpos($link, "v=") + 2);
        }
        else {
          $vidkey = substr($link, strrpos($link, "/") + 1);
        }
        $apikey = "AIzaSyCEfa-l7z6tFRQDvMJNa5BO8ZH5NHN2mNg";
        $apilink = "https://www.googleapis.com/youtube/v3/videos";
        $image = "http://img.youtube.com/vi/$vidkey/maxresdefault.jpg";
        $length = file_get_contents("$apilink?part=contentDetails&id=$vidkey&key=$apikey");
        $title = file_get_contents("$apilink?part=snippet&id=$vidkey&key=$apikey");
        $description = file_get_contents("$apilink?part=snippet&id=$vidkey&key=$apikey");
        $video_length =json_decode($length, true);
        $video_title =json_decode($title, true);
        $video_description =json_decode($description, true);
        foreach ($video_length["items"] as $time) {
          $video_length = substr($time['contentDetails']['duration'], 2);
        }
        foreach ($video_title["items"] as $title) {
          $video_title = $title['snippet']['title'];
        }
        foreach ($video_description["items"] as $description) {
          $video_description = $description['snippet']['description'];
        }
      }
      elseif (strpos($link,"vimeo")) {
        $link = $link;
        $vidkey = substr($link, strrpos($link, "/") + 1);
        $video_id = $vidkey;
        $image = "http://img.youtube.com/vi/$vidkey/maxresdefault.jpg";
        $url = "http://vimeo.com/api/v2/video/" . $video_id . ".json";
        $json_url = file_get_contents($url); 
        $data = json_decode($json_url, true);
        $init = $data[0]["duration"];
        $hours = floor($init / 3600);
        $minutes = floor(($init / 60) % 60);
        $seconds = $init % 60;
        $video_length = $minutes . "M" . $seconds . "S";
        $video_title = $data[0]["title"];
        $video_description = $data[0]["description"];
        $image = $data[0]["thumbnail_large"];
      }
      $json_array = array("title" => strip_tags($video_title), "description" => strip_tags($video_description), "length" => $video_length, "image" => $image);
      echo json_encode($json_array);
    }
    ?>