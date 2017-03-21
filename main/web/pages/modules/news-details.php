<div class="main">
    <div id="newsdetails" class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-sm-9">
                    <div id="site-content" class="site-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="left-content">
                                    <h1 class="section-title title">Nacional</h1>
                                    <div class="details-news">
                                        <div class="post">
                                            <div class="entry-header">
                                                <div class="entry-thumbnail">
                                                    <img class="img-responsive img-rounded img-news-detail center-block" src="{{mainPost.thumbnailImageUrl}}"
                                                         alt=""/>
                                                </div>
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li class="posted-by"><i class="fa fa-user"></i> <a >
                                                                {{mainPost.author.display_name}}
                                                            </a></li>
                                                        <li class="publish-date">
                                                            <i class="fa fa-clock-o">
                                                                {{mainPost.formattedDate}}
                                                            </i>
                                                        </li>
                                                        <!--<li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a>
                                                        </li>
                                                        <li class="loves"><a href="#"><i
                                                                        class="fa fa-heart-o"></i>231</a></li>
                                                        <li class="comments"><i class="fa fa-comment-o"></i><a href="#">172</a>
                                                        </li>-->
                                                    </ul>
                                                </div>
                                                <h2 class="entry-title">
                                                    {{mainPost.title}}
                                                </h2>

                                                <div class="entry-content">
                                                    <div data-ng-bind-html="mainPost.content"></div>

                                                    <!--tags-->
                                                    <div ng-show="mainPost.tags.length">
                                                        <div class="news-tags">
                                                            <span>Tags:</span>
                                                            <ul class="list-inline">
                                                                <li ng-repeat="tag in mainPost.tags"
                                                                    ng-init="isLast = $last">
                                                                    <a>{{tag.name}}</a>
                                                                    {{isLast ? '':','}}

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <ul class="list-inline share-link">
                                                        <li><a href="#"><img
                                                                        src="/main/web/images/others/social1.png"
                                                                        alt=""/></a></li>
                                                        <li><a href="#"><img src="/main/web/images/others/social2.png"
                                                                             alt=""/></a></li>
                                                        <li><a href="#"><img src="/main/web/images/others/social3.png"
                                                                             alt=""/></a></li>
                                                        <li><a href="#"><img src="/main/web/images/others/social4.png"
                                                                             alt=""/></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!--/post-->
                                    </div><!--/.section-->
                                </div><!--/.left-content-->
                            </div>
                        </div>
                        <div class="row">
                            <facebook-comments></facebook-comments>
                        </div>
                    </div><!--/#site-content-->

                    <div class="section other-news-section">
                        <h1 class="section-title">Otras Noticias</h1>
                        <div class="related-news">

                            <div id="other-news-carousel">

                                <div class="post medium-post" ng-repeat="post in otherPosts">
                                    <div class="entry-header">
                                        <div class="video-catagory">
                                            <a ng-click="detail(post.id)">{{post.categories[0].name}}</a>
                                        </div>
                                        <div class="entry-thumbnail">
                                            <a ng-click="detail(post.id)"><img
                                                        class="img-responsive"
                                                        src="{{post.thumbnailImageUrl}}"
                                                        alt=""/></a>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><i
                                                            class="fa fa-clock-o">{{post.formattedDate}}</i></li>
                                                <!--<li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>-->
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a ng-click="detail(post.id)">{{post.title}}</a>
                                        </h2>
                                    </div>
                                    <span>{{$last ? loadOtherNewsCarousel() : ''}}</span>
                                </div>

                            </div>
                        </div>
                    </div><!--/.section -->


                    <!--Commentaries-->
                    <!--      <div class="row">
                              <div class="col-sm-12">
                                  <div class="comments-wrapper">
                                      <h1 class="section-title title">Comentarios</h1>
                                      <ul class="media-list">
                                          <li class="media">
                                              <div class="media-left">
                                                  <a href="#"><img class="media-object"
                                                                   src="/main/web/images/others/author.png" alt=""></a>
                                              </div>
                                              <div class="media-body">
                                                  <h2><a href="#">Juan Perez</a></h2>
                                                  <h3 class="date"><a href="#">15 de Diciembre 2016</a></h3>
                                                  <p>Estoy totalmente de acuerdo con la medida. Será un cambio para mejor y es
                                                      el camino a seguir. </p>
                                                  <a class="replay" href="#">Contestar</a>
                                              </div>
                                          </li>
                                          <li class="media">
                                              <div class="media-left">
                                                  <a href="#"><img class="media-object"
                                                                   src="/main/web/images/others/author.png" alt=""></a>
                                              </div>
                                              <div class="media-body">
                                                  <h2><a href="#">Gonzalo Vilches</a></h2>
                                                  <h3 class="date"><a href="#">15 de Diciembre 2016</a></h3>
                                                  <p>Yo difiero con esta medida, creo que el camino correcto es el contrario.
                                                      Debemos presionar a nuestras autoridades para que rectifiquen el camino
                                                      a seguir. </p>
                                                  <a class="replay" href="#">Contestar</a>
                                              </div>
                                          </li>


                                      </ul>

                                      <div class="comments-box">
                                          <h1 class="section-title title">Dejar Comentario</h1>
                                          <form id="comment-form" name="comment-form" method="post">
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <div class="form-group">
                                                          <label>Nombre</label>
                                                          <input type="text" name="name" class="form-control"
                                                                 required="required">
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-4">
                                                      <div class="form-group">
                                                          <label>Email</label>
                                                          <input type="email" name="email" class="form-control"
                                                                 required="required">
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-4">
                                                      <div class="form-group">
                                                          <label>Asunto</label>
                                                          <input type="text" name="subject" class="form-control">
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                      <div class="form-group">
                                                          <label>Mensaje</label>
                                                          <textarea name="comment" id="comment" required="required"
                                                                    class="form-control" rows="5"></textarea>
                                                      </div>
                                                      <div class="text-center">
                                                          <button type="submit" class="btn btn-primary">Send</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>-->


                </div><!--/.col-sm-9 -->


                <div class="col-sm-3">
                    <div id="sitebar">
                        <div class="widget">

                            <!--International News-->
                            <?php require_once dirname(__FILE__) . '/../include/internacionales.php'; ?>

                            <!--Social Networks-->
                            <div class="widget">
                                <h2 class="section-title">Redes Sociales</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="twitter-timeline" data-lang="es" data-width="300" data-height="500"
                                           data-theme="light" data-link-color="#2B7BB9"
                                           href="https://twitter.com/radiomaderofm">Tweets by Madero FM</a>
                                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FRadioMaderoFm&tabs=timeline&width=300&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                                width="300" height="500" style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="widget">
                                <div class="add">
                                    <a href="#"><img class="img-responsive" src="/main/web/images/post/Add/add6.jpg"
                                                     alt=""/></a>
                                </div>
                            </div>
                            <div class="widget">
                                <h2 class="section-title">Video Tendencias</h2>
                                <div class="post video-post medium-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/Ji2ohWJfEIQ"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div><!--/post-->
                                <div class="post video-post medium-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/0aqiPyTJv8E"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div><!--/post-->
                            </div>
                        </div><!--/#sitebar-->
                    </div>
                </div>
            </div>
        </div><!--/.section-->
    </div><!--/.container-fluid-->
</div> <!-- / .main -->
