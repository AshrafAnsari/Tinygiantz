<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="../scripts/jquery.js"></script>
    <style>
      span {
        color: red;
      }
      .input {
        width: 400px;
      }
    </style>
  </head>
  <body ng-app="myFirstApp" ng-controller="myFirstController">
    <form method="post">
      <input class="input" type="text" name="link" ng-model="link" placeholder="Paste a YouTube or Vimeo link here and click on the button ->">
      <button id="button" type="button" ng-click="fetch();">Fetch information!</button>
    </form>
    <p>
      <input class="input" type="text" value="{{title}}" placeholder="Title">
    </p>
    <p>
      <input class="input" value="{{description}}" Placeholder="Description">
    </p>
    <p>
      <input class="input" value="{{length}}" Placeholder="Length">
    </p>
    <script src="angular.js"></script>
  </body>
</html>