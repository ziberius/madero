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
            })
            .when('/listing', {
                templateUrl: '/main/web/pages/modules/listing.php',
                controller: 'listingController'
            })
            .when('/view/:id', {
                templateUrl: '/main/web/pages/modules/news-details.php',
                controller: 'viewController'
            })
            .when('/mineria', {
                templateUrl: '/main/web/pages/modules/maderomineria.php',
                controller: 'mineriaController'
            })
            .when('/listing_1', {
                templateUrl: '/main/web/pages/modules/listing_1.php',
                controller: 'listing1Controller'
            })
            .when('/listing_2', {
                templateUrl: '/main/web/pages/modules/listing_2.php',
                controller: 'listing2Controller'
            })
            .when('/listing_3', {
                templateUrl: '/main/web/pages/modules/listing_3.php',
                controller: 'listing3Controller'
            })
        ;
    })
    .service('navigate', function ($location, $rootScope) {

        $rootScope.detail = function (idPost) {
            $location.path("/view/" + idPost);
        };

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
                showMessage("Error al obtener las news. El servidor respondió: " + e.statusText);
                $rootScope.loading = false;
            });
        };

        this.getPostFromId = function (idPost, success) {
            $http.post('/main/server/Service.php',
                {
                    "service": "getPostsFromId",
                    "parameters": {
                        "id_post": idPost
                    }
                }
            ).then(function (response) {
                success(response);

            }).catch(function (e) {
                showMessage("Error al obtener la noticia. El servidor respondió: " + e.statusText);
                $rootScope.loading = false;
            });
        };

    })
    .service('news', function ($sce) {
        var myService = this;
        myService.getSingleNews = function (data) {

            var noticia = data;
            noticia.formattedDate = getFormattedDate(data.date);

            var contentHtml = toContentHtml(data);
            noticia.content = $sce.trustAsHtml(contentHtml);

            var thumbnailImagePost = getThumbnailImagePost(data);
            noticia.thumbnailImageUrl = thumbnailImagePost === null ? null : thumbnailImagePost.guid;

            noticia.shortTitle = data.title.substring(0, 70) + '...';

            return noticia;
        };

        myService.getMultipleNews = function (data) {
            var response = [];
            angular.forEach(data, function (post) {
                response.push(myService.getSingleNews(post));
            });
            return response;
        };
    })
    .controller('mainController', function ($rootScope, $scope, $location, getPosts, news, navigate) {
        $scope.offsetNacAntofagasta = 1;
        $scope.offsetNacAtacama = 1;
        $scope.offsetNacSerena = 1;
        $scope.offsetNacionales = 1;

//TODO cambiar fechas
        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "1", "0", "22,101",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.destacadaAntofagasta = news.getMultipleNews(res.data.data);

                } else {
                    $scope.destacadaAntofagasta = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );
//TODO cambiar fechas
        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "1", "0", "23,101",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.destacadaAtacama = news.getMultipleNews(res.data.data);

                } else {
                    $scope.destacadaAtacama = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );
