<div class="main">
    <div class="container-fluid">			
        <div class="section" id="main-slider">
            <div class="post feature-post" ng-style="{'background-image':'url(' + destacadaAntofagasta[0].thumbnailImageUrl + ')'}" style="background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Antofagasta</a></div>
                    <h2 class="entry-title">
                        <a ng-click="detail(destacadaAntofagasta[0].id)">{{destacadaAntofagasta[0].title}}</a>
                    </h2>
                </div>                                       
            </div>             
            <div class="post feature-post" ng-style="{'background-image':'url(' + destacadaAtacama[0].thumbnailImageUrl + ')'}" style="background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Atacama</a></div>
                    <h2 class="entry-title">
                        <a ng-click="detail(destacadaAtacama[0].id)">{{destacadaAtacama[0].title}}</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post" ng-style="{'background-image':'url(' + destacadaSerena[0].thumbnailImageUrl + ')'}" style="background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">La Serena - Coquimbo</a></div>
                    <h2 class="entry-title">
                        <a ng-click="detail(destacadaSerena[0].id)">{{destacadaSerena[0].title}}</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post" ng-style="{'background-image':'url(' + destacadaAntofagasta[0].thumbnailImageUrl + ')'}" style="background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Antofagasta</a></div>
                    <h2 class="entry-title">
                        <a ng-click="detail(destacadaAntofagasta[0].id)">{{destacadaAntofagasta[0].title}}</a>
                    </h2>
                </div>
            </div>
            <div class="post feature-post" ng-style="{'background-image':'url(' + destacadaAtacama[0].thumbnailImageUrl + ')'}" style="background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">Atacama</a></div>
                    <h2 class="entry-title">
                        <a ng-click="detail(destacadaAtacama[0].id)">{{destacadaAtacama[0].title}}</a>
                    </h2>
                </div>
            </div><!--/post-->
            <div class="post feature-post" ng-style="{'background-image':'url(' + destacadaSerena[0].thumbnailImageUrl + ')'}" style="background-size:cover;">
                <div class="post-content">
                    <div class="catagory"><a href="#">La Serena - Coquimbo</a></div>
                    <h2 class="entry-title">
                        <a ng-click="detail(destacadaSerena[0].id)">{{destacadaSerena[0].title}}</a>
                    </h2>
                </div>
            </div><!--/post-->
        </div>
        <div class="section">
            <div class="row">
                <img class="img-responsive center-block" style="max-height:120px" src="/main/web/images/post/banner.jpg" />
            </div>
        </div>                

        <div class="section">
            <div class="row">
                <div class="col-sm-3">
                    <h1 class="section-title title"><a href="listing.php">Nacional</a></h1>	
                    <div class="left-sidebar">
  
                        <div ng-click="" style="cursor: pointer" class="post medium-post" ng-repeat="noticia in nacionales">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a ng-click="detail(noticia.id)"><img class="img-responsive" ng-src="{{noticia.thumbnailImageUrl}}" alt="" /></a>
                                </div>
                            </div>  
                            <div class="post-content">								
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> {{noticia.formattedDate}}</a></li>
                                        <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                        <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                    </ul>
                                </div>
                                <h2 class="entry-title">
                                    <a ng-click="detail(noticia.id)">{{noticia.title}}</a>
                                </h2>
                            </div>                                        
                        </div> 

                        <div class="load-more text-center">
                            <a class="btn btn-primary btn-block" ng-click="masNacionales()">Cargar Más Noticias...</a>
                        </div>
                        <div class="top5">
                            <img class="img-responsive center-block" src="/main/web/images/anuncio_vertical.jpg">
                        </div>
                    </div><!--/left-sidebar--> 	
                </div>

                <div class="col-sm-6">
                    <div id="site-content" class="site-content">
                        <h1 class="section-title title"><a href="listing.php">Noticias del Norte</a></h1>
                        <div class="middle-content">
                            <div id="top-news" class="section top-news">

                                <div class="post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a ng-click="detail(norteAntofagasta[0].id)" ><img class="img-responsive" ng-src="{{norteAntofagasta[0].thumbnailImageUrl}}" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">								
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a ng-click="detail(norteAntofagasta[0].id)"><i class="fa fa-clock-o"></i>{{norteAntofagasta[0].formattedDate}}</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a ng-click="detail(norteAntofagasta[0].id)">{{norteAntofagasta[0].title}}</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->

                                <div class="post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a ng-click="detail(norteAtacama[0].id)" ><img class="img-responsive" ng-src="{{norteAtacama[0].thumbnailImageUrl}}" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a ng-click="detail(norteAtacama[0].id)"><i class="fa fa-clock-o"></i>{{norteAtacama[0].formattedDate}}</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a ng-click="detail(norteAtacama[0].id)">{{norteAtacama[0].title}}</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->

                                <div class="post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a ng-click="detail(norteSerena[0].id)" ><img class="img-responsive" ng-src="{{norteSerena[0].thumbnailImageUrl}}" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a ng-click="detail(norteSerena[0].id)"><i class="fa fa-clock-o"></i>{{norteSerena[0].formattedDate}}</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a ng-click="detail(norteSerena[0].id)">{{norteSerena[0].title}}</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->


                            </div><!-- top-news -->

                            <div class="section health-section">
                                <h1 class="section-title"><a href="listing.php">Antofagasta</a></h1>
                                <div class="health-feature">
                                    <div ng-click="" style="cursor: pointer" class="post" ng-repeat="noticia in nacionalesAntofa">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a ng-click="detail(noticia.id)" ><img class="img-responsive" ng-src="{{noticia.thumbnailImageUrl}}" alt="" /></a>
                                            </div>
                                        </div>  
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a><i class="fa fa-clock-o"></i> {{noticia.formattedDate}}</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a ng-click="detail(noticia.id)" >{{noticia.title}}</a>
                                            </h2>
                                        </div>                                        
                                    </div>                                      
                                </div>
                            </div><!--/.health-section -->
                            <div class="load-more text-center">
                                <a class="btn btn-primary btn-block" ng-click="masAntofagasta()">Cargar Más Noticias...</a>
                            </div>

                            <div class="section technology-news">
                                <h1 class="section-title"><a href="listing.php">Atacama</a></h1>
                                <div class="row">

                                    <div ng-show="nacionalesAtacama[0]">
                                        <div class="col-md-8 col-sm-12">
                                            <div class="post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesAtacama[0].id)"><img class="img-responsive" src="{{nacionalesAtacama[0].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesAtacama[0].id)"><i class="fa fa-clock-o"></i> {{nacionalesAtacama[0].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesAtacama[0].id)" >{{nacionalesAtacama[0].title}}</a>
                                                    </h2>
                                                    <div class="entry-content">
                                                        <!-- <p data-ng-bind-html="nacionalesAtacama[0].content.substring(0,50)"></p> -->
                                                    </div>
                                                </div>
                                            </div><!--/post-->
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-sm-12">

                                        <div ng-show="nacionalesAtacama[1]">
                                            <div class="post small-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesAtacama[1].id)"><img class="img-responsive" src="{{nacionalesAtacama[1].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesAtacama[1].id)"><i class="fa fa-clock-o"></i>{{nacionalesAtacama[1].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesAtacama[1].id)" >{{nacionalesAtacama[1].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->
                                        </div>
                                        <div ng-show="nacionalesAtacama[2]">
                                            <div class="post small-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesAtacama[2].id)"><img class="img-responsive" src="{{nacionalesAtacama[2].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesAtacama[2].id)"><i class="fa fa-clock-o"></i>{{nacionalesAtacama[2].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesAtacama[2].id)" >{{nacionalesAtacama[2].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--/technology-news-->
                            <div class="load-more text-center">
                                <a class="btn btn-primary btn-block" ng-click="masAtacama()">Cargar Más Noticias...</a>
                            </div>

                            <div class="section lifestyle-section">
                                <h1 class="section-title"><a href="listing.php">La Serena - Coquimbo</a></h1>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div ng-show="nacionalesSerena[0]">
                                            <div class="post medium-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesSerena[0].id)"><img class="img-responsive" src="{{nacionalesSerena[0].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesSerena[0].id)"><i class="fa fa-clock-o"></i>{{nacionalesSerena[0].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesSerena[0].id)">{{nacionalesSerena[0].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->
                                        </div>

                                        <div ng-show="nacionalesSerena[1]">
                                            <div class="post medium-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesSerena[1].id)"><img class="img-responsive" src="{{nacionalesSerena[1].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesSerena[1].id)"><i class="fa fa-clock-o"></i>{{nacionalesSerena[1].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesSerena[1].id)">{{nacionalesSerena[1].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div ng-show="nacionalesSerena[2]">
                                            <div class="post medium-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesSerena[2].id)"><img class="img-responsive" src="{{nacionalesSerena[2].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesSerena[2].id)"><i class="fa fa-clock-o"></i>{{nacionalesSerena[2].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesSerena[2].id)">{{nacionalesSerena[2].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->
                                        </div>

                                        <div ng-show="nacionalesSerena[3]">
                                            <div class="post medium-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a ng-click="detail(nacionalesSerena[3].id)"><img class="img-responsive" src="{{nacionalesSerena[3].thumbnailImageUrl}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <div class="entry-meta">
                                                        <ul class="list-inline">
                                                            <li class="publish-date"><a ng-click="detail(nacionalesSerena[3].id)"><i class="fa fa-clock-o"></i>{{nacionalesSerena[3].formattedDate}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="entry-title">
                                                        <a ng-click="detail(nacionalesSerena[3].id)">{{nacionalesSerena[3].title}}</a>
                                                    </h2>
                                                </div>
                                            </div><!--/post-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--/.lifestyle -->
                            <div class="load-more text-center">
                                <a class="btn btn-primary btn-block" ng-click="masSerena()">Cargar Más Noticias...</a>
                            </div>

                            <div class="section photo-gallery" style="">
                                <h1 class="section-title title"><a href="listing.php">Programación</a></h1>	
                                <div id="photo-gallery" class="carousel slide carousel-fade" data-ride="carousel">						
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria1.jpeg" alt="" /></a>
                                            <!-- <h2>Noticias</h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria2.jpeg" alt="" /></a>
                                            <!-- <h2>Deportes</h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria3.jpeg" alt="" /></a>
                                            <!-- <h2>Daniela Madero <a class="btn btn-default" role="button" href="#">Madero FM - Copiapó</a></h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria4.jpeg" alt="" /></a>
                                            <!-- <h2>Patricia Palma <a class="btn btn-default" role="button" href="#">Madero FM - Antofagasta</a></h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria5.jpeg" alt="" /></a>
                                            <!-- <h2>Joel Castro <a class="btn btn-default" role="button" href="#">Madero FM - Copiapó</a></h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria6.jpeg" alt="" /></a>
                                            <!-- <h2>Enrique Mursell <a class="btn btn-default" role="button" href="#">Madero FM - La Serena & Coquimbo</a></h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria7.jpeg" alt="" /></a>
                                            <!-- <h2>Andrea Meseguer <a class="btn btn-default" role="button" href="#">Madero FM - Copiapó</a></h2> -->
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="img-responsive img-rounded img-maxheight-40" src="/main/web/images/post/programacion/galeria8.jpeg" alt="" /></a>
                                            <!-- <h2>José Salazar <a class="btn btn-default" role="button" href="#">Madero FM - Antofagasta</a></h2> -->
                                        </div>
                                    </div><!--/carousel-inner-->

                                    <ol class="gallery-indicators carousel-indicators">
                                        <li data-target="#photo-gallery" data-slide-to="0" class="active">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria1.jpeg" alt="" />
                                        </li>
                                        <li data-target="#photo-gallery" data-slide-to="1">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria2.jpeg" alt="" />
                                        </li>   
                                        <li data-target="#photo-gallery" data-slide-to="2">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria3.jpeg" alt="" />
                                        </li>
                                        <li data-target="#photo-gallery" data-slide-to="3">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria4.jpeg" alt="" />
                                        </li>
                                        <li data-target="#photo-gallery" data-slide-to="4">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria5.jpeg" alt="" />
                                        </li>
                                        <li data-target="#photo-gallery" data-slide-to="5">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria6.jpeg" alt="" />
                                        </li>
                                        <li data-target="#photo-gallery" data-slide-to="6">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria7.jpeg" alt="" />
                                        </li>
                                        <li data-target="#photo-gallery" data-slide-to="7">
                                            <img class="img-responsive" src="/main/web/images/gallery/galeria8.jpeg" alt="" />
                                        </li>
                                    </ol><!--/gallery-indicators-->

                                    <div class="gallery-turner">
                                        <a class="left-photo" href="#photo-gallery" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="right-photo" href="#photo-gallery" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div><!--/photo-gallery--> 
                            <div class="section">
                                <div class="row">
                                    <img class="img-responsive center-block" style="max-height:120px" src="/main/web/images/post/banner.jpg">
                                </div>
                            </div>                                    
                        </div><!--/.middle-content-->
                    </div><!--/#site-content-->
                </div>
                <div class="col-sm-3">
                    <div id="sitebar">							
                        <?php require_once("../include/internacionales.php"); ?>
                                  
                        <div class="widget">
                            <h2 class="section-title">Redes Sociales</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="twitter-timeline" data-lang="es" data-width="300" data-height="500" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/radiomaderofm">Tweets by Madero FM</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FRadioMaderoFm&tabs=timeline&width=300&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>                                
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h2 class="section-title">Video Tendencias</h2>
                            <div ng-repeat="post in videoTendencias" class="post video-post medium-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" ng-src="{{post.url| trustAsResourceUrl}}" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div><!--/post-->
                        </div>
                        
                        <div class="top5">
                            <img class="img-responsive center-block" src="/main/web/images/anuncio_vertical.jpg">
                        </div>

                        <div class="top5">
                            <img class="img-responsive center-block" src="/main/web/images/anuncio_vertical.jpg">
                        </div>                        
                        
                        <!--
                        <div class="widget">
                            <h2 class="section-title">Opinión</h2>
                            <div class="post opinion-wrapper">
                                <div class="col-md-4">

                                    <div class="img-opinion left">
                                        <a href="#"><img src="http://i.imgur.com/Mcw06Yt.png"></a>
                                        <div>
                                            <img class="left" src="/main/web/images/cv.png" style="width:20px;height:20px" />
                                            <img class="right" src="/main/web/images/icon-twitter.jpg" style="width:20px;height:20px" />
                                        </div>                                
                                    </div>                             
                                </div>
                                <div class="col-md-8">
                                    <h6>Mauricio Morales</h6> 
                                    <h7>Cientista Político</h7>
                                    <p>¿Cuanto calzan los independientes  y los ex líderes estudiantiles?</p>
                                </div>
                            </div>                                
                            <div class="post opinion-wrapper">
                                <div class="col-md-4">

                                    <div class="img-opinion left">
                                        <a href="#"><img src="http://i.imgur.com/Mcw06Yt.png"></a>
                                        <div>
                                            <img class="left" src="/main/web/images/cv.png" style="width:20px;height:20px" />
                                            <img class="right" src="/main/web/images/icon-twitter.jpg" style="width:20px;height:20px" />
                                        </div>                                
                                    </div>                             
                                </div>
                                <div class="col-md-8">
                                    <h6>Mauricio Morales</h6> 
                                    <h7>Cientista Político</h7>
                                    <p>¿Cuanto calzan los independientes  y los ex líderes estudiantiles?</p>
                                </div>
                            </div>                                
                            <div class="post opinion-wrapper">
                                <div class="col-md-4">

                                    <div class="img-opinion left">
                                        <a href="#"><img src="http://i.imgur.com/Mcw06Yt.png"></a>
                                        <div>
                                            <img class="left" src="/main/web/images/cv.png" style="width:20px;height:20px" />
                                            <img class="right" src="/main/web/images/icon-twitter.jpg" style="width:20px;height:20px" />
                                        </div>                                
                                    </div>                             
                                </div>
                                <div class="col-md-8">
                                    <h6>Mauricio Morales</h6> 
                                    <h7>Cientista Político</h7>
                                    <p>¿Cuanto calzan los independientes  y los ex líderes estudiantiles?</p>
                                </div>
                            </div>                                
                            <div class="post opinion-wrapper">
                                <div class="col-md-4">

                                    <div class="img-opinion left">
                                        <a href="#"><img src="http://i.imgur.com/Mcw06Yt.png"></a>
                                        <div>
                                            <img class="left" src="/main/web/images/cv.png" style="width:20px;height:20px" />
                                            <img class="right" src="/main/web/images/icon-twitter.jpg" style="width:20px;height:20px" />
                                        </div>                                
                                    </div>                             
                                </div>
                                <div class="col-md-8">
                                    <h6>Mauricio Morales</h6> 
                                    <h7>Cientista Político</h7>
                                    <p>¿Cuanto calzan los independientes  y los ex líderes estudiantiles?</p>
                                </div>
                            </div>                                
                        </div> -->
                    </div><!--/#sitebar-->
                </div>
            </div>				
        </div><!--/.section-->

    </div><!--/.container-fluid-->
</div>