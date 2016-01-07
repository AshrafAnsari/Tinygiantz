var postExpanded;

function playVideo(id) {
	var frameid = "video" + id;
	var videoFrame = document.getElementsByClassName("video-frame");
	var videoFrameSrc;
	for (i = 0; i < videoFrame.length; i++) {
		videoFrame[i].style.opacity = 0;
		videoFrame[i].style.pointerEvents = "none";
		videoFrameSrc = videoFrame[i].src;
		if(videoFrameSrc.indexOf("&autoplay=1") > -1){
			videoFrameSrc = videoFrameSrc.replace("&autoplay=1", "&autoplay=0");
			videoFrame[i].src = videoFrameSrc;
		}
		else {
			videoFrame[i].src += "&autoplay=0";	
		}
	}
	document.getElementById(frameid).style.opacity = 1;
	document.getElementById(frameid).style.pointerEvents = "auto";
	videoFrameSrc = document.getElementById(frameid).src;
	videoFrameSrc = videoFrameSrc.replace("&autoplay=0", "&autoplay=1");
	document.getElementById(frameid).src = videoFrameSrc;
}

function featuredFilmMinimize(id) {
	var videoId = "featured-film-container" + id;
	document.getElementById(videoId).style.height = "120px";
}

function featuredFilmExpand(id) {
	var videoId = "featured-film-container" + id;
	var videoDescriptionId = "featured-film-description" + id;
	document.getElementById(videoId).style.height = (document.getElementById(videoDescriptionId).clientHeight + 120) + "px";
}

function postMinimize(id) {
	postExpanded = "";
	var postExpander = "expander" + id;
	var postExpandButton = "button-readmore" + id;
	document.getElementById(postExpander).style.height = 0;
	document.getElementById(postExpandButton).innerHTML = "Expand";
}

function postExpand(id) {
	postExpanded = id;
	var postExpander = "expander" + id;
	var postExpandButton = "button-readmore" + id;
	var postCredits = "post-film-credits" + id;
	document.getElementById(postExpander).style.height = document.getElementById(postCredits).clientHeight + "px";
	document.getElementById(postExpandButton).innerHTML = "Collapse";
}

function postExpander(id){
	if(postExpanded != id){
		postExpand(id);
	}
	else{
		postMinimize(id);
	}	
}

var numberOfSearchResults = 10;

function showMoreSearchResults() {
	var searchResults = document.getElementsByClassName("search-result-item");
	for(i = 0; i < numberOfSearchResults; i++){
		searchResults[i].style.display = "block";
	}
	numberOfSearchResults += 10;
}

if(window.location.href.indexOf("?search=") > -1){
	showMoreSearchResults();	
}