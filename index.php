<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script src="//use.typekit.net/lqk4yck.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<script src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
		<script src="scripts/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/style.css"/>
		<link rel="stylesheet" type="text/css" href="styles/mobile-style.css"/>
		<?php

		$postId = htmlspecialchars($_GET["postid"]);
		$date = date("Y-m-d", time());
		$servername = "localhost";
		$username = "ktulu";
		$password = "rgclw3jtrpgh3drc";
		$dbname = "Tinygiantz";
		$connection = mysqli_connect($servername, $username, $password, $dbname);

		if($postId != ""){

			$sqlQueryFacebookMetaData = "SELECT * FROM Films WHERE PostID='$postId'";
			$sqlResultFacebookMetaData = mysqli_query($connection, $sqlQueryFacebookMetaData);
			$rowFacebookMetaData = mysqli_fetch_assoc($sqlResultFacebookMetaData);
			$FacebookMetaData_PostTitle = $rowFacebookMetaData["Title"];
			$FacebookMetaData_PostUrl = "http://port-80.62ce3nujfcnv1jorg5mbtrdbjvdholxr7rhh0qdiuqujif6r.box.codeanywhere.com/?postid=". $rowFacebookMetaData["PostID"];
			$FacebookMetaData_PostTitle = $rowFacebookMetaData["Title"];
			$FacebookMetaData_PostType = "article";
			$FacebookMetaData_PostDescription = $rowFacebookMetaData["Description"];
			$FacebookMetaData_PostImage = $rowFacebookMetaData["Picture"];
			$PageTitle_Post = $rowFacebookMetaData["Title"];

			echo "<title>Tinygiantz - $PageTitle_Post</title>\n\t";
			echo "\t<meta property=\"og:site_name\" content=\"Tinygiantz\"/>\n\t";
			echo "\t<meta property=\"og:title\" content=\"$FacebookMetaData_PostTitle\"/>\n\t";
			echo "\t<meta property=\"og:url\" content=\"$FacebookMetaData_PostUrl\"/>\n\t";
			echo "\t<meta property=\"og:type\" content=\"article\"/>\n\t";
			echo "\t<meta property=\"og:description\" content=\"$FacebookMetaData_PostDescription\"/>\n\t";
			echo "\t<meta property=\"og:image\" content=\"$FacebookMetaData_PostImage\"/>\n";

		}
		else {

			echo "<title>Tinygiantz (development)</title>\n\t";
			echo "\t<meta property=\"og:site_name\" content=\"Tinygiantz\"/>\n\t";
			echo "\t<meta property=\"og:title\" content=\"Tinygiantz\"/>\n\t";
			echo "\t<meta property=\"og:url\" content=\"http://www.tinygiantz.com/\"/>\n\t";
			echo "\t<meta property=\"og:type\" content=\"website\"/>\n\t";
			echo "\t<meta property=\"og:image\" content=\"http://static1.squarespace.com/static/52f77f57e4b0e482df7ba5c1/t/54b4094de4b0ac5b7ad2283d/1425017410098/?format=1000w\"/>\n";

		}

		?>
	</head>
	<body>
		<header id="header">
			<div id="title">
				<a id="title-link" href="/">Tinygiantz</a>
			</div>
			<div id="header-navigation">
				<ul>
					<li class="header-navigation-category" id="header-navigation-action">
						<a href="/?category=action">ACTION</a>
						<div class="header-time-selection">
							<ul>
								<li><a href="/?category=action&length=0-5">0-5 MIN</a></li>
								<li><a href="/?category=action&length=5-15">5-15 MIN</a></li>
								<li><a href="/?category=action&length=15-30">15-30 MIN</a></li>
								<li><a href="/?category=action&length=30-60">30-60 MIN</a></li>
							</ul>
						</div>
					</li>
					<li class="header-navigation-category" id="header-navigation-animation">
						<a href="/?category=animation">ANIMATION</a>
						<div class="header-time-selection">
							<ul>
								<li><a href="/?category=animation&length=0-5">0-5 MIN</a></li>
								<li><a href="/?category=animation&length=5-15">5-15 MIN</a></li>
								<li><a href="/?category=animation&length=15-30">15-30 MIN</a></li>
								<li><a href="/?category=animation&length=30-60">30-60 MIN</a></li>
							</ul>
						</div>
					</li>
					<li class="header-navigation-category" id="header-navigation-comedy">
						<a href="/?category=comedy">COMEDY</a>
						<div class="header-time-selection">
							<ul>
								<li><a href="/?category=comedy&length=0-5">0-5 MIN</a></li>
								<li><a href="/?category=comedy&length=5-15">5-15 MIN</a></li>
								<li><a href="/?category=comedy&length=15-30">15-30 MIN</a></li>
								<li><a href="/?category=comedy&length=30-60">30-60 MIN</a></li>
							</ul>
						</div>
					</li>
					<li class="header-navigation-category" id="header-navigation-documentary">
						<a href="/?category=documentary">DOCUMENTARY</a>
						<div class="header-time-selection">
							<ul>
								<li><a href="/?category=documentary&length=0-5">0-5 MIN</a></li>
								<li><a href="/?category=documentary&length=5-15">5-15 MIN</a></li>
								<li><a href="/?category=documentary&length=15-30">15-30 MIN</a></li>
								<li><a href="/?category=documentary&length=30-60">30-60 MIN</a></li>
							</ul>
						</div>
					</li>
					<li class="header-navigation-category" id="header-navigation-drama">
						<a href="/?category=drama">DRAMA</a>
						<div class="header-time-selection">
							<ul>
								<li><a href="/?category=drama&length=0-5">0-5 MIN</a></li>
								<li><a href="/?category=drama&length=5-15">5-15 MIN</a></li>
								<li><a href="/?category=drama&length=15-30">15-30 MIN</a></li>
								<li><a href="/?category=drama&length=30-60">30-60 MIN</a></li>
							</ul>
						</div>
					</li>
					<li class="header-navigation-category" id="header-navigation-suspense">
						<a href="/?category=suspense">SUSPENSE</a>
						<div class="header-time-selection">
							<ul>
								<li><a href="/?category=suspense&length=0-5">0-5 MIN</a></li>
								<li><a href="/?category=suspense&length=5-15">5-15 MIN</a></li>
								<li><a href="/?category=suspense&length=15-30">15-30 MIN</a></li>
								<li><a href="/?category=suspense&length=30-60">30-60 MIN</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</header>
	<?php

	$pageNumber = htmlspecialchars($_GET["page"]) + 0;
	$pageNumberCurrent = 0;
	if(is_int($pageNumber)){
		$pageNumberCurrent = $pageNumber;
		if($pageNumber == 1 || $pageNumber == 0){
			$pageNumber = 0;
			$pageNumberCurrent = 1;
		}
		else {
			$pageNumber = ($pageNumber * 10) - 10;
		}
	}
	else {
		$pageNumber = 0;
	}
	$pageNumberNextMulti = $pageNumberCurrent + 1;
	$pageNumberPreviousMulti = $pageNumberCurrent - 1;
	if($pageNumberCurrent == 1){
		$pageNumberPreviousMulti = 1;
	}

	$category = htmlspecialchars($_GET["category"]);
	$length = htmlspecialchars($_GET["length"]);

	if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if($postId != ""){
		$sqlQuerySinglePage = "SELECT * FROM Films WHERE PostID='$postId'";
		$sqlResultSinglePage = mysqli_query($connection, $sqlQuerySinglePage);

		$sqlQuerySinglePageIndex = "SELECT t.PageIndex FROM (SELECT *, (@rownum := @rownum + 1) PageIndex FROM Films, (SELECT @rownum := 0) t WHERE PostStatus = 'Published' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC) t WHERE PostID = '$postId'";
		$sqlResultSinglePageIndex = mysqli_query($connection, $sqlQuerySinglePageIndex);
		$rowPageIndex = mysqli_fetch_assoc($sqlResultSinglePageIndex);
		$pageIndexCurrent = $rowPageIndex["PageIndex"];

		$sqlQuerySinglePageDate = "SELECT * FROM Films WHERE PostID='$postId'";
		$sqlResultSinglePageDate = mysqli_query($connection, $sqlQuerySinglePageDate);
		$rowDateCurrent = mysqli_fetch_assoc($sqlResultSinglePageDate);
		$pageDateCurrent = $rowDateCurrent["PublicationDate"];
		$pageTimeCurrent = $rowDateCurrent["PublicationTime"];

		$sqlQuerySinglePagePrevious = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime='$pageTimeCurrent' AND PostID>'$postId' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,1";
		$sqlResultSinglePagePrevious = mysqli_query($connection, $sqlQuerySinglePagePrevious);
		$rowPrevious = mysqli_fetch_assoc($sqlResultSinglePagePrevious);
		$pageNumberPreviousSingle = $rowPrevious["PostID"];
		$pageNumberPreviousDate = $rowPrevious["PublicationDate"];
		$pageNumberPreviousTime = $rowPrevious["PublicationTime"];
		$pageNumberPreviousTitle = $rowPrevious["Title"];

		if($pageNumberPreviousTitle == ""){
			$sqlQuerySinglePagePrevious3 = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime>'$pageTimeCurrent' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
			$sqlResultSinglePagePrevious3 = mysqli_query($connection, $sqlQuerySinglePagePrevious3);
			$rowPrevious3 = mysqli_fetch_assoc($sqlResultSinglePagePrevious3);
			$pageNumberPreviousSingle = $rowPrevious3["PostID"];
			$pageNumberPreviousTitle = $rowPrevious3["Title"];
		}

		if($pageNumberPreviousTitle == ""){
			$sqlQuerySinglePagePrevious2 = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate>'$pageDateCurrent' ORDER BY PublicationDate ASC, PublicationTime ASC, PostID ASC LIMIT 0,1";
			$sqlResultSinglePagePrevious2 = mysqli_query($connection, $sqlQuerySinglePagePrevious2);
			$rowPrevious2 = mysqli_fetch_assoc($sqlResultSinglePagePrevious2);
			$pageNumberPreviousSingle = $rowPrevious2["PostID"];
			$pageNumberPreviousTitle = $rowPrevious2["Title"];
		}

		$sqlQuerySinglePageNext = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime='$pageTimeCurrent' AND PostID<'$postId' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
		$sqlResultSinglePageNext = mysqli_query($connection, $sqlQuerySinglePageNext);
		$rowNext = mysqli_fetch_assoc($sqlResultSinglePageNext);
		$pageNumberNextSingle = $rowNext["PostID"];
		$pageNumberNextDate = $rowNext["PublicationDate"];
		$pageNumberNextTime = $rowNext["PublicationTime"];
		$pageNumberNextTitle = $rowNext["Title"];

		if($pageNumberNextTitle == ""){
			$sqlQuerySinglePageNext3 = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime<'$pageTimeCurrent' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
			$sqlResultSinglePageNext3 = mysqli_query($connection, $sqlQuerySinglePageNext3);
			$rowNext3 = mysqli_fetch_assoc($sqlResultSinglePageNext3);
			$pageNumberNextSingle = $rowNext3["PostID"];
			$pageNumberNextTitle = $rowNext3["Title"];
		}

		if($pageNumberNextTitle == ""){
			$sqlQuerySinglePageNext2 = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate<'$pageDateCurrent' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
			$sqlResultSinglePageNext2 = mysqli_query($connection, $sqlQuerySinglePageNext2);
			$rowNext2 = mysqli_fetch_assoc($sqlResultSinglePageNext2);
			$pageNumberNextSingle = $rowNext2["PostID"];
			$pageNumberNextTitle = $rowNext2["Title"];
		}

		$sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date'";
		$sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
		$totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
		$totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);

	}
	else {	
		if($category != "" && $length == ""){
			$sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = '$category' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
			$sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

			$sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND Category = '$category'";
			$sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
			$totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
			$totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
		}
		else if($category != "" && $length != ""){
			$sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = '$category' AND VideoLength = '$length' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
			$sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

			$sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND Category = '$category' AND Length = '$length'";
			$sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
			$totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
			$totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
		}
		else{
			$sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
			$sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

			$sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date'";
			$sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
			$totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
			$totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
		}


	}

	$sqlQueryFeaturedFilms = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Featured = 'Yes' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultFeaturedFilms = mysqli_query($connection, $sqlQueryFeaturedFilms);

	$sqlQueryFilmOfTheDay = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' ORDER BY RAND() LIMIT 1";
	$sqlResultFilmOfTheDay = mysqli_query($connection, $sqlQueryFilmOfTheDay);

	$sqlQueryNewFilms = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilms = mysqli_query($connection, $sqlQueryNewFilms);

	$sqlQueryNewFilmsAction = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = 'Action' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilmsAction = mysqli_query($connection, $sqlQueryNewFilmsAction);

	$sqlQueryNewFilmsAnimation = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = 'Animation' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilmsAnimation = mysqli_query($connection, $sqlQueryNewFilmsAnimation);

	$sqlQueryNewFilmsComedy = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = 'Comedy' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilmsComedy = mysqli_query($connection, $sqlQueryNewFilmsComedy);

	$sqlQueryNewFilmsDocumentary = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = 'Documentary' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilmsDocumentary = mysqli_query($connection, $sqlQueryNewFilmsDocumentary);

	$sqlQueryNewFilmsDrama = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = 'Drama' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilmsDrama = mysqli_query($connection, $sqlQueryNewFilmsDrama);

	$sqlQueryNewFilmsSuspense = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = 'Suspense' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,5";
	$sqlResultNewFilmsSuspense = mysqli_query($connection, $sqlQueryNewFilmsSuspense);

	$newFilmsTitle = array();
	$newFilmsPicture = array();
	$newFilmsPostId = array();

	while($rowNewFilms = mysqli_fetch_assoc($sqlResultNewFilms)) {
		array_push($newFilmsTitle, $rowNewFilms["Title"]);
		array_push($newFilmsPicture, $rowNewFilms["Picture"]);
		array_push($newFilmsPostId, $rowNewFilms["PostID"]);
	}

	echo "\t<div class=\"page-sidebar-container\">\n\t";
	echo "\t\t<input type=\"search\" class=\"search-box-input\" value=\"\" placeholder=\"Search\" id=\"search-box-input\"/>\n\t";
	echo "\t\t<div class=\"page-sidebar-divider-title\">FILM SELECTION</div>\n\t";
	echo "\t\t<div class=\"page-sidebar-link-container\">\n\t";
	echo "\t\t\t<ul>\n\t";
	echo "\t\t\t\t<li>CREDITED NAMES</li>\n\t";
	echo "\t\t\t\t<li>RELEASE YEARS</li>\n\t";
	echo "\t\t\t</ul>\n\t";
	echo "\t\t</div>\n\t";
	echo "\t\t<div class=\"page-sidebar-divider-title\">INFORMATION</div>\n\t";
	echo "\t\t<div class=\"page-sidebar-link-container\">\n\t";
	echo "\t\t\t<ul>\n\t";
	echo "\t\t\t\t<li>ABOUT US</li>\n\t";
	echo "\t\t\t\t<li>CONTACT US</li>\n\t";
	echo "\t\t\t\t<li>SUBMIT A FILM</li>\n\t";
	echo "\t\t\t</ul>\n\t";
	echo "\t\t</div>\n\t";
	echo "\t\t<div class=\"page-sidebar-divider-title\">LINKS</div>\n\t";
	echo "\t\t<div class=\"page-sidebar-link-container\">\n\t";
	echo "\t\t\t<ul>\n\t";
	echo "\t\t\t\t<li><a href=\"http://www.tinygiantz.com/?format=rss\" class=\"rss-link\">TINYGIANTZ RSS</a></li>\n\t";
	echo "\t\t\t</ul>\n\t";
	echo "\t\t</div>";
	echo "\t\t<div class=\"page-sidebar-divider-title\">SHARE</div>\n\t";
	echo "\t\t<div id=\"likesharebuttonslist\">\n\t";
	echo "\t\t\t<div class=\"likesharebutton\" id=\"fblikeshare\">\n\t";
	echo "\t\t\t\t<iframe id=\"fbframe\" src=\"//www.facebook.com/plugins/like.php?locale=en_US&amp;href=http%3A%2F%2Fwww.tinygiantz.com&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=\" 21\"scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; height:21px;\" allowtransparency=\"true\">\n\t";
	echo "\t\t\t\t</iframe>\n\t";
	echo "\t\t\t</div>\n\t";
	echo "\t\t\t<div class=\"likesharebutton\" id=\"twitterlikeshare\" align=\"left\">\n\t";
	echo "\t\t\t\t<iframe id=\"twitter-widget-0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" src=\"http://platform.twitter.com/widgets/tweet_button.1393899192.html#_=1394787522397&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fwww.tinygiantz.com%2F&amp;size=m&amp;text=TinyGiantz&amp;url=http%3A%2F%2Fwww.tinygiantz.com&amp;via=TinyGiantz\" class=\"twitter-share-button twitter-tweet-button twitter-count-horizontal\" title=\"Twitter Tweet Button\" data-twttr-rendered=\"true\" style=\"width: 121px; height: 20px;\">\n\t";
	echo "\t\t\t\t</iframe>\n\t";
	echo "\t\t\t</div>\n\t";
	echo "\t\t\t<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');\n\t";
	echo "\t\t\t</script>\n\t";
	echo "\t\t\t<div id=\"___plusone_0\" style=\"text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background-position: initial initial; background-repeat: initial initial;\">\n\t";
	echo "\t\t\t\t<iframe frameborder=\"0\" hspace=\"0\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"no\" style=\"position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;\" tabindex=\"0\" vspace=\"0\" width=\"100%\" id=\"I0_1394787522431\" name=\"I0_1394787522431\" src=\"https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Fwww.tinygiantz.com&amp;url=http%3A%2F%2Fwww.tinygiantz.com%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.sv.KD2PimgGzeE.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTNFHDH1pmC3Hhng2W36BR70bXCUvg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1394787522431&amp;parent=http%3A%2F%2Fwww.tinygiantz.com&amp;pfname=&amp;rpctoken=22289990\" data-gapiattached=\"true\" title=\"+1\">\n\t";
	echo "\t\t\t\t</iframe>\n\t";
	echo "\t\t\t</div>\n\t";
	echo "\t\t\t<script type=\"text/javascript\">(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/platform.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();\n\t";
	echo "\t\t\t</script>\n\t";
	echo "\t\t</div>\n\t";

	if($postId == ""){

		echo "\t\t<div class=\"page-sidebar-divider-title\">FILM OF THE DAY</div>\n\t";

		if (mysqli_num_rows($sqlResultFilmOfTheDay) > 0) {
			while($rowFilmOfTheDay = mysqli_fetch_assoc($sqlResultFilmOfTheDay)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . $rowFilmOfTheDay["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . $rowFilmOfTheDay["PostID"] . ");\" class=\"filmoftheday-container\" id=\"featured-film-container" . $rowFilmOfTheDay["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowFilmOfTheDay["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowFilmOfTheDay["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>". $rowFilmOfTheDay["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . $rowFilmOfTheDay["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowFilmOfTheDay["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">EDITORS' PICKS</div>\n\t";

		if (mysqli_num_rows($sqlResultFeaturedFilms) > 0) {
			while($rowFeaturedFilms = mysqli_fetch_assoc($sqlResultFeaturedFilms)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "2" . $rowFeaturedFilms["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "2" . $rowFeaturedFilms["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "2" . $rowFeaturedFilms["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowFeaturedFilms["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowFeaturedFilms["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowFeaturedFilms["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "2" . $rowFeaturedFilms["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowFeaturedFilms["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">NEW IN ACTION</div>\n\t";

		if (mysqli_num_rows($sqlResultNewFilmsAction) > 0) {
			while($rowNewFilmsAction = mysqli_fetch_assoc($sqlResultNewFilmsAction)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "3" . $rowNewFilmsAction["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "3" . $rowNewFilmsAction["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "3" . $rowNewFilmsAction["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowNewFilmsAction["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsAction["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowNewFilmsAction["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "3" . $rowNewFilmsAction["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowNewFilmsAction["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">NEW IN ANIMATION</div>\n\t";

		if (mysqli_num_rows($sqlResultNewFilmsAnimation) > 0) {
			while($rowNewFilmsAnimation = mysqli_fetch_assoc($sqlResultNewFilmsAnimation)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "4" . $rowNewFilmsAnimation["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "4" . $rowNewFilmsAnimation["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "4" . $rowNewFilmsAnimation["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowNewFilmsAnimation["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsAnimation["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowNewFilmsAnimation["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "4" . $rowNewFilmsAnimation["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowNewFilmsAnimation["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">NEW IN COMEDY</div>\n\t";

		if (mysqli_num_rows($sqlResultNewFilmsComedy) > 0) {
			while($rowNewFilmsComedy = mysqli_fetch_assoc($sqlResultNewFilmsComedy)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "5" . $rowNewFilmsComedy["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "5" . $rowNewFilmsComedy["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "5" . $rowNewFilmsComedy["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowNewFilmsComedy["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsComedy["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowNewFilmsComedy["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "5" . $rowNewFilmsComedy["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowNewFilmsComedy["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">NEW IN DOCUMENTARY</div>\n\t";

		if (mysqli_num_rows($sqlResultNewFilmsDocumentary) > 0) {
			while($rowNewFilmsDocumentary = mysqli_fetch_assoc($sqlResultNewFilmsDocumentary)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "6" . $rowNewFilmsDocumentary["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "6" . $rowNewFilmsDocumentary["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "6" . $rowNewFilmsDocumentary["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowNewFilmsDocumentary["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsDocumentary["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowNewFilmsDocumentary["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "6" . $rowNewFilmsDocumentary["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowNewFilmsDocumentary["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">NEW IN DRAMA</div>\n\t";

		if (mysqli_num_rows($sqlResultNewFilmsDrama) > 0) {
			while($rowNewFilmsDrama = mysqli_fetch_assoc($sqlResultNewFilmsDrama)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "7" . $rowNewFilmsDrama["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "7" . $rowNewFilmsDrama["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "7" . $rowNewFilmsDrama["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowNewFilmsDrama["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsDrama["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowNewFilmsDrama["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "7" . $rowNewFilmsDrama["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowNewFilmsDrama["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

		echo "\t\t<div class=\"page-sidebar-divider-title\">NEW IN SUSPENSE</div>\n\t";

		if (mysqli_num_rows($sqlResultNewFilmsSuspense) > 0) {
			while($rowNewFilmsSuspense = mysqli_fetch_assoc($sqlResultNewFilmsSuspense)) {
				echo "\t\t<div onmouseleave=\"mouseleaveFeaturedFilm(" . "8" . $rowNewFilmsSuspense["PostID"] . ");\" onmouseenter=\"mouseenterFeaturedFilm(" . "8" . $rowNewFilmsSuspense["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "8" . $rowNewFilmsSuspense["PostID"] . "\">\n\t";
				echo "\t\t\t<a href=\"/?postid=" . $rowNewFilmsSuspense["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsSuspense["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">\n\t";
				echo "\t\t\t\t<div class=\"featured-film-title\">\n\t";
				echo "\t\t\t\t\t<p>" . $rowNewFilmsSuspense["Title"] . "</p>\n\t";
				echo "\t\t\t\t</div>\n\t";
				echo "\t\t\t</a>\n\t";
				echo "\t\t\t<div class=\"featured-film-description\" id=\"featured-film-description" . "8" . $rowNewFilmsSuspense["PostID"] . "\">\n\t";
				echo "\t\t\t\t" . $rowNewFilmsSuspense["Description"] . "\n\t";
				echo "\t\t\t</div>\n\t";		
				echo "\t\t</div>\n\t";
			}
		}

	}

	echo "\t\t<div class=\"sidebar-footer-copyright-container\" id=\"sidebar-footer-copyright-container\">\n\t";
	echo "\t\t\t<div class=\"sidebar-footer-copyright\">\n\t";
	echo "\t\t\t\t<p class=\"text-align-center\">\n\t";
	echo "\t\t\t\t\t<span style=\"font-size:14px\">© 2014 <a href=\"http://www.tinygiantz.com\">TINYGIANTZ.COM</a></span>\n\t";
	echo "\t\t\t\t\t<br>\n\t";
	echo "\t\t\t\t\t<span style=\"font-size:14px\">Web design by <a href=\"mailto:contact@ashraf.se?subject=Tinygiantz\">Ashraf Ansari</a></span>\n\t";
	echo "\t\t\t\t</p>\n\t";
	echo "\t\t\t</div>\n\t";
	echo "\t\t</div>\n\t";
	echo "\t</div>\n\t";

	if($postId != ""){
		if (mysqli_num_rows($sqlResultSinglePage) > 0) {

			if($pageNumberPreviousTitle != ""){
				$footerNavigationPrevious = "<a class=\"footer-navigation-link\" href=\"/?postid=$pageNumberPreviousSingle\">$pageNumberPreviousTitle</a>";	
			}
			if($pageNumberNextTitle != ""){
				$footerNavigationNext = "<a class=\"footer-navigation-link\" href=\"/?postid=$pageNumberNextSingle\">$pageNumberNextTitle</a>";	
			}

			echo "\t<div class=\"page-content-container\">\n\t";

			while($row = mysqli_fetch_assoc($sqlResultSinglePage)) {

				if(strpos($row["Director"], ",") > -1){
					$director = "Directors";
				}
				else {
					$director = "Director";
				}

				if(strpos($row["Producer"], ",") > -1){
					$producer = "Producers";
				}
				else {
					$producer = "Producer";
				}

				$row["PublicationDate"] = date('F j, Y', strtotime($row["PublicationDate"]));

				include "includes/film-post.php";

			}

			echo "\t\t<div class=\"footer-navigation\">\n\t";
			echo "\t\t\t<table class=\"footer-navigation-table\">\n\t";
			echo "\t\t\t\t<tr>\n\t";
			echo "\t\t\t\t\t<td class=\"footer-navigation-previous\">\n\t";
			echo "\t\t\t\t\t\t" . $footerNavigationPrevious . "\n\t";
			echo "\t\t\t\t\t</td>\n\t";
			echo "\t\t\t\t\t<td class=\"footer-navigation-current\">\n\t";
			echo "\t\t\t\t\t\tPage&nbsp;$pageIndexCurrent&nbsp;of&nbsp;$totalPagesSingle\n\t";
			echo "\t\t\t\t\t</td>\n\t";
			echo "\t\t\t\t\t<td class=\"footer-navigation-next\">\n\t";
			echo "\t\t\t\t\t\t" . $footerNavigationNext . "\n\t";
			echo "\t\t\t\t\t</td>\n\t";
			echo "\t\t\t\t<tr>\n\t";
			echo "\t\t\t</table>\n\t";
			echo "\t\t</div>\n\t";
			echo "\t</div>\n";

		} else {
			echo "0 results";
		}
	}
	else {
		if (mysqli_num_rows($sqlResultMultiPage) > 0) {

		echo "\t<div class=\"page-content-container\">\n\t";

		if($category != "" && $length == ""){
			echo "\t\t<div class=\"film-selection\">\n\t";
			echo "\t\t\t" . strtoupper($category) . "\n\t";
			echo "\t\t</div>\n\t";	
		}
		else if($category != "" && $length != ""){
			echo "\t\t<div class=\"film-selection\">\n\t";
			echo "\t\t\t" . strtoupper($category) . " (" . $length . " MIN)\n\t";
			echo "\t\t</div>\n\t";	
		}

		while($row = mysqli_fetch_assoc($sqlResultMultiPage)) {

			if(strpos($row["Director"], ",") > -1){
				$director = "Directors";
			}
			else {
				$director = "Director";
			}

			if(strpos($row["Producer"], ",") > -1){
				$producer = "Producers";
			}
			else {
				$producer = "Producer";
			}

			$row["PublicationDate"] = date('F j, Y', strtotime($row["PublicationDate"]));
			include "includes/film-post.php";

		}

		if($pageNumberCurrent != "1"){
			$footerNavigationPrevious = "<a class=\"footer-navigation-link\" href=\"/?page=$pageNumberPreviousMulti\">Previous page</a>";
		}
		if($pageNumberCurrent != $totalPagesMulti){
			$footerNavigationNext = "<a class=\"footer-navigation-link\" href=\"/?page=$pageNumberNextMulti\">Next page</a>";
		}

		echo "\t\t<div class=\"footer-navigation\">\n\t";
		echo "\t\t\t<table class=\"footer-navigation-table\">\n\t";
		echo "\t\t\t\t<tr>\n\t";
		echo "\t\t\t\t\t<td class=\"footer-navigation-previous\">\n\t";
		echo "\t\t\t\t\t\t" . $footerNavigationPrevious . "\n\t";
		echo "\t\t\t\t\t</td>\n\t";
		echo "\t\t\t\t\t<td class=\"footer-navigation-current\">\n\t";
		echo "\t\t\t\t\t\tPage&nbsp;$pageNumberCurrent&nbsp;of&nbsp;$totalPagesMulti\n\t";
		echo "\t\t\t\t\t</td>\n\t";
		echo "\t\t\t\t\t<td class=\"footer-navigation-next\">\n\t";
		echo "\t\t\t\t\t\t" . $footerNavigationNext . "\n\t";
		echo "\t\t\t\t\t</td>\n\t";
		echo "\t\t\t\t<tr>\n\t";
		echo "\t\t\t</table>\n\t";
		echo "\t\t</div>\n\t";
		echo "\t</div>\n";

	} else {
		echo "0 results";
	}	
	}

	mysqli_close($conn);
	?>
		<script src="scripts/scripts.js"></script>
	</body>
</html>