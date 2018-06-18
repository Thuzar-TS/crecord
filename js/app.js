angular.module('ngRoutingDemo', ['ngRoute','controller','base64'])
.config(function($routeProvider) {             
            $routeProvider.when('/', {
                templateUrl: 'login.php',
                controller: 'loginController'
            }).when('/customer', {
                templateUrl : "customer.php",
                controller: 'customerController'
            }).when('/project', {
                templateUrl : "project.php",
                controller: 'projectController'
            }).when('/logout', {
                templateUrl: 'login.php',
                controller: 'logoutController'
            }).otherwise({
                redirectTo: "/"
            });
});