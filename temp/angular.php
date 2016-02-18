<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="//use.typekit.net/lqk4yck.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="../scripts/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body ng-app="myFirstApp" ng-controller="myFirstController">
  <div id="header">
    <ul id="menu">
      <li>New</li>
      <li>Edit</li>
    </ul>
  </div>
  <div id="app-container">
    <form method="post">
      <h1 id="main-title">
        Add a new film  
      </h1>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        YouTube or Vimeo link
      </h3>
        <p>
          <input class="input wide" type="text" name="link" ng-change="fetch();" ng-model="link" placeholder="YouTube or Vimeo link" autocomplete="off">
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Video
      </h3>
        <p>
          <iframe src="http://player.vimeo.com/video/32735700" style="width:100%;height:1008px;"></iframe>
        </p>
      </div>
      <hr>
      <div class="field-container" id="field-container-picture">
        <h3 class="field-description">
        Picture
      </h3>
          <table id="picture-block">
            <tr>
              <td class="picture-block-left">
                <div id="picture-container" ng-style="imageContainer">
                  <div id="picture" style="background:url('{{image}}');background-position:0 0;background-size: 310px;background-repeat: no-repeat;"></div>
                </div>
              </td>
              <td class="picture-block-right">
                <div id="image-controls">
                  <h3>
                  Position
                </h3>
                  <table class="image-control-block">
                    <tr>
                      <td class="image-control-left">
                        <button class="image-control" onclick="move('left');">Left</button>
                      </td>
                      <td class="image-control-middle">
                        <input id="image-control-slider-x" type="range" min="-310" max="310" oninput="move('X');" />
                      </td>
                      <td class="image-control-right">
                        <button class="image-control" onclick="move('right');">Right</button>
                      </td>
                    </tr>
                  </table>
                  <table class="image-control-block">
                    <tr>
                      <td class="image-control-left">
                        <button class="image-control" onclick="move('down');">Down</button>
                      </td>
                      <td class="image-control-middle">
                        <input id="image-control-slider-y" type="range" min="-186" max="186" oninput="move('Y');" />
                      </td>
                      <td class="image-control-right">
                        <button class="image-control" onclick="move('up');">Up</button>
                      </td>
                    </tr>
                  </table>
                  <h3>
                  Zoom
                </h3>
                  <table class="image-control-block">
                    <tr>
                      <td class="image-control-left">
                        <button class="image-control" onclick="zoom('out');">Out</button>
                      </td>
                      <td class="image-control-middle">
                        <input id="image-control-slider-z" type="range" min="0" max="620" oninput="zoom('Z');" />
                      </td>
                      <td class="image-control-right">
                        <button class="image-control" onclick="zoom('in');">In</button>
                      </td>
                    </tr>
                  </table>
                  <br>
                  <br>
                  <button class="image-control" onclick="resetImageSize();">
                    Reset
                  </button>
                </div>
              </td>
            </tr>
          </table>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Title
      </h3>
        <p>
          <input id="title" ng-style="input" class="input wide" type="text" ng-model="title" value="{{title}}" placeholder="Title" autocomplete="off">
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Description
      </h3>
        <p>
          <textarea id="description" ng-style="input" class="input-text  wide" value="" ng-model="description" Placeholder="Description">{{description}}</textarea>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
          Length
      </h3>
        <p>
          <input id="length" ng-style="input" class="input wide" value="{{length}}" ng-model="length" Placeholder="Length" autocomplete="off">
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Category
      </h3>
        <p>
          <input id="category" ng-style="input" class="input wide" value="" ng-model="category" Placeholder="Category" autocomplete="off">
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
            Director
        </h3>
        <p id="item-director">
          <input id="director" class="input" value="" ng-model="director" Placeholder="Director" autocomplete="off">
          <button class="add-item" title="Add" ng-click="addItem('director');">
            +
          </button>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
          Producer
        </h3>
        <p id="item-producer">
          <input id="producer" class="input" value="" ng-model="producer" Placeholder="Producer" autocomplete="off">
          <button class="add-item" title="Add" ng-click="addItem('producer');">
            +
          </button>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
          Screenplay
        </h3>
        <p id="item-screenplay">
          <input id="screenplay" class="input" value="" ng-model="screenplay" Placeholder="Screenplay" autocomplete="off">
          <button class="add-item" title="Add" ng-click="addItem('screenplay');">
            +
          </button>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
          DoP
        </h3>
        <p id="item-dop">
          <input id="dop" class="input" value="" ng-model="dop" Placeholder="DoP" autocomplete="off">
          <button class="add-item" title="Add" ng-click="addItem('dop');">
            +
          </button>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Cast
      </h3>
        <p id="item-cast">
          <input id="cast" class="input" value="" ng-model="cast" Placeholder="Cast" autocomplete="off">
          <button class="add-item" title="Add" ng-click="addItem('cast');">
            +
          </button>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Year
      </h3>
        <p>
          <input id="year" class="input wide" value="" ng-model="year" Placeholder="Year" autocomplete="off">
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Trivia
      </h3>
        <p>
          <textarea id="trivia" class="input-text wide" value="" ng-model="trivia" Placeholder="Trivia"></textarea>
        </p>
      </div>
      <hr>
      <div class="field-container">
        <h3 class="field-description">
        Link
      </h3>
        <p id="item-link">
          <input id="trivia-link" class="input" value="" ng-model="triviaLink" Placeholder="Link" autocomplete="off">
          <button class="add-item" title="Add" ng-click="addItem('link');">
            +
          </button>
        </p>
      </div>
      <hr>
    </form>
  </div>
  <script src="angular.js"></script>
</body>

</html>