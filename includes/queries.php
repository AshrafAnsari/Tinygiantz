<?php
if ($post_id != "") {
  
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

  if ($pageNumberPreviousTitle == "") {
    $sqlQuerySinglePagePrevious3 = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime>'$pageTimeCurrent' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
    $sqlResultSinglePagePrevious3 = mysqli_query($connection, $sqlQuerySinglePagePrevious3);
    $rowPrevious3 = mysqli_fetch_assoc($sqlResultSinglePagePrevious3);
    $pageNumberPreviousSingle = $rowPrevious3["PostID"];
    $pageNumberPreviousTitle = $rowPrevious3["Title"];
  }

  if ($pageNumberPreviousTitle == "") {
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

  if ($pageNumberNextTitle == "") {
    $sqlQuerySinglePageNext3 = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND PublicationDate='$pageDateCurrent' AND PublicationTime<'$pageTimeCurrent' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT 0,1";
    $sqlResultSinglePageNext3 = mysqli_query($connection, $sqlQuerySinglePageNext3);
    $rowNext3 = mysqli_fetch_assoc($sqlResultSinglePageNext3);
    $pageNumberNextSingle = $rowNext3["PostID"];
    $pageNumberNextTitle = $rowNext3["Title"];
  }

  if ($pageNumberNextTitle == "") {
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
  if ($category != "" && $length == "") {
    $sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = '$category' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
    $sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

    $sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' AND Category = '$category'";
    $sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
    $totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
    $totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
  }
  elseif ($category != "" && $length != "") {
    $sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND Category = '$category' AND VideoLength = '$length' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
    $sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

    $sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND Category = '$category' AND VideoLength = '$length'";
    $sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
    $totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
    $totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
  }
  elseif ($_GET["name"] != "") {
    $name = mysqli_real_escape_string($connection, $_GET["name"]);
    $sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND (Director LIKE '%$name%' OR Producer LIKE '%$name%' OR Screenplay LIKE '%$name%' OR DoP LIKE '%$name%' OR Cast LIKE '%$name%') ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
    $sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

    $sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate <='$date' AND (Director LIKE '%$name%' OR Producer LIKE '%$name%' OR Screenplay LIKE '%$name%' OR DoP LIKE '%$name%' OR Cast LIKE '%$name%')";
    $sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
    $totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
    $totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
  }
  else {
    $sqlQueryMultiPage = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date' ORDER BY PublicationDate DESC, PublicationTime DESC, PostID DESC LIMIT $pageNumber,10";
    $sqlResultMultiPage = mysqli_query($connection, $sqlQueryMultiPage);

    $sqlQueryTotalPages = "SELECT * FROM Films WHERE PostStatus = 'Published' AND PublicationDate<='$date'";
    $sqlResultTotalPages = mysqli_query($connection, $sqlQueryTotalPages);
    $totalPagesMulti = ceil(mysqli_num_rows($sqlResultTotalPages) / 10);
    $totalPagesSingle = mysqli_num_rows($sqlResultTotalPages);
  }
}
?>