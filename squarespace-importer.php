<meta charset="utf-8">
<?php

$screenOutput = "yes";

if ($_GET["output"] == "yes"){
	$screenOutput = "yes";
}

function substring($str, $from = 0, $to = FALSE)
{
	if ($to !== FALSE) {
		if ($from == $to || ($from <= 0 && $to < 0)) {
			return '';
		}
		if ($from > $to) {
			$from_copy = $from;
			$from = $to;
			$to = $from_copy;
		}
	}
	if ($from < 0) {
		$from = 0;
	}
	$substring = $to === FALSE ? substr($str, $from) : substr($str, $from, $to - $from);
	return ($substring === FALSE) ? '' : $substring;
}

function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

date_default_timezone_set("Europe/Paris");
$date = date("Y-m-d H:i:s", time());
$fileArray = explode("<title>", file_get_contents(glob('./uploads/*.xml')[0], false));
$filmsArray = array();
$new_i = 1;

for ( $i = 0; $i < (sizeof($fileArray)); $i++ ) {
	
	$postPubStatus = get_string_between($fileArray[$i], "<wp:status>", "</wp:status>");
	$postPicture = get_string_between($fileArray[$i], "<wp:attachment_url>", "</wp:attachment_url>");
	$postPubDate = get_string_between($fileArray[$i], "<wp:post_date>", "</wp:post_date>");
	$postPubUser = get_string_between($fileArray[$i], "<dc:creator>", "</dc:creator>");
	$postExtLink = get_string_between($fileArray[$i], "<content:encoded><![CDATA[<iframe src=\"//", "</content:encoded>");
	$postDescription = get_string_between($fileArray[$i], "<div class=\"MovieDescription\">", "</div><div class=\"MovieTrivia\">");
	$postDirector = get_string_between($fileArray[$i], "Director:</td><td class=\"trivia_right\">", "</td></tr><tr><td class=\"trivia_left\">Producer:");
	$postProducer = get_string_between($fileArray[$i], "Producer:</td><td class=\"trivia_right\">", "</td></tr><tr><td class=\"trivia_left\">Screenplay:");
	$postScreenplay = get_string_between($fileArray[$i], "Screenplay:</td><td class=\"trivia_right\">", "</td></tr><tr><td class=\"trivia_left\">DoP:");
	$postDoP = get_string_between($fileArray[$i], "DoP:</td><td class=\"trivia_right\">", "</td></tr><tr><td class=\"trivia_left\">Cast:");
	$postCast = get_string_between($fileArray[$i], "Cast:</td><td class=\"trivia_right\">", "</td></tr><tr><td class=\"trivia_left\">Year:");
	$postYear = get_string_between($fileArray[$i], "Year:</td><td class=\"trivia_right\">", "</td></tr><tr><td class=\"trivia_left\">Trivia:");
	$postTrivia = get_string_between($fileArray[$i], "Trivia:</td><td class=\"trivia_right\">", "</td></tr></table></div></div>]]>");
	$postCategory = get_string_between($fileArray[$i], "<category domain=\"category\" nicename=\"", "\"><![CDATA[");
	$postLength = get_string_between($fileArray[$i], "<category domain=\"post_tag\" nicename=\"t", "\"><![CDATA[");
	$postTitleEnd = strpos($fileArray[$i], "/iframe");
	$postTitleEnd2 = strpos($fileArray[$i], "</title>");
	$postTitleStart3 = strpos($fileArray[$i], "<link>") + 6;
	$postTitleEnd3 = strpos($fileArray[$i], "</link>");
	$postTitleStart4 = strpos($fileArray[$i], "src=&quot;//") + 12;
	$fileArray[$i] = substr($fileArray[$i], 0, $postTitleEnd);
	$postTitle = substr($fileArray[$i], 0, $postTitleEnd2);
	$postIntLink = substring($fileArray[$i], $postTitleStart3, $postTitleEnd3);
	$postTitle4 = substring($fileArray[$i], $postTitleStart4);
	$postTitleEnd4 = strpos($postExtLink, "?");
	$postExtLink = substring($postExtLink, 0, $postTitleEnd4);
	$postTitle6Start = strrpos($postExtLink, "/");
	$postVideoID = substr($postExtLink, $postTitle6Start +1);
	$postID = get_string_between($fileArray[$i+1], "attachment-", "</title>");
	
	if (date('I', strtotime($postPubDate)) == date("I", time()))
	{
		$postPubDate = strtotime("+1 hour", strtotime($postPubDate));
		$postPubDate = date("Y-m-d H:i:s", $postPubDate);
	}
	if (date('I', strtotime($postPubDate)) != date("I", time()))
	{
		$postPubDate = strtotime("+2 hour", strtotime($postPubDate));
		$postPubDate = date("Y-m-d H:i:s", $postPubDate);
	}
	
	$seconds =  strtotime($date) - strtotime($postPubDate);
	$days = floor($seconds / 86400);
	$seconds %= 86400;
	$hours = floor($seconds / 3600);
	$seconds %= 3600;
	$minutes = floor($seconds / 60);
	$seconds %= 60;
	
	if ($postPubDate <= $date){
		$postPublished = "Yes";
	}
	if ($postPubDate > $date){
		$postPublished = "No";
	}
	if ($postPubStatus == "pending" || $postPubDate > $date){
		$postPubStatus = "Pending";
		$postTimeDiff = "N/A";
	}
	if ($postPubStatus == "publish" && $postPubDate <= $date){
		$postPubStatus = "Published";
		$postTimeDiff = "$days days, $hours hours, $minutes minutes, $seconds seconds";
	}	
	if ($postPubUser == "kims.second@gmail.com") {
		$postPubUser = "Kim Hansen";
	}
	if ($postPubUser == "square@tinygiantz.com") {
		$postPubUser = "Abdi Abukar";
	}
	if ($postIntLink != "") {
		$postIntLink = "http://www.tinygiantz.com" . $postIntLink; 
	}
	if ($postExtLink != "") {
		$postExtLink = "http://" . $postExtLink; 
	}
	$postVideoHost = get_string_between($postExtLink, "http://", ".com");

	if ($postVideoHost == "player.vimeo") {
		$postVideoHost = "Vimeo";
	}
	if ($postVideoHost == "www.youtube") {
		$postVideoHost = "YouTube";
	}
	
	
	$postDirectorArray = explode(", ", $postDirector);
	for ( $k = 0; $k < (sizeof($postDirectorArray)); $k++ ){
		$postDirectorArray[$k] = get_string_between($postDirectorArray[$k], "\">", "</a>");
	}
	$postDirector = implode(", ", $postDirectorArray);
	
	
	$postProducerArray = explode(", ", $postProducer);
	for ( $k = 0; $k < (sizeof($postProducerArray)); $k++ ){
		$postProducerArray[$k] = get_string_between($postProducerArray[$k], "\">", "</a>");
	}
	$postProducer = implode(", ", $postProducerArray);
	
	
	$postScreenplayArray = explode(", ", $postScreenplay);
	for ( $k = 0; $k < (sizeof($postScreenplayArray)); $k++ ){
		$postScreenplayArray[$k] = get_string_between($postScreenplayArray[$k], "\">", "</a>");
	}
	$postScreenplay = implode(", ", $postScreenplayArray);
	
	
	$postDoPArray = explode(", ", $postDoP);
	for ( $k = 0; $k < (sizeof($postDoPArray)); $k++ ){
		$postDoPArray[$k] = get_string_between($postDoPArray[$k], "\">", "</a>");
	}
	$postDoP = implode(", ", $postDoPArray);

	
	$postCastArray = explode(", ", $postCast);
	for ( $k = 0; $k < (sizeof($postCastArray)); $k++ ){
		$postCastArray[$k] = get_string_between($postCastArray[$k], "\">", "</a>");
	}
	$postCast = implode(", ", $postCastArray);
	
	$postYear = get_string_between($postYear, "\">", "</a>");
		
	
	
	if($postVideoID != "") {
		array_push($filmsArray, array(
			"Video #" => $new_i++,
			"Title" => $postTitle,
			"Description" => $postDescription,
			//"Post ID" => $postID,
			"Video host" => $postVideoHost,
			"Video ID" => $postVideoID,
			"Internal link" => $postIntLink,
			"External link" => $postExtLink,
			"Post status" => $postPubStatus,
			"Publish date" => $postPubDate,
			//"Current date" => $date,
			//"Live since" => $postTimeDiff,
			"Publisher" => $postPubUser,
			"Director" => $postDirector,
			"Producer" => $postProducer,
			"Screenplay" => $postScreenplay,
			"DoP" => $postDoP,
			"Cast" => $postCast,
			"Year" => $postYear,
			"Trivia" => $postTrivia,
			"Picture" => $postPicture,
			"Category" => $postCategory,
			"Video length" => $postLength,
		));
	}
}

