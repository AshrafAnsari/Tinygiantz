var itemNumber = 0;
var positionX = 0;
var positionY = 0;
var size = 310;
var app = angular.module("myFirstApp", []);
app.controller("myFirstController", function($scope, $http, $compile) {
  $scope.sliderX = "0";
  $scope.sliderY = "0";
  $scope.fetch = function() {
    if ($scope.link && ($scope.link.match("youtu") || $scope.link.match("vimeo"))) {
      $scope.sliderX = "0";
      $scope.sliderY = "0";
      $scope.input = {
        "background-color": "white",
        "color": "darkgray",
        "opacity": ".5"
      };
      $scope.imageContainer = {
          "opacity": ".5"
        }
      $scope.fetchMessasge = "Fetching...";
      $scope.title = $scope.fetchMessasge;
      $scope.description = $scope.fetchMessasge;
      $scope.length = $scope.fetchMessasge;
      $scope.url = "/temp/json.php?link=" + $scope.link;
      $http.get($scope.url).then(function(response) {
        //alert(response.data.image);
        //$scope.image = response.data.image;
        document.getElementById("picture").style.backgroundImage = "url('" + response.data.image + "')";
        $scope.title = response.data.title;
        $scope.description = response.data.description;
        $scope.length = response.data.length;
        $scope.input = {
          "background-color": "white",
          "color": "black",
          "opacity": "1"
        };
        $scope.imageContainer = {
          "opacity": "1"
        }
        var fieldContainers = document.getElementsByClassName("field-container");
        for (i = 1; i < fieldContainers.length; i++) {
            fieldContainers[i].style.opacity = "1";
        }
      });
    }
    else if (!$scope.link) {
      $scope.image = "";
      document.getElementById("picture").style.backgroundImage = "";
      $scope.link = "";
      $scope.title = "";
      $scope.description = "";
      $scope.length = "";
    }
    else {
      //alert("Not a valid link!");
    }
    document.getElementById("image-control-slider-x").value = "0";
    document.getElementById("image-control-slider-y").value = "0";
    document.getElementById("image-control-slider-z").value = document.getElementById("image-control-slider-z").getAttribute("max") / 2;
    positionZ = document.getElementById("image-control-slider-z").getAttribute("max") / 2;
  }
  $scope.reset = function() {
    $scope.link = "";
    $scope.title = "";
    $scope.description = "";
    $scope.length = "";
    $scope.sliderX = "0";
    $scope.sliderY = "0";
    imageResize();
  }
  
  $scope.addItem = function(itemType) {
    var placeholder;
    switch (itemType) {
      case "director":
        placeholder = "Director";
        break;
      case "producer":
        placeholder = "Producer";
        break;
      case "screenplay":
        placeholder = "Screenplay";
        break;
      case "dop":
        placeholder = "DoP";
        break;
      case "cast":
        placeholder = "Cast";
        break;
      case "link":
        placeholder = "Link";
        break;
    }
    var itemType2 = "item-" + itemType;
    var itemId = itemType2 + "-" + itemNumber;
    var myEl = angular.element(document.querySelector('#' + itemType2));
    var newElement = "<p id=\"" + itemId + "\"><input id=\"" + itemType + "\" class=\"input\" value=\"\" Placeholder=\"" + placeholder + "\" autocomplete=\"off\"><button title=\"Delete\" class=\"remove-item\" ng-click=\"removeItem('" + itemId + "');\">-</button></p>";
    myEl.after($compile(newElement)($scope));
    itemNumber++;
  }
  
  $scope.removeItem = function(itemId){
    var myEl = angular.element(document.querySelector('#' + itemId));
    myEl.remove();
  }
});

function move(direction) {
  if (direction == "left") {
    positionX--;
  }
  else if (direction == "right") {
    positionX++;
  }
  else if (direction == "up") {
    positionY--;
  }
  else if (direction == "down") {
    positionY++;
  }
  else if (direction == "X") {
    positionX = document.getElementById("image-control-slider-x").value;      
  }
  else if (direction == "Y") {
    positionY = - (document.getElementById("image-control-slider-y").value);      
  }
  document.getElementById("picture").style.backgroundPositionX =  positionX + "px";
  document.getElementById("picture").style.backgroundPositionY =  positionY + "px";
}

function zoom(direction, amount) {
  if (direction == "in") {
    if (amount) {
      size+=amount;
    }
    else {
      size++;
    }
  }
  else if (direction == "out") {
    if (amount) {
      size-=amount;
    }
    else {
      size--;
    }
  }
  else if (direction == "Z") {
    size = document.getElementById("image-control-slider-z").value;
  }
  document.getElementById("picture").style.backgroundSize =  size + "px";
  document.getElementById("image-control-slider-z").value = size;
}

function imageResize() {
  var width = document.getElementById("picture").clientWidth;
  var height = width * 0.56;
  document.getElementById("picture").style.height = height + "px";
  document.getElementById("picture").style.backgroundSize = width + "px";
  document.getElementById("image-control-slider-x").setAttribute("max", width);
  document.getElementById("image-control-slider-x").setAttribute("min", -width);
  document.getElementById("image-control-slider-y").setAttribute("max", height);
  document.getElementById("image-control-slider-y").setAttribute("min", -height);
  document.getElementById("image-control-slider-z").setAttribute("max", 2*width);
  document.getElementById("image-control-slider-z").setAttribute("min", 0);
  size = width;
}

imageResize();

$(window).resize(function() {
  imageResize();
});


window.onload = addListeners;

function addListeners(){
    document.getElementById('picture').addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);

}

function mouseUp()
{
    window.removeEventListener('mousemove', divMove, true);
}

function mouseDown(e){
  window.addEventListener('mousemove', divMove, true);
}

var divPosX;
var divPosY;
var offset = $("#picture").offset();
$(document).mousemove(function(e){
    divPosX = e.pageX - offset.left;
    divPosY = e.pageY - offset.top;
});

function divMove(e){
    var div = document.getElementById('picture');
    //div.style.position = 'absolute';
    var width = document.getElementById("picture").clientWidth;
    var height = document.getElementById("picture").clientHeight;
    var positionNewY = e.pageY - offset.top - (height/2);
    var positionNewX = e.pageX - offset.left - (width/2);
    div.style.backgroundPositionY = positionNewY + 'px';
    div.style.backgroundPositionX = positionNewX + 'px';
    positionX = positionNewX;
    positionY = positionNewY;
    document.getElementById("image-control-slider-x").value = positionNewX;
    document.getElementById("image-control-slider-y").value = -positionNewY;
}

$('#picture').bind('mousewheel', function(e) {
  if (e.originalEvent.wheelDelta < 0) {
    zoom("out", 10);
  } else {
    zoom("in", 10);
  }
  return false;
});

function resetImageSize() {
  positionX = 0;
  positionY = 0;
  document.getElementById("image-control-slider-x").value = positionX;
  document.getElementById("image-control-slider-y").value = positionY;
  document.getElementById("image-control-slider-z").value = positionZ;
  document.getElementById("picture").style.backgroundPositionX =  positionX + "px";
  document.getElementById("picture").style.backgroundPositionY =  positionY + "px";
  document.getElementById("picture").style.backgroundSize =  positionZ + "px";
}

document.getElementsByClassName("field-container")[0].style.opacity = "1";
document.getElementById("main-title").style.opacity = "1";