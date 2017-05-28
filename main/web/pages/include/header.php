<header id="navigation">
    <div class="navbar-inverse barraSuperior">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <ul class="list-inline social-icons text-left">

                <li><a href="https://www.facebook.com/radiomaderofm" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/radiomaderofm" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
                <li><a href="https://www.instagram.com/radiomaderofm" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                <li><a ><i class="fa fa-youtube"></i></a></li>
                <li><a class="mostrarWhatsapp" ><i class="fa fa-whatsapp"></i></a><span style="display:none" class="spanWhatsapp">+56 972 281 896</span></li>
                <li class="visible-xs-inline visible-sm-inline">                    
                    <a id="radiotvLink">
                        <i class="fa fa-play-circle" ></i>
                    </a>
                </li>                  

            </ul>
        </div>
        <div class="hidden-sm hidden-xs col-md-6 col-lg-6">
            <ul class="list-inline text-right radiolist" style="padding-top:0.3em">
                <li><span>Escuchanos en:</span></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_antofagasta/mp3/icecast.audio', 'Antofagasta', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Antofagasta</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_copiapo/mp3/icecast.audio', 'Atacama', 'resizable,height=260,width=370'); return false;" href="#" target="_blank"  ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Atacama</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Coquimbo', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Coquimbo</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Nacional', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><img class="imgicon" src="/madero/main/web/images/ico/radio_play.png" /> Nacional</a></li>
            </ul>    
        </div>
    </div>
    <div class="navbar" role="banner">	
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#madero">
                    <img class="main-logo img-responsive" src="/madero/main/web/images/logo.jpeg" alt="">
                </a>
            </div> 
            <nav id="mainmenu" class="navbar-left collapse navbar-collapse"> 
                <a class="secondary-logo" href="#madero">
                    <img class="img-responsive" src="/madero/main/web/images/logo.jpeg" alt="">
                </a>
                <ul class="nav navbar-nav">                       
                    <li><a href="#madero">Portada</a></li>
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Noticias Regiones <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#listing_1">Antofagasta</a></li>
                            <li><a href="#listing_2">Atacama</a></li>
                            <li><a href="#listing_3">La Serena - Coquimbo</a></li>
                        </ul>
                    </li>
                    <li><a href="#listing">Nacional</a></li>
                    <li><a href="#internacional">Internacional</a></li>
                    <li><a href="#listing_4">Deportes</a></li>
                    <li><a href="#mineria">Minería</a></li>
                </ul> 					
            </nav>

            <div class="searchNlogin">
                <ul>
                    <li class="search-icon"><span id="textoBuscador" >Buscador de noticias</span> <i class="fa fa-search"></i></li>
                </ul>
                <div class="search">
                    <form ng-controller="buscadorController" role="form">
                        <input ng-model="termino" ng-keyup="$event.keyCode === 13 && buscarNoticias()" type="text" class="search-form" autocomplete="off" placeholder="Palabra clave noticia y enter">
                    </form>
                </div> <!--/.search--> 
            </div><!--.searchNlogin -->
        </div>	
    </div>
</header><!--/#navigation--> 
<div id="maderoRadios" class="hidden-sm hidden-xs" style="position:fixed;right:5px;top:100px;z-index:9999;width:20%;" ng-controller="tvController">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color:black">

            <div class="panel-title" style="color:white;font-weight: bolder"><img src="/madero/main/web/images/radio.jpg" style="height:20px;width:20px;" /> Madero TV <span id="cerrarRadios" ng-click="cerrarRadios()"><i class="fa fa-close" ></i></span></div>
        </div>
        <div class="panel-body text-center">
            <div>
                <img id="playImg" class="img-responsive" src="/madero/main/web/images/maderotv/play.jpeg" />
                <iframe id="tvIframe" style="display:none" class="vrudo"  width="210" height="160" allowfullscreen="true" frameborder="0" scrolling="no"></iframe>
            </div>
            <ul class="menu vertical radiolist">
                <li><a ng-click="cargarRadio('ANTOFAGASTA')" class="btn btnRadio" role="button"><i class="fa fa-play" ></i> Antofagasta</a></li>
                <li><a ng-click="cargarRadio('COQUIMBO')" class="btn btnRadio" role="button"><i class="fa fa-play" ></i> Coquimbo</a></li>
                <li><a ng-click="cargarRadio('DESIERTO')" class="btn btnRadio" role="button"><i class="fa fa-play" ></i> Desierto</a></li>
            </ul>              
        </div>
    </div>

</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

