<div class="main">
    <div id="news-listing" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a href="#listing">Noticias Nacionales</a></h1>

                        <div ng-show="nationalPosts.length">

                            <div class="middle-content">
                                <div class="section">
                                    <div class="row" style="margin-bottom:1em">
                                        <div class="col-sm-12 col-md-8">

                                            <div class="post feature-post"
                                                 style="background-image:url({{nationalPosts[0].thumbnailImageUrl}}); background-size:cover ;height:595px;">
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
                                                    <div class="post medium-post"
                                                         style="padding-left: 15px; padding-right: 15px; padding-top: 5px;">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">

                                                                <a ng-click="detail(nationalPosts[1].id)"><img
                                                                            class="img-responsive img-national-news-middle center-block"
                                                                            src="{{nationalPosts[1].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                                <!--           <div ng-click="detail(nationalPosts[1].id)">
                                                                               <div style="background-image:url({{nationalPosts[1].thumbnailImageUrl}}); background-size:100% ;height:200px;"
                                                                                    class=""
                                                                               ></div>-->

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
                                                                            class="img-responsive img-national-news-middle center-block"
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
                                        <div ng-repeat="n in [3,4,5,6,7,8]">
                                            <div ng-show="nationalPosts[n]">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a ng-click="detail(nationalPosts[n].id)"><img
                                                                            class="img-responsive img-national-news-middle center-block"
                                                                            src="{{nationalPosts[n].thumbnailImageUrl}}"
                                                                            alt=""/></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a
                                                                                ng-click="detail(nationalPosts[n].id)"><i
                                                                                    class="fa fa-clock-o"></i>{{nationalPosts[n].formattedDate}}</a>
                                                                    </li>
                                                                    <!--<li class="views"><a href="#"><i
                                                                                    class="fa fa-eye"></i>21k</a>
                                                                    </li>
                                                                    <li class="loves"><a href="#"><i
                                                                                    class="fa fa-heart-o"></i>372</a></li>-->
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a ng-click="detail(nationalPosts[n].id)">{{nationalPosts[n].shortTitle}}</a>
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


                </div>

                <!--International News-->
                <div class="col-sm-3">
                    <div id="sitebar">
                        <div class="widget">
                            <?php require_once dirname(__FILE__) . '/../include/internacionales.php'; ?>
                        </div><!--/#widget-->

                    </div><!--/#sitebar-->
                </div>
            </div>
        </div><!--/.section-->


        <div ng-show="nationalPostsHighlighted.length > 0" class="section" id="national-posts-highlighted-carousel">

            <div ng-repeat="nationalPostHigh in nationalPostsHighlighted">

                <div class="post feature-post"
                     style="background-image:url({{nationalPostHigh.thumbnailImageUrl}}); background-size:cover">
                    <div class="post-content">
                        <div class="catagory"><a ng-click="detail(nationalPostHigh.id)">{{nationalPostHigh.categories[0].name}}</a>
                        </div>
                        <h2 class="entry-title">
                            <a ng-click="detail(nationalPostHigh.id)">{{nationalPostHigh.title}}</a>
                        </h2>
                    </div>
                </div>
                <span>{{$last ? loadNationalPostsHighlightedCarousel() : ''}}</span>
            </div>

        </div><!-- #main-slider -->

        <!--More local news-->
        <div class="section">
            <div class="row">

                <div ng-show="nationalPosts[9]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(nationalPosts[9].id)">{{nationalPosts[9].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(nationalPosts[9].id)"><img class="img-responsive"
                                                                                   src="{{nationalPosts[9].thumbnailImageUrl}}"
                                                                                   alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div ng-show="nationalPosts[10]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(nationalPosts[10].id)">{{nationalPosts[10].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(nationalPosts[10].id)"><img class="img-responsive"
                                                                                    src="{{nationalPosts[10].thumbnailImageUrl}}"
                                                                                    alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div ng-show="nationalPosts[11]">
                    <div class="col-sm-12 col-md-2">
                        <div class="post medium-post">

                            <div class="post-content nopaddingtop">
                                <h2 class="entry-title">
                                    <a ng-click="detail(nationalPosts[11].id)">{{nationalPosts[11].shortTitle}}</a>
                                </h2>
                            </div>
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(nationalPosts[11].id)"><img class="img-responsive"
                                                                                    src="{{nationalPosts[11].thumbnailImageUrl}}"
                                                                                    alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--TODO 
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
                </div>???-->
            </div>
        </div>

        <div class="section">
            <div class="row">

                <div ng-repeat="n in [12,13,14,15,16,17]">
                    <div ng-show="nationalPosts[n]">
                        <div class="col-md-2">
                            <div class="post medium-post">

                                <div class="post-content nopaddingtop">
                                    <h2 class="entry-title">
                                        <a ng-click="detail(nationalPosts[n].id)">{{nationalPosts[n].shortTitle}}</a>
                                    </h2>
                                </div>
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a ng-click="detail(nationalPosts[n].id)"><img class="img-responsive"
                                                                                       src="{{nationalPosts[n].thumbnailImageUrl}}"
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
            <a class="btn btn-primary btn-block" ng-click="moreNationalPost()">Cargar Más...</a>
        </div>

    </div><!--/.container-fluid-->
</div> <!-- / .main -->
