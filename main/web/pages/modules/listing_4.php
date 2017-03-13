<div class="main">
    <div id="news-listing" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a href="#listing_4">Deportes</a></h1>

                        <div ng-show="sportPosts.length">

                            <div class="middle-content">
                                <div class="section">
                                    <div class="row" style="margin-bottom:1em">
                                        <div class="col-sm-12 col-md-8">

                                            <div class="post feature-post"
                                                 style="background-image:url({{sportPosts[0].thumbnailImageUrl}}); background-size:100% ;height:595px;">
                                                <div class="post-content">
                                                    <div class="catagoryLeft"><a
                                                                ng-click="detail(sportPosts[0].id)">{{sportPosts[0].categories[0].name}}</a>
                                                    </div>
                                                    <h2 class="entry-title entryLeft">
                                                        <a ng-click="detail(sportPosts[0].id)">{{sportPosts[0].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->

                                        </div>

                                        <div class="col-sm-12 col-md-4">

                                            <div ng-show="sportPosts[1]">
                                                <div class="row">
                                                    <div class="post medium-post"
                                                         style="padding-left: 15px; padding-right: 15px; padding-top: 5px;">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">

                                                                <a ng-click="detail(sportPosts[1].id)"><img
                                                                            class="img-responsive img-sport-news-middle center-block"
                                                                            src="{{sportPosts[1].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                                <!--           <div ng-click="detail(sportPosts[1].id)">
                                                                               <div style="background-image:url({{sportPosts[1].thumbnailImageUrl}}); background-size:100% ;height:200px;"
                                                                                    class=""
                                                                               ></div>-->

                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(sportPosts[1].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{sportPosts[1].formattedDate}}
                                                                        </a></li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(sportPosts[1].id)">{{sportPosts[1].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post-->
                                                </div>
                                            </div>

                                            <div ng-show="sportPosts[2]">
                                                <div class="row">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a ng-click="detail(sportPosts[2].id)"><img
                                                                            class="img-responsive img-sport-news-middle center-block"
                                                                            src="{{sportPosts[2].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(sportPosts[2].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{sportPosts[2].formattedDate}}
                                                                        </a></li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(sportPosts[2].id)">{{sportPosts[2].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post-->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div ng-repeat="n in [3,4,5,6,7,8]">
                                            <div ng-show="sportPosts[n]">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a ng-click="detail(sportPosts[n].id)"><img
                                                                            class="img-responsive img-sport-news-middle center-block"
                                                                            src="{{sportPosts[n].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(sportPosts[n].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{sportPosts[n].formattedDate}}</a>
                                                                    </li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a>
                                                                    </li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(sportPosts[n].id)">{{sportPosts[n].shortTitle}}</a>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
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

        <div ng-show="sportPostsHighlighted.length > 0" class="section"
             id="sport-posts-highlighted-carousel">

            <div ng-repeat="sportPostHigh in sportPostsHighlighted">

                <div class="post feature-post"
                     style="background-image:url({{sportPostHigh.thumbnailImageUrl}}); background-size:cover">
                    <div class="post-content">
                        <div class="catagory"><a ng-click="detail(sportPostHigh.id)">{{sportPostHigh.categories[0].name}}</a>
                        </div>
                        <h2 class="entry-title">
                            <a ng-click="detail(sportPostHigh.id)">{{sportPostHigh.title}}</a>
                        </h2>
                    </div>
                </div>
                <span>{{$last ? loadSportPostsHighlightedCarousel() : ''}}</span>
            </div>

        </div>


        <!--More local news-->
        <div class="section">
            <div class="row">

                <!--Publicidad anuncio cuadrado-->
                <div class="col-sm-12 col-md-5">
                    <img class="img-responsive center-block" src="/main/web/images/anuncio_cuadrado.jpg"/>
                </div>

                <div ng-show="sportPosts[9]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(sportPosts[9].id)">{{sportPosts[9].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(sportPosts[9].id)"><img class="img-responsive"
                                                                                      src="{{sportPosts[9].thumbnailImageUrl}}"
                                                                                      alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div ng-show="sportPosts[10]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(sportPosts[10].id)">{{sportPosts[10].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(sportPosts[10].id)"><img class="img-responsive"
                                                                                       src="{{sportPosts[10].thumbnailImageUrl}}"
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
                    <div ng-show="sportPosts[n]">
                        <div class="col-md-2">
                            <div class="post medium-post">

                                <div class="post-content nopaddingtop">
                                    <h2 class="entry-title">
                                        <a ng-click="detail(sportPosts[n].id)">{{sportPosts[n].shortTitle}}</a>
                                    </h2>
                                </div>
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a ng-click="detail(sportPosts[n].id)"><img class="img-responsive"
                                                                                          src="{{sportPosts[n].thumbnailImageUrl}}"
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
            <a class="btn btn-primary btn-block" ng-click="moreSportPost()">Cargar Más...</a>
        </div>

    </div><!--/.container-fluid-->
</div> <!-- / .main -->
