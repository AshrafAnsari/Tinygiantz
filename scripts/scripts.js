wallpaperCycle();
wallpaperOverride();

function showVideo(videoid) {
	var frameid = "video" + videoid;

	var numberOfFrames = document.getElementsByClassName("video-frame");

	for (i = 0; i < numberOfFrames.length; i++) {
		document.getElementsByClassName("video-frame")[i].style.opacity = 0;
		document.getElementsByClassName("video-frame")[i].style.pointerEvents = "none";
	}

	document.getElementById(frameid).style.opacity = 1;
	document.getElementById(frameid).style.pointerEvents = "auto";

}

function mouseleaveFeaturedFilm(videoid) {
	var div1 = "featured-film-container" + videoid;
	var div2 = "featured-film-description" + videoid;
	
	document.getElementById(div1).style.height = "120px";
}

function mouseenterFeaturedFilm(videoid) {
	var div1 = "featured-film-container" + videoid;
	var div2 = "featured-film-description" + videoid;
	
	document.getElementById(div1).style.height = (document.getElementById(div2).clientHeight + 120) + "px";
}

function mouseleave(videoid) {

	var div1 = "post-film-credits" + videoid;
	var div2 = "post-film-trivia" + videoid;
	var div3 = "expander" + videoid;
	var div4 = "button-credits" + videoid;
	var div5 = "button-trivia" + videoid;
	var div6 = "post-readmore-container" + videoid;
	var div7 = "post-button-container" + videoid;

	document.getElementById(div7).style.opacity = 0;
	document.getElementById(div7).style.zIndex = 3;
	document.getElementById(div7).style.pointerEvents = "none";
	document.getElementById(div6).style.opacity = 1;
	document.getElementById(div6).style.zIndex = 4;
	document.getElementById(div6).style.pointerEvents = "auto";

	document.getElementById(div4).style.backgroundColor = "gray";
	document.getElementById(div5).style.backgroundColor = "black";

	document.getElementById(div2).style.display = "none";
	document.getElementById(div2).style.opacity = 0;

	document.getElementById(div1).style.display = "block";
	document.getElementById(div1).style.opacity = 1;

	document.getElementById(div3).style.height = 0;

}

function mouseenter(videoid) {
	var div1 = "post-film-credits" + videoid;
	var div3 = "expander" + videoid;
	var div4 = "button-credits" + videoid;
	var div5 = "post-readmore-container" + videoid;
	var div6 = "post-button-container" + videoid;

	document.getElementById(div5).style.opacity = 0;
	document.getElementById(div5).style.zIndex = 3;
	document.getElementById(div5).style.pointerEvents = "none";
	document.getElementById(div6).style.opacity = 1;
	document.getElementById(div6).style.zIndex = 4;
	document.getElementById(div6).style.pointerEvents = "auto";

	document.getElementById(div4).style.backgroundColor = "gray";
	document.getElementById(div3).style.height = document.getElementById(div1).clientHeight + "px";
}

function showTrivia(videoid) {
	var div1 = "post-film-credits" + videoid;
	var div2 = "post-film-trivia" + videoid;
	var div3 = "expander" + videoid;
	var div4 = "button-credits" + videoid;
	var div5 = "button-trivia" + videoid;

	document.getElementById(div4).style.backgroundColor = "black";
	document.getElementById(div5).style.backgroundColor = "gray";

	document.getElementById(div1).style.display = "none";
	document.getElementById(div1).style.opacity = 0;

	document.getElementById(div2).style.display = "block";
	document.getElementById(div2).style.opacity = 1;

	document.getElementById(div3).style.height = document.getElementById(div2).clientHeight + "px";

}

function showCredits(videoid) {
	var div1 = "post-film-credits" + videoid;
	var div2 = "post-film-trivia" + videoid;
	var div3 = "expander" + videoid;
	var div4 = "button-credits" + videoid;
	var div5 = "button-trivia" + videoid;

	document.getElementById(div4).style.backgroundColor = "gray";
	document.getElementById(div5).style.backgroundColor = "black";

	document.getElementById(div2).style.display = "none";
	document.getElementById(div2).style.opacity = 0;

	document.getElementById(div1).style.display = "block";
	document.getElementById(div1).style.opacity = 1;

	document.getElementById(div3).style.height = (document.getElementById(div1).clientHeight) + "px";

}

function expander(videoid) {
	var frameid2 = "expander" + videoid;
	if (document.getElementById(frameid2).style.height == "0px" || document.getElementById(frameid2).style.height == 0) {
		document.getElementById(frameid2).style.height = "350px";
		document.getElementById(frameid2).style.minHeight = "20px";
		document.getElementById(frameid2).style.paddingTop = "10px";
		document.getElementById(frameid2).style.paddingBottom = "10px";
	} else {
		document.getElementById(frameid2).style.height = "0px";
		document.getElementById(frameid2).style.minHeight = "0px";
		document.getElementById(frameid2).style.paddingTop = "0px";
		document.getElementById(frameid2).style.paddingBottom = "0px";
	}
}

/*
var iframe = $('#video1')[0],
	player = $f(iframe),
	status = $('.status');

// When the player is ready, add listeners for pause, finish, and playProgress.
player.addEvent('ready', function() {
	status.text('ready');

	player.addEvent('pause', onPause);
	player.addEvent('finish', onFinish);
	player.addEvent('playProgress', onPlayProgress);
});

// Call the API when a button is pressed.
$('button').bind('click', function() {
	player.api($(this).text().toLowerCase());
});

function onPause(id) {
	status.text('paused');
}

function onFinish(id) {
	status.text('finished');
}

function onPlayProgress(data, id) {
	status.text(data.seconds + 's played');
}
*/

function changeDims() {

	var numberOfFrames = document.getElementsByClassName("video-frame");

	for (i = 0; i < numberOfFrames.length; i++) {

		var height = document.getElementsByClassName("video-frame")[i].clientHeight;
		var width = document.getElementsByClassName("video-frame")[i].clientWidth;

		document.getElementsByClassName("post-title")[i].innerHTML = width + " x " + height;
	}
}

function isMobile() {
	return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

function wallpaperCycle() {
	if (!isMobile() && window.location.href.indexOf("wallpaper=") == -1) {
		var d = new Date(),
			h = d.getHours(),
			i;
		if (h < 6) i = "http://www.tinygiantz.com/assets/wallpapers/light_gradient8.jpg";
		else if (h < 12) i = "http://www.tinygiantz.com/assets/wallpapers/light_gradient8.jpg";
		else if (h < 16) i = "http://www.tinygiantz.com/assets/wallpapers/light_gradient8.jpg";
		else if (h < 21) i = "http://www.tinygiantz.com/assets/wallpapers/light_gradient8.jpg";
		else i = "http://www.tinygiantz.com/assets/wallpapers/light_gradient8.jpg";

		document.body.style.background = "url(" + i + ")";

	}
}

function wallpaperOverride() {
	if (!isMobile() && window.location.href.indexOf("wallpaper") > -1 && window.location.href.indexOf("wallpaper=") == -1) {
		var wallpaperUrl = prompt("Please paste the url of your custom wallpaper:", "");
		if (wallpaperUrl != "" && wallpaperUrl != null) {
			document.body.style.background = "url(" + wallpaperUrl + ")";
		}
	}
	if (!isMobile() && window.location.href.indexOf("wallpaper=") > -1) {

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