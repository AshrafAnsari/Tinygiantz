<meta charset="utf-8"/>
<script src="//use.typekit.net/lqk4yck.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<script src="scripts/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<link rel="stylesheet" type="text/css" href="styles/mobile-style.css"/>
<?php
if ($post_id != "") {
  $sql_query_meta = "SELECT * FROM Films WHERE PostID='$post_id'";
  $sql_result_meta = mysqli_query($connection, $sql_query_meta);
  $meta = mysqli_fetch_assoc($sql_result_meta);
  $meta_post_title = $meta["Title"];
  $meta_post_url = "http://dev.tinygiantz.com/?postid=" . $meta["PostID"];
  $meta_post_type = "article";
  $meta_post_description = $meta['Description'];
  $meta_post_image = $meta["Picture"];
  ?>
  <title>Tinygiantz - <?php echo $meta_post_title; ?></title>
  <meta property="og:site_name" content="Tinygiantz"/>
  <meta property="og:title" content="<?php echo $meta_post_title; ?>"/>
  <meta property="og:url" content="<?php echo $meta_post_url; ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:description" content="<?php echo $meta_post_description; ?>"/>
  <meta property="og:image" content="<?php echo $meta_post_image; ?>"/>
  <meta property="fb:app_id" content="775067229304801"/>
  <?php
}
else {
  ?>
  <title>Tinygiantz</title>
  <meta property="og:site_name" content="Tinygiantz"/>
  <meta property="og:title" content="Tinygiantz"/>
  <meta property="og:url" content="http://dev.tinygiantz.com/"/>
  <meta property="og:type" content="website"/>
  <meta property="og:description" content="Bringing you the best and the most diverse short films from around the world"/>
  <meta property="og:image" content="http://static1.squarespace.com/static/52f77f57e4b0e482df7ba5c1/t/54b4094de4b0ac5b7ad2283d/1425017410098/?format=1000w"/>
  <meta property="fb:app_id" content="775067229304801"/>
  <?php
}
?>