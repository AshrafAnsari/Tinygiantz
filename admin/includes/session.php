<?php
session_start();
if(!$_SESSION["user_name"]){
  header("Location: http://dev.tinygiantz.com/admin");
  exit;
}
?>