updateTime();
function updateTime() {
  var d = new Date();
  var hours = d.getHours();
  var minutes = d.getMinutes();
  var seconds = d.getSeconds();
  var year = d.getFullYear();
  var month = d.getMonth() + 1;
  var day = d.getDate();
  document.getElementById("menu-date").innerHTML = year + "-" + pad(month) + "-" + pad(day);
  document.getElementById("menu-time").innerHTML = pad(hours) + ":" + pad(minutes);
}

function pad(n) {
	return (n < 10) ? ("0" + n) : n;
}

var idleTime = 0;
var warning = 30 * 60;
var limit = warning + 60;
$(document).ready(function () {
    var idleInterval = setInterval(timerIncrement, 1000);
    $(this).mousemove(function (e) {
        idleTime = 0;
				document.getElementById("idle-alert").style.opacity = "0";
    });
    $(this).keypress(function (e) {
        idleTime = 0;
				document.getElementById("idle-alert").style.opacity = "0";
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
		var remainingTime = limit - idleTime;
		if (idleTime >= warning) {
			document.getElementById("idle-alert").innerHTML = "Warning! You will be logged out due to idle time out in:<br><br>" + remainingTime + " seconds.";
			document.getElementById("idle-alert").style.opacity = "1";
    }
		if (idleTime == limit) {
				var userName = document.getElementById("user-name").innerText;
        window.location.href = "/admin/?logout=true&name=" + userName;
    }
}

function logOut() {
	var logOut = confirm("Log out?");
	if (logOut === true) {
			var userName = document.getElementById("user-name").innerText;
      window.location.href = "/admin/?logout=true&name=" + userName;
	} else {
	}	
}

function filter() {
	var filter = document.getElementById("edit-filter").value;
	var posts = document.getElementsByTagName("tr");
	for (i = 0; i < posts.length; i++) {
		try {
			if((posts[i].getElementsByClassName("post-title")[0].innerText.toUpperCase()).indexOf(filter.toUpperCase()) > -1){
				//posts[i].getElementsByTagName("td")[0].style.color = "red";
				posts[i].style.display = "";
			}
			else {
				//posts[i].getElementsByTagName("td")[0].style.color = "";
				posts[i].style.display = "none";
			}
		}
		catch(e){}
	}
}

function editPost(id) {
	document.getElementById("post-edit-container").style.height = window.innerHeight + "px";
	//document.getElementById("post-edit-container").style.top = "0";
	document.getElementById("post-edit-container").style.transform = "translate(0,-100%)";
	document.getElementsByTagName("body")[0].style.overflow = "hidden";
	getPostData(id);
}

function closeEditPost() {
	//document.getElementById("post-edit-container").style.top = "";
	document.getElementById("post-edit-container").style.height = "";
	document.getElementById("post-edit-container").style.transform = "";
	document.getElementsByTagName("body")[0].style.overflow = "auto";
}

function getPostData(id) {
	var xhttp;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
		} else {
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			var json = JSON.parse(xhttp.responseText);
			document.getElementById("post-edit-table-input-videolink").value = json.VideoURL;
			document.getElementById("post-edit-table-input-title").value = json.Title;
			document.getElementById("post-edit-table-input-description").value = json.Description;
			document.getElementById("post-edit-table-input-length").value = json.VideoLength;
			document.getElementById("post-edit-table-input-category").value = json.Category;
			document.getElementById("post-edit-table-input-director").value = json.Director;
			document.getElementById("post-edit-table-input-producer").value = json.Producer;
			document.getElementById("post-edit-table-input-screenplay").value = json.Screenplay;
			document.getElementById("post-edit-table-input-dop").value = json.DoP;
			document.getElementById("post-edit-table-input-cast").value = json.Cast;
			document.getElementById("post-edit-table-input-year").value = json.Year;
			document.getElementById("post-edit-table-input-trivia").value = json.Trivia;
		}
	};
	xhttp.open("GET", "/admin/ajax/get-post.php/?id=" + id, true);
	xhttp.send();
}