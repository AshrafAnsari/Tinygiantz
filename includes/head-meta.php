<meta charset="utf-8"/>
<script src="//use.typekit.net/lqk4yck.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<script src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="scripts/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<link rel="stylesheet" type="text/css" href="styles/mobile-style.css"/>

<?php

if($post_id != ""){

  $sql_query_meta = "SELECT * FROM Films WHERE PostID='$post_id'";
  $sql_result_meta = mysqli_query($connection, $sql_query_meta);
  $meta = mysqli_fetch_assoc($sql_result_meta);
  $meta_post_title = $meta["Title"];
  $meta_post_url = "http://dev.tinygiantz.com/?postid=" . $meta["PostID"];
  $meta_post_type = "article";
  $meta_post_description = $meta['Description'];
  $meta_post_image = $meta["Picture"];

  echo "<title>Tinygiantz - $meta_post_title</title>";
  echo "<meta property=\"og:site_name\" content=\"Tinygiantz\"/>";
  echo "<meta property=\"og:title\" content=\"$meta_post_title\"/>";
  echo "<meta property=\"og:url\" content=\"$meta_post_url\"/>";
  echo "<meta property=\"og:type\" content=\"article\"/>";
  echo "<meta property=\"og:description\" content=\"$meta_post_description\"/>";
  echo "<meta property=\"og:image\" content=\"$meta_post_image\"/>";

}
else {

  echo "<title>Tinygiantz (development)</title>";
  echo "<meta property=\"og:site_name\" content=\"Tinygiantz\"/>";
  echo "<meta property=\"og:title\" content=\"Tinygiantz\"/>";
  echo "<meta property=\"og:url\" content=\"http://dev.tinygiantz.com/\"/>";
  echo "<meta property=\"og:type\" content=\"website\"/>";
  echo "<meta property=\"og:image\" content=\"http://static1.squarespace.com/static/52f77f57e4b0e482df7ba5c1/t/54b4094de4b0ac5b7ad2283d/1425017410098/?format=1000w\"/>";

}

?>