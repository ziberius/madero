var ruta = '';

angular
        .module('maderoApp', ['ngRoute', 'ngAnimate', 'ngTouch', 'ngClickCopy'])
        .filter('trustAsResourceUrl', ['$sce', function ($sce) {
                return function (val) {
                    if (val.indexOf('watch?v=') !== -1) {
                        val = val.replace('watch?v=', 'embed/');
                    }
                    return $sce.trustAsResourceUrl(val);
                };
            }])
        .constant('Constants', {
            Category: {
                Uncategorised: '1',
                NACIONAL: '11',
                PODCAST: '12',
                AGENDA: '13',
                PROGRAMAS: '14',
                TURISMO: '15',
                VIDEOS: '16',
                PUBLICIDAD: '17',
                FAVORITOS: '18',
                BLOG: '19',
                CULTURA: '20',
                ENTREVISTAS: '21',
                ANTOFAGASTA: '22',
                ATACAMA: '23',
                LA_SERENA_COQUIMBO: '24',
                EXTERNO: '99',
                OPINION: '100',
                PORTADA: '102',
                DESTACADO: '103',
                DEPORTES: '107',
                VERTICAL: '117',
                HORIZONTAL: '118'
            },
            Limits: {
                InternationalSmall: 10,
                InternationalMedium: 50,
                InternationalBig: 100,
                StartRangeNews: -365
            }
        })
        .config(function ($routeProvider) {
            $routeProvider
                    // route for the home page
                    .when('/', {
                        redirectTo: '/madero'
                    })
                    // route for the home page
                    .when('/madero', {
                        templateUrl: '/madero/main/web/pages/modules/main.php',
                        controller: 'mainController'
                    })
                    .when('/listing', {
                        templateUrl: '/madero/main/web/pages/modules/listing.php',
                        controller: 'listingController'
                    })
                    .when('/view/:id', {
                        templateUrl: '/madero/main/web/pages/modules/news-details.php',
                        controller: 'viewController'
                    })
                    .when('/buscar/:termino', {
                        templateUrl: '/madero/main/web/pages/modules/listingBusqueda.php',
                        controller: 'busquedaController'
                    })
                    .when('/mineria', {
                        templateUrl: '/madero/main/web/pages/modules/maderomineria.php',
                        controller: 'mineriaController'
                    })
                    .when('/listing_1', {
                        templateUrl: '/madero/main/web/pages/modules/listing_1.php',
                        controller: 'listing1Controller'
                    })
                    .when('/listing_2', {
                        templateUrl: '/madero/main/web/pages/modules/listing_2.php',
                        controller: 'listing2Controller'
                    })
                    .when('/listing_3', {
                        templateUrl: '/madero/main/web/pages/modules/listing_3.php',
                        controller: 'listing3Controller'
                    })
                    .when('/listing_4', {
                        templateUrl: '/madero/main/web/pages/modules/listing_4.php',
                        controller: 'listing4Controller'
                    })
                    .when('/internacional', {
                        templateUrl: '/madero/main/web/pages/modules/listing_inter.php',
                        controller: 'internacionalController'
                    })

                    ;
        })
        .service('categorias', function (Constants) {
            this.getCategorias = function (arreglo) {
                var retorno = "";
                for (var o in arreglo) {
                    retorno = retorno === "" ? arreglo[o] : retorno + "," + arreglo[o];
                }
                return retorno;
            };

            this.getExclusiones = function (arreglo) {
                var retorno = "";
                for (var o in Constants.Category) {
                    if ($.inArray(Constants.Category[o], arreglo) === -1) {
                        retorno = retorno === "" ? Constants.Category[o] : retorno + "," + Constants.Category[o];
                    }
                }
                return retorno;
            };
        })
        .service('navigate', function ($location, $rootScope) {

            $rootScope.detail = function (idPost) {
                if (idPost.indexOf('http') === -1) {
                    $location.path("/view/" + idPost);
                } else {
                    var win = window.open(idPost, '_blank');
                    if (win) {
                        win.focus();
                    }
                }
            };

        })
        .service('getPosts', function ($rootScope, $http) {
            this.getPostsFromCategory = function (start_date, end_date, limit, offset, categories, exclusions, success) {
                $rootScope.loading = true;
                $http.post('/madero/main/server/Service.php',
                        {
                            "service": "getPostsFromCategory",
                            "parameters": {
                                "start_date": start_date,
                                "end_date": end_date,
                                "limit": limit,
                                "offset": offset,
                                "categories": categories,
                                "exclusions": exclusions
                            }
                        }
                ).then(function (res) {
                    success(res);
                }).catch(function (e) {
                    showMessage("Error al obtener las news. El servidor respondió: " + e.statusText);
                }).finally(function () {
                    $rootScope.loading = false;
                });
            };

            this.getPostFromId = function (idPost, success) {
                $rootScope.loading = true;
                $http.post('/madero/main/server/Service.php',
                        {
                            "service": "getPostsFromId",
                            "parameters": {
                                "id_post": idPost
                            }
                        }
                ).then(function (response) {
                    success(response);

                }).catch(function (e) {
                    showMessage("Error al obtener las news. El servidor respondió: " + e.statusText);
                }).finally(function () {
                    $rootScope.loading = false;
                });
            };

            this.searchPostsByText = function (limit, offset, keyword, success) {
                $rootScope.loading = true;
                $http.post('/madero/main/server/Service.php',
                        {
                            "service": "searchPosts",
                            "parameters":
                                    {
                                        "limit": limit,
                                        "offset": offset,
                                        "keyword": keyword
                                    }
                        }
                ).then(function (response) {
                    success(response);
                }).catch(function (e) {
                    showMessage("Error al obtener la noticia. El servidor respondió: " + e.statusText);
                }).finally(function () {
                    $rootScope.loading = false;
                });
            };

            this.searchPostsByAuthor = function (start_date, end_date, limit, offset, author, success) {
                $rootScope.loading = true;
                $http.post('/madero/main/server/Service.php',
                        {
                            "service": "getNewsFromAuthor",
                            "parameters":
                                    {
                                        "start-date": start_date,
                                        "end-date": end_date,
                                        "limit": limit,
                                        "offset": offset,
                                        "id-author": author
                                    }
                        }
                ).then(function (response) {
                    success(response);
                }).catch(function (e) {
                    showMessage("Error al obtener la noticia. El servidor respondió: " + e.statusText);
                }).finally(function () {
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

                noticia.shortTitle = data.title.substring(0, 65) + '...';

                if (noticia.oembed !== null) {
                    noticia.thumbnailImageUrl = noticia.oembed.thumbnail_url;
                    noticia.title = noticia.oembed.title;
                    noticia.id = noticia.oembed.url;

                }

                return noticia;
            };
            myService.getSinglePublicidad = function (data) {

                var noticia = data;

                var thumbnailImagePost = getThumbnailImagePost(data);
                noticia.thumbnailImageUrl = thumbnailImagePost === null ? null : thumbnailImagePost.guid;

                return noticia;
            };

            myService.getMultipleNews = function (data) {
                var response = [];
                angular.forEach(data, function (post) {
                    response.push(myService.getSingleNews(post));
                });
                return response;
            };

            myService.getMultiplePublicidad = function (data) {
                var response = [];
                angular.forEach(data, function (post) {
                    response.push(myService.getSinglePublicidad(post));
                });
                return response.sort(dynamicSort("content"));
            };

            myService.getMultipleNewsInternacional = function (data, type, limit) {
                var response = [];
                var cont = 0;
                var listo = false;
                angular.forEach(data, function (post) {
                    if (!listo && post.oembed !== null && post.oembed.type === type) {
                        cont++;
                        response.push(myService.getSingleNews(post));
                        if (cont === limit) {
                            listo = true;
                        }
                    }
                });
                return response;
            };
        })
        .directive('facebookComments', ['$location', function ($location) {
                return {
                    restrict: 'E',
                    templateUrl: "/madero/main/web/pages/include/facebookComments.html",
                    scope: {},
                    link: function (scope, el, attr) {
                        scope.curPath = $location.absUrl();
                    }
                };
            }])
        .directive('dynFbCommentBox', ['$timeout', function ($timeout) {
                function createHTML(href, numposts, colorscheme, width) {
                    return '<div class="fb-comments" ' +
                            'data-href="' + href + '" ' +
                            'data-numposts="' + numposts + '" ' +
                            'data-colorsheme="' + colorscheme + '" ' +
                            'data-width="' + width + '">' +
                            '</div>';
                }

                return {
                    restrict: 'A',
                    scope: {},
                    link: function postLink(scope, elem, attrs) {
                        //
                        // Use timeout in order to be called after all watches are done and FB script is loaded
                        //
                        attrs.$observe('pageHref', function (newValue) {
                            var href = newValue;
                            var numposts = attrs.numposts || 5;
                            var colorscheme = attrs.colorscheme || 'light';
                            var width = attrs.width || '100%';
                            elem.html(createHTML(href, numposts, colorscheme, width));
                            $timeout(function () {
                                if (typeof FB != 'undefined') {
                                    FB.XFBML.parse(elem[0]);
                                }
                            });
                        });


                    }
                };
            }])
        .controller('SuperCtrl', function ($rootScope, $location, $window) {

            $rootScope.$on('$routeChangeSuccess', function () {

                $window.ga('send', {
                    'hitType': 'screenview',
                    'appName': 'Madero FM',
                    'screenName': $location.url(),
                    'hitCallback': function () {
                        console.log('GA hitCallback sent!');
                    }
                });

            });

        })

        .controller("tvController", function ($scope) {
            $scope.cargarRadio = function (radio) {
                $("#playImg").hide();
                $("#tvIframe").show();
                switch (radio) {
                    case "ANTOFAGASTA":
                        $("#tvIframe").attr("src", "http://media.digitalproserver.com/v2/live/maderotv/");
                        break;
                    case "COQUIMBO":
                        $("#tvIframe").attr("src", "http://media.digitalproserver.com/v2/live/maderotv2/");
                        break;
                    case "DESIERTO":
                        $("#tvIframe").attr("src", "http://rudo.video/live/desiertotv");
                        break;
                }
            };
            $scope.cerrarRadios = function () {
                $("#maderoRadios").fadeOut();
                $("#tvIframe").attr("src", "");
            };
        })

        .controller("tvModalController", function ($scope) {
            $scope.cargarRadio = function (radio) {
                $("#playImgModal").hide();
                $("#tvIframeModal").show();
                switch (radio) {
                    case "ANTOFAGASTA":
                        $("#tvIframeModal").attr("src", "http://media.digitalproserver.com/v2/live/maderotv/");
                        break;
                    case "COQUIMBO":
                        $("#tvIframeModal").attr("src", "http://media.digitalproserver.com/v2/live/maderotv2/");
                        break;
                    case "DESIERTO":
                        $("#tvIframeModal").attr("src", "http://rudo.video/live/desiertotv");
                        break;
                }
            };
            $scope.cerrarRadios = function () {
                $("#tvIframeModal").attr("src", "");
                $("#tvIframeModal").hide();
                $("#playImgModal").show();
            };
        })

        .controller('mainController', function ($scope, Constants, getPosts, news, categorias, navigate) {

            var emptyExclusion = '';

            //Carrousel Destacadas

            var arreglo = [Constants.Category.ANTOFAGASTA, Constants.Category.DESTACADO, Constants.Category.PORTADA];

            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.destacadaAntofagasta = news.getMultipleNews(res.data.data);

                        } else {
                            $scope.destacadaAntofagasta = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            arreglo = [Constants.Category.ATACAMA, Constants.Category.DESTACADO, Constants.Category.PORTADA];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.destacadaAtacama = news.getMultipleNews(res.data.data);

                        } else {
                            $scope.destacadaAtacama = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            arreglo = [Constants.Category.LA_SERENA_COQUIMBO, Constants.Category.DESTACADO, Constants.Category.PORTADA];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.destacadaSerena = news.getMultipleNews(res.data.data);

                        } else {
                            $scope.destacadaSerena = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );
            arreglo = [Constants.Category.NACIONAL, Constants.Category.DESTACADO];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.destacadaNacional = news.getMultipleNews(res.data.data);

                        } else {
                            $scope.destacadaNacional = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            arreglo = [Constants.Category.DEPORTES, Constants.Category.DESTACADO];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.destacadaDeporte = news.getMultipleNews(res.data.data);

                        } else {
                            $scope.destacadaDeporte = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            arreglo = [Constants.Category.EXTERNO, Constants.Category.DESTACADO];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.destacadaInternacional = news.getMultipleNews(res.data.data);

                        } else {
                            $scope.destacadaInternacional = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            //NACIONALES IZQUIERDA
            $scope.loadNacionales = function () {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "12", $scope.offsetNacionales, Constants.Category.NACIONAL, categorias.getExclusiones([Constants.Category.NACIONAL]),
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

            var destacadoExclusion = Constants.Category.DESTACADO;
            //NOTICIAS DEL NORTE

            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", Constants.Category.ANTOFAGASTA, categorias.getExclusiones([Constants.Category.ANTOFAGASTA]),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {
                            $scope.norteAntofagasta = news.getMultipleNews(res.data.data);
                        } else {
                            $scope.norteAntofagasta = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", Constants.Category.ATACAMA, categorias.getExclusiones([Constants.Category.ATACAMA]),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {
                            $scope.norteAtacama = news.getMultipleNews(res.data.data);
                        } else {
                            $scope.norteAtacama = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", Constants.Category.LA_SERENA_COQUIMBO, categorias.getExclusiones([Constants.Category.LA_SERENA_COQUIMBO]),
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {
                            $scope.norteSerena = news.getMultipleNews(res.data.data);
                        } else {
                            $scope.norteSerena = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            //REGIONALES SECCION CENTRAL

            $scope.offsetNacAntofagasta = 1;
            $scope.offsetNacAtacama = 1;
            $scope.offsetNacSerena = 1;
            $scope.offsetNacionales = 1;

            $scope.loadAntofagasta = function () {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", $scope.offsetNacAntofagasta, Constants.Category.ANTOFAGASTA, categorias.getExclusiones([Constants.Category.ANTOFAGASTA]),
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
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", $scope.offsetNacAtacama, Constants.Category.ATACAMA, categorias.getExclusiones([Constants.Category.ATACAMA]),
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

                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "4", $scope.offsetNacSerena, Constants.Category.LA_SERENA_COQUIMBO, categorias.getExclusiones([Constants.Category.LA_SERENA_COQUIMBO]),
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

            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "4", "0", Constants.Category.VIDEOS, emptyExclusion,
                    function (res) {
                        if (res.data !== null && res.data.status === 'OK') {

                            $scope.videoTendencias = res.data.data;

                        } else {
                            $scope.videoTendencias = null;
                            showMessage("No se encontraron resultados");
                        }
                    }
            );

            var arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.HORIZONTAL, Constants.Category.PORTADA];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadHorizontal = null;
                    showMessage("No se encontraron resultados");
                }
            });
            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.VERTICAL, Constants.Category.PORTADA];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "2", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadVertical = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadVertical = null;
                    showMessage("No se encontraron resultados");
                }
            });

            $scope.masAtacama = function () {
                $scope.offsetNacAtacama = $scope.offsetNacAtacama + 3;
                $scope.loadAtacama();
            };

            $scope.masAntofagasta = function () {
                $scope.offsetNacAntofagasta = $scope.offsetNacAntofagasta + 3;
                $scope.loadAntofagasta();
            };

            $scope.masSerena = function () {
                $scope.offsetNacSerena = $scope.offsetNacSerena + 4;
                $scope.loadSerena();
            };

            $scope.masNacionales = function () {
                $scope.offsetNacionales = $scope.offsetNacionales + 12;
                $scope.loadNacionales();
            };

            $scope.loadAtacama();
            $scope.loadAntofagasta();
            $scope.loadSerena();
            $scope.loadNacionales();

            $scope.$on('$viewContentLoaded', function () {
                loadSliders();
            });

            $scope.esconderMenu = function () {
                $("#menuXs").animate({width: "0px"}, 500, function () {
                    $("#menuXs").hide();
                });
            };
        })
        .controller('viewController', function ($scope, $routeParams, getPosts, news, $location, $rootScope, Constants, navigate, categorias) {
            var emptyExclusion = '';
            var idPost = $routeParams.id;

            $scope.enlace = false;
            $scope.url = "http://" + $location.host() + "/madero/main/server/enlace.php?id_post=" + idPost;

            getPosts.getPostFromId(idPost, function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.mainPost = news.getSingleNews(data.data[0]);

                    var idCategory = $scope.mainPost.categories[0].id;
                    getOtherPost(idCategory);
                    $("#ogTitle").attr("content", "titulo prueba");
                } else {
                    $scope.mainPost = null;
                    showMessage("No se encontraron resultados");
                }
            });

            function getOtherPost(idCategory) {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "5", "0", categorias.getCategorias([idCategory]), categorias.getExclusiones([idCategory]), function (response) {
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

            $scope.mostrarEnlace = function () {
                $scope.enlace = $scope.enlace ? false : true;
            };
            
            $scope.btnCopiarMensaje = function(){
                $("#copiadoMensaje").show();
                $("#copiadoMensaje").fadeOut(3000);
            };

        })
        .controller('listingController', function ($scope, categorias, getPosts, news, Constants, navigate) {
            var emptyExclusion = '';

            // National Post
            $scope.quantityNationalPost = 17;
            $scope.offsetNationalPost = 0;
            loadNationalPost($scope.quantityNationalPost, $scope.offsetNationalPost);

            $scope.moreNationalPost = function () {
                $scope.offsetNationalPost += 17;
                loadNationalPost($scope.quantityNationalPost, $scope.offsetNationalPost);
            };

            function loadNationalPost(limit, offset) {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), limit, offset, Constants.Category.NACIONAL, categorias.getExclusiones([Constants.Category.NACIONAL]), function (response) {
                    var data = response.data;
                    if (data !== null && data.status === 'OK') {
                        $scope.nationalPosts = news.getMultipleNews(data.data);

                    } else {
                        $scope.nationalPosts = null;
                        showMessage("No se encontraron resultados");
                    }
                });
            }

            var arreglo = [Constants.Category.NACIONAL, Constants.Category.DESTACADO];
            // National Posts Highlighted
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "5", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.nationalPostsHighlighted = news.getMultipleNews(data.data);

                } else {
                    $scope.nationalPostsHighlighted = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.NACIONAL, Constants.Category.VERTICAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadCuadrada = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadCuadrada = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.NACIONAL, Constants.Category.HORIZONTAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getSinglePublicidad(data.data[0]);

                } else {
                    $scope.publicidadHorizontal = null;
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

        })
        .controller('mineriaController', function ($scope, $routeParams) {

        })
        .controller('internacionalController', function ($scope, Constants, getPosts, news, categorias, navigate) {
            $scope.offSetInternacionales = 0;

            $scope.loadInternationalPostsHighlightedCarousel = function () {
                $("#main-slider").owlCarousel({
                    items: 4,
                    pagination: false,
                    navigation: false,
                    autoPlay: true,
                    stopOnHover: true

                });
            };

            $scope.loadInternationalPostsHighlightedCarousel2 = function () {
                $("#latest-news2").owlCarousel({
                    items: 4,
                    pagination: false,
                    navigation: false,
                    autoPlay: true,
                    stopOnHover: true

                });
            };

            $scope.loadInternationalVideos = function () {
                $("#videosInternacionales").owlCarousel({
                    items: 4,
                    pagination: false,
                    navigation: false,
                    autoPlay: true,
                    stopOnHover: true

                });
            };

            var emptyExclusion = '';
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), Constants.Limits.InternationalMedium, "0", Constants.Category.EXTERNO + "," + Constants.Category.DESTACADO, emptyExclusion, function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.internacionalesDestacadas = news.getMultipleNewsInternacional(data.data, "rich", 6);

                } else {
                    $scope.internacionalesDestacadas = null;
                    showMessage("No se encontraron resultados");
                }
            });

            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), Constants.Limits.InternationalMedium, "6", Constants.Category.EXTERNO + "," + Constants.Category.DESTACADO, emptyExclusion, function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.internacionalesDestacadas2 = news.getMultipleNewsInternacional(data.data, "rich", 8);

                } else {
                    $scope.internacionalesDestacadas2 = null;
                    showMessage("No se encontraron resultados");
                }
            });

            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), Constants.Limits.InternationalMedium, "0", Constants.Category.EXTERNO, categorias.getExclusiones([Constants.Category.EXTERNO]), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.internacionalesVideos = news.getMultipleNewsInternacional(data.data, "video", 8);

                } else {
                    $scope.internacionalesVideos = null;
                    showMessage("No se encontraron resultados");
                }
            });

            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), 6, "0", Constants.Category.NACIONAL, categorias.getExclusiones([Constants.Category.NACIONAL]), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.nacionales = news.getMultipleNews(data.data);

                } else {
                    $scope.nacionales = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.EXTERNO, Constants.Category.VERTICAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadCuadrada = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadCuadrada = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.EXTERNO, Constants.Category.HORIZONTAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getSinglePublicidad(data.data[0]);

                } else {
                    $scope.publicidadHorizontal = null;
                    showMessage("No se encontraron resultados");
                }
            });

            $scope.loadInternacionales = function () {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), Constants.Limits.InternationalBig, $scope.offSetInternacionales, Constants.Category.EXTERNO, categorias.getExclusiones([Constants.Category.EXTERNO]), function (response) {
                    var data = response.data;
                    if (data !== null && data.status === 'OK') {
                        $scope.internacionales = news.getMultipleNewsInternacional(data.data, "rich", 15);

                    } else {
                        $scope.internacionales = null;
                        showMessage("No se encontraron resultados");
                    }
                });
            };

            $scope.masInternacionales = function () {
                $scope.loading = true;
                $scope.offSetInternacionales = $scope.offSetInternacionales + 15;
                $scope.loadInternacionales();
            };

            $scope.loadInternacionales();


        })
        .controller('listing1Controller', function ($scope, categorias, getPosts, news, Constants, navigate) {
            var emptyExclusion = '';

            // Antofagasta Post
            $scope.quantityAntofagastaPost = 17;
            $scope.offsetAntofagastaPost = 0;
            loadAntofagastaPost($scope.quantityAntofagastaPost, $scope.offsetAntofagastaPost);

            $scope.moreAntofagastaPost = function () {
                $scope.offsetAntofagastaPost += 17;
                loadAntofagastaPost($scope.quantityAntofagastaPost, $scope.offsetAntofagastaPost);
            };

            function loadAntofagastaPost(limit, offset) {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), limit, offset, Constants.Category.ANTOFAGASTA, categorias.getExclusiones([Constants.Category.ANTOFAGASTA]), function (response) {
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
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "5", "0", Constants.Category.ANTOFAGASTA + "," + Constants.Category.DESTACADO, emptyExclusion, function (response) {
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

            var arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.ANTOFAGASTA, Constants.Category.VERTICAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadCuadrada = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadCuadrada = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.ANTOFAGASTA, Constants.Category.HORIZONTAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getSinglePublicidad(data.data[0]);

                } else {
                    $scope.publicidadHorizontal = null;
                    showMessage("No se encontraron resultados");
                }
            });


        })
        .controller('listing2Controller', function ($scope, categorias, getPosts, news, Constants, navigate) {
            var emptyExclusion = '';

            // Atacama Post
            $scope.quantityAtacamaPost = 17;
            $scope.offsetAtacamaPost = 0;
            loadAtacamaPost($scope.quantityAtacamaPost, $scope.offsetAtacamaPost);

            $scope.moreAtacamaPost = function () {
                $scope.offsetAtacamaPost += 17;
                loadAtacamaPost($scope.quantityAtacamaPost, $scope.offsetAtacamaPost);
            };

            function loadAtacamaPost(limit, offset) {

                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), limit, offset, Constants.Category.ATACAMA, categorias.getExclusiones([Constants.Category.ATACAMA]), function (response) {
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
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "5", "0", Constants.Category.ATACAMA + "," + Constants.Category.DESTACADO, emptyExclusion, function (response) {
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

            var arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.ATACAMA, Constants.Category.VERTICAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadCuadrada = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadCuadrada = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.ATACAMA, Constants.Category.HORIZONTAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getSinglePublicidad(data.data[0]);

                } else {
                    $scope.publicidadHorizontal = null;
                    showMessage("No se encontraron resultados");
                }
            });

        })
        .controller('listing3Controller', function ($scope, categorias, getPosts, news, Constants, navigate) {
            var emptyExclusion = '';

            // Coquimbo - La serena Post
            $scope.quantityCoquimboPost = 17;
            $scope.offsetCoquimboPost = 0;
            loadCoquimboPost($scope.quantityCoquimboPost, $scope.offsetCoquimboPost);

            $scope.moreCoquimboPost = function () {
                $scope.offsetCoquimboPost += 17;
                loadCoquimboPost($scope.quantityCoquimboPost, $scope.offsetCoquimboPost);
            };

            function loadCoquimboPost(limit, offset) {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), limit, offset, Constants.Category.LA_SERENA_COQUIMBO, categorias.getExclusiones([Constants.Category.LA_SERENA_COQUIMBO]), function (response) {
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
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "5", "0", Constants.Category.LA_SERENA_COQUIMBO + "," + Constants.Category.DESTACADO, emptyExclusion, function (response) {
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

            var arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.LA_SERENA_COQUIMBO, Constants.Category.VERTICAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadCuadrada = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadCuadrada = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.PUBLICIDAD, Constants.Category.LA_SERENA_COQUIMBO, Constants.Category.HORIZONTAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getSinglePublicidad(data.data[0]);

                } else {
                    $scope.publicidadHorizontal = null;
                    showMessage("No se encontraron resultados");
                }
            });

        })
        .controller('listing4Controller', function ($scope, categorias, getPosts, news, Constants, navigate) {
            var emptyExclusion = '';

            // Sports Post
            $scope.quantitySportPost = 17;
            $scope.offsetSportPost = 0;
            loadSportPost($scope.quantitySportPost, $scope.offsetSportPost);

            $scope.moreSportPost = function () {
                $scope.offsetSportPost += 17;
                loadSportPost($scope.quantitySportPost, $scope.offsetSportPost);
            };

            function loadSportPost(limit, offset) {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), limit, offset, Constants.Category.DEPORTES, categorias.getExclusiones([Constants.Category.DEPORTES]), function (response) {
                    var data = response.data;
                    if (data !== null && data.status === 'OK') {
                        $scope.sportPosts = news.getMultipleNews(data.data);

                    } else {
                        $scope.sportPosts = null;
                        showMessage("No se encontraron resultados");
                    }
                });
            }

            // Sport Posts Highlighted
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "5", "0", Constants.Category.DEPORTES + "," + Constants.Category.DESTACADO, emptyExclusion, function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.sportPostsHighlighted = news.getMultipleNews(data.data);

                } else {
                    $scope.sportPostsHighlighted = null;
                    showMessage("No se encontraron resultados");
                }
            });

            var arreglo = [Constants.Category.DEPORTES, Constants.Category.PUBLICIDAD, Constants.Category.HORIZONTAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "1", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadHorizontal = news.getSinglePublicidad(data.data[0]);

                } else {
                    $scope.publicidadHorizontal = null;
                    showMessage("No se encontraron resultados");
                }
            });

            arreglo = [Constants.Category.DEPORTES, Constants.Category.PUBLICIDAD, Constants.Category.VERTICAL];
            getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "3", "0", categorias.getCategorias(arreglo), categorias.getExclusiones(arreglo), function (response) {
                var data = response.data;
                if (data !== null && data.status === 'OK') {
                    $scope.publicidadVertical = news.getMultiplePublicidad(data.data);

                } else {
                    $scope.publicidadVertical = null;
                    showMessage("No se encontraron resultados");
                }
            });

            $scope.loadSportPostsHighlightedCarousel = function () {
                $("#sport-posts-highlighted-carousel").owlCarousel({
                    items: 4,
                    pagination: false,
                    navigation: false,
                    autoPlay: true,
                    stopOnHover: true

                });
            };


        })
        .controller('buscadorController', function ($scope, $location) {
            $scope.buscarNoticias = function () {
                $location.path("/buscar/" + $scope.termino);
            };

        })
        .controller('busquedaController', function ($scope, $routeParams, getPosts, news, navigate, Constants) {
            $scope.termino = $routeParams.termino;
            $scope.offSetBusqueda = 0;
            $scope.offSetNacionales = 0;

            $scope.descBusqueda = "por texto '" + $scope.termino + "'";

            $scope.cargarBusqueda = function () {

                getPosts.searchPostsByText("9", $scope.offSetBusqueda, $scope.termino, function (response) {
                    var data = response.data;
                    if (data !== null && data.status === 'OK') {
                        $scope.resultados = news.getMultipleNews(data.data);

                    } else {
                        $scope.resultados = null;
                        showMessage("No se encontraron resultados");
                    }
                });

            };

            var emptyExclusion = '';
            $scope.cargarNacionales = function () {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), "6", "0", Constants.Category.NACIONAL, emptyExclusion, function (response) {
                    var data = response.data;
                    if (data !== null && data.status === 'OK') {
                        $scope.nacionales = news.getMultipleNews(data.data);

                    } else {
                        $scope.nacionales = null;
                        showMessage("No se encontraron resultados");
                    }
                });
            };

            $scope.moreResultados = function () {
                $scope.offSetBusqueda = $scope.offSetBusqueda + 9;
                $scope.cargarBusqueda();
            };

            $scope.moreNationalPost = function () {
                $scope.offSetNacionales = $scope.offSetNacionales + 9;
                $scope.cargarNacionales();
            };

            $scope.cargarBusqueda();
            $scope.cargarNacionales();
        })
        .controller('bannerInterController', function ($scope, getPosts, Constants, news, navigate) {
            $scope.offsetInter = 0;

            var emptyExclusion = '';

            $scope.cargarInternacionales = function () {
                getPosts.getPostsFromCategory(getDateFromNow(Constants.Limits.StartRangeNews), getDateFromNow(0), Constants.Limits.InternationalMedium, "0", Constants.Category.EXTERNO, emptyExclusion, function (response) {
                    var data = response.data;
                    if (data !== null && data.status === 'OK') {
                        $scope.internationalPosts = news.getMultipleNewsInternacional(data.data, "rich", 5);

                    } else {
                        $scope.internationalPosts = null;
                        showMessage("No se encontraron resultados");
                    }
                });
            };

            $scope.cargarInternacionales();

            $scope.cargarMasNoticias = function () {
                $scope.offsetInter = $scope.offsetInter + 5;
                $scope.cargarInternacionales();
            };
        })
        .controller('footerController', function ($scope, $http) {

            var d = new Date();
            var dateFormat = [d.getFullYear(), d.getMonth() + 1, d.getDate()].join('-')
                    + ' ' +
                    [d.getHours(), d.getMinutes(), d.getSeconds()].join(':');

            $scope.currentDate = getFormattedDate(dateFormat);

            $http.get('http://mindicador.cl/api').success(function (data) {
                $scope.dailyIndicators = data;
            }).error(function () {
                console.log('Error al consumir la API!');
            });
        })
        ;

function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

function showMessage(message) {
    /*$("#btnNotificacion").click();
     $("<div class='alert alert-danger alert-dismissible fade in notificacion'\n\
     role='alert'><button id='btnNotificacion' type='button' class='close'\n\
     data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;\n\
     </span></button><strong>Notificación</strong><p>" + message + "</p></div>").appendTo("#main-wrapper").fadeIn();
     */
    console.log(message);
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

    if (response === null) {
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

    //format 2011-07-15 13:18:52
    var match = date.match(/^(\d+)-(\d+)-(\d+) (\d+)\:(\d+)\:(\d+)$/);
    var objectDate = new Date(match[1], match[2] - 1, match[3], match[4], match[5], match[6]);

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

    while ((match = playlistRegEx.exec(content)) !== null) {

        var playlistText = match.toString();
        var result = playlistText.split('"');
        var id = result[1];
        var guid = getGUIDFromResource(id, resources);

        var audioTag = '<audio src="' + guid + '" preload="auto" controls><audio>';

        content = content.replace(playlistText, audioTag);

    }

    return content;
}

function dynamicSort(property) {
    var sortOrder = 1;
    if (property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a, b) {
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
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