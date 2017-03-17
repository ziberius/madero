<div class="main">
    <div id="news-listing" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a>Resultado de búsqueda "{{termino}}"</a></h1>

                        <div ng-show="resultados.length > 0">

                            <div class="middle-content">
                                <div class="section">
                                    <div class="row">
                                        <div ng-repeat="post in resultados" class="col-sm-6 col-md-4">
                                            <div class="post medium-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(post.id)"><img
                                                                class="img-responsive img-national-news-middle center-block"
                                                                src="{{post.thumbnailImageUrl}}"
                                                                alt=""/></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a
                                                                    ng-click="detail(post.id)"><i
                                                                        class="fa fa-clock-o"></i>{{post.formattedDate}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(post.id)">{{post.shortTitle}}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="load-more text-center">
                                        <a class="btn btn-primary btn-block" ng-click="moreResultados()">Cargar Más...</a>
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


        <div class="section">
            <div class="row">

                <div ng-repeat="post in nacionales">
                    <div ng-show="nacionales.length > 0">
                        <div class="col-md-2">
                            <div class="post medium-post post-imgbelow">

                                <div class="post-content nopaddingtop">
                                    <h2 class="entry-title">
                                        <a ng-click="detail(post.id)">{{post.shortTitle}}</a>
                                    </h2>
                                </div>
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a ng-click="detail(post.id)"><img class="img-responsive"
                                                                           src="{{post.thumbnailImageUrl}}"
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
