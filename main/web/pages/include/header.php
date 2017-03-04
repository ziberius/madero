<div ng-if="loading === true" class="loader"><div id="loadingAnim"></div></div>
<header id="navigation">
    <div class="navbar-inverse barraSuperior">
        <div class="col-md-6 col-lg-6">
            <ul class="list-inline social-icons text-left">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a id="mostrarWhatsapp" ><i class="fa fa-whatsapp"></i></a><span style="display:none" id="spanWhatsapp">+56 9123123</span></li>
            </ul>
        </div>
        <div class="col-md-6 col-lg-6">
            <ul class="list-inline text-right radiolist" style="padding-top:0.3em">
                <li><span>Escuchanos en:</span></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_antofagasta/mp3/icecast.audio', 'Antofagasta', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><i class="fa fa-music"></i> Antofagasta</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_copiapo/mp3/icecast.audio', 'Atacama', 'resizable,height=260,width=370'); return false;" href="#" target="_blank"  ><i class="fa fa-music"></i> Atacama</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Coquimbo', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><i class="fa fa-music"></i> Coquimbo</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Nacional', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" ><i class="fa fa-music"></i> Nacional</a></li>
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

                <a class="navbar-brand" href="index.php">
                    <img class="main-logo img-responsive" src="/main/web/images/logo.jpeg" alt="">
                </a>
            </div> 
            <nav id="mainmenu" class="navbar-left collapse navbar-collapse"> 
                <a class="secondary-logo" href="index.html">
                    <img class="img-responsive" src="/main/web/images/logo.jpeg" alt="">
                </a>
                <ul class="nav navbar-nav">                       
                    <li><a href="index.php">Portada</a></li>
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Noticias Regiones <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="listing.php">Antofagasta</a></li>
                            <li><a href="listing.php">Atacama</a></li>
                            <li><a href="listing_2.php">La Serena - Coquimbo</a></li>
                        </ul>
                    </li>
                    <li><a href="listing.php">Nacional</a></li>
                    <li><a href="listing_inter.php">Internacional</a></li>
                    <li><a href="listing_1.php">Deportes</a></li>
                    <li><a href="listing.php">Opinión</a></li>
                </ul> 					
            </nav>

            <div class="searchNlogin">
                <ul>
                    <li class="search-icon"><span id="textoBuscador" >Buscador de noticias</span> <i class="fa fa-search"></i></li>
                </ul>
                <div class="search">
                    <form role="form">
                        <input type="text" class="search-form" autocomplete="off" placeholder="Palabra clave noticia y enter">
                    </form>
                </div> <!--/.search--> 
            </div><!--.searchNlogin -->
        </div>	
    </div>
</header><!--/#navigation--> 
<div id="maderoRadios" style="position:fixed;right:5px;top:20px;z-index:999;width:13%;display:none">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <div class="panel-title">Radios <span id="cerrarRadios"><i class="fa fa-close" ></i></span></div>

        </div>
        <div class="panel-body text-center">
            <ul class="menu vertical radiolist">
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_antofagasta/mp3/icecast.audio', 'Antofagasta', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" class="btn btn-default btnRadio" role="button"><img src="/main/web/images/radio.jpg" style="width:20px;height:20px" />Antofagasta</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_copiapo/mp3/icecast.audio', 'Atacama', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" class="btn btn-default btnRadio" role="button"><img src="/main/web/images/radio.jpg" style="width:20px;height:20px" />Atacama</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Coquimbo', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" class="btn btn-default btnRadio" role="button"><img src="/main/web/images/radio.jpg" style="width:20px;height:20px" />Coquimbo</a></li>
                <li><a onClick="window.open('http://unlimited1-cl.digitalproserver.com/madero_serena/mp3/icecast.audio', 'Nacional', 'resizable,height=260,width=370'); return false;" href="#" target="_blank" class="btn btn-default btnRadio" role="button"><img src="/main/web/images/radio.jpg" style="width:20px;height:20px" />Nacional</a></li>
            </ul>              
        </div>
    </div>

</div>

