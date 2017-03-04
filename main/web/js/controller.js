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
    .service('getPosts', function ($rootScope, $http) {
        this.getPostsFromCategory = function (start_date, end_date, limit, offset, categories, success) {
            $http.post('/main/server/Service.php',
                {
                    "service": "getPostsFromCategory",
                    "parameters": {
                        "start_date": start_date,
                        "end_date": end_date,
                        "limit": limit,
                        "offset": offset,
                        "categories": categories
                    }
                }
            ).then(function (res) {
                success(res);
            }).catch(function (e) {
                showMessage("Error al obtener las noticias. El servidor respondió: " + e.statusText);
                $rootScope.loading = false;
            });
        };

    })
    .service('noticias', function ($sce) {
        var miServicio = this;
        miServicio.generaNoticia = function (data) {
            var noticia = {};

            noticia.title = data.title;

            var contentHtml = toContentHtml(data.content);
            noticia.content = $sce.trustAsHtml(contentHtml);
            noticia.author = data.author;
            noticia.formattedDate = getFormattedDate(data.date);
            noticia.tags = data.tags;
            noticia.id = data.id;

            var thumbnailImagePost = getThumbnailImagePost(data);
            noticia.thumbnailImageUrl = thumbnailImagePost === null ? null : thumbnailImagePost.guid;
            return noticia;
        };

        miServicio.generaNoticias = function (data) {
            var response = [];
            angular.forEach(data, function (post) {
                response.push(miServicio.generaNoticia(post));
            });
            return response;
        };
    })
    .controller('mainController', function ($scope, $location, getPosts, noticias) {

        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "1", "0", "22,101",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.destacadaAntofagasta = noticias.generaNoticias(res.data.data);

                } else {
                    $scope.destacadaAntofagasta = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "1", "0", "23,101",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.destacadaAtacama = noticias.generaNoticias(res.data.data);

                } else {
                    $scope.destacadaAtacama = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "1", "0", "24,101",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.destacadaSerena = noticias.generaNoticias(res.data.data);

                } else {
                    $scope.destacadaSerena = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "3", "0", "22",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.nacionalesAntofa = noticias.generaNoticias(res.data.data);

                } else {
                    $scope.nacionalesAntofa = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "3", "0", "23",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.nacionalesAtacama = noticias.generaNoticias(res.data.data);

                } else {
                    $scope.nacionalesAtacama = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "3", "0", "24",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.nacionalesSerena = noticias.generaNoticias(res.data.data);

                } else {
                    $scope.nacionalesSerena = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        $scope.detalle = function (noticia) {
            $location.path("/view/" + noticia);

        };

        $scope.$on('$viewContentLoaded', function () {
            cargarSliders();
        });
    })
    .controller('viewController', function ($scope, $rootScope, $http, $routeParams, noticias) {
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
                $scope.news = noticias.generaNoticia(data.data[0]);
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
    </span></button><strong>Notificación</strong><p>" + message + "</p></div>").appendTo("#main-wrapper").fadeIn();
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
        if (metadata.key === '_thumbnail_id') {
            var idPostThumbnail = metadata.value;

            angular.forEach(post.resources, function (resource) {
                if (resource.id === idPostThumbnail) {
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





