<div class="main">
    <div id="news-listing" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a href="listing.php">Noticias Nacionales</a></h1>

                        <div ng-show="nationalPosts.length">

                            <div class="middle-content">
                                <div class="section">
                                    <div class="row" style="margin-bottom:1em">
                                        <div class="col-sm-12 col-md-8">

                                            <div class="post feature-post"
                                                 style="background-image:url({{nationalPosts[0].thumbnailImageUrl}}); background-size:100% 100%;height:595px;">
                                                <div class="post-content">
                                                    <div class="catagoryLeft"><a ng-click="detail(nationalPosts[0].id)">{{nationalPosts[0].categories[0].name}}</a>
                                                    </div>
                                                    <h2 class="entry-title entryLeft">
                                                        <a ng-click="detail(nationalPosts[0].id)">{{nationalPosts[0].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->

                                        </div>

                                        <div class="col-sm-12 col-md-4">

                                            <div ng-show="nationalPosts[1]">
                                                <div class="row">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a ng-click="detail(nationalPosts[1].id)"><img
                                                                            class="img-responsive"
                                                                            src="{{nationalPosts[1].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(nationalPosts[1].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{nationalPosts[1].formattedDate}}
                                                                        </a></li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(nationalPosts[1].id)">{{nationalPosts[1].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post-->
                                                </div>
                                            </div>

                                            <div ng-show="nationalPosts[2]">
                                                <div class="row">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a ng-click="detail(nationalPosts[2].id)"><img
                                                                            class="img-responsive"
                                                                            src="{{nationalPosts[2].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(nationalPosts[2].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{nationalPosts[2].formattedDate}}
                                                                        </a></li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(nationalPosts[2].id)">{{nationalPosts[2].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post-->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="nationalPosts[3]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(nationalPosts[3].id)"><img
                                                                        class="img-responsive"
                                                                        src="{{nationalPosts[3].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(nationalPosts[3].id)"><i
                                                                                class="fa fa-clock-o"></i>{{nationalPosts[3].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(nationalPosts[3].id)">{{nationalPosts[3].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="nationalPosts[4]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(nationalPosts[4].id)"><img
                                                                        class="img-responsive"
                                                                        src="{{nationalPosts[4].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(nationalPosts[4].id)"><i
                                                                                class="fa fa-clock-o"></i>{{nationalPosts[4].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(nationalPosts[4].id)">{{nationalPosts[4].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="nationalPosts[5]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(nationalPosts[5].id)"><img
                                                                        class="img-responsive"
                                                                        src="{{nationalPosts[5].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(nationalPosts[5].id)"><i
                                                                                class="fa fa-clock-o"></i>{{nationalPosts[5].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(nationalPosts[5].id)">{{nationalPosts[5].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-4">

                                            <div ng-show="nationalPosts[6]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(nationalPosts[6].id)"><img
                                                                        class="img-responsive"
                                                                        src="{{nationalPosts[6].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(nationalPosts[6].id)"><i
                                                                                class="fa fa-clock-o"></i>{{nationalPosts[6].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(nationalPosts[6].id)">{{nationalPosts[6].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div ng-show="nationalPosts[7]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(nationalPosts[7].id)"><img
                                                                        class="img-responsive"
                                                                        src="{{nationalPosts[7].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(nationalPosts[7].id)"><i
                                                                                class="fa fa-clock-o"></i>{{nationalPosts[7].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(nationalPosts[7].id)">{{nationalPosts[7].shortTitle}}</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div ng-show="nationalPosts[8]">
                                                <div class="post medium-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a ng-click="detail(nationalPosts[8].id)"><img
                                                                        class="img-responsive"
                                                                        src="{{nationalPosts[8].thumbnailImageUrl}}"
                                                                        alt=""/></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li class="publish-date"><a
                                                                            ng-click="detail(nationalPosts[8].id)"><i
                                                                                class="fa fa-clock-o"></i>{{nationalPosts[8].formattedDate}}</a>
                                                                </li>
                                                                <!--<li class="views"><a href="#"><i
                                                                                class="fa fa-eye"></i>21k</a>
                                                                </li>
                                                                <li class="loves"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>372</a></li>-->
                                                            </ul>
                                                        </div>
                                                        <h2 class="entry-title">
                                                            <a ng-click="detail(nationalPosts[8].id)">{{nationalPosts[8].shortTitle}}</a>
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
                    <div class="load-more text-center">
                        <a class="btn btn-primary btn-block" href="#">Cargar Más...</a>
                    </div>
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
                        <div class="widget">
                            <img class="img-responsive center-block" src="/main/web/images/anuncio_vertical.jpg"/>
                        </div><!-- widget -->

                    </div><!--/#sitebar-->
                </div>
            </div>
        </div><!--/.section-->
        <div class="section" id="main-slider">
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/carcel.jpg); background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Internacional</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">Un preso al día muere en las abarrotadas cárceles de Brasil</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post video-post"
                 style="background-image:url(/main/web/images/post/teleserie.jpg); background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Antofagasta</a></div>
                    <h2 class="entry-title">
                        <a href="news-details2.php">Las claves de Amanda para ser la teleserie diurna más vista</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/atacama.jpg); background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Atacama</a></div>
                    <h2 class="entry-title">
                        <a href="news-details2.php">Gobierno instauró mesa de trabajo para reinserción de alumnos de
                            Liceo Técnico Profesional Edwin Latorre Rivero</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/uruguayo.jpg); background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">La Serena - Coquimbo</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">Uruguayo detenido por participación en asalto frustrado a
                            detective</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                <div class="post-content">
                    <div class="catagory"><a href="#">Deportes</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post"
                 style="background-image:url(/main/web/images/post/valparaiso.jpg); background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Nacional</a></div>
                    <h2 class="entry-title">
                        <a href="news-details.php">Valparaíso: Minvu destina $ 13 mil millones a zonas siniestradas</a>
                    </h2>
                </div>
            </div><!--/post-->
        </div><!-- #main-slider -->
        <div class="section">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <img class="img-responsive center-block" src="/main/web/images/anuncio_cuadrado.jpg"/>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
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
                <div class="col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
                <div class="col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
                <div class="col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
                <div class="col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
                <div class="col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>
                <div class="col-md-2">
                    <div class="post medium-post">

                        <div class="post-content nopaddingtop">
                            <h2 class="entry-title">
                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de
                                    $76 millones...</a>
                            </h2>
                        </div>
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="news-details.php"><img class="img-responsive"
                                                                src="/main/web/images/post/coquimbo/1.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div><!--/post-->
                </div>

            </div>
        </div>
    </div><!--/.container-fluid-->
</div> <!-- / .main -->
