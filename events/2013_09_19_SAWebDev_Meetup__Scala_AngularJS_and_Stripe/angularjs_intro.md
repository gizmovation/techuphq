# Intro to AngularJS

AngularJS is a structural framework for dynamic web apps. It uses HTML as a template language and allows you to add custom tags and attributes (directives) to add functionality to your pages.

To download go to: [http://angularjs.org](http://angularjs.org)

## Why is Angular better than X?

There are so many MV* javascript frameworks available today. It can be difficult to choose, but Angular is set apart in a few ways:

- AngularJS extends the HTML vocabulary instead of building around it.
- AngularJS provides automatic data binding between models and views.
- AngularJS is backed by Google.

To see some of the other javascript frameworks that are available check out: [http://todomvc.com/](http://todomvc.com/).

## Stack Overflow Questions

- AngularJS (12,765)
- Backbone.js (11,001)
- Dojo (5,602)
- Ember.js (5,702)
- KnockoutJS (7,316)
- YUI (1,525)

## Let's Learn the Basics

- Anatomy of an AngularJS App
- Data Binding
- Filtering
- Click Events
- Validation

We will start with this sample page and do some live coding:

```
<!doctype html>
<html ng-app>
  <head>
    <title>Awesome Angular App!</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
  </head>
  <body>
    <h2>Say Hello</h2>
    <div>
      <label>To:</label><input ng-model="name"><br>
      <h3>Hello, {{name}}!</h3>
    </div>
    <script>
    </script>
  </body>
</html>
```

Update: Here is the completed demo from the meetup…

```
<!doctype html>
<html ng-app>
  <head>
    <title>Awesome Angular App!</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
  </head>
  <body>
    <h2>SA Meetup Groups</h2>
    <div ng-controller="Ctrl">
      <label>Search: </label><input ng-model="search">
      <ul>
        <li ng-repeat="meetup in meetups|filter:search">
          {{meetup.name}} - {{meetup.members}} <button ng-click="remove($index)">X</button>
        </li>
      </ul>
      <form ng-submit="add()">
        <label>Name:</label><input ng-model="newName" required><br>
        <label>Members:</label><input ng-model="newMembers" type="number" required><br>
        <button>Add Meetup</button>
      </form>
    </div>
    <script>
      var Ctrl = function ($scope) {
        $scope.meetups = [
          { name:"Web Devs", members: 330 },
          { name: "PHP", members: 100 }
        ];
        $scope.add = function () {
          $scope.meetups.push({
            name:$scope.newName, members: $scope.newMembers
          });
          $scope.newName = "";
          $scope.newMembers = "";
        };
        $scope.remove = function (index) {
          $scope.meetups.splice(index, 1);
        };
      };
    </script>
  </body>
</html>
```

## Interesting Reads

- [AngularJS API Reference](http://docs.angularjs.org/api/)
- [Imperative vs Declarative Programming](http://latentflip.com/imperative-vs-declarative/)
- [How do I "think in AngularJS" if I have a jQuery background?](http://stackoverflow.com/questions/14994391/how-do-i-think-in-angularjs-if-i-have-a-jquery-background)
