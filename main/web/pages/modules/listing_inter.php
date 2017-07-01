<div class="main">
    <div id="news-listing" class="container-fluid">	
            <div ng-show="internacionalesDestacadas.length > 0" class="section" id="main-slider">

                <div ng-repeat="postInterDest in internacionalesDestacadas">

                    <div class="post feature-post"
                         style="background-image:url({{postInterDest.oembed.thumbnail_url}}); background-size:cover">
                        <div class="post-content">
                            <div class="catagory"><a href="{{postInterDest.oembed.url}}" target="_blank">{{postInterDest.oembed.provider_name}}</a>
                            </div>
                            <h2 class="entry-title">
                                <a href="{{postInterDest.oembed.url}}" target="_blank">{{postInterDest.oembed.title}}</a>
                            </h2>
                        </div>
                    </div>
                    <span>{{$last ? loadInternationalPostsHighlightedCarousel() : ''}}</span>
                </div>

            </div>
        </div>
  
        <div ng-show="internacionalesDestacadas2.length > 0" class="section">
            <h2>Destacadas Internacionales</h2>
            <div class="row">
                <div class="col-sm-12 col-md-12" id="latest-news2">
                    <div ng-repeat="post in internacionalesDestacadas2" class="item">
                        <div class="post medium-post">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a href="{{post.oembed.url}}" target="_blank"><img class="img-responsive internacionalDestacadas" ng-src="{{post.oembed.thumbnail_url}}" alt="" /></a>
                                </div>
                            </div>
                            <div class="post-content">								
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> {{post.formattedDate}}</a></li>
                                    </ul>
                                </div>
                                <h2 class="entry-title">
                                    <a href="{{post.oembed.url}}" target="_blank">{{post.oembed.title}}</a>
                                </h2>
                            </div>
                        </div><!--/post--> 
                        <span>{{$last ? loadInternationalPostsHighlightedCarousel2() : ''}}</span>
                    </div> 
                </div>
            </div>
        </div>
        <div  ng-show="internacionalesVideos.length > 0" class="section">
            <h2>Videos Internacionales</h2>
            <div class="row">
                <div class="col-sm-12 col-md-12" id="videosInternacionales">
                    <div class="item" ng-repeat="post in internacionalesVideos">
                        <div class="post video-post medium-post">
                            <div class="entry-header">
                                <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" ng-src="{{post.oembed.url| trustAsResourceUrl}}" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="post-content">								
                                <h2 class="entry-title">
                                    <a href="{{post.oembed.url}}" >{{post.oembed.title}}</a>
                                </h2>
                            </div>
                        </div><!--/post--> 
                        <span>{{$last ? loadInternationalVideos() : ''}}</span>
                    </div>
                </div>
            </div>
        </div>

        <div ng-show="internacionales.length > 0" class="section postImageInter">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a href="#internacional">Internacionales</a></h1>
                        <div class="middle-content">								
                            <div class="section">
                                <div class="row">
                                    <div ng-repeat="post in internacionales" class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="post medium-post">
                                            <div class="entry-header">
                                                <div class="entry-thumbnail">
                                                    <a href="{{post.oembed.url}}" target="_blank"><img class="img-responsive" ng-src="{{post.oembed.thumbnail_url}}" alt="" /></a>
                                                </div>
                                            </div>
                                            <div class="post-content">								
                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i>{{post.formattedDate}}</a></li>
                                                    </ul>
                                                </div>
                                                <h2 class="entry-title">
                                                    <a href="{{post.oembed.url}}" target="_blank">{{post.oembed.title| limitTo: 70}}...</a>
                                                </h2>
                                            </div>
                                        </div><!--/post--> 
                                    </div>
                                </div>
                            </div><!--/.lifestyle -->
                        </div><!--/.middle-content-->
                    </div><!--/#site-content-->
                    <div class="load-more text-center">
                        <a class="btn btn-primary btn-block" ng-click="masInternacionales()">Cargar Más Noticias...</a>
                    </div>
                    <!--Publicidad horizontal-->
                    <div class="row top5">
                        <img class="img-responsive center-block" style="max-height:120px"
                             ng-src="{{publicidadHorizontal.thumbnailImageUrl}}" />
                    </div>                      
                </div>
                <div class="col-sm-3">
                    <div id="sitebar">							
                        <div ng-show="nacionales.length > 0" class="widget">
                            <h1 class="section-title title"><a href="#listing">Otras noticias</a></h1>
                            <ul class="post-list">
                                <li ng-repeat="post in nacionales">
                                    <div class="post small-post internacional-small">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a ng-click="detail(post.id)"><img class="img-responsive" ng-src="{{post.thumbnailImageUrl}}" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="video-catagory"><a href="#"></a></div>
                                            <h2 class="entry-title">
                                                <a ng-click="detail(post.id)">{{post.title}}</a>
                                            </h2>
                                        </div>
                                    </div><!--/post-->
                                </li>
                            </ul>
                        </div><!--/#widget-->
                        <!--Publicidad Vertical-->
                        <div class="widget" ng-show="publicidadCuadrada.length > 0">
                            <img class="img-responsive center-block anuncioMedium" ng-src="{{publicidadCuadrada[0].thumbnailImageUrl}}"/>
                        </div><!-- widget -->   
                        
                        <div class="widget" ng-show="publicidadCuadrada.length > 1">
                            <img class="img-responsive center-block anuncioMedium" ng-src="{{publicidadCuadrada[1].thumbnailImageUrl}}"/>
                        </div><!-- widget -->  
                        
                        <div class="widget" ng-show="publicidadCuadrada.length > 2">
                            <img class="img-responsive center-block anuncioMedium" ng-src="{{publicidadCuadrada[2].thumbnailImageUrl}}"/>
                        </div><!-- widget -->                           

                    </div><!--/#sitebar-->
                </div>
            </div>	
        </div><!--/.section-->                



    </div><!--/.container-fluid-->
</div> <!-- / .main -->
