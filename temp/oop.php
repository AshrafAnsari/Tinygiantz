<?php

function __autoload($class){
  require_once "../includes/class.$class.inc";
}

function query() {
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $sql_query = "SELECT * FROM Films WHERE PostStatus = 'Published'";
  $result = $mysqli->query($sql_query);
  while ($row = $result->fetch_assoc()) {
    echo $row["Title"] . "<br>";
  }
}

query();

?>