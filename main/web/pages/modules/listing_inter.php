            <div class="main">
                <div id="news-listing" class="container-fluid">	

                <div ng-show="internacionalesDestacadas.length > 0" class="section" id="international-posts-highlighted-carousel">

                    <div ng-repeat="post in internacionalesDestacadas">

                        <div class="post feature-post"
                             ng-style="{'background-image':'url(' + post.embedly[0].thumbnail_url + ')'}" style="background-size:cover;">
                            <div class="post-content">
                                <div class="catagory"><a href="{{post.embedly[0].url}}" target="_blank">{{post.embedly[0].provider_name}}</a>
                                </div>
                                <h2 class="entry-title">
                                    <a href="{{post.embedly[0].url}}" target="_blank">{{post.embedly[0].title}}</a>
                                </h2>
                            </div>
                        </div>
                        <span>{{$last ? loadInternationalPostsHighlightedCarousel() : ''}}</span>
                    </div>

                </div><!-- #main-slider -->                    
                    <!--
                    <div class="section" id="main-slider">
                        <div class="post feature-post" style="background-image:url(/main/web/images/post/carcel.jpg); background-size:cover;">
                            <div class="post-content">
                                <div class="catagory"><a href="#">Internacional</a></div>
                                <h2 class="entry-title">
                                    <a href="news-details.php">Un preso al día muere en las abarrotadas cárceles de Brasil</a>
                                </h2>
                            </div>
                        </div>
                        <div class="post feature-post video-post" style="background-image:url(/main/web/images/post/teleserie.jpg); background-size:cover;">
                            <div class="post-content">
                                <div class="catagory"><a href="#">Internacional</a></div>
                                <h2 class="entry-title">
                                    <a href="news-details2.php">Las claves de Amanda para ser la teleserie diurna más vista</a>
                                </h2>
                            </div>
                        </div>
                        <div class="post feature-post" style="background-image:url(/main/web/images/post/holanda.jpg); background-size:cover;">
                            <div class="post-content">
                                <div class="catagory"><a href="#">Internacional</a></div>
                                <h2 class="entry-title">
                                    <a href="news-details2.php">Gobierno instauró mesa de trabajo para reinserción de alumnos de Liceo Técnico Profesional Edwin Latorre Rivero</a>
                                </h2>
                            </div>
                        </div>
                        <div class="post feature-post" style="background-image:url(/main/web/images/post/uruguayo.jpg); background-size:cover;">
                            <div class="post-content">
                                <div class="catagory"><a href="#">Internacional</a></div>
                                <h2 class="entry-title">
                                    <a href="news-details.php">Uruguayo detenido por participación en asalto frustrado a detective</a>
                                </h2>
                            </div>
                        </div>
                        <div class="post feature-post" style="background-image:url(/main/web/images/post/futbolista.jpg); background-size:cover;">

                            <div class="post-content">
                                <div class="catagory"><a href="#">Internacional</a></div>
                                <h2 class="entry-title">
                                    <a href="news-details.php">La fascinación de los artistas por la Patagonia</a>
                                </h2>
                            </div>
                        </div>		
                        <div class="post feature-post" style="background-image:url(/main/web/images/post/valparaiso.jpg); background-size:cover;">
                            <div class="post-content">
                                <div class="catagory"><a href="#">Internacional</a></div>
                                <h2 class="entry-title">
                                    <a href="news-details.php">Valparaíso: Minvu destina $ 13 mil millones a zonas siniestradas</a>
                                </h2>
                            </div>
                        </div> -->   
                    <div class="section">
                        <div class="row">
                            <img class="img-responsive center-block" style="max-height:120px" src="/main/web/images/post/banner.jpg" />
                        </div>
                    </div>      
                    <div class="section">
                        <h2>Destacadas Internacionales</h2>
                        <div class="row">
                            <div class="col-sm-12 col-md-12" id="latest-news">
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <a href="news-details.php"><img class="img-responsive" src="/main/web/images/post/coquimbo/1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="news-details.php">En La Serena fue detenido “papito corazón” que debía más de $76 millones...</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h2>Videos Internacionales</h2>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 imageSlide">
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>
                                <div class="item">
                                    <div class="post video-post medium-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YTD_jG5vOks" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="post-content">								
                                            <h2 class="entry-title">
                                                <a href="news-details.php">Superintendencia de bancos informa de tasas de morosidad.</a>
                                            </h2>
                                        </div>
                                    </div><!--/post--> 
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="row">
                            <div class="col-sm-9">
                                <div id="site-content" class="site-content">
                                    <h1 class="section-title title"><a href="listing.html">Internacionales</a></h1>
                                    <div class="middle-content">								
                                        <div class="section">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="post medium-post">
                                                        <div class="entry-header">
                                                            <div class="entry-thumbnail">
                                                                <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/holanda.jpg" alt="" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="post-content">								
                                                            <div class="entry-meta">
                                                                <ul class="list-inline">
                                                                    <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> 5 de Enero, 2016 </a></li>
                                                                    <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                                    <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                                </ul>
                                                            </div>
                                                            <h2 class="entry-title">
                                                                <a href="news-details.html">Trump asume presidencia con multitudinaria marcha en su contra.</a>
                                                            </h2>
                                                        </div>
                                                    </div><!--/post--> 
                                                </div>
                                            </div>
                                        </div><!--/.lifestyle -->
                                    </div><!--/.middle-content-->
                                </div><!--/#site-content-->
                                <div class="load-more text-center">
                                    <a class="btn btn-primary btn-block" href="#">Cargar Más Noticias...</a>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div id="sitebar">							
                                    <div class="widget">
                                        <h1 class="section-title title"><a href="listing.html">Otras noticias</a></h1>
                                        <ul class="post-list">
                                            <li>
                                                <div class="post small-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/trump.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">								
                                                        <div class="video-catagory"><a href="#">Negocios</a></div>
                                                        <h2 class="entry-title">
                                                            <a href="news-details.html">Donald Trump sobre el Brexit: &quot;Será fabuloso. Reino Unido está fantástico&quot;</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </li>
                                            <li>
                                                <div class="post small-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/trump.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">								
                                                        <div class="video-catagory"><a href="#">Negocios</a></div>
                                                        <h2 class="entry-title">
                                                            <a href="news-details.html">Donald Trump sobre el Brexit: &quot;Será fabuloso. Reino Unido está fantástico&quot;</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </li>
                                            <li>
                                                <div class="post small-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/trump.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">								
                                                        <div class="video-catagory"><a href="#">Negocios</a></div>
                                                        <h2 class="entry-title">
                                                            <a href="news-details.html">Donald Trump sobre el Brexit: &quot;Será fabuloso. Reino Unido está fantástico&quot;</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </li>
                                            <li>
                                                <div class="post small-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/trump.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">								
                                                        <div class="video-catagory"><a href="#">Negocios</a></div>
                                                        <h2 class="entry-title">
                                                            <a href="news-details.html">Donald Trump sobre el Brexit: &quot;Será fabuloso. Reino Unido está fantástico&quot;</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </li>

                                            <li>
                                                <div class="post small-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/trump.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">								
                                                        <div class="video-catagory"><a href="#">Negocios</a></div>
                                                        <h2 class="entry-title">
                                                            <a href="news-details.html">Donald Trump sobre el Brexit: &quot;Será fabuloso. Reino Unido está fantástico&quot;</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </li>
                                            <li>
                                                <div class="post small-post">
                                                    <div class="entry-header">
                                                        <div class="entry-thumbnail">
                                                            <a href="news-details.html"><img class="img-responsive" src="/main/web/images/post/trump.jpg" alt="" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">								
                                                        <div class="video-catagory"><a href="#">Negocios</a></div>
                                                        <h2 class="entry-title">
                                                            <a href="news-details.html">Donald Trump sobre el Brexit: &quot;Será fabuloso. Reino Unido está fantástico&quot;</a>
                                                        </h2>
                                                    </div>
                                                </div><!--/post-->
                                            </li>
                                        </ul>
                                    </div><!--/#widget-->
                                    <div class="widget">
                                        <img class="img-responsive center-block" src="/main/web/images/anuncio_vertical.jpg" />
                                    </div><!-- widget -->

                                </div><!--/#sitebar-->
                            </div>
                        </div>	
                    </div><!--/.section-->                



                </div><!--/.container-fluid-->
            </div> <!-- / .main -->