//TODO cambiar fechas
        getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "1", "0", "24,101",
            function (res) {
                if (res.data !== null && res.data.status === 'OK') {

                    $scope.destacadaSerena = news.getMultipleNews(res.data.data);

                } else {
                    $scope.destacadaSerena = null;
                    showMessage("No se encontraron resultados");
                }
            }
        );

        $scope.loadNacionales = function () {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "9", $scope.offsetNacionales, "11",
                function (res) {
                    if (res.data !== null && res.data.status === 'OK') {

                        $scope.nacionales = news.getMultipleNews(res.data.data);
                    } else {
                        $scope.nacionales = null;
                        showMessage("No se encontraron resultados");
                    }
                }
            );
        };

        $scope.loadAntofagasta = function () {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "3", $scope.offsetNacAntofagasta, "22",
                function (res) {
                    if (res.data !== null && res.data.status === 'OK') {

                        $scope.nacionalesAntofa = news.getMultipleNews(res.data.data);
                    } else {
                        $scope.nacionalesAntofa = null;
                        showMessage("No se encontraron resultados");
                    }
                }
            );
        };


        $scope.loadAtacama = function () {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "3", $scope.offsetNacAtacama, "23",
                function (res) {
                    if (res.data !== null && res.data.status === 'OK') {

                        $scope.nacionalesAtacama = news.getMultipleNews(res.data.data);
                    } else {
                        $scope.nacionalesAtacama = null;
                        showMessage("No se encontraron resultados");
                    }
                }
            );
        };

        $scope.loadSerena = function () {

            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "3", $scope.offsetNacSerena, "24",
                function (res) {
                    if (res.data !== null && res.data.status === 'OK') {

                        $scope.nacionalesSerena = news.getMultipleNews(res.data.data);

                    } else {
                        $scope.nacionalesSerena = null;
                        showMessage("No se encontraron resultados");
                    }
                }
            );
        };

        $scope.masAtacama = function () {
            $scope.offsetNacAtacama = $scope.offsetNacAtacama + 3;
            $scope.loadAtacama();
        };

        $scope.masAntofagasta = function () {
            $scope.offsetNacAntofagasta = $scope.offsetNacAntofagasta + 3;
            $scope.loadAntofagasta();
        };

        $scope.masSerena = function () {
            $scope.offsetNacSerena = $scope.offsetNacSerena + 3;
            $scope.loadSerena();
        };

        $scope.masNacionales = function () {
            $scope.offsetNacionales = $scope.offsetNacionales + 9;
            $scope.loadNacionales();
        };

        $scope.loadAtacama();
        $scope.loadAntofagasta();
        $scope.loadSerena();
        $scope.loadNacionales();
        //international news
        getPosts.getPostsFromCategory(getDateFromNow(-30), getDateFromNow(0), "5", "0", "99", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.internationalPosts = news.getMultipleNews(data.data);

            } else {
                $scope.internationalPosts = null;
                showMessage("No se encontraron resultados");
            }
        });


        $scope.$on('$viewContentLoaded', function () {
            loadSliders();
        });
    })
    .controller('viewController', function ($scope, $routeParams, getPosts, news, navigate) {

        var idPost = $routeParams.id;
        getPosts.getPostFromId(idPost, function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.mainPost = news.getSingleNews(data.data[0]);

                var idCategory = $scope.mainPost.categories[0].id;
                getOtherPost(idCategory);

            } else {
                $scope.mainPost = null;
                showMessage("No se encontraron resultados");
            }
        });

        function getOtherPost(idCategory) {
            //TODO cambiar fechas, limit, offset
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), "5", "0", idCategory, function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.otherPosts = news.getMultipleNews(data.data);
                } else {
                    $scope.otherPosts = null;
                    showMessage("No se encontraron resultados");
                }
            });
        }

        $scope.loadOtherNewsCarousel = function () {
            $("#other-news-carousel").owlCarousel({
                items: 3,
                pagination: false,
                navigation: false,
                autoPlay: true,
                stopOnHover: true,
                slideSpeed: 500
            });
        };


        //international news
        getPosts.getPostsFromCategory(getDateFromNow(-30), getDateFromNow(0), "5", "0", "99", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.internationalPosts = news.getMultipleNews(data.data);

            } else {
                $scope.internationalPosts = null;
                showMessage("No se encontraron resultados");
            }
        });

    })
    .controller('listingController', function ($scope, $routeParams, getPosts, news, navigate) {

        // National Post
        $scope.quantityNationalPost = 17;
        $scope.offsetNationalPost = 0;
        loadNationalPost($scope.quantityNationalPost, $scope.offsetNationalPost);

        $scope.moreNationalPost = function () {
            $scope.offsetNationalPost += 17;
            loadNationalPost($scope.quantityNationalPost, $scope.offsetNationalPost);
        };

        //TODO cambiar fechas y categoria, agregar la categoria 102
        function loadNationalPost(limit, offset) {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), limit, offset, "11", function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.nationalPosts = news.getMultipleNews(data.data);

                } else {
                    $scope.nationalPosts = null;
                    showMessage("No se encontraron resultados");
                }
            });
        }

        // National Posts Highlighted
        getPosts.getPostsFromCategory(getDateFromNow(-90), getDateFromNow(0), "5", "0", "11", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.nationalPostsHighlighted = news.getMultipleNews(data.data);

            } else {
                $scope.nationalPostsHighlighted = null;
                showMessage("No se encontraron resultados");
            }
        });

        $scope.loadNationalPostsHighlightedCarousel = function () {
            $("#national-posts-highlighted-carousel").owlCarousel({
                items: 4,
                pagination: false,
                navigation: false,
                autoPlay: true,
                stopOnHover: true

            });
        };

        //TODO cambiar fechas, limit y offset
        //international post
        getPosts.getPostsFromCategory(getDateFromNow(-30), getDateFromNow(0), "6", "0", "99", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.internationalPosts = news.getMultipleNews(data.data);

            } else {
                $scope.internationalPosts = null;
                showMessage("No se encontraron resultados");
            }
        });


    })
    .controller('mineriaController', function ($scope, $routeParams) {

    })
    .controller('listing1Controller', function ($scope, $routeParams, getPosts, news, navigate) {

        // Antofagasta Post
        $scope.quantityAntofagastaPost = 17;
        $scope.offsetAntofagastaPost = 0;
        loadAntofagastaPost($scope.quantityAntofagastaPost, $scope.offsetAntofagastaPost);

        $scope.moreAntofagastaPost = function () {
            $scope.offsetAntofagastaPost += 17;
            loadAntofagastaPost($scope.quantityAntofagastaPost, $scope.offsetAntofagastaPost);
        };

        //TODO cambiar fechas y categoria
        function loadAntofagastaPost(limit, offset) {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), limit, offset, "22", function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.antofagastaPosts = news.getMultipleNews(data.data);

                } else {
                    $scope.antofagastaPosts = null;
                    showMessage("No se encontraron resultados");
                }
            });
        }

        // Antofagasta Posts Highlighted
        //TODO agregar la categoria 102
        getPosts.getPostsFromCategory(getDateFromNow(-90), getDateFromNow(0), "5", "0", "22", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.antofagastaPostsHighlighted = news.getMultipleNews(data.data);

            } else {
                $scope.antofagastaPostsHighlighted = null;
                showMessage("No se encontraron resultados");
            }
        });

        $scope.loadAntofagastaPostsHighlightedCarousel = function () {
            $("#antofagasta-posts-highlighted-carousel").owlCarousel({
                items: 4,
                pagination: false,
                navigation: false,
                autoPlay: true,
                stopOnHover: true

            });
        };

        //TODO cambiar fechas, limit y offset
        //international post
        getPosts.getPostsFromCategory(getDateFromNow(-30), getDateFromNow(0), "6", "0", "99", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.internationalPosts = news.getMultipleNews(data.data);

            } else {
                $scope.internationalPosts = null;
                showMessage("No se encontraron resultados");
            }
        });


    })
    .controller('listing2Controller', function ($scope, $routeParams, getPosts, news, navigate) {

        // Atacama Post
        $scope.quantityAtacamaPost = 17;
        $scope.offsetAtacamaPost = 0;
        loadAtacamaPost($scope.quantityAtacamaPost, $scope.offsetAtacamaPost);

        $scope.moreAtacamaPost = function () {
            $scope.offsetAtacamaPost += 17;
            loadAtacamaPost($scope.quantityAtacamaPost, $scope.offsetAtacamaPost);
        };

        //TODO cambiar fechas y categoria
        function loadAtacamaPost(limit, offset) {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), limit, offset, "23", function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.atacamaPosts = news.getMultipleNews(data.data);

                } else {
                    $scope.atacamaPosts = null;
                    showMessage("No se encontraron resultados");
                }
            });
        }

        // Atacama Posts Highlighted
        //TODO agregar la categoria 102
        getPosts.getPostsFromCategory(getDateFromNow(-90), getDateFromNow(0), "5", "0", "23", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.atacamaPostsHighlighted = news.getMultipleNews(data.data);

            } else {
                $scope.atacamaPostsHighlighted = null;
                showMessage("No se encontraron resultados");
            }
        });

        $scope.loadAtacamaPostsHighlightedCarousel = function () {
            $("#atacama-posts-highlighted-carousel").owlCarousel({
                items: 4,
                pagination: false,
                navigation: false,
                autoPlay: true,
                stopOnHover: true

            });
        };

        //TODO cambiar fechas, limit y offset
        //International post
        getPosts.getPostsFromCategory(getDateFromNow(-30), getDateFromNow(0), "6", "0", "99", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.internationalPosts = news.getMultipleNews(data.data);

            } else {
                $scope.internationalPosts = null;
                showMessage("No se encontraron resultados");
            }
        });


    })
    .controller('listing3Controller', function ($scope, $routeParams, getPosts, news, navigate) {

        // Coquimbo - La serena Post
        $scope.quantityCoquimboPost = 17;
        $scope.offsetCoquimboPost = 0;
        loadCoquimboPost($scope.quantityCoquimboPost, $scope.offsetCoquimboPost);

        $scope.moreCoquimboPost = function () {
            $scope.offsetCoquimboPost += 17;
            loadCoquimboPost($scope.quantityCoquimboPost, $scope.offsetCoquimboPost);
        };

        //TODO cambiar fechas y categoria
        function loadCoquimboPost(limit, offset) {
            getPosts.getPostsFromCategory(getDateFromNow(-365), getDateFromNow(0), limit, offset, "24", function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.coquimboPosts = news.getMultipleNews(data.data);

                } else {
                    $scope.coquimboPosts = null;
                    showMessage("No se encontraron resultados");
                }
            });
        }

        // Coquimbo - La Serena Posts Highlighted
        //TODO agregar la categoria 102
        getPosts.getPostsFromCategory(getDateFromNow(-90), getDateFromNow(0), "5", "0", "24", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.coquimboPostsHighlighted = news.getMultipleNews(data.data);

            } else {
                $scope.coquimboPostsHighlighted = null;
                showMessage("No se encontraron resultados");
            }
        });

        $scope.loadCoquimboPostsHighlightedCarousel = function () {
            $("#coquimbo-posts-highlighted-carousel").owlCarousel({
                items: 4,
                pagination: false,
                navigation: false,
                autoPlay: true,
                stopOnHover: true

            });
        };

        //TODO cambiar fechas, limit y offset
        //International post
        getPosts.getPostsFromCategory(getDateFromNow(-30), getDateFromNow(0), "6", "0", "99", function (response) {
            var data = response.data;
            if (data !== null && data.status === 'OK') {
                $scope.internationalPosts = news.getMultipleNews(data.data);

            } else {
                $scope.internationalPosts = null;
                showMessage("No se encontraron resultados");
            }
        });


    })

