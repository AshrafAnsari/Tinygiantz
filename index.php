<?php include "functions/functions.php"; ?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php include "includes/head-meta.php";?>
	</head>

	<body>
		<?php include "includes/header-navigation.php";?>
			<?php

	if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	}

	
	if($_GET["search"] != ""){
		include "includes/search.php";
	}
	else{
		if($post_id != ""){
		$sqlQuerySinglePage = "SELECT * FROM Films WHERE PostID='$post_id' AND PostStatus = 'Published'";
		$sqlResultSinglePage = mysqli_query($connection, $sqlQuerySinglePage);

		$sqlQuerySinglePageIndex = "SELECT t.PageIndex FROM (SELECT *, (@rownum := @rownum + 1) PageIndex FROM Films, (SELECT @rownum := 0) t WHERE PostStatus = 'Published' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC) t WHERE PostID = '$post_id'";
		$sqlResultSinglePageIndex = mysqli_query($connection, $sqlQuerySinglePageIndex);
		$rowPageIndex = mysqli_fetch_assoc($sqlResultSinglePageIndex);
		$pageIndexCurrent = $rowPageIndex["PageIndex"];

		$sqlQuerySinglePageDate = "SELECT * FROM Films WHERE PostID='$post_id'";
		$sqlResultSinglePageDate = mysqli_query($connection, $sqlQuerySinglePageDate);
		$rowDateCurrent = mysqli_fetch_assoc($sqlResultSinglePageDate);
		$pageDateCurrent = $rowDateCurrent["PublicationDate"];
		$pageTimeCurrent = $rowDateCurrent["PublicationTime"];

		$sqlQuerySinglePagePrevious = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime='$pageTimeCurrent' AND PostID>'$post_id' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID ASC LIMIT 0,1";
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

		$sqlQuerySinglePageNext = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime='$pageTimeCurrent' AND PostID<'$post_id' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
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

			$sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND Category = '$category' AND VideoLength = '$length'";
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

	echo "<div class=\"page-sidebar-container\">";
	echo "<form action=\"/\" method=\"get\">";
	echo "<input type=\"search\" class=\"search-box-input\" name=\"search\" value=\"\" placeholder=\"Search\" id=\"search-box-input\"/ autocomplete=\"off\">";
	echo "</form>";

	if($post_id == ""){

		echo "<div class=\"page-sidebar-divider-title\">FILM OF THE DAY</div>";

		if (mysqli_num_rows($sqlResultFilmOfTheDay) > 0) {
			while($rowFilmOfTheDay = mysqli_fetch_assoc($sqlResultFilmOfTheDay)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . $rowFilmOfTheDay["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . $rowFilmOfTheDay["PostID"] . ");\" class=\"filmoftheday-container\" id=\"featured-film-container" . $rowFilmOfTheDay["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowFilmOfTheDay["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowFilmOfTheDay["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>". $rowFilmOfTheDay["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . $rowFilmOfTheDay["PostID"] . "\">";
				echo "" . $rowFilmOfTheDay["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

		echo "<div class=\"page-sidebar-divider-title\">EDITORS' PICKS</div>";

		if (mysqli_num_rows($sqlResultFeaturedFilms) > 0) {
			while($rowFeaturedFilms = mysqli_fetch_assoc($sqlResultFeaturedFilms)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "2" . $rowFeaturedFilms["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "2" . $rowFeaturedFilms["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "2" . $rowFeaturedFilms["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowFeaturedFilms["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowFeaturedFilms["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowFeaturedFilms["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "2" . $rowFeaturedFilms["PostID"] . "\">";
				echo "" . $rowFeaturedFilms["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}
		
	echo "<div class=\"page-sidebar-link-container\">";
	echo "<ul>";
	echo "<li>CREDITED NAMES</li>";
	echo "<li>RELEASE YEARS</li>";
	echo "</ul>";
	echo "</div>";
	echo "<div class=\"page-sidebar-link-container\">";
	echo "<ul>";
	echo "<li>ABOUT US</li>";
	echo "<li>CONTACT US</li>";
	echo "<li>SUBMIT A FILM</li>";
	echo "</ul>";
	echo "</div>";
	echo "<div class=\"page-sidebar-link-container\">";
	echo "<ul>";
	echo "<li><a href=\"http://www.tinygiantz.com/?format=rss\" class=\"rss-link\">TINYGIANTZ RSS</a></li>";
	echo "</ul>";
	echo "</div>";
	echo "<div id=\"likesharebuttonslist\">";
	echo "<div class=\"likesharebutton\" id=\"fblikeshare\">";
	echo "<iframe id=\"fbframe\" src=\"//www.facebook.com/plugins/like.php?locale=en_US&amp;href=http%3A%2F%2Fwww.tinygiantz.com&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=\" 21\"scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; height:21px;\" allowtransparency=\"true\">";
	echo "</iframe>";
	echo "</div>";
	echo "<div class=\"likesharebutton\" id=\"twitterlikeshare\" align=\"left\">";
	echo "<iframe id=\"twitter-widget-0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" src=\"http://platform.twitter.com/widgets/tweet_button.1393899192.html#_=1394787522397&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fwww.tinygiantz.com%2F&amp;size=m&amp;text=TinyGiantz&amp;url=http%3A%2F%2Fwww.tinygiantz.com&amp;via=TinyGiantz\" class=\"twitter-share-button twitter-tweet-button twitter-count-horizontal\" title=\"Twitter Tweet Button\" data-twttr-rendered=\"true\" style=\"width: 121px; height: 20px;\">";
	echo "</iframe>";
	echo "</div>";
	echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');";
	echo "</script>";
	echo "<div id=\"___plusone_0\" style=\"text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background-position: initial initial; background-repeat: initial initial;\">";
	echo "<iframe frameborder=\"0\" hspace=\"0\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"no\" style=\"position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;\" tabindex=\"0\" vspace=\"0\" width=\"100%\" id=\"I0_1394787522431\" name=\"I0_1394787522431\" src=\"https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Fwww.tinygiantz.com&amp;url=http%3A%2F%2Fwww.tinygiantz.com%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.sv.KD2PimgGzeE.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Fz%3Dzcms%2Frs%3DAItRSTNFHDH1pmC3Hhng2W36BR70bXCUvg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1394787522431&amp;parent=http%3A%2F%2Fwww.tinygiantz.com&amp;pfname=&amp;rpctoken=22289990\" data-gapiattached=\"true\" title=\"+1\">";
	echo "</iframe>";
	echo "</div>";
	echo "<script type=\"text/javascript\">(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/platform.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();";
	echo "</script>";
	echo "</div>";

		echo "<div class=\"page-sidebar-divider-title\">NEW IN ACTION</div>";

		if (mysqli_num_rows($sqlResultNewFilmsAction) > 0) {
			while($rowNewFilmsAction = mysqli_fetch_assoc($sqlResultNewFilmsAction)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "3" . $rowNewFilmsAction["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "3" . $rowNewFilmsAction["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "3" . $rowNewFilmsAction["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowNewFilmsAction["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsAction["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowNewFilmsAction["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "3" . $rowNewFilmsAction["PostID"] . "\">";
				echo "" . $rowNewFilmsAction["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

		echo "<div class=\"page-sidebar-divider-title\">NEW IN ANIMATION</div>";

		if (mysqli_num_rows($sqlResultNewFilmsAnimation) > 0) {
			while($rowNewFilmsAnimation = mysqli_fetch_assoc($sqlResultNewFilmsAnimation)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "4" . $rowNewFilmsAnimation["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "4" . $rowNewFilmsAnimation["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "4" . $rowNewFilmsAnimation["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowNewFilmsAnimation["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsAnimation["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowNewFilmsAnimation["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "4" . $rowNewFilmsAnimation["PostID"] . "\">";
				echo "" . $rowNewFilmsAnimation["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

		echo "<div class=\"page-sidebar-divider-title\">NEW IN COMEDY</div>";

		if (mysqli_num_rows($sqlResultNewFilmsComedy) > 0) {
			while($rowNewFilmsComedy = mysqli_fetch_assoc($sqlResultNewFilmsComedy)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "5" . $rowNewFilmsComedy["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "5" . $rowNewFilmsComedy["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "5" . $rowNewFilmsComedy["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowNewFilmsComedy["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsComedy["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowNewFilmsComedy["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "5" . $rowNewFilmsComedy["PostID"] . "\">";
				echo "" . $rowNewFilmsComedy["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

		echo "<div class=\"page-sidebar-divider-title\">NEW IN DOCUMENTARY</div>";

		if (mysqli_num_rows($sqlResultNewFilmsDocumentary) > 0) {
			while($rowNewFilmsDocumentary = mysqli_fetch_assoc($sqlResultNewFilmsDocumentary)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "6" . $rowNewFilmsDocumentary["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "6" . $rowNewFilmsDocumentary["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "6" . $rowNewFilmsDocumentary["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowNewFilmsDocumentary["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsDocumentary["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowNewFilmsDocumentary["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "6" . $rowNewFilmsDocumentary["PostID"] . "\">";
				echo "" . $rowNewFilmsDocumentary["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

		echo "<div class=\"page-sidebar-divider-title\">NEW IN DRAMA</div>";

		if (mysqli_num_rows($sqlResultNewFilmsDrama) > 0) {
			while($rowNewFilmsDrama = mysqli_fetch_assoc($sqlResultNewFilmsDrama)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "7" . $rowNewFilmsDrama["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "7" . $rowNewFilmsDrama["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "7" . $rowNewFilmsDrama["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowNewFilmsDrama["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsDrama["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowNewFilmsDrama["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "7" . $rowNewFilmsDrama["PostID"] . "\">";
				echo "" . $rowNewFilmsDrama["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

		echo "<div class=\"page-sidebar-divider-title\">NEW IN SUSPENSE</div>";

		if (mysqli_num_rows($sqlResultNewFilmsSuspense) > 0) {
			while($rowNewFilmsSuspense = mysqli_fetch_assoc($sqlResultNewFilmsSuspense)) {
				echo "<div onmouseleave=\"featuredFilmMinimize(" . "8" . $rowNewFilmsSuspense["PostID"] . ");\" onmouseenter=\"featuredFilmExpand(" . "8" . $rowNewFilmsSuspense["PostID"] . ");\" class=\"featured-film-container\" id=\"featured-film-container" . "8" . $rowNewFilmsSuspense["PostID"] . "\">";
				echo "<a href=\"/?postid=" . $rowNewFilmsSuspense["PostID"] . "\" class=\"featured-film-picture-container\" style=\"background: url(" . $rowNewFilmsSuspense["Picture"] . ");background-position: center;background-size: cover;background-repeat: no-repeat;\">";
				echo "<div class=\"featured-film-title\">";
				echo "<p>" . $rowNewFilmsSuspense["Title"] . "</p>";
				echo "</div>";
				echo "</a>";
				echo "<div class=\"featured-film-description\" id=\"featured-film-description" . "8" . $rowNewFilmsSuspense["PostID"] . "\">";
				echo "" . $rowNewFilmsSuspense["Description"] . "";
				echo "</div>";		
				echo "</div>";
			}
		}

	}

	echo "<div class=\"sidebar-footer-copyright-container\" id=\"sidebar-footer-copyright-container\">";
	echo "<div class=\"sidebar-footer-copyright\">";
	echo "<p class=\"text-align-center\">";
	echo "<span style=\"font-size:14px\">© 2014 <a href=\"http://www.tinygiantz.com\">TINYGIANTZ.COM</a></span>";
	echo "<br>";
	echo "<span style=\"font-size:14px\">Web design by <a href=\"mailto:contact@ashraf.se?subject=Tinygiantz\">Ashraf Ansari</a></span>";
	echo "</p>";
	echo "</div>";
	echo "</div>";
	echo "</div>";

	if($post_id != ""){
		if (mysqli_num_rows($sqlResultSinglePage) > 0) {

			if($pageNumberPreviousTitle != ""){
				$footer_navigation_previous = "<a class=\"footer-navigation-link\" href=\"/?postid=$pageNumberPreviousSingle\">$pageNumberPreviousTitle</a>";	
			}
			if($pageNumberNextTitle != ""){
				$footer_navigation_next = "<a class=\"footer-navigation-link\" href=\"/?postid=$pageNumberNextSingle\">$pageNumberNextTitle</a>";	
			}

			echo "<div class=\"page-content-container\">";

			while($post = mysqli_fetch_assoc($sqlResultSinglePage)) {

				if(strpos($post["Director"], ",") > -1){
					$director = "Directors";
				}
				else {
					$director = "Director";
				}

				if(strpos($post["Producer"], ",") > -1){
					$producer = "Producers";
				}
				else {
					$producer = "Producer";
				}

				$post["PublicationDate"] = date('F j, Y', strtotime($post["PublicationDate"]));

				include "includes/film-post.php";

			}

			echo "<div class=\"footer-navigation\">";
			echo "<table class=\"footer-navigation-table\">";
			echo "<tr>";
			echo "<td class=\"footer-navigation-previous\">";
			echo "" . $footer_navigation_previous . "";
			echo "</td>";
			echo "<td class=\"footer-navigation-current\">";
			echo "\t\t\t\t\t\tPage&nbsp;$pageIndexCurrent&nbsp;of&nbsp;$totalPagesSingle";
			echo "</td>";
			echo "<td class=\"footer-navigation-next\">";
			echo "" . $footer_navigation_next . "";
			echo "</td>";
			echo "<tr>";
			echo "</table>";
			echo "</div>";
			echo "</div>";

		} else {
			echo "0 results";
		}
	}
	else {
		if (mysqli_num_rows($sqlResultMultiPage) > 0) {

		echo "<div class=\"page-content-container\">";

		if($category != "" && $length == ""){
			echo "<div class=\"film-selection\">";
			echo strtoupper($category);
			echo "</div>";	
		}
		else if($category != "" && $length != ""){
			echo "<div class=\"film-selection\">";
			echo "" . strtoupper($category) . " (" . $length . " MIN)";
			echo "</div>";	
		}

		while($post = mysqli_fetch_assoc($sqlResultMultiPage)) {

			if(strpos($post["Director"], ",") > -1){
				$director = "Directors";
			}
			else {
				$director = "Director";
			}

			if(strpos($post["Producer"], ",") > -1){
				$producer = "Producers";
			}
			else {
				$producer = "Producer";
			}

			$post["PublicationDate"] = date('F j, Y', strtotime($post["PublicationDate"]));
			include "includes/film-post.php";

		}

		if($category != ""){
				$category_href = "category=" . $category . "&";
		}
			if($length != ""){
				$length_href = "length=" . $length . "&";
		}
			
		if($pageNumberCurrent != "1"){
			$footer_navigation_previous = "<a class=\"footer-navigation-link\" href=\"/?" . $category_href . $length_href . "page=" . $pageNumberPreviousMulti . "\">Previous page</a>";
		}
		if($pageNumberCurrent != $totalPagesMulti){
			$footer_navigation_next = "<a class=\"footer-navigation-link\" href=\"/?" . $category_href . $length_href . "page=" . $pageNumberNextMulti . "\">Next page</a>";
		}

		echo "<div class=\"footer-navigation\">";
		echo "<table class=\"footer-navigation-table\">";
		echo "<tr>";
		echo "<td class=\"footer-navigation-previous\">";
		echo "" . $footer_navigation_previous . "";
		echo "</td>";
		echo "<td class=\"footer-navigation-current\">";
		echo "\t\t\t\t\t\tPage&nbsp;$pageNumberCurrent&nbsp;of&nbsp;$totalPagesMulti";
		echo "</td>";
		echo "<td class=\"footer-navigation-next\">";
		echo "" . $footer_navigation_next . "";
		echo "</td>";
		echo "<tr>";
		echo "</table>";
		echo "</div>";
		echo "</div>";

	} else {
		echo "0 results";
	}	
	}	
	}

	mysqli_close($connection);
	?>
				<script src="scripts/scripts.js"></script>
	</body>

	</html>