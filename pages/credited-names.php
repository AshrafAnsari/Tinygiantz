<?php
$sql_credited_names_query = "SELECT CONCAT_WS(', ', Director, Producer, Screenplay, DoP, Cast) AS Names FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date'";
$sql_credited_names_result = mysqli_query($connection, $sql_credited_names_query);
$sql_credited_names_result_number = mysqli_num_rows($sql_credited_names_result);
$credited_names_string;
while ($credited_names_result = mysqli_fetch_assoc($sql_credited_names_result)) {
  $credited_names_string .= $credited_names_result["Names"] . ", ";
}
$credited_names_array = array_unique(explode(", ", $credited_names_string));
asort($credited_names_array);
$credited_names_array = array_values($credited_names_array);
array_shift($credited_names_array);
$letter;
$option_letters = array();
?>
<h1>
  Credited names
</h1>
<?php
foreach ($credited_names_array as $name) {
  array_push($option_letters, $name[0]);
}
$option_letters = array_values(array_unique($option_letters));
echo "<select id=\"select-letter\" onchange=\"changeLetter();\">";
foreach ($option_letters as $option) {
  echo "<option value=\"$option\">$option</option>";
}
echo "</select>";
foreach ($credited_names_array as $name) {  
  $sql_credited_names_posts_query = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND (Director LIKE '%$name%' OR Producer LIKE '%$name%' OR Screenplay LIKE '%$name%' OR DoP LIKE '%$name%' OR Cast LIKE '%$name%')";
  $sql_credited_names_posts_result = mysqli_query($connection, $sql_credited_names_posts_query);
  $sql_credited_names_posts_result_number = mysqli_num_rows($sql_credited_names_posts_result);  
  if ($letter != $name[0]) {
    $letter = $name[0];
    if ($i > 0){
      echo "</span>";
    }
    echo "<span class=\"letter\" id=\"letter-$letter\">";
  }
  if ($sql_credited_names_posts_result_number == 1) {
    $sql_credited_names_result_trail = "";
  }
  else {
    $sql_credited_names_result_trail = "s";
  }
  echo "<a href=\"/?name=" . str_replace(" ", "+", $name) . "\" title=\"{$sql_credited_names_posts_result_number} film{$sql_credited_names_result_trail}\">$name</a><br>";
  $i++;
}
echo "</span>";
?>