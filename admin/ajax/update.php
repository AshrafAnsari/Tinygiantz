<?php
require "../includes/session.php";
require "../includes/functions.php";
$date = mysqli_real_escape_string($connection, $_GET['date']);
$id = mysqli_real_escape_string($connection, $_GET['id']);
$query = "UPDATE Films SET PublicationDate = '$date' WHERE PostID = '$id'";
$query = mysqli_query($connection, $query);
?>