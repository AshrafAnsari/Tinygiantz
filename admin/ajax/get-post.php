<?php
session_start();
require "../includes/session.php";
$connection = connectDB();
function connectDB() {
	$sql_config = parse_ini_file("../../../config.ini");
  $sql_config["username"] = "ktulu";
  $sql_config["password"] = "rgclw3jtrpgh3drc";
	return mysqli_connect($sql_config["servername"], $sql_config["username"], $sql_config["password"], $sql_config["dbname"]);
}
$id = mysqli_real_escape_string($connection, $_GET['id']);
$query = "SELECT * FROM Films WHERE PostID = '$id'";
$query = mysqli_query($connection, $query);
$result = mysqli_fetch_assoc($query);
echo json_encode($result);
?>