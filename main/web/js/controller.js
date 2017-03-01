
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
            }).when('/view/:id', {
                templateUrl: '/main/web/pages/modules/news-details.php',
                controller: 'viewController'
            });
    });


maderoApp.controller('mainController', function ($scope, $rootScope, $http, $timeout, $location) {

    $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromCategory",
                "parameters":
                        {
                            "start_date": "01/01/2016",
                            "end_date": "01/03/2017",
                            "limit": "3",
                            "offset": "0",
                            "category": "ANTOFAGASTA ONLINE"
                        }
            }
    ).then(function (res) {

        if (res.data !== null && res.data.status === 'OK') {

            $scope.nacionalesAntofa = generarNoticias(res.data.data);

        } else {
            $scope.nacionalesAntofa = null;
            showMessage("No se encontraron resultados");
        }
    }).catch(function (e) {
        showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
        $rootScope.loading = false;
    });

    $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromCategory",
                "parameters":
                        {
                            "start_date": "01/01/2016",
                            "end_date": "01/03/2017",
                            "limit": "3",
                            "offset": "0",
                            "category": "ATACAMA ONLINE"
                        }
            }
    ).then(function (res) {

        if (res.data !== null && res.data.status === 'OK') {

            $scope.nacionalesAtacama = generarNoticias(res.data.data);

        } else {
            $scope.nacionalesAtacama = null;
            showMessage("No se encontraron resultados");
        }
    }).catch(function (e) {
        showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
        $rootScope.loading = false;
    });

    $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromCategory",
                "parameters":
                        {
                            "start_date": "01/01/2016",
                            "end_date": "01/03/2017",
                            "limit": "3",
                            "offset": "0",
                            "category": "LA SERENA - COQUIMBO ONLINE"
                        }
            }
    ).then(function (res) {

        if (res.data !== null && res.data.status === 'OK') {

            $scope.nacionalesSerena = generarNoticias(res.data.data);

        } else {
            $scope.nacionalesSerena = null;
            showMessage("No se encontraron resultados");
        }
    }).catch(function (e) {
        showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
        $rootScope.loading = false;
    });

    $scope.detalle = function (noticia) {
        $location.path("/view/" + noticia);

    };

    $scope.$on('$viewContentLoaded', function () {
        cargarSliders();
    });
});

maderoApp.controller('viewController', function ($scope, $rootScope, $http, $routeParams) {
    //$routeParams.idprop


    $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromId",
                "parameters":
                        {
                            "id_post": $routeParams.id
                        }
            }
    ).then(function (res) {

        if (res.data !== null && res.data.status === 'OK') {

            $scope.noticia = generarNoticias(res.data.data);

        } else {
            $scope.noticia = null;
            showMessage("No se encontraron resultados");
        }
    }).catch(function (e) {
        showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
        $rootScope.loading = false;
    });

});


function showMessage(message) {
    $("#btnNotificacion").click();
    $("<div class='alert alert-danger alert-dismissible fade in notificacion'\n\
     role='alert'><button id='btnNotificacion' type='button' class='close'\n\
     data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;\n\
    </span></button><strong>Notificación</strong><p>" + message + "</p></div>").appendTo("#main").fadeIn();
}


function generarNoticias(data) {
    var tmp;
    var ret = [];
    $.each(data, function (i, item) {
        ret[i] = item;
        if (item.resources.length > 1) {
            tmp = item.post_meta[0].value;
            $.each(item.resources, function (j, subitem) {
                if (tmp === subitem.id) {
                    ret[i].guid = subitem.guid;
                }
            });
        } else {
            ret[i].guid = item.resources[0].guid;
        }
    });
    return ret;
}

function cargarSliders() {
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
}