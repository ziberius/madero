<div class="widget" ng-controller="bannerInterController">
    <h1 class="section-title title"><a href="#internacional">Internacionales</a></h1>
    <ul class="post-list">
        <div ng-repeat="post in internationalPosts">
            <div ng-show="post.embedly.length > 0">
                <div data-ng-if="post.embedly[0].type !== 'error'">

                    <li>
                        <div class="post small-post">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a href="{{post.embedly[0].url}}" target="_blank"><img class="img-responsive"
                                                                                           src="{{post.embedly[0].thumbnail_url}}"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="video-catagory"><a href="{{post.embedly[0].url}}" target="_blank">{{post.embedly[0].provider_name}}</a></div>
                                <h2 class="entry-title">
                                    <a href="{{post.embedly[0].url}}" target="_blank">{{post.embedly[0].title}}</a>
                                </h2>
                            </div>
                        </div>
                    </li>

                </div>
            </div>
        </div>
        <div class="load-more text-center">
            <a class="btn btn-primary btn-block" ng-click="cargarMasNoticias()">Cargar Más Noticias...</a>
        </div> 
    </ul>
</div><!--/#widget-->