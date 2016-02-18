<?php
if (strpos($post["Director"], ",") > -1) {
	$director = "Directors";
}
else {
	$director = "Director";
}
if (strpos($post["Producer"], ",") > -1) {
	$producer = "Producers";
}
else {
	$producer = "Producer";
}
$post["PublicationDate"] = date('F j, Y', strtotime($post["PublicationDate"]));
$last_period = strrpos($post["Picture"], ".");
$image_format = substr($post["Picture"], $last_period);
?>