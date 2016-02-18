var scriptGlobal = { // Contains all the global variables that are unique to the functions in this script file.
		postExpanded : "", // Saves the id number of the video post that is currently expanded.
		numberOfSearchResults : 10, // Saves the number of search results that are currently visible.
		currentLetter : "A"
}

$(window).load(function() {
  $("body").removeClass("preload"); // Remove the preload state from the body.
});

if (window.location.href.indexOf("?debug=true") > -1 || window.location.href.indexOf("&debug=true") > -1) {
		debug(); // Enables debug functionality if requested.
}

function debug(){
	var links = document.getElementsByTagName("a");
	for (i = 0; i < links.length; i++) {
		if (links[i].href.indexOf("?") > -1) {
			links[i].href += "&debug=true";
		}
		else {
			links[i].href += "?debug=true";
		}
	}
	try {
		document.getElementById("search-debug").name = "debug";
	}
	catch(error){}
	//document.body.insertAdjacentHTML( 'afterbegin', '<div id="debug-frame"><span id="debug-frame-message">DEBUG</span></div>' );
}

function changeLetter(){
	var letter = document.getElementById("select-letter").value;
	document.getElementById("letter-" + scriptGlobal.currentLetter).style.display = "none";
	document.getElementById("letter-" + letter).style.display = "block";
	scriptGlobal.currentLetter = letter;
}

function playVideo(id) { // Hides the play icon, shows video iframe and starts playing the video automatically.
	var frameid = "video" + id,
			videoFrame = document.getElementsByClassName("video-frame");
	for (i = 0; i < videoFrame.length; i++) {
		videoFrame[i].style.opacity = 0;
		videoFrame[i].style.pointerEvents = "none";
		videoFrame[i].src = "";
	}
	document.getElementById(frameid).style.opacity = 1;
	document.getElementById(frameid).style.pointerEvents = "auto";
	document.getElementById(frameid).src = document.getElementById(frameid).getAttribute("data-video-source");
}

function featuredFilmMinimize(id) { // Minimizes a featured film post that is expanded.
	var videoId = "featured-film-container" + id;
	document.getElementById(videoId).style.height = "174px";
}

function featuredFilmExpand(id) { // Expand a featured film post that is minimized.
	var videoId = "featured-film-container" + id,
			videoDescriptionId = "featured-film-description" + id;
	document.getElementById(videoId).style.height = (document.getElementById(videoDescriptionId).clientHeight + 174) + "px";
}

function postMinimize(id) { // Minimize a regular film post that has been expanded.
	scriptGlobal.postExpanded = "";
	var postExpander = "expander" + id,
			postExpandButton = "button-readmore" + id;
	document.getElementById(postExpander).style.height = 0;
	//document.getElementById(postExpandButton).getElementsByClassName("button-label")[0].innerHTML = "Expand";
	document.getElementById(postExpandButton).title = "Show more information about this film";
}

function postExpand(id) { // Expand a regular film post that has been minimized.
	scriptGlobal.postExpanded = id;
	var postExpander = "expander" + id,
			postExpandButton = "button-readmore" + id,
			postCredits = "post-film-credits" + id;
	document.getElementById(postExpander).style.height = document.getElementById(postCredits).clientHeight + "px";
	//document.getElementById(postExpandButton).getElementsByClassName("button-label")[0].innerHTML = "Collapse";
	document.getElementById(postExpandButton).title = "Show less information about this film";
}

function postExpandShare(id) { // Expand a regular film post that has been minimized.
	//scriptGlobal.postExpanded = id;
	var postExpander = "expander" + id,
			postExpandButton = "button-share" + id,
			postCredits = "post-film-share" + id;
	document.getElementById(postExpander).style.height = document.getElementById(postCredits).clientHeight + "px";
	//document.getElementById(postExpandButton).getElementsByClassName("button-label")[0].innerHTML = "Collapse";
	//document.getElementById(postExpandButton).title = "Show less information about this film";
}

function postExpander(id){ // Trigger post expand or minimize functions based on current state.
	if(scriptGlobal.postExpanded != id){
		postExpand(id);
	}
	else{
		postMinimize(id);
	}	
}

function showMoreSearchResults() { // Expands the current search to show more results.
	var searchResults = document.getElementsByClassName("search-result-item"),
			searchResultNumber = parseInt(document.getElementById("search-result-number-total").innerHTML),
			searchResultTrail = "s";
	if(searchResults.length != 1){
		document.getElementById("search-result-trail").innerHTML = searchResultTrail;
	}
	if(searchResults.length <= 10){
		document.getElementById("search-result-number").style.display = "none";
	}
	if(scriptGlobal.numberOfSearchResults >= searchResults.length){
		scriptGlobal.numberOfSearchResults = searchResults.length;
		document.getElementById("expand-search-results").style.display = "none";
	}
	for(i = 0; i < scriptGlobal.numberOfSearchResults; i++){
		searchResults[i].style.display = "block";
	}
	document.getElementById("search-result-number-showing").innerHTML = scriptGlobal.numberOfSearchResults;
	scriptGlobal.numberOfSearchResults += 10;
}

function showSearchOptions(){
	document.getElementById("search-options-container").style.opacity = "1";
	document.getElementById("search-options-container").style.pointerEvents = "all";
	document.getElementById("search-options-container").style.paddingTop = "20px";
	document.getElementById("search-options-container").style.paddingBottom = "20px";
	document.getElementById("search-options-container").style.height = "196px";
}

function hideSearchOptions(){
	document.getElementById("search-options-container").style.opacity = "0";
	document.getElementById("search-options-container").style.pointerEvents = "none";
	document.getElementById("search-options-container").style.paddingTop = "0";
	document.getElementById("search-options-container").style.paddingBottom = "0";
	document.getElementById("search-options-container").style.height = "0";
}

if(window.location.href.indexOf("?search=") > -1){ // Determine if the user is on the search page and trigger the function.
	showMoreSearchResults();	
}

function wallpaperOverride() {
	if (window.location.href.indexOf("wallpaper") > -1 && window.location.href.indexOf("wallpaper=") == -1) {
		var wallpaperUrl = prompt("Please paste the url of your custom wallpaper:", "");
		if (wallpaperUrl != "" && wallpaperUrl != null) {
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
	}
	if (window.location.href.indexOf("wallpaper=") > -1) {

		var url = window.location.href;
		var wallpaperUrl = url.substr(url.indexOf("wallpaper=") + 10);
		if (window.location.href.indexOf(".jpg") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.jpg') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".JPG") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.JPG') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".png") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.png') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".PNG") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.PNG') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".gif") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.gif') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".GIF") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.GIF') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".bmp") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.bmp') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".BMP") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.BMP') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".tif") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.tif') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
		if (window.location.href.indexOf(".TIF") > -1) {
			wallpaperUrl = wallpaperUrl.substr(0, wallpaperUrl.indexOf('.TIF') + 4);
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
	}
}
wallpaperOverride();