<?php
require "session.php";
$connection = connectDB();
function connectDB() {
	$sql_config = parse_ini_file("../../config.ini");
  $sql_config["username"] = "ktulu";
  $sql_config["password"] = "rgclw3jtrpgh3drc";
	return mysqli_connect($sql_config["servername"], $sql_config["username"], $sql_config["password"], $sql_config["dbname"]);
}
?>