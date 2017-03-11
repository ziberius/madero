<div class="main">
    <div id="news-listing" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a href="#listing_1">Noticias de Antofagasta</a></h1>

                        <div ng-show="antofagastaPosts.length">

                            <div class="middle-content">
                                <div class="section">
                                    <div class="row" style="margin-bottom:1em">
                                        <div class="col-sm-12 col-md-8">

                                            <div class="post feature-post"
                                                 style="background-image:url({{antofagastaPosts[0].thumbnailImageUrl}}); background-size:100% ;height:595px;">
                                                <div class="post-content">
                                                    <div class="catagoryLeft"><a ng-click="detail(antofagastaPosts[0].id)">{{antofagastaPosts[0].categories[0].name}}</a>
                                                    </div>
                                                    <h2 class="entry-title entryLeft">
                                                        <a ng-click="detail(antofagastaPosts[0].id)">{{antofagastaPosts[0].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->

                                        </div>

                                        <div class="col-sm-12 col-md-4">

                                            <div ng-show="antofagastaPosts[1]">
                                                <div class="row">
                                                    <div class="post medium-post"
                                                         style="padding-left: 15px; padding-right: 15px; padding-top: 5px;">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">

                                                                <a ng-click="detail(antofagastaPosts[1].id)"><img
                                                                            class="img-responsive img-antofagasta-news-middle center-block"
                                                                            src="{{antofagastaPosts[1].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                                <!--           <div ng-click="detail(antofagastaPosts[1].id)">
                                                                               <div style="background-image:url({{antofagastaPosts[1].thumbnailImageUrl}}); background-size:100% ;height:200px;"
                                                                                    class=""
                                                                               ></div>-->

                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(antofagastaPosts[1].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{antofagastaPosts[1].formattedDate}}
                                                                        </a></li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(antofagastaPosts[1].id)">{{antofagastaPosts[1].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post-->
                                                </div>
                                            </div>

                                            <div ng-show="antofagastaPosts[2]">
                                                <div class="row">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a ng-click="detail(antofagastaPosts[2].id)"><img
                                                                            class="img-responsive img-antofagasta-news-middle center-block"
                                                                            src="{{antofagastaPosts[2].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(antofagastaPosts[2].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{antofagastaPosts[2].formattedDate}}
                                                                        </a></li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(antofagastaPosts[2].id)">{{antofagastaPosts[2].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post-->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="antofagastaPosts[3]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(antofagastaPosts[3].id)"><img
                                                                        class="img-responsive img-antofagasta-news-middle center-block"
                                                                        src="{{antofagastaPosts[3].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(antofagastaPosts[3].id)"><i
                                                                                class="fa fa-clock-o"></i>{{antofagastaPosts[3].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(antofagastaPosts[3].id)">{{antofagastaPosts[3].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="antofagastaPosts[4]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(antofagastaPosts[4].id)"><img
                                                                        class="img-responsive img-antofagasta-news-middle center-block"
                                                                        src="{{antofagastaPosts[4].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(antofagastaPosts[4].id)"><i
                                                                                class="fa fa-clock-o"></i>{{antofagastaPosts[4].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(antofagastaPosts[4].id)">{{antofagastaPosts[4].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="antofagastaPosts[5]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(antofagastaPosts[5].id)"><img
                                                                        class="img-responsive img-antofagasta-news-middle center-block"
                                                                        src="{{antofagastaPosts[5].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(antofagastaPosts[5].id)"><i
                                                                                class="fa fa-clock-o"></i>{{antofagastaPosts[5].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(antofagastaPosts[5].id)">{{antofagastaPosts[5].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="antofagastaPosts[6]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(antofagastaPosts[6].id)"><img
                                                                        class="img-responsive img-antofagasta-news-middle center-block"
                                                                        src="{{antofagastaPosts[6].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(antofagastaPosts[6].id)"><i
                                                                                class="fa fa-clock-o"></i>{{antofagastaPosts[6].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(antofagastaPosts[6].id)">{{antofagastaPosts[6].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div ng-show="antofagastaPosts[7]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(antofagastaPosts[7].id)"><img
                                                                        class="img-responsive img-antofagasta-news-middle center-block"
                                                                        src="{{antofagastaPosts[7].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(antofagastaPosts[7].id)"><i
                                                                                class="fa fa-clock-o"></i>{{antofagastaPosts[7].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(antofagastaPosts[7].id)">{{antofagastaPosts[7].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div ng-show="antofagastaPosts[8]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(antofagastaPosts[8].id)"><img
                                                                        class="img-responsive img-antofagasta-news-middle center-block"
                                                                        src="{{antofagastaPosts[8].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(antofagastaPosts[8].id)"><i
                                                                                class="fa fa-clock-o"></i>{{antofagastaPosts[8].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(antofagastaPosts[8].id)">{{antofagastaPosts[8].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>
                                        </div>


                                    </div>
                                </div><!--/.lifestyle -->
                            </div><!--/.middle-content-->


                        </div>


                    </div><!--/#site-content-->


                    <!--Publicidad horizontal-->
                    <div class="row top5">
                        <img class="img-responsive center-block" style="max-height:120px"
                             src="/main/web/images/post/banner.jpg"/>
                    </div>
                </div>

                <!--International News-->
                <div class="col-sm-3">
                    <div id="sitebar">
                        <div class="widget">
                            <?php require_once dirname(__FILE__) . '/../include/internacionales.php'; ?>
                        </div><!--/#widget-->

                        <!--Publicidad Vertical-->
                        <div class="widget">
                            <img class="img-responsive center-block" src="/main/web/images/anuncio_vertical.jpg"/>
                        </div><!-- widget -->

                    </div><!--/#sitebar-->
                </div>
            </div>
        </div><!--/.section-->

        <div class="section" id="antofagasta-posts-highlighted-carousel">

            <!--<div ng-show="antofagastaPostsHighlighted.length">
                <div ng-repeat="antofagastaPostHigh in antofagastaPostsHighlighted">
                    <div class="post feature-post"
                         style="background-image:url({{antofagastaPostHigh.thumbnailImageUrl}}); background-size:cover">
                        <div class="post-content">
                            <div class="catagory"><a ng-click="detail(antofagastaPostHigh.id)">{{antofagastaPostHigh.categories[0].name}}</a>
                            </div>
                            <h2 class="entry-title">
                                <a ng-click="detail(antofagastaPostHigh.id)">{{antofagastaPostHigh.title}}</a>
                            </h2>
                        </div>
                    </div>
                    <span>{{$last ? loadAntofagastaPostsHighlightedCarousel() : ''}}</span>

                </div>
            </div>-->

            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                <div class="post-content">
                    <div class="catagory"><a href="#">Deportes</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                    </h2>
                </div>
            </div>
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                <div class="post-content">
                    <div class="catagory"><a href="#">Deportes</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                    </h2>
                </div>
            </div>
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                <div class="post-content">
                    <div class="catagory"><a href="#">Deportes</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                    </h2>
                </div>
            </div>
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                <div class="post-content">
                    <div class="catagory"><a href="#">Deportes</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                    </h2>
                </div>
            </div>
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                <div class="post-content">
                    <div class="catagory"><a href="#">Deportes</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                    </h2>
                </div>
            </div>

            {{loadAntofagastaPostsHighlightedCarousel()}}

        </div><!-- #main-slider -->

        <!--More local news-->
        <div class="section">
            <div class="row">

                <!--Publicidad anuncio cuadrado-->
                <div class="col-sm-12 col-md-5">
                    <img class="img-responsive center-block" src="/main/web/images/anuncio_cuadrado.jpg"/>
                </div>

                <div ng-show="antofagastaPosts[9]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(antofagastaPosts[9].id)">{{antofagastaPosts[9].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(antofagastaPosts[9].id)"><img class="img-responsive"
                                                                                   src="{{antofagastaPosts[9].thumbnailImageUrl}}"
                                                                                   alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div ng-show="antofagastaPosts[10]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(antofagastaPosts[10].id)">{{antofagastaPosts[10].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(antofagastaPosts[10].id)"><img class="img-responsive"
                                                                                    src="{{antofagastaPosts[10].thumbnailImageUrl}}"
                                                                                    alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--TODO ???-->
                <div class="col-sm-12 col-md-3 text-center">
                    <h3>Etiquetas del Día</h3>
                    <ul class="list-unstyled">
                        <li>#Torneodeclausura2017</li>
                        <li>#Presidenciales2016</li>
                        <li>#donaldtrump</li>
                        <li>#celebridades</li>
                        <li>#reformalaboral</li>
                        <li>#animalessalvajes</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="row">

                <div ng-repeat="n in [11,12,13,14,15,16]">
                    <div ng-show="antofagastaPosts[n]">
                        <div class="col-md-2">
                            <div class="post medium-post">

                                <div class="post-content nopaddingtop">
                                    <h2 class="entry-title">
                                        <a ng-click="detail(antofagastaPosts[n].id)">{{antofagastaPosts[n].shortTitle}}</a>
                                    </h2>
                                </div>
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a ng-click="detail(antofagastaPosts[n].id)"><img class="img-responsive"
                                                                                       src="{{antofagastaPosts[n].thumbnailImageUrl}}"
                                                                                       alt=""/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="load-more text-center">
            <a class="btn btn-primary btn-block" ng-click="moreAntofagastaPost()">Cargar Más...</a>
        </div>

    </div><!--/.container-fluid-->
</div> <!-- / .main -->
