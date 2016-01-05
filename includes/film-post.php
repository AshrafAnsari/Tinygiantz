<?php

echo "\t\t<div onmouseleave=\"mouseleave(" . $row["PostID"] . ");\" class=\"post-container\">\n\t";
echo "\t\t\t<div class=\"post-title\">\n\t";
echo "\t\t\t\t<a class=\"post-title-link\" href=\"/?postid=" . $row["PostID"] . "\">" . $row["Title"] . "</a>\n\t";
echo "\t\t\t</div>\n\t";
echo "\t\t\t<div onclick=\"showVideo(" . $row["PostID"] . ");\" class=\"post-video\">\n\t";
echo "\t\t\t\t<div class=\"video-responsive\" style=\"background: url(" . $row["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
echo "\t\t\t\t\t<div class=\"video-overlay\"></div>\n\t";
echo "\t\t\t\t\t<iframe class=\"video-frame\" id=\"video" . $row["PostID"] . "\" src=\"" . $row["VideoURL"] . "?api=1&player_id=video" . $row["PostID"] . "\" width=\"100px\" height=\"70px\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen>\n\t";
echo "\t\t\t\t\t</iframe>\n\t";
echo "\t\t\t\t</div>\n\t";
echo "\t\t\t</div>\n\t";		
echo "\t\t\t<div class=\"expander-hover\">\n\t";
echo "\t\t\t\t<div class=\"post-description\">\n\t";
echo "\t\t\t\t\t" . $row["Description"] . "\n\t";		
echo "\t\t\t\t</div>\n\t";	
echo "\t\t\t\t<div id=\"post-readmore-container" . $row["PostID"] . "\" class=\"post-readmore-container\">\n\t";
echo "\t\t\t\t\t<button onclick=\"mouseenter(" . $row["PostID"] . ");\" class=\"button-readmore\" id=\"button-readmore" . $row["PostID"] . "\" type=\"button\">\n\t";
echo "\t\t\t\t\t\tMore information and options\n\t";
echo "\t\t\t\t\t</button>\n\t";
echo "\t\t\t\t</div>\n\t";
echo "\t\t\t\t<div id=\"post-button-container" . $row["PostID"] . "\" class=\"post-button-container\">\n\t";
echo "\t\t\t\t\t<button id=\"button-credits" . $row["PostID"] . "\" onclick=\"showCredits(" . $row["PostID"] . ");\" type=\"button\">\n\t";
echo "\t\t\t\t\t\tCredits\n\t";
echo "\t\t\t\t\t</button>\n\t";
echo "\t\t\t\t\t<button id=\"button-trivia" . $row["PostID"] . "\" onclick=\"showTrivia(" . $row["PostID"] . ");\" type=\"button\">\n\t";
echo "\t\t\t\t\t\tTrivia\n\t";
echo "\t\t\t\t\t</button>\n\t";
echo "\t\t\t\t\t<button type=\"button\">Links</button><button type=\"button\">Like</button><button type=\"button\">Share</button><button type=\"button\">\n\t";
echo "\t\t\t\t\t\tComment\n\t";
echo "\t\t\t\t\t</button>\n\t";
echo "\t\t\t\t\t<button type=\"button\">\n\t";
echo "\t\t\t\t\t\tReport\n\t";
echo "\t\t\t\t\t</button>\n\t";
echo "\t\t\t\t</div>\n\t";
echo "\t\t\t\t<div class=\"movie-trivia\" id=\"expander" . $row["PostID"] . "\">\n\t";
echo "\t\t\t\t\t<div class=\"post-film-credits\" id=\"post-film-credits" . $row["PostID"] . "\">\n\t";

if($row["Director"] != ""){
	echo "\t\t\t\t\t\t<span class=\"post-expander-header\">" . $director . ": </span>\n\t";
	echo "\t\t\t\t\t\t" . $row["Director"] . "\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
}
if($row["Producer"] != ""){
	echo "\t\t\t\t\t\t<span class=\"post-expander-header\">" . $producer . ": </span>\n\t";
	echo "\t\t\t\t\t\t" . $row["Producer"] . "\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
}
if($row["Screenplay"] != ""){
	echo "\t\t\t\t\t\t<span class=\"post-expander-header\">Screenplay: </span>\n\t";
	echo "\t\t\t\t\t\t" . $row["Screenplay"] . "\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
}
if($row["DoP"] != ""){
	echo "\t\t\t\t\t\t<span class=\"post-expander-header\">DoP: </span>\n\t";
	echo "\t\t\t\t\t\t" . $row["DoP"] . "\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
}
if($row["Cast"] != ""){
	echo "\t\t\t\t\t\t<span class=\"post-expander-header\">Cast: </span>\n\t";
	echo "\t\t\t\t\t\t" . $row["Cast"] . "\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
	echo "\t\t\t\t\t\t<br>\n\t";
}
if($row["Year"] != ""){
	echo "\t\t\t\t\t\t<span class=\"post-expander-header\">Year :</span>\n\t";
	echo "\t\t\t\t\t\t" . $row["Year"] . "\n\t";;	
}

echo "\t\t\t\t\t</div>\n\t";
echo "\t\t\t\t\t<div class=\"post-film-trivia\" id=\"post-film-trivia" . $row["PostID"] . "\">\n\t";
echo "\t\t\t\t\t\t" . $row["Trivia"] . "\n\t";
echo "\t\t\t\t\t</div>\n\t";
echo "\t\t\t\t</div>\n\t";
echo "\t\t\t\t<div class=\"post-footer\">\n\t";
echo "\t\t\t\t\t<table class=\"post-publication-date\">\n\t";
echo "\t\t\t\t\t\t<tr>\n\t";
echo "\t\t\t\t\t\t\t<td>\n\t";
echo "\t\t\t\t\t\t\t\t" . $row["PublicationDate"] . " - " . substr($row["PublicationTime"], 0, -3) . " CET\n\t";
echo "\t\t\t\t\t\t\t</td>\n\t";
echo "\t\t\t\t\t\t<tr>\n\t";
echo "\t\t\t\t\t</table>\n\t";
echo "\t\t\t\t</div>\n\t";
echo "\t\t\t</div>\n\t";
echo "\t\t</div>\n\t";

?>