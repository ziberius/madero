angular
    .module('maderoApp', ['ngRoute', 'ngAnimate', 'ngTouch'])
    .config(function ($routeProvider) {
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
    })

    .controller('mainController', function ($scope, $rootScope, $http, $timeout, $location) {
        $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromCategory",
                "parameters": {
                    "start_date": "01/01/2016",
                    "end_date": "01/03/2017",
                    "limit": "3",
                    "offset": "0",
                    "categories": "22"
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
                "parameters": {
                    "start_date": "01/01/2016",
                    "end_date": "01/03/2017",
                    "limit": "3",
                    "offset": "0",
                    "categories": "23"
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
                "parameters": {
                    "start_date": "01/01/2016",
                    "end_date": "01/03/2017",
                    "limit": "3",
                    "offset": "0",
                    "categories": "24"
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
    })

    .controller('viewController', function ($scope, $rootScope, $http, $routeParams, $sce) {
        //LOAD principal post
        $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromId",
                "parameters": {
                    "id_post": $routeParams.id
                }
            }
        ).then(function (response) {

            var data = response.data;

            if (data !== null && data.status === 'OK') {

                var news = data.data[0];

                $scope.news = {};
                $scope.news.title = news.title;

                var contentHtml = toContentHtml(news.content);
                $scope.news.content = $sce.trustAsHtml(contentHtml);
                $scope.news.author = news.author;
                $scope.news.formattedDate = getFormattedDate(news.date);
                $scope.news.tags = news.tags;

                var thumbnailImagePost = getThumbnailImagePost(news);
                $scope.news.thumbnailImageUrl = thumbnailImagePost == null ? null : thumbnailImagePost.guid;

            } else {
                //TODO agregar pagina de error o mensaje bonito de error
                $scope.news = null;
                showMessage("No se encontraron resultados");
            }
        }).catch(function (e) {
            //TODO agregar pagina de error o mensaje bonito de error
            showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
            $rootScope.loading = false;
        });

        //LOAD related post
        $http.post('/main/server/Service.php',
            {
                "service": "getPostsFromCategory",
                "parameters": {
                    "start_date": getDateFromNow(-365),
                    "end_date": getDateFromNow(0),
                    "limit": "3",
                    "offset": "0",
                    "categories": "22"
                }
            }
        ).then(function (response) {

            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.otherPosts = getPosts(data.data);

            } else {
                //TODO agregar pagina de error o mensaje bonito de error
                $scope.otherPosts = null;
                showMessage("No se encontraron resultados");
            }

        }).catch(function (e) {
            //TODO agregar pagina de error o mensaje bonito de error
            showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
            $rootScope.loading = false;
        });


    })
;

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

function getPosts(data) {
    var response = [];
    if (data.length > 0) {
        angular.forEach(data, function (post) {
            var thumbnailImagePost = getThumbnailImagePost(post);
            post.thumbnailImageUrl = thumbnailImagePost == null ? null : thumbnailImagePost.guid;
            post.formattedDate = getFormattedDate(post.date);
            response.push(post);
        });
    }
    return response;
}

function getThumbnailImagePost(post) {
    var response = null;

    angular.forEach(post.post_meta, function (metadata) {
        if (metadata.key == '_thumbnail_id') {
            var idPostThumbnail = metadata.value;

            angular.forEach(post.resources, function (resource) {
                if (resource.id == idPostThumbnail) {
                    response = resource;
                }
            });
        }
    });

    return response;

}

function getFormattedDate(date) {

    var monthNames = [
        "enero",
        "febrero",
        "marzo",
        "abril",
        "mayo",
        "junio",
        "julio",
        "agosto",
        "septiembre",
        "octubre",
        "noviembre",
        "diciembre"
    ];

    var objectDate = new Date(date);

    var day = objectDate.getDate();
    var monthIndex = objectDate.getMonth();
    var year = objectDate.getFullYear();

    return day + ' de ' + monthNames[monthIndex] + ', ' + year;

}

function getDateFromNow(days) {
    var today = new Date();
    today.setDate(today.getDate() + days);

    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!

    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    return dd + '/' + mm + '/' + yyyy;
}

function toContentHtml(content) {

    content = parseParagraph(content);

    content = parseAudio(content);

    return content;

}

function parseParagraph(content) {
    content = '<p>' + content;
    var newLine = new RegExp('\r\n\r\n', 'g');
    return content.replace(newLine, '<p>');
}

function parseAudio(content) {
    var audioStart = new RegExp('\\[\\audio', 'g');
    content = content.replace(audioStart, '<audio');

    var audioMiddle = new RegExp('mp3\\=', 'g');
    content = content.replace(audioMiddle, 'src=');

    var audioEnd = new RegExp('\\]\\[\\/audio\\]', 'g');
    return content.replace(audioEnd, ' preload="auto" controls><audio> ');
}