unset($fileArray);

function search($array, $key, $value){ 
	$results = array(); 
	if (is_array($array)) 
	{ 
		if (isset($array[$key]) && $array[$key] == $value) 
			$results[] = $array;
		foreach ($array as $subarray) 
			$results = array_merge($results, search($subarray, $key, $value)); 
	} 
	return $results; 
}

function GetKey($key, $search){
	foreach ($search as $array)
	{
		if (array_key_exists($key, $array))
		{
			return $array[$key];
		}
	}
	return false;
}

$filmToCheck = search($filmsArray, "Video #", $iterationCheck);
$filmToCheckNumber = GetKey("Video #", $filmToCheck);
$filmToCheckID = GetKey("Video ID", $filmToCheck);
$filmToCheckTitle = GetKey("Title", $filmToCheck);
$filmToCheckPostID = GetKey("Post ID", $filmToCheck);
$filmToCheckHost = GetKey("Video host", $filmToCheck);
$filmToCheckCurrentDate = GetKey("Current date", $filmToCheck);
$filmToCheckPublishDate = GetKey("Publish date", $filmToCheck);
$filmToCheckIntLink = GetKey("Internal link", $filmToCheck);
$filmToCheckExtLink = GetKey("External link", $filmToCheck);
$filmToCheckPostStatus = GetKey("Post status", $filmToCheck);
$filmToCheckPostLivePeriod = GetKey("Live since", $filmToCheck);
$filmToCheckPostPublisher = GetKey("Publisher", $filmToCheck);