;

function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

function showMessage(message) {
    $("#btnNotificacion").click();
    $("<div class='alert alert-danger alert-dismissible fade in notificacion'\n\
     role='alert'><button id='btnNotificacion' type='button' class='close'\n\
     data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;\n\
    </span></button><strong>Notificación</strong><p>" + message + "</p></div>").appendTo("#main-wrapper").fadeIn();
}

function loadSliders() {
    /*==============================================================*/
    // Owl Carousel
    /*==============================================================*/
    $("#home-slider").owlCarousel({
        pagination: true,
        autoPlay: true,
        singleItem: true,
        stopOnHover: true
    });

    $("#latest-news").owlCarousel({
        items: 4,
        pagination: true,
        autoPlay: true,
        stopOnHover: true
    });

    $(".twitter-feeds").owlCarousel({
        items: 1,
        singleItem: true,
        pagination: false,
        autoPlay: true,
        stopOnHover: true
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

    if (response == null) {
        var keepGoing = true;

        angular.forEach(post.resources, function (resource) {
            if (keepGoing) {

                var mimeType = resource.mime_type;

                if (mimeType === 'image/jpeg' || mimeType === 'image/bmp' || mimeType === 'image/png' || mimeType === 'image/gif') {
                    keepGoing = false;
                    response = resource;
                }
            }
        });
    }

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

function toContentHtml(post) {

    var content = post.content;
    content = parseParagraph(content);

    content = parseAudioMp3(content);

    content = parseAudioPlayList(content, post.resources);

    return content;

}

function parseParagraph(content) {
    content = '<p>' + content;
    var newLine = new RegExp('\r\n\r\n|\n\n', 'g');
    return content.replace(newLine, '<p>');
}

function parseAudioMp3(content) {
    var audioStart = new RegExp('\\[\\audio', 'g');
    content = content.replace(audioStart, '<audio');

    var audioMiddle = new RegExp('mp3\\=', 'g');
    content = content.replace(audioMiddle, 'src=');

    var audioEnd = new RegExp('\\]\\[\\/audio\\]', 'g');
    return content.replace(audioEnd, ' preload="auto" controls><audio> ');

}

function parseAudioPlayList(content, resources) {
    // example [playlist ids=\"15061\"]

    var playlistRegEx = new RegExp('\\[playlist ids=\\"[0-9]*\\"\\]', 'g');

    while ((match = playlistRegEx.exec(content)) != null) {

        var playlistText = match.toString();
        var result = playlistText.split('"');
        var id = result[1];
        var guid = getGUIDFromResource(id, resources);

        var audioTag = '<audio src="' + guid + '" preload="auto" controls><audio>';

        content = content.replace(playlistText, audioTag);

    }

    return content;
}

function getGUIDFromResource(id, resources) {
    var response = null;
    var keepGoing = true;
    angular.forEach(resources, function (resource) {
        if (keepGoing) {
            if (id === resource.id) {
                keepGoing = false;
                response = resource.guid;
            }
        }
    });
    return response;
}

$("#cerrarRadios").click(function () {
    $("#maderoRadios").fadeOut();
});



