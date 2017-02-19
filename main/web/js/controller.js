
var maderoApp = angular.module('maderoApp', ['ngRoute', 'ngAnimate', 'ngTouch']);


// configure our routes
maderoApp.config(function ($routeProvider) {
    $routeProvider
            // route for the home page
            .when('/', {
                redirectTo: '/madero'
            })
            // route for the home page
            .when('/madero', {
                templateUrl: '/main/web/pages/modules/main.php',
                controller: 'mainController'
            });

});

maderoApp.controller('mainController', function ($scope, $rootScope, $http, $timeout, $location) {
    $scope.$on('$viewContentLoaded', function () {
        /*==============================================================*/
        // Owl Carousel
        /*==============================================================*/
        $("#home-slider").owlCarousel({
            pagination: true,
            autoPlay: true,
            singleItem: true,
            stopOnHover: true,
        });

        $("#latest-news").owlCarousel({
            items: 4,
            pagination: true,
            autoPlay: true,
            stopOnHover: true,
        });

        $(".twitter-feeds").owlCarousel({
            items: 1,
            singleItem: true,
            pagination: false,
            autoPlay: true,
            stopOnHover: true,
        });

        $("#main-slider").owlCarousel({
            items: 4,
            pagination: false,
            navigation: false,
            autoPlay: true,
            stopOnHover: true

        });

        $("#related-news-carousel").owlCarousel({
            items: 3,
            pagination: false,
            navigation: false,
            autoPlay: true,
            stopOnHover: true,
            slideSpeed: 500
        });

        $("#top-news").owlCarousel({
            items: 1,
            singleItem: true,
            pagination: false,
            navigation: false,
            autoPlay: true,
            stopOnHover: true,
            slideSpeed: 500
        });
    });
});