if ($screenOutput == "yes"){
	//print_r($filmToCheck);	
}

if ($screenOutput == "yes"){
	//print_r($filmsArray);
		
	for($l = 0; $l < sizeof($filmsArray); $l++){

		
		if($filmsArray[$l]["Post status"] == "Published" && $filmsArray[$l]["Title"] != "Damned" && $filmsArray[$l]["Title"] != "Carousel"){
		
			$servername = "localhost";
			$username = "ktulu";
			$password = "rgclw3jtrpgh3drc";
			$dbname = "Tinygiantz";

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$sqlPublishDate = mysqli_real_escape_string($conn, $filmsArray[$l]["Publish date"]);
			//$sqlPostId = mysqli_real_escape_string($conn, $filmsArray[$l]["Video #"]);
			//$sqlPostId = uniqid();
			$sqlPostId = round(microtime(true) * 1000);
			$sqlTitle = mysqli_real_escape_string($conn, $filmsArray[$l]["Title"]);
			$sqlDescription = mysqli_real_escape_string($conn, $filmsArray[$l]["Description"]);
			$sqlDirector = mysqli_real_escape_string($conn, $filmsArray[$l]["Director"]);
			$sqlProducer = mysqli_real_escape_string($conn, $filmsArray[$l]["Producer"]);
			$sqlScreenplay = mysqli_real_escape_string($conn, $filmsArray[$l]["Screenplay"]);
			$sqlDop = mysqli_real_escape_string($conn, $filmsArray[$l]["DoP"]);
			$sqlCast = mysqli_real_escape_string($conn, $filmsArray[$l]["Cast"]);
			$sqlYear = mysqli_real_escape_string($conn, $filmsArray[$l]["Year"]);
			$sqlTrivia = mysqli_real_escape_string($conn, $filmsArray[$l]["Trivia"]);
			$sqlExternalLink = mysqli_real_escape_string($conn, $filmsArray[$l]["External link"]);
			$sqlVideoHost = mysqli_real_escape_string($conn, $filmsArray[$l]["Video host"]);
			$sqlVideoId = mysqli_real_escape_string($conn, $filmsArray[$l]["Video ID"]);
			//$sqlVideoId = $sqlPostId;
			$sqlPostStatus = mysqli_real_escape_string($conn, $filmsArray[$l]["Post status"]);
			$sqlPublisher = mysqli_real_escape_string($conn, $filmsArray[$l]["Publisher"]);
			$sqlPicture = mysqli_real_escape_string($conn, $filmsArray[$l]["Picture"]);
			$sqlCategory = mysqli_real_escape_string($conn, $filmsArray[$l]["Category"]);
			$sqlVideoLength = mysqli_real_escape_string($conn, $filmsArray[$l]["Video length"]);
			
			$sql = "INSERT INTO Films (PublicationDate, PostID, Title, Description, Director, Producer, Screenplay, DoP, Cast, Year, Trivia, VideoURL, VideoHost, VideoID, PostStatus, Publisher, Picture, Category, VideoLength) VALUES ('$sqlPublishDate','$sqlPostId','$sqlTitle','$sqlDescription','$sqlDirector','$sqlProducer','$sqlScreenplay','$sqlDop','$sqlCast','$sqlYear','$sqlTrivia','$sqlExternalLink','$sqlVideoHost','$sqlVideoId','$sqlPostStatus','$sqlPublisher','$sqlPicture','$sqlCategory','$sqlVideoLength')";

			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully<br><br>";
			}
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br><br>";
			}

			mysqli_close($conn);	

			}
	}
	
	
}


?